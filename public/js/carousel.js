import { gsap } from "gsap";

export class Carousel {
    constructor() {
        this.current_index = 0;
        this.images = document.querySelectorAll(".carousel-image");
        this.indicators = document.querySelectorAll(".carousel-indicator");
        this.total_slides = this.images.length;
        this.interval = null;
        this.duration = 0.5;
        this.auto_play_delay = 5;

        if (this.total_slides === 0) return;

        this.init();
    }

    init() {
        gsap.set(this.images, { opacity: 0 });
        gsap.set(this.images[0], { opacity: 1 });

        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener("click", () => this.go_to_slide(index));
        });

        this.start_auto_play();
    }

    go_to_slide(index) {
        if (index === this.current_index) return;

        this.indicators[this.current_index].classList.remove("bg-white");
        this.indicators[index].classList.add("bg-white");

        gsap.to(this.images[this.current_index], { duration: this.duration, ease: "power2.inOut", opacity: 0 });
        gsap.to(this.images[index], { duration: this.duration, ease: "power2.inOut", opacity: 1 });

        this.current_index = index;
        this.resetAutoPlay();
    }

    next_slide() {
        const nextIndex = (this.current_index + 1) % this.total_slides;
        this.go_to_slide(nextIndex);
    }

    start_auto_play() {
        this.interval = setInterval(() => this.next_slide(), this.auto_play_delay * 1000);
    }

    resetAutoPlay() {
        clearInterval(this.interval);
        this.start_auto_play();
    }

    destroy() {
        clearInterval(this.interval);
        this.indicators.forEach((indicator) => indicator.removeEventListener("click", () => this.go_to_slide(index)));
    }
}