import { Carousel } from "./carousel";
import { PreviewImage } from "./preview-image";
import "./bootstrap";
import "./hamburger-menu";
import "./sidebar";

window.preview_image = PreviewImage;

document.addEventListener("DOMContentLoaded", () => {
    const carousel = new Carousel();
    window.addEventListener("pagehide", () => carousel.destroy());
});
