/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        'golden': {
          '50': '#fefcec',
          '100': '#faf6cb',
          '200': '#f5ec92',
          '300': '#f0df59',
          '400': '#edcf35',
          '500': '#e5b11b',
          '600': '#cb8b14',
          '700': '#a96614',
          '800': '#894f17',
          '900': '#714216',
          '950': '#412207',
      },
      
      }
    },
  },
  plugins: [],
}

