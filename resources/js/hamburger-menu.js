document.addEventListener("DOMContentLoaded", () => {
    const hamburger_menu = document.getElementById("hamburger-menu");
    const mobileSidebar = document.getElementById("mobile");
    const mobileClose = document.getElementById("mobile-close");
    const mobileMenuItems = document.querySelectorAll("#mobile nav > a");

    hamburger_menu.addEventListener("click", () => {
        if (mobileSidebar.classList.contains('translate-x-0')) {
            mobileSidebar.classList.remove('translate-x-0');
            mobileSidebar.classList.add('-translate-x-full');
        } else {
            mobileSidebar.classList.remove('-translate-x-full');
            mobileSidebar.classList.add('translate-x-0');
        }
    });
    if (mobileClose) {
        mobileClose.addEventListener("click", () => {
            mobileSidebar.classList.remove('translate-x-0');
            mobileSidebar.classList.add('-translate-x-full');
        });
    }
    mobileMenuItems.forEach(item => {
        item.addEventListener("click", () => {
            mobileMenuItems.forEach(menu => {
                menu.classList.remove("bg-primary", "text-green-dark");
                menu.classList.add("text-white");
            });
            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
            mobileSidebar.classList.remove('translate-x-0');
            mobileSidebar.classList.add('-translate-x-full');
        });

        if (item.href === window.location.href) {
            item.classList.add("bg-primary", "text-green-dark");
            item.classList.remove("text-white");
        }
    });
});
