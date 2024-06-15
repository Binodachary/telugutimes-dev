const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/**/*.blade.php',
        './resources/**/**/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        themeVariants: ['dark'],
        extend: {
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            backgroundColor: [
                'dark:hover',
                'dark:focus',
                'dark:active',
                'dark:odd',
            ],
            textColor: [
                'dark:focus-within',
                'dark:hover',
                'dark:active',
            ],
            placeholderColor: ['dark:focus'],
            borderColor: ['dark:focus', 'dark:hover'],
            boxShadow: ['dark:focus']
        },
    },
    plugins: [
        require('tailwindcss-multi-theme'),
        require('@tailwindcss/forms'),
    ],
};
