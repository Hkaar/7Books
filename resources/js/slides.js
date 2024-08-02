import Swiper from "swiper/bundle";
import "swiper/css/bundle";

const bookSlideOptions = {
    autoplay: {
        delay: 8500,
        disableOnInteraction: false,
    },
    spaceBetween: 20,
    slidesPerView: 1.5,
    loop: true,
    breakpoints: {
        768: {
            slidesPerView: 3.5,
        },
        1024: {
            slidesPerView: 4.5,
        },
    },
}

const profileSlideOptions = {
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
    },
    spaceBetween: 20,
    slidesPerView: 1.5,
    loop: true,
    breakpoints: {
        768: {
            slidesPerView: 4.5,
        },
        1024: {
            slidesPerView: 5.5,
        },
    },
}

export function setupSlides() {
    const trendingBookSlider = new Swiper("#trendingBookSlider", {
        ...bookSlideOptions,
        pagination: {
            el: "#trendingBookSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#trendingNext",
            prevEl: "#trendingPrev",
        },
    });

    const newestBookSlider = new Swiper("#newestBookSlider", {
        ...bookSlideOptions,
        pagination: {
            el: "#newestBookSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#newestNext",
            prevEl: "#newestPrev",
        },
    });

    const authorProfileSlider = new Swiper("#authorProfileSlider", {
        ...profileSlideOptions,
        pagination: {
            el: "#authorProfileSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#authorNext",
            prevEl: "#authorPrev",
        },
    });

    const genreSlider = new Swiper("#genreSlider", {
        ...profileSlideOptions,
        pagination: {
            el: "#genreSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#genreNext",
            prevEl: "#genrePrev",
        },
    });

    const recomenddedSlide = new Swiper("#recommendedBookSlider", {
        ...bookSlideOptions,
        pagination: {
            el: "#recomenddedBookSliderPagination",
            clickable: true,
        },
        navigation: {
            nextEl: "#recomenddedNext",
            prevEl: "#recomenddedPrev",
        }
    });
}
