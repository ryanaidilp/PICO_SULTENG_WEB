const defaultTheme = require('tailwindcss/defaultTheme')

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
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans]
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
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
