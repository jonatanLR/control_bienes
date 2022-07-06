const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                '3xl': '48rem'
            },
            colors: {
                blue: {
                  '50':  '#f6f9fb',
                  '100': '#e1f1fd',
                  '200': '#c0dbfa',
                  '300': '#94b9f2',
                  '400': '#6b92e9',
                  '500': '#556de0',
                  '600': '#4551d2',
                  '700': '#363cb1',
                  '800': '#252983',
                  '900': '#151953',
                },
            }
        },
        
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
