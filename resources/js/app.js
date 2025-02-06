import "./bootstrap";
import { Carousel } from "./carousel";

document.addEventListener("DOMContentLoaded", () => {
    // Carousel
    const carousel = new Carousel();
    window.addEventListener("unload", () => carousel.destroy());

    // Sidebar
    const aside = document.querySelector("aside");
    const aside_div = document.querySelector("aside > section > div");
    const aside_logo = document.querySelector("aside > section");
    const close = document.getElementById("close");
    const logo = document.getElementById("logo");
    const main = document.querySelector("main");
    const open = document.getElementById("open");
    const route = document.getElementById("route");
    const route_icon = document.querySelectorAll("#route > i");
    const sidebar_menu = document.querySelectorAll("#sidebar-menu");
    const menuItems = document.querySelectorAll("nav > a"); // Assuming each menu item is a link

    close.addEventListener("click", () => {
        aside.classList.remove("pr-8");
        aside.classList.add("pr-6");
        aside_div.classList.remove("space-x-4");
        aside_logo.classList.remove("space-x-8");
        close.style.display = "none";
        logo.style.display = "none";
        main.style.paddingLeft = "8.5rem";
        open.classList.add("!lg:inline");
        open.classList.remove("!hidden");
        route.style.width = "fit-content";
        route_icon.forEach(item => item.style.marginRight = "0");
        sidebar_menu.forEach(item => item.style.display = "none");
    });

    open.addEventListener("click", () => {
        aside.classList.remove("pr-6");
        aside.classList.add("pr-8");
        aside_div.classList.add("space-x-4");
        aside_logo.classList.add("space-x-8");
        close.style.display = "inline";
        logo.style.display = "inline";
        main.style.paddingLeft = null;
        open.classList.add("!hidden");
        open.classList.remove("!lg:inline");
        route.style.width = "";
        route_icon.forEach(icon => icon.style.marginRight = "1rem");
        sidebar_menu.forEach(menu => menu.style.display = "inline");
    });

    // Highlight active menu item on click
    menuItems.forEach(item => {
        item.addEventListener("click", () => {
            // Remove active state from all menu items
            menuItems.forEach(menu => {
                menu.classList.remove("bg-primary", "text-green-dark");
                menu.classList.add("text-white");
            });

            // Add active state to clicked menu
            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
        });
    });

    // Preserve highlight based on current route
    menuItems.forEach(item => {
        if (item.href === window.location.href) {
            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
        }
    });
});
