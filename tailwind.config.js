/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'inter': ['"inter"'],
            },
            animation: {
                'fade-in-down': 'fade-in-down 1s ease-out',
            }
        },
    },
    plugins: [],
}
