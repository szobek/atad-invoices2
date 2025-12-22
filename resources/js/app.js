import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import './chart/charts'

document.addEventListener('DOMContentLoaded', function () {
    const upperDiv = document.querySelector('.upper');
    upperDiv.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});