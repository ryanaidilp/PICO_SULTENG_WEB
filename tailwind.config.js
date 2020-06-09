module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.vue',
    './resources/**/*.jsx',
  ],
  theme: {
    extend: {
      width: {
        '72': '18rem',
        '80': '20rem',
        '88': '22rem',
        '96': '24rem'
      },
      height: {
        '72': '18rem',
        '80': '20rem',
        '88': '22rem',
        '96': '24rem'
      }
    },
  },
  variants: {},
  plugins: [],
}
