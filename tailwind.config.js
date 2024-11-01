import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                primary: {
                    DEFAULT: '#1D4ED8', // Default Filament primary color (blue)
                    dark: '#1E3A8A',
                },
                secondary: {
                    DEFAULT: '#4ADE80', // Change this to your desired secondary color
                    light: '#A7F3D0',
                    dark: '#15803D',
                },
            },
        },
    },
    // plugins: [],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
