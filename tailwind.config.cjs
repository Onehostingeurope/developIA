/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./services.html",
    "./contact.html",
    "./main.js"
  ],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "primary": "#dbfcff",
        "outline-variant": "#3b494b",
        "secondary": "#c2c6db",
        "tertiary-fixed": "#d3e4fe",
        "background": "#101415",
        "on-background": "#e0e3e5",
        "primary-fixed": "#7df4ff",
        "surface-container-highest": "#323537",
        "on-error-container": "#ffdad6",
        "on-primary-fixed-variant": "#004f54",
        "tertiary-fixed-dim": "#b7c8e1",
        "surface-dim": "#101415",
        "on-secondary": "#2b3040",
        "tertiary-container": "#cadbf5",
        "secondary-fixed-dim": "#c2c6db",
        "surface": "#101415",
        "secondary-container": "#414658",
        "on-secondary-container": "#b0b4c9",
        "on-primary-fixed": "#002022",
        "secondary-fixed": "#dee1f7",
        "surface-variant": "#323537",
        "primary-fixed-dim": "#00dbe9",
        "on-secondary-fixed": "#161b2b",
        "surface-tint": "#00dbe9",
        "error-container": "#93000a",
        "on-primary-container": "#006970",
        "on-surface-variant": "#b9cacb",
        "on-tertiary": "#213145",
        "surface-container-lowest": "#0b0f10",
        "on-tertiary-fixed": "#0b1c30",
        "outline": "#849495",
        "surface-bright": "#363a3b",
        "on-surface": "#e0e3e5",
        "surface-container-low": "#191c1e",
        "surface-container-high": "#272a2c",
        "on-secondary-fixed-variant": "#414658",
        "surface-container": "#1d2022",
        "inverse-primary": "#006970",
        "on-tertiary-fixed-variant": "#38485d",
        "on-primary": "#00363a",
        "error": "#ffb4ab",
        "on-tertiary-container": "#506076",
        "inverse-surface": "#e0e3e5",
        "on-error": "#690005",
        "inverse-on-surface": "#2d3133",
        "tertiary": "#f3f6ff",
        "primary-container": "#00f0ff"
      },
      borderRadius: {
        "DEFAULT": "0.125rem",
        "lg": "0.25rem",
        "xl": "0.5rem",
        "full": "0.75rem"
      },
      spacing: {
        "gutter": "24px",
        "margin-desktop": "48px",
        "margin-mobile": "16px",
        "container-max": "1280px",
        "base": "8px"
      },
      fontFamily: {
        "display": ["Geist", "sans-serif"],
        "headline-lg": ["Geist", "sans-serif"],
        "headline-lg-mobile": ["Geist", "sans-serif"],
        "code-sm": ["JetBrains Mono", "monospace"],
        "label-caps": ["JetBrains Mono", "monospace"],
        "body-md": ["Geist", "sans-serif"]
      },
      fontSize: {
        "display": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
        "headline-lg-mobile": ["28px", { "lineHeight": "36px", "fontWeight": "600" }],
        "code-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
        "label-caps": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600" }],
        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }]
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/container-queries')
  ]
};
