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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Surfaces
                background: '#0B0F14',
                surface: '#0F1620',
                elevated: '#141E2A',
                'card-border': '#233041',
                divider: '#1B2634',
                
                // Text
                'text-primary': '#EAF0F7',
                'text-secondary': '#A9B4C2',
                'text-muted': '#7B8898',
                
                // Accent
                accent: '#4CC3FF',
                'accent-hover': '#2FB5FF',
                
                // Status
                success: '#39D98A',
                warning: '#FFB020',
                danger: '#FF5A6A',
            },
            boxShadow: {
                'soft-sm': '0 4px 10px rgba(0,0,0,0.25)',
                'soft-md': '0 12px 30px rgba(0,0,0,0.35)',
                'soft-lg': '0 20px 40px rgba(0,0,0,0.45)',
            },
            borderRadius: {
                'xl': '12px',
                '2xl': '16px',
            }
        },
    },

    plugins: [forms],
};
