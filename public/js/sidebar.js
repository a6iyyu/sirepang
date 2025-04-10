document.addEventListener("DOMContentLoaded", () => {
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
    const menu_items = document.querySelectorAll("nav > a");

    close.addEventListener("click", () => {
        aside.classList.remove("pr-6");
        aside.classList.add("pr-6");
        aside_div.classList.remove("space-x-4");
        aside_logo.classList.remove("space-x-8");
        close.style.display = "none";
        logo.style.display = "none";
        main.style.paddingLeft = "8rem";
        open.classList.add("!lg:inline");
        open.classList.remove("!hidden");
        route.style.width = "fit-content";
        route_icon.forEach((item) => (item.style.marginRight = "0"));
        sidebar_menu.forEach((item) => (item.style.display = "none"));
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
        sidebar_menu.forEach((menu) => (menu.style.display = "inline"));
    });

    menu_items.forEach((item) => {
        item.addEventListener("click", () => {
            menu_items.forEach((menu) => {
                menu.classList.remove("bg-primary", "text-green-dark");
                menu.classList.add("text-white");
            });

            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
        });

        if (item.href === window.location.href) {
            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
        }
    });
});