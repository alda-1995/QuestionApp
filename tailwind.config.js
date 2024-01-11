const plugin = require('tailwindcss/plugin')
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: {
          DEFAULT: '0.5rem',
          sm: '2rem',
          lg: '3rem',
          xl: '5rem',
          '2xl': '6rem',
        }
      },
      colors: {
        "primary": "#48091a",
        "secondary": "#455af7",
        "accent": "#d5294d",
        "neutral": "#161A30",
        "base-100": "#fde6e7",
        "base-200": "#fbd0d5",
        "base-200": "#f7aab2",
        "base-300": "#f5f9fc",
        "white": "#ffffff",
        "completed": "#8ADAB2",
        "process": "#3081D0",
        "error": "#e80900",
        "success": "#0C356A"
      },
    },
  },
  plugins: [
    plugin(function ({ addBase }) {
      addBase({
        '.font-main': {
          fontFamily: "'Source Sans 3', sans-serif",
          fontSize: "calc(42px + (68 - 42) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 400,
        },
        '.font-secondary': {
          fontFamily: "'Source Sans 3', sans-serif",
          fontSize: "calc(28px + (34 - 28) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.4,
          fontWeight: 400
        },
        '.font-base100': {
          fontFamily: "'Source Sans 3', sans-serif",
          fontSize: "calc(20px + (26 - 20) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.25,
          fontWeight: 300
        },
        '.font-base200': {
          fontFamily: "'Source Sans 3', sans-serif",
          fontSize: "calc(16px + (18 - 16) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 500
        },
        '.parrafo': {
          fontFamily: "'Source Sans 3', sans-serif",
          fontSize: "calc(15px + (16 - 15) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.4,
          fontWeight: 300,
          letterSpacing: 0.32
        },
        '.small': {
          fontFamily: "'Source Sans 3', sans-serif",
          fontSize: "calc(12px + (14 - 12) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 600,
          letterSpacing: 0.5
        },
        '.btn-font': {
          fontFamily: "'Source Sans 3', sans-serif",
          fontSize: "calc(14px + (16 - 14) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 600
        },
      })
    })
  ],
}

