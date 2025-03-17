import { Carousel } from './carousel';
import { PreviewImage } from './preview-image';
import { Options } from './chart';
import './bootstrap';
import './hamburger-menu';
import './sidebar';
import './sorting';

window.preview_image = PreviewImage;

document.addEventListener('DOMContentLoaded', () => {
    const carousel = new Carousel();
    window.addEventListener('pagehide', () => carousel.destroy());

    setTimeout(() => {
        document.getElementById('success').style.display = 'none';
    }, 3000);

    if (document.getElementById('column-chart') && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById('column-chart'), Options);
        chart.render();
    }
});