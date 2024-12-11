/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.html',           // HTML-Dateien im Root-Verzeichnis
    './src/**/*.html',    // HTML-Dateien in Unterordnern wie "src"
    './public/*.html',
    './public/kurse/*.html',
  ],
  theme: {
    extend: {

    },
  },
  plugins: [require("@tailwindcss/typography"), require("daisyui")],

  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#faf6eb",
          "secondary": "#304975",
          "accent": "#4C6A71",
          "neutral": "#3d4451",
          "base-100": "#ffffff",
        },
      },

    ],
  },
};
