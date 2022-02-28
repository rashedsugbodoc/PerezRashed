import React from 'react';
import {ROTATION_HANDLE_CLASS} from '../../../common/ui/interactions/actions/rotate-action';

export function RotationControl() {
  return (
    <div className="absolute -bottom-20 left-1/2 w-2 h-20 bg-white cursor-default -translate-x-1/2">
      <div
        className={`${ROTATION_HANDLE_CLASS} w-18 h-18 absolute -bottom-10 -left-8 bg-white rounded-full cursor-move`}
      />
    </div>
  );
}
