const plugin = require('tailwindcss/plugin');
const {
  sharedOverride,
  sharedExtend,
  sharedPlugins,
} = require('./src/common/shared.tailwind');

module.exports = {
  content: ['./index.html', './src/**/*.ts*'],
  darkMode: 'class',
  theme: {
    ...sharedOverride,
    colors: theme => {
      return {
        ...sharedOverride.colors(theme),
        controls: '#323232',
      };
    },
    extend: {
      ...sharedExtend,
      zIndex: {
        ...sharedExtend.zIndex,
        'loading-indicator': 50,
        navbar: 40,
        'tool-overlay': 30,
        'obj-box': 20,
        cropzone: 10,
      },
      gridTemplateColumns: {
        '5-min-content': 'repeat(5, min-content)',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: sharedPlugins(plugin),
};
