/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  darkMode: 'class',
  theme: {
    extend: {
      container: {
        center: true,
      },
    },
  },
  plugins: [require('@tailwindcss/forms')],
  safelist: [
    {
      pattern: /(bg|border|text)-(red|blue)-(600)/,
      variants: ['hover'],
    },
  ],
};
