import React, {forwardRef} from 'react';
import {FormattedMessage} from 'react-intl';
import {Button, ButtonProps} from '../../../common/ui/buttons/button';
import type {MenubarItemProps} from './toolbar-item';
import {DropdownButton} from './dropdown-button';
import {IconButton} from '../../../common/ui/buttons/icon-button';
import {state} from '../../../state/utils';

export function ToolbarButton({item}: MenubarItemProps) {
  const button = item.label ? (
    <ButtonWithLabel item={item} />
  ) : (
    <IconOnlyButton item={item} />
  );

  if (item.menuItems) {
    return <DropdownButton item={item} button={button} />;
  }
  return React.cloneElement<ButtonProps>(button, {
    onPress: () => {
      item.action?.(state().editor);
    },
  });
}

const IconOnlyButton = forwardRef<HTMLButtonElement, MenubarItemProps>(
  ({item, ...other}, ref) => {
    return (
      <IconButton ref={ref} radius="rounded-full" size="sm" {...other}>
        {React.createElement(item.icon!)}
      </IconButton>
    );
  }
);

const ButtonWithLabel = forwardRef<HTMLButtonElement, MenubarItemProps>(
  ({item, ...other}, ref) => (
    <Button
      ref={ref}
      radius="rounded-full"
      size="xs"
      color="primary"
      startIcon={React.createElement(item.icon!)}
      {...other}
    >
      <Label item={item} />
    </Button>
  )
);

function Label({item}: MenubarItemProps) {
  if (!item.label) return null;
  if (typeof item.label === 'string') {
    return <>{item.label}</>;
  }
  return <FormattedMessage {...item.label} />;
}
