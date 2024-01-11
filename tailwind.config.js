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
            spacing:{
                'largeHeight':'32rem',
            },
            fontFamily: {
                playfair:['Playfair Display'],
                dmsans: ['DM Sans'],
                roboto:['Roboto'],
                martel:['Martel'],
                lora:['Lora'],
                lato:['Lato'],
                cormorant:['Cormorant'],

            },
            colors:{
                lighterBeige:'#d7e0eb',
                Beige:'#a0c3e2',
                whiteBeige:'#f8f8f6',
                darkerBeige:'#4f81b2',

                lightShade:'#e1e3e3',
                mediumShade:'#c4c4bc',
                whiteShade:'#acbac0',
                darkShade:'#acac9c',
                
                //Theme
                first:'#e7f0ed',
                second:'#7fb9c2',
                secondDarker:'#628ca6',
                third:'#95acb2',
                fourth:'#164f55',
                fourthDarker:'#113c41',

                softGreen:'#3b7830',
                softGreenDarker:'#2b5e22',
            }
        },
    },

    plugins: [
        require("daisyui"), forms],

    daisyui: {
        themes: ["light", "dark", "autumn","garden","cyberpunk"],
        },
};
