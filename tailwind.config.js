/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    'includes/php/header.php',
    'includes/php/footer.php',
    'public/**/*.{html,php}',

  ],
  theme: {
    extend: {
      'backgroundImage': {
        'backgroundImg': "url(../imgs/background.webp)"
      }
      ,
    },
  },
  plugins: [],
}
