const colors = require('tailwindcss/colors')

module.exports = {
    content: require('fast-glob').sync([
        'source/**/*.{blade.php,md,html,pcss,css,js}',
        'components/**/*.php',
        'markdown.php',
        '!source/**/_tmp/*',
    ]),

    theme: {
        extend: {
            colors: {
                // Special values
                transparent: 'transparent',
                current: 'currentColor',

                // Default colors
                gray: colors.gray,
                red: colors.red,
                yellow: colors.amber,
                green: colors.emerald,
                blue: colors.blue,
                indigo: colors.indigo,
                purple: colors.violet,
                pink: colors.pink,

                // Custom colors
                navy: {
                    DEFAULT: '#003d7a',
                    '900': '#0066cc',
                    '800': '#005cb8',
                    '700': '#0052a3',
                    '600': '#00478f',
                    '500': '#003d7a',
                    '400': '#003366',
                    '300': '#002952',
                    '200': '#001f3d',
                    '100': '#001429',
                    '50': '#000a14',
                },
                gold: {
                    DEFAULT: '#998100',
                    '900': '#ffd700',
                    '800': '#e6c200',
                    '700': '#ccac00',
                    '600': '#b39700',
                    '500': '#998100',
                    '400': '#806c00',
                    '300': '#665600',
                    '200': '#4d4100',
                    '100': '#332b00',
                },
                code: {
                    'text': '#A9B7C6',
                    'bg': '#2B2B2B',
                }
            },
            fontFamily: {
                sans: [
                    'Nunito Sans'
                ],
                mono: [
                    'monospace',
                ],
            },
            lineHeight: {
                normal: '1.6',
                loose: '1.75',
            },
            maxWidth: {
                none: 'none',
                '7xl': '80rem',
                '8xl': '88rem'
            },
            spacing: {
                '7': '1.75rem',
                '9': '2.25rem'
            },
            boxShadow: {
                'lg': '0 -1px 27px 0 rgba(0, 0, 0, 0.04), 0 4px 15px 0 rgba(0, 0, 0, 0.08)',
            }
        },
        fontSize: {
            'xs': '.8rem',
            'sm': '.925rem',
            'base': '1rem',
            'lg': '1.125rem',
            'xl': '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.75rem',
            '4xl': '2.125rem',
            '5xl': '2.625rem',
            '6xl': '10rem',
        },
        debugScreens: {
            position: ['bottom', 'left'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp'),
        require('tailwindcss-debug-screens'),

        function ({addUtilities}) {
            const newUtilities = {
                '.transition-fast': {
                    transition: 'all .2s ease-out',
                },
                '.transition': {
                    transition: 'all .5s ease-out',
                },
            }
            addUtilities(newUtilities)
        }
    ]
}
