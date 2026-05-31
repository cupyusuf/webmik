module.exports = {
  content: [
    './app/Views/**/*.php',
    './public/**/*.{html,php,js,css}',
    './src/**/*.{js,css}'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
      },
      colors: {
        primary: {
          DEFAULT: '#2563eb',
          50: '#eef6ff',
          100: '#e6f0ff'
        },
        secondary: {
          DEFAULT: '#06b6d4'
        },
        accent: {
          DEFAULT: '#f97316'
        },
        'base-100': '#ffffff',
        'base-200': '#f8fafc',
        'base-300': '#eef2ff'
      },
      container: {
        center: true,
        padding: '1rem',
      }
    },
  },
  plugins: [
    require('daisyui')
  ],
  daisyui: {
    themes: [
      {
        webmik: {
          "primary": "#2563eb",
          "secondary": "#06b6d4",
          "accent": "#f97316",
          "neutral": "#111827",
          "base-100": "#ffffff",
          "info": "#3abff8",
          "success": "#36d399",
          "warning": "#fbbd23",
          "error": "#f87272"
        }
      },
      'light',
      'dark'
    ]
  }
}
