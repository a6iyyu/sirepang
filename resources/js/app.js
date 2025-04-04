import { Carousel } from "./carousel";
import { PreviewImage } from "./preview-image";
import { Options } from "./chart";
import $ from "jquery";
import "select2";
import "select2/dist/css/select2.min.css";
import "./bootstrap";
import "./hamburger-menu";
import "./search";
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
    success ? setTimeout(() => success.style.display = "none", 3000) : null;

    // Chart
    if (document.getElementById("column-chart") && typeof ApexCharts !== "undefined") {
        const chart = new ApexCharts(document.getElementById("column-chart"), Options);
        chart.render();
    }

    // Dropdown with Search
    const pilihan_nama_pangan = $("#pilihan-nama-pangan");

    if (pilihan_nama_pangan.length) {
        pilihan_nama_pangan.select2({
            allowClear: true,
            placeholder: "Pilih Nama Pangan",
            width: "100%",
        });
    }
});