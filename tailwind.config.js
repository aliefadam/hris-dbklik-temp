/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./public/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#636578",
                secondary: "#828393",
                "yellow-dbklik": "#FCBE00",
                dbklik: "#152C89",
            },
        },
    },
    plugins: [],
};
