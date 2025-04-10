import { Carousel } from "./carousel";
import { PreviewImage } from "./preview-image";
import { Options } from "./chart";
import $ from "jquery";
import "./bootstrap";
import "./hamburger-menu";
import "./select";
import "./sidebar";
import "./sorting";

window.$ = $;
window.jQuery = $;
window.preview_image = PreviewImage;

document.addEventListener("DOMContentLoaded", () => {
    // Carousel
    const carousel = new Carousel();
    window.addEventListener("pagehide", () => carousel.destroy());

    // Success Message
    const success = document.getElementById("success");
    success ? setTimeout(() => (success.style.display = "none"), 3000) : null;

    // Chart
    if (document.getElementById("column-chart") && typeof ApexCharts !== "undefined") {
        const chart = new ApexCharts(document.getElementById("column-chart"), Options);
        chart.render();
    }
});