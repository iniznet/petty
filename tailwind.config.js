/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.{js,ts,php}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}

