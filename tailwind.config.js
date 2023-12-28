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
        "secondary": "#811a39",
        "accent": "#d5294d",
        "neutral": "#161A30",
        "base-100": "#fde6e7",
        "base-200": "#fbd0d5",
        "base-200": "#f7aab2",
        "white": "#ffffff"
      },
    },
  },
  plugins: [
    plugin(function ({ addBase }) {
      addBase({
        '.font-main': {
          fontFamily: 'Roboto, sans-serif',
          fontSize: "calc(38px + (64 - 38) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 600,
        },
        '.font-secondary': {
          fontFamily: 'Roboto, sans-serif',
          fontSize: "calc(28px + (34 - 28) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.4,
          fontWeight: 400
        },
        '.font-base100': {
          fontFamily: 'Roboto, sans-serif',
          fontSize: "calc(20px + (26 - 20) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.25,
          fontWeight: 300
        },
        '.font-base200': {
          fontFamily: 'Roboto, sans-serif',
          fontSize: "calc(16px + (18 - 16) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2
        },
        '.parrafo': {
          fontFamily: 'Roboto, sans-serif',
          fontSize: "calc(15px + (16 - 15) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.4,
          fontWeight: 300,
          letterSpacing: 0.32
        },
        '.small': {
          fontFamily: 'Roboto, sans-serif',
          fontSize: "calc(12px + (14 - 12) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 600,
          letterSpacing: 0.5
        },
        '.btn-font': {
          fontFamily: 'Roboto, sans-serif',
          fontSize: "calc(13px + (16 - 13) * ((100vw - 300px) / (2300 - 300)))",
          lineHeight: 1.2,
          fontWeight: 600
        },
      })
    })
  ],
}

