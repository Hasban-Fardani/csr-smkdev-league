/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // You will probably also need these lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
    ],
    theme: {
        screens: {
            sm: '320px',
            md: '768px',
            lg: '976px',
            xl: '1440px',
        },
        extend: {
            // colors for figma
            colors: {
                // custom color
                primaryRed: '#510300',
                secondaryRed: '#98100a',
                dark: '#171d2a',

                // https://www.figma.com/design/eH4LIG7U6GK9tsoLDrMPEl/Project-Coding-League-%3A-CSR-Kabupaten-Cirebon?node-id=6119-119816
                bandiBlue: '#0098B0',
                BlazeOrange: '#FF6E01',

                primary: {
                    25: '#F5FFFF',
                    50: '#EBFFFE',
                    100: '#CDFFFF',
                    200: '#A1FBFF',
                    300: '#60F6FF',
                    400: '#18E7F8',
                    500: '#00CADE',
                    600: '#0098B0',
                    700: '#087F96',
                    800: '#10667A',
                    900: '#125567',
                },
                secondary: {
                    25: '#FFFCF6',
                    50: '#FFF9EC',
                    100: '#FFF1D3',
                    200: '#FFDFA5',
                    300: '#FFC76D',
                    400: '#FFA332',
                    500: '#FF860A',
                    600: '#FF6E01',
                    700: '#CC4F02',
                    800: '#A13D0B',
                    900: '#82340C',
                },
                gray: {
                    25: '#FCFCFD',
                    50: '#F9FAFB',
                    100: '#F2F4F7',
                    200: '#EAECF0',
                    300: '#D0D5DD',
                    400: '#98A2B3',
                    500: '#667085',
                    600: '#475467',
                    700: '#344054',
                    800: '#1D2939',
                    900: '#101828',
                },
                error: {
                    25: '#FFFBFA',
                    50: '#FEF3F2',
                    100: '#FEE4E2',
                    200: '#FECDCA',
                    300: '#FDA29B',
                    400: '#F97066',
                    500: '#F04438',
                    600: '#D92D20',
                    700: '#B42318',
                    800: '#912018',
                    900: '#7A271A',
                },
                warning: {
                    25: '#FFFCF5',
                    50: '#FFFAEB',
                    100: '#FEF0C7',
                    200: '#FEDF89',
                    300: '#FEC84B',
                    400: '#FDB022',
                    500: '#F79009',
                    600: '#DC6803',
                    700: '#B54708',
                    800: '#93370D',
                    900: '#7A2E0E',
                },
                success: {
                    25: '#F6FEF9',
                    50: '#ECFDF3',
                    100: '#D1FADF',
                    200: '#A6F4C5',
                    300: '#6CE9A6',
                    400: '#32D583',
                    500: '#12B76A',
                    600: '#039855',
                    700: '#027A48',
                    800: '#05603A',
                    900: '#054F31',
                }
            },
            fontFamily: {
                // font
                helvetica: ['Helvetica', 'sans-serif'],
            }
        },
    },

    // Add daisyUI
    plugins: [
        require("daisyui"),
        'prettier-plugin-tailwindcss'
    ],
    daisyui: {
        themes: ['light']
    }
}
