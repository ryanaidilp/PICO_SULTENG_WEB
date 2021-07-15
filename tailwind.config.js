const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/**/*.vue',
        './resources/**/*.php',
        './resources/**/*.jsx',
        './resources/**/*.html',
        './resources/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                orange: colors.orange
            },
            width: {
                '72': '18rem',
                '80': '20rem',
                '88': '22rem',
                '96': '24rem',
                '104': '26rem',
            },
            height: {
                '72': '18rem',
                '80': '20rem',
                '88': '22rem',
                '96': '24rem',
                '104': '26rem'
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
