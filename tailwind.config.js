/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./Modules/**/*.blade.php",
  ],
  theme: {
    extend: {
      colors: {
        backgroundMain: "#CEF3AE",
        backgroundNavbar: "#9AC084",
      },
    },
  },
  plugins: [],
}

