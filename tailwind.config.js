/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './includes/php/header.php',
    './includes/php/footer.php',
    './index.php',
  ],
  theme: {
    extend: {
      'backgroundImage': {
        'backgroundImg': "url(/includes/imgs/background.webp"
      }
      ,
    },
  },
  plugins: [],
}
