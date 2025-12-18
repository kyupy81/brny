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
                sans: ['Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Surfaces
                bg: {
                    background: '#0B0F14',
                    surface: '#0F1620',
                    elevated: '#141E2A',
                },
                // Borders
                border: {
                    card: '#233041',
                    divider: '#1B2634',
                },
                // Text
                text: {
                    primary: '#EAF0F7',
                    secondary: '#A9B4C2',
                    muted: '#7B8898',
                },
                // Accent
                accent: {
                    DEFAULT: '#4CC3FF',
                    hover: '#2FB5FF',
                },
                // Status
                success: '#39D98A',
                warning: '#FFB020',
                danger: '#FF5A6A',
            },
            backgroundColor: {
                // Map bg colors for easier utility use
                DEFAULT: 'var(--color-bg-background)',
            },
            textColor: {
                // Map text colors
                DEFAULT: 'var(--color-text-primary)',
            },
            borderColor: {
                DEFAULT: 'var(--color-border-card)',
            },
            borderRadius: {
                input: 'var(--radius-input)',
                card: 'var(--radius-card)',
                pill: 'var(--radius-pill)',
            },
            spacing: {
                1: 'var(--space-4)',
                2: 'var(--space-8)',
                3: 'var(--space-12)',
                4: 'var(--space-16)',
                6: 'var(--space-24)',
                8: 'var(--space-32)',
            },
            boxShadow: {
                sm: 'var(--shadow-sm)',
                md: 'var(--shadow-md)',
                lg: 'var(--shadow-lg)',
                DEFAULT: 'var(--shadow-md)',
            },
            ringColor: {
                DEFAULT: 'rgba(76, 195, 255, 0.25)',
            },
        },
    },

    plugins: [forms],
};
