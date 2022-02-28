import {saveAs} from 'file-saver';
import {defineMessage} from 'react-intl';
import {getCurrentCanvasState} from '../history/state/get-current-canvas-state';
import {fabricCanvas, state, tools} from '../../state/utils';
import {showToast} from '../../common/ui/toast/show-toast';
import {b64toBlob} from './b64-to-blob';

type ValidFormats = 'png' | 'jpeg' | 'json' | 'svg';

export class ExportTool {
  /**
   * Export current editor state in specified format.
   */
  save(name?: string, format?: ValidFormats, quality?: number) {
    const exportConfig = state().config.tools?.export;
    name = name || exportConfig?.defaultName;
    format = this.getFormat(format);
    quality = this.getQuality(quality);

    const filename = `${name}.${format}`;

    this.applyWaterMark();

    const data: string | null =
      format === 'json'
        ? this.getJsonState()
        : this.getDataUrl(format, quality);

    tools().watermark.remove();

    if (!data) return;

    if (state().config.saveUrl) {
      fetch(state().config.saveUrl!, {
        method: 'POST',
        body: JSON.stringify({data, filename, format}),
      });
    } else if (state().config.onSave) {
      state().config.onSave?.(data, filename, format);
    } else {
      const blob = this.getCanvasBlob(format, data);
      saveAs(blob, filename);
    }
  }

  private getCanvasBlob(format: ValidFormats, data: string): Blob {
    if (format === 'json') {
      return new Blob([data], {type: 'application/json'});
    }
    if (format === 'svg') {
      return new Blob([data], {type: 'image/svg+xml'});
    }
    const contentType = `image/${format}`;
    data = data.replace(/data:image\/([a-z]*)?;base64,/, '');
    return b64toBlob(data, contentType);
  }

  /**
   * Export current editor state as data url.
   */
  getDataUrl(format?: ValidFormats, quality?: number): string | null {
    this.prepareCanvas();
    try {
      if (format === 'svg') {
        return fabricCanvas().toSVG();
      }
      return fabricCanvas().toDataURL({
        format: this.getFormat(format),
        quality: this.getQuality(quality),
        multiplier: Math.max(
          state().original.width / fabricCanvas().width!,
          state().original.height / fabricCanvas().height!
        ),
      });
    } catch (e) {
      if ((e as TypeError).message.toLowerCase().includes('tainted')) {
        showToast(
          defineMessage({
            defaultMessage: 'Could not export canvas with external image.',
          }),
          {type: 'error'}
        );
      }
    }
    return null;
  }

  private getJsonState(): string {
    return JSON.stringify(getCurrentCanvasState());
  }

  private prepareCanvas() {
    fabricCanvas().discardActiveObject();
  }

  private applyWaterMark() {
    const watermark = state().config.watermarkText;
    if (watermark) {
      tools().watermark.add(watermark);
    }
  }

  private getFormat(format?: ValidFormats | 'jpg'): ValidFormats {
    const config = state().config.tools?.export;
    format = format || config?.defaultFormat || 'png';
    if (format === 'jpg') format = 'jpeg';
    return format;
  }

  private getQuality(quality?: number): number {
    const config = state().config.tools?.export;
    quality = quality || config?.defaultQuality || 0.8;
    return quality;
  }
}
