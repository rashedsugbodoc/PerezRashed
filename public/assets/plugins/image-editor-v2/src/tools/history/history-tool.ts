import {IObjectOptions} from 'fabric/fabric-impl';
import {
  DEFAULT_SERIALIZED_EDITOR_STATE,
  SerializedPixieState,
} from './serialized-pixie-state';
import {HistoryItem} from './history-item.interface';
import {HistoryName} from './history-display-names';
import {createHistoryItem} from './state/create-history-item';
import {TEXT_CONTROLS_PADDING} from '../text/text-tool';
import {isText} from '../../objects/utils/is-text';
import {loadFonts} from '../../common/ui/font-picker/load-fonts';
import {FontFaceConfig} from '../../common/ui/font-picker/font-face-config';
import {DEFAULT_OBJ_CONFIG} from '../../objects/default-obj-config';
import {fabricCanvas, state, tools} from '../../state/utils';
import {canvasIsEmpty} from '../canvas/canvas-is-empty';

export class HistoryTool {
  async undo(): Promise<void> {
    if (this.canUndo()) {
      const prev = state().history.items[state().history.pointer - 1];
      await this.load(prev);
    }
  }

  async redo(): Promise<void> {
    if (this.canRedo()) {
      const next = state().history.items[state().history.pointer + 1];
      await this.load(next);
    }
  }

  canUndo(): boolean {
    return state().history.canUndo;
  }

  canRedo(): boolean {
    return state().history.canRedo;
  }

  /**
   * Reload current history state, getting rid of
   * any canvas changes that were not yet applied.
   */
  reload() {
    return this.load(state().history.items[state().history.pointer]);
  }

  /**
   * Replace current history item with current canvas state.
   */
  replaceCurrent() {
    const current = state().history.items[state().history.pointer];
    const items = [...state().history.items];
    items[state().history.pointer] = createHistoryItem({
      name: current.name,
      state: current,
    });
  }

  addInitial(stateObj?: SerializedPixieState) {
    const initial = state().history.items.find(i => i.name === 'initial');
    if (!initial && (stateObj || !canvasIsEmpty())) {
      this.addHistoryItem({name: 'initial', state: stateObj});
    }
  }

  addHistoryItem(params: {name: HistoryName; state?: SerializedPixieState}) {
    const item = createHistoryItem(params);
    const stateUntilPointer = state().history.items.slice(
      0,
      state().history.pointer + 1
    );
    const newItems = [...stateUntilPointer, item];
    state().history.update(newItems.length - 1, newItems);
  }

  load(item: HistoryItem): Promise<any> {
    item = {...item, editor: item.editor || DEFAULT_SERIALIZED_EDITOR_STATE};
    return new Promise<void>(resolve => {
      loadFonts(getUsedFonts(item.canvas.objects)).then(() => {
        fabricCanvas().loadFromJSON(item.canvas, () => {
          tools().zoom.set(1);

          // resize canvas if needed
          if (item.canvasWidth && item.canvasHeight) {
            tools().canvas.resize(item.canvasWidth, item.canvasHeight, {
              resizeHelper: false,
              applyZoom: false,
            });
          }

          // add frame
          tools().frame.remove();
          if (item.editor.frame) {
            tools().frame.add(
              item.editor.frame.name,
              item.editor.frame.sizePercent
            );
          }

          tools().objects.syncObjects();

          // restore padding
          tools()
            .objects.getAll()
            .forEach(o => {
              // translate left/top to center/center coordinates, for compatibility with old .json state files
              if (
                !o.data.pixieInternal &&
                o.originX === 'left' &&
                o.originY === 'top'
              ) {
                const point = o.getPointByOrigin('center', 'center');
                o.set('left', point.x);
                o.set('top', point.y);
              }
              o.set({...DEFAULT_OBJ_CONFIG});
              if (o.type === 'i-text') {
                o.padding = TEXT_CONTROLS_PADDING;
              }
            });

          // prepare fabric.js and canvas
          tools().canvas.render();
          fabricCanvas().calcOffset();
          tools().zoom.fitToScreen();

          // update pointer ID after state is applied to canvas
          state().history.updatePointerById(item.id);
          tools().transform.resetStraightenAnchor();
          resolve();
        });
      });
    });
  }
}

function getUsedFonts(objects: IObjectOptions[]): FontFaceConfig[] {
  const fonts: FontFaceConfig[] = [];
  objects.forEach(obj => {
    if (!isText(obj)) return;
    const fontConfig = state().config.tools?.text?.items?.find(
      f => f.family === obj.fontFamily
    );
    if (fontConfig) {
      fonts.push(fontConfig);
    }
  });
  return fonts;
}
