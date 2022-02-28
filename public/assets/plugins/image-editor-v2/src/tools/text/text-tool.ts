import {IText, ITextOptions} from 'fabric/fabric-impl';
import {fabric} from 'fabric';
import {defaultObjectProps} from '../../config/default-object-props';
import {ObjectName} from '../../objects/object-name';
import {fabricCanvas, state, tools} from '../../state/utils';

export const TEXT_CONTROLS_PADDING = 15;

export class TextTool {
  private readonly minWidth: number = 250;

  add(text?: string, providedConfig: ITextOptions = {}) {
    text = text || state().config.tools?.text?.defaultText;
    if (!text) return;

    const options = {
      ...state().config.objectDefaults?.text,
      ...providedConfig,
      name: ObjectName.Text,
      padding: TEXT_CONTROLS_PADDING,
      editingBorderColor: defaultObjectProps.fill,
    };

    const itext = new fabric.IText(text, options);
    fabricCanvas().add(itext);
    this.autoPositionText(itext);

    tools().objects.select(itext);
  }

  private autoPositionText(text: IText) {
    const canvasWidth = fabricCanvas().getWidth();
    const canvasHeight = fabricCanvas().getHeight();

    // make sure min width is not larger than canvas width
    const minWidth = Math.min(fabricCanvas().getWidth(), this.minWidth);

    text.scaleToWidth(Math.max(canvasWidth / 3, minWidth));

    // make sure text is not scaled outside canvas
    if (text.getScaledHeight() > canvasHeight) {
      text.scaleToHeight(canvasHeight - text.getScaledHeight() - 20);
    }

    text.viewportCenter();

    // push text down, if it intersects with another text object
    fabricCanvas()
      .getObjects('i-text')
      .forEach(obj => {
        if (obj === text) return;
        if (obj.intersectsWithObject(text)) {
          const offset = obj.top! - text.top! + obj.getScaledHeight();
          let newTop = text.top! + offset;

          // if pushing object down would push it outside canvas, position text at top of canvas
          if (newTop > state().original.height - obj.getScaledHeight()) {
            newTop = 0;
          }

          text.set('top', newTop);
          text.setCoords();
        }
      });
  }
}
