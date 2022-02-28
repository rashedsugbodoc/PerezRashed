import {AnimatePresence, m} from 'framer-motion';
import React, {SVGProps} from 'react';
import {FormattedMessage} from 'react-intl';
import {useStore} from '../../state/store';
import {NavItem} from '../../config/default-config';
import {setActiveTool} from './set-active-tool';
import {ToolControls} from './tool-controls';
import {ButtonBase} from '../../common/ui/buttons/button-base';
import {navbarAnimation} from './navbar-animation';
import {navItemMessages} from '../../config/default-nav-items';
import {state} from '../../state/utils';
import {ScrollableView, ScrollableViewItem} from './scrollable-view';

export function Navbar() {
  const activeTool = useStore(s => s.activeTool);
  return (
    <nav className="z-navbar min-h-86 flex-shrink-0 px-16 relative overflow-hidden">
      <AnimatePresence initial={false}>
        {activeTool ? (
          <ToolControls activeTool={activeTool} key="tool-controls" />
        ) : (
          <NavItems key="nav-items" />
        )}
      </AnimatePresence>
    </nav>
  );
}

function NavItems() {
  const navItems = useStore(s => s.config.ui?.nav?.items) || [];
  return (
    <m.div className="w-full h-full" {...navbarAnimation}>
      <ScrollableView>
        {navItems.map(item => (
          <ScrollableViewItem key={item.name}>
            <ToolButton item={item} />
          </ScrollableViewItem>
        ))}
      </ScrollableView>
    </m.div>
  );
}

type ToolButtonProps = {
  item: NavItem;
};

function ToolButton({item}: ToolButtonProps) {
  const clickHandler = () => {
    if (typeof item.action === 'string') {
      setActiveTool(item.action);
    } else if (typeof item.action === 'function') {
      item.action(state().editor);
    }
  };
  const msg = navItemMessages[item.name];
  return (
    <ButtonBase
      variant="outline"
      color="paper"
      className="flex-col flex-shrink-0 w-68 h-68"
      radius="rounded-2xl"
      onPress={clickHandler}
    >
      <div className="mb-1">
        {React.createElement<SVGProps<SVGSVGElement>>(item.icon, {
          className: 'icon-md',
        })}
      </div>
      <div className="mt-6 text-xs capitalize">
        {msg ? <FormattedMessage {...msg} /> : item.name}
      </div>
    </ButtonBase>
  );
}
