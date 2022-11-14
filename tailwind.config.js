/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                'movie-text': '#3D3B3B'
            }
        },
    },
    plugins: [],
};
