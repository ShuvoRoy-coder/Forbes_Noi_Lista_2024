/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {

      screens: {
        half: "1390px",
        mini: "500px",
        mob: "350px",
      },

      fontFamily: {
        'urban': ['Urbanist', 'sans-serif'],
      },
      colors: {
        orange: {
          300: '#FDB78B',
          400: '#EB9F72',
          600: '#CC7848',
          800: '#CD6429',
        }
      },
      gradientColorStops: theme => ({
        ...theme('colors')
      }),

    },
  },
  plugins: [],
}