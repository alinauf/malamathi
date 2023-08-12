import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'blue': {  
                      50: '#8DC7FF',
                      100: '#76BCFF',
                      200: '#48A6FF',
                      300: '#1A8FFF',
                      400: '#0079EB',
                      500: '#0061BD',
                      600: '#0057A9',  
                      700: '#004C94',  
                      800: '#004280',  
                      900: '#00376B',  
                      950: '#003261'
                    },
                'green': {
                      50: '#C0FFCB',  100: '#A4FFB4',  200: '#6CFF85',  300: '#34FF57',  400: '#00FB2A',  500: '#00C321',  600: '#009F1B',  700: '#007C15',  800: '#00580F',  900: '#003409',  950: '#002206'
                },               
            }
        },
    },

    plugins: [forms],
};
