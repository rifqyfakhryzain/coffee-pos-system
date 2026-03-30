// tailwind.config.js
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
            colors: {
                // Palet Utama "Classic Roastery"
                'coffee': {
                    50: '#fdf8f6',  // Background utama (warm white)
                    100: '#f2e8e3', // Secondary bg / borders
                    200: '#eaddd7', // Border elements
                    600: '#966d52', // Icons / Secondary text
                    800: '#5d4037', // Primary brand color (dark wood)
                    900: '#3e2723', // Headings / Full sidebar bg
                },
                'accent': {
                    DEFAULT: '#d97706', // Amber-600 (Pay button / Highlights)
                    dark: '#b45309',    // Amber-700
                },
                // Warna Status POS standar
                'success': '#16a34a', // Hijau (Paid, Done)
                'danger': '#dc2626',  // Merah (Void, Delete)
                'warning': '#ca8a04', // Kuning (Pending)
            },
            fontFamily: {
                // Menambahkan 'Plus Jakarta Sans' sebagai font sans utama
                'sans': ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};