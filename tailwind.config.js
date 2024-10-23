import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                apple : ['Apple SD Gothic Neo'],
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '990px',
            'xl': '1120px',
            '2xl': '1400px',
          }
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
