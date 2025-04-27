import $ from "jquery";
import "./bootstrap";
import "./carousel";
import "./chart";
import "./hamburger-menu";
import "./preview-image";
import "./select";
import "./sidebar";
import "./sorting";

window.$ = $;
window.jQuery = $;

document.addEventListener("DOMContentLoaded", () => {
    const success = document.getElementById("success");
    success ? setTimeout(() => (success.style.display = "none"), 3000) : null;
});