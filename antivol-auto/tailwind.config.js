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
                neutral: {
                    950: '#0B0F14',
                    900: '#0F1620',
                    850: '#141E2A',
                    700: '#233041',
                    650: '#1B2634',
                    450: '#7B8898',
                    300: '#A9B4C2',
                    100: '#EAF0F7',
                },
                accent: {
                    500: 'var(--accent)',
                    600: 'var(--accent)',
                    focusRing: 'rgba(76,195,255,0.25)',
                    DEFAULT: 'var(--accent)',
                    hover: 'var(--accent)',
                },
                status: {
                    success: '#39D98A',
                    warning: '#FFB020',
                    danger: '#FF5A6A',
                },
                bg: {
                    background: 'var(--bg-primary)',
                    surface: 'var(--bg-surface)',
                    elevated: 'var(--bg-elevated)',
                },
                border: {
                    default: 'var(--border-default)',
                    divider: 'var(--border-default)',
                    card: 'var(--border-default)',
                },
                text: {
                    primary: 'var(--text-primary)',
                    secondary: 'var(--text-secondary)',
                    muted: 'var(--text-muted)',
                    onStrong: '#0B0F14',
                },
            },
            borderRadius: {
                input: '12px',
                card: '16px',
                pill: '999px',
            },
            boxShadow: {
                sm: '0 8px 18px 0 rgba(0, 0, 0, 0.25)',
                md: '0 12px 26px 0 rgba(0, 0, 0, 0.30)',
                lg: '0 12px 30px 0 rgba(0, 0, 0, 0.35)',
            },
            fontSize: {
                'h1': ['32px', { lineHeight: '40px', letterSpacing: '-0.2px', fontWeight: '800' }],
                'h2': ['20px', { lineHeight: '28px', letterSpacing: '-0.1px', fontWeight: '700' }],
                'h3': ['16px', { lineHeight: '24px', letterSpacing: '0px', fontWeight: '700' }],
                'body': ['16px', { lineHeight: '24px', letterSpacing: '0px', fontWeight: '500' }],
                'caption': ['12px', { lineHeight: '16px', letterSpacing: '0.6px', fontWeight: '600' }],
            },
        },
    },

    plugins: [forms],
};
