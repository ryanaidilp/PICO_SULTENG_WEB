const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.vue',
        './resources/**/*.jsx',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
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
    plugins: [
      require('@tailwindcss/ui'),
      require('@tailwindcss/typography')
    ],
}
