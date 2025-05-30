/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        fontFamily: {
            sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
          },
      },
    },
    plugins: [],
    safelist: [
        'bg-red-50', 
        'bg-green-50', 
        'bg-blue-50', 
        'bg-yellow-50',
        'bg-purple-50',
        'bg-pink-50',
        'bg-indigo-50',
        'bg-gray-50',
        'bg-orange-50',
        'bg-teal-50',
  
        'hover:bg-red-100',
        'hover:bg-green-100',
        'hover:bg-blue-100',
        'hover:bg-yellow-100',
        'hover:bg-purple-100',
        'hover:bg-pink-100',
        'hover:bg-indigo-100',
        'hover:bg-gray-100',
        'hover:bg-orange-100',
        'hover:bg-teal-100',
    ],
}
