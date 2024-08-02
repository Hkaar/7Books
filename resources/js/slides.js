import Swiper from "swiper/bundle";
import "swiper/css/bundle";

export function setupSlides() {
    const trendingBookSlider = new Swiper("#trendingBookSlider", {
        autoplay: {
            delay: 8500,
            disableOnInteraction: false,
        },
        spaceBetween: 20,
        slidesPerView: 1.5,
        loop: true,
        pagination: {
            el: "#trendingBookSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#trendingNext",
            prevEl: "#trendingPrev",
        },
        breakpoints: {
            768: {
                slidesPerView: 3.5,
            },
            1024: {
                slidesPerView: 4.5,
            },
        },
    });

    const newestBookSlider = new Swiper("#newestBookSlider", {
        autoplay: {
            delay: 8500,
            disableOnInteraction: false,
        },
        spaceBetween: 20,
        slidesPerView: 1.5,
        loop: true,
        pagination: {
            el: "#newestBookSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#newestNext",
            prevEl: "#newestPrev",
        },
        breakpoints: {
            768: {
                slidesPerView: 3.5,
            },
            1024: {
                slidesPerView: 4.5,
            },
        },
    });

    const authorProfileSlider = new Swiper("#authorProfileSlider", {
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        spaceBetween: 20,
        slidesPerView: 1.5,
        loop: true,
        pagination: {
            el: "#authorProfileSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#authorNext",
            prevEl: "#authorPrev",
        },
        breakpoints: {
            768: {
                slidesPerView: 4.5,
            },
            1024: {
                slidesPerView: 5.5,
            },
        },
    });

    const genreSlider = new Swiper("#genreSlider", {
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        spaceBetween: 20,
        slidesPerView: 1.5,
        loop: true,
        pagination: {
            el: "#genreSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#genreNext",
            prevEl: "#genrePrev",
        },
        breakpoints: {
            768: {
                slidesPerView: 4.5,
            },
            1024: {
                slidesPerView: 5.5,
            },
        },
    });
}
