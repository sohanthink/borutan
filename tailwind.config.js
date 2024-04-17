/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js}",
    "./index.html",
    "./signin.html",
    "./contact.html",
    "./pricing.html",
  ],
  theme: {
    fontFamily: {
      primary: ["Karla"],
    },
    extend: {},
  },
  plugins: [],
};
