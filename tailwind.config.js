import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require('./vendor/tallstackui/tallstackui/tailwind.config.js') 
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/tallstackui/tallstackui/src/**/*.php', 
        "./node_modules/flowbite/**/*.js"

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                apple : ['AppleSDGothicNeo'],
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
