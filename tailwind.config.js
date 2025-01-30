import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        container:{
            center: true,
            padding: '1rem'
        },
        extend: {
            screens:{
                '2xl': '1540px' // instead of 1536px
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                custom: ['Sofia Pro Light', 'Euclid Circula A'],
                hero: ['Recoleta', 'Sofia Pro Light', 'Euclid Circula'],
                rufus: ["'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"]
            },
            colors:{
                accent: {
                    DEFAULT: '#3e8cff',
                    light: '#e7f5ffd9'
                },
                primary:{
                    DEFAULT: '#212121',
                    bg: '#FFF4EE'
                },
                secondary:{
                    DEFAULT: '#6A6A6A',
                    bg: '#F6F6F6'
                },
                warning:{
                    DEFAULT: '#E2796C',
                    bg: '#F6D4CA'
                },
                success: {
                    DEFAULT: '#C5F1DEcf',
                    bg: '#4DC281'
                },
                error: {
                    DEFAULT: '#FF5540',
                    bg: '#ffc9cac1'
                },
                pending:{
                    DEFAULT: '#5e63ff',
                    bg: '#adb0fd6b'
                },
                footer: '#F1F8FF',
                border_clr: '#C2C21C2',
                line_clr: '#DCDEE3'
            }
        },
    },
    plugins: [],
};
