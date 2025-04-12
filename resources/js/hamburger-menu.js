document.addEventListener("DOMContentLoaded", () => {
    const hamburger_menu = document.getElementById("hamburger-menu");
    const mobile_sidebar = document.getElementById("mobile");
    const mobile_close = document.getElementById("mobile-close");
    const mobile_menu_items = document.querySelectorAll("#mobile nav > a");

    hamburger_menu.addEventListener("click", () => {
        if (mobile_sidebar.classList.contains("translate-x-0")) {
            mobile_sidebar.classList.remove("translate-x-0");
            mobile_sidebar.classList.add("-translate-x-full");
        } else {
            mobile_sidebar.classList.remove("-translate-x-full");
            mobile_sidebar.classList.add("translate-x-0");
        }
    });

    if (mobile_close) {
        mobile_close.addEventListener("click", () => {
            mobile_sidebar.classList.remove("translate-x-0");
            mobile_sidebar.classList.add("-translate-x-full");
        });
    }

    mobile_menu_items.forEach((item) => {
        item.addEventListener("click", () => {
            mobile_menu_items.forEach((menu) => {
                menu.classList.remove("bg-primary", "text-green-dark");
                menu.classList.add("text-white");
            });

            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
            mobile_sidebar.classList.remove("translate-x-0");
            mobile_sidebar.classList.add("-translate-x-full");
        });

        if (item.href === window.location.href) {
            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
        }
    });
});