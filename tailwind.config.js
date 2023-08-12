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
                sans: ['Ubuntu', ...defaultTheme.fontFamily.sans],
                serif: ['Lora', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'blue': {  
                    DEFAULT: '#0061BD',
                    50: '#E8F4FF',
                    100: '#C7E4FF',
                    200: '#85C4FF',
                    300: '#43A3FF',
                    400: '#0083FF',
                    500: '#0061BD',
                    600: '#004C94',
                    700: '#00376B',
                    800: '#002243',
                    900: '#000D1A',
                    950: '#000305'
                    },
                'green': {
                    DEFAULT: '#00C321',
                    50: '#EEFFF1',
                    100: '#CDFFD6',
                    200: '#8BFF9F',
                    300: '#49FF67',
                    400: '#06FF30',
                    500: '#00C321',
                    600: '#00A41C',
                    700: '#008617',
                    800: '#006711',
                    900: '#00490C',
                    950: '#00390A'
                    },               
            }
        },
    },

    plugins: [forms],
};
