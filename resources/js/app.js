import './bootstrap';
// import 'leaflet/dist/leaflet.css';


// import L from "leaflet/dist/leaflet";


// window.L = L;


// used for the gallery
// https://github.com/feimosi/baguetteBox.js
import baguetteBox from 'baguettebox.js';

//if there is a gallery on the page, run baguetteBox
window.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.b_gallery')) {
        baguetteBox.run('.b_gallery', {
            animation: 'slideIn',
            buttons: false,
            noScrollbars: true
        });
    }
});

