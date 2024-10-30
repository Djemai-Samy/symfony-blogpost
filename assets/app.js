import './bootstrap.js';
import './navbar.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';


// Navbar menu interaction
const menuButton = document.querySelector('#navbar-menu-button');
menuButton.addEventListener('click', () => {
    const menu = document.querySelector('#navbar-menu');

    if (menu.style.left == "0%") {
        menu.style.left = "-100%";
    } else {
        menu.style.left = "0%";
    }
})