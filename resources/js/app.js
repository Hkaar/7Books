import './bootstrap';

import $ from 'jquery';
import 'htmx.org';

import * as bootstrap from 'bootstrap';

import Swiper from "swiper/bundle";
import 'swiper/css/bundle';

import.meta.glob([
    "../images/**/*",
    "../fonts/**/*"
]);

/** @type {readonly string[]} */
const invalidLiterals = ["", "[]"];

/** @type {Object.<number, number>} */
let items = {};

/**
 * Add the selected item to the current array
 * 
 * @param {Element} card - The card element
 */
function addItem(card) {
    const itemId = Number(card.getAttribute("data-item"));
    const itemsField = document.getElementById("items");

    if (!(itemsField instanceof HTMLInputElement)) {
        return;
    }

    if (!card.classList.contains("active")) {
        const amountField = document.getElementById("selectAmount");
        let amount = 1;

        if (amountField instanceof HTMLInputElement && amountField.value) {
            amount = Number(amountField.value);
            amountField.value = "";
        }

        items[itemId] = amount;
        card.classList.add("active");
    } else {
        card.classList.remove("active");
        delete items[itemId];
    }

    itemsField.value = JSON.stringify(items);
}

/**
 * Updates the item cards
 */
function updateItemCards() {
    const cards = document.querySelectorAll(".svb-card");

    cards.forEach(card => {
        const itemId = Number(card.getAttribute("data-item"));

        if (itemId in items) {
            card.classList.add("active");  
        }
    });
}

/**
 * Shows the confirmation modal upon a event being triggered
 * 
 * @param {CustomEvent|JQuery.TriggeredEvent} e 
 */
function showConfirm(e) {
    if (!$(e.target).attr("hx-confirm")) {
        return;
    }

    e.preventDefault();

    const confirmBtn = document.getElementById('confirmButton');
    const cancelButton = document.getElementById('cancelButton');

    // @ts-ignore
    const modal = new bootstrap.Modal("#confirmModal", {
        keyboard: false
    });

    $("#confirmText").text(e.detail.question);
    modal.show();

    confirmBtn?.addEventListener('click', () => {
        e.detail?.issueRequest(true);
        modal.hide();
    });

    cancelButton?.addEventListener('click', () => {
        modal.hide();
        // @ts-ignore
        e.detail = null;
    })
}

/**
 * Toggle the state of the side navigation element
 * 
 * @param {Element} sideNav 
 * @param {boolean} collapsed 
 */
function toggleSideNav(sideNav, collapsed) {
    if (collapsed) {
        sideNav.setAttribute("data-collapsed", "true");
        sideNav.classList.replace("over-none", "over-left");
        document.body.classList.remove("overflow-hidden", "lg-overflow-y-auto");
        
    } else {
        sideNav.setAttribute("data-collapsed", "false");
        sideNav.classList.replace("over-left", "over-none");
        document.body.classList.add("overflow-hidden", "lg-overflow-y-auto");
    }
}

/**
 * Updates the preview image based on the image input
 * 
 * @param {HTMLInputElement} element - The form input for images
 */
function updatePreviewImage(element) {
    let file = element.files ? element.files[0] : null;
    let preview = $("#preview");

    if (file && preview) {
        let reader = new FileReader();
        
        reader.onload = (e) => {
            let result = e.target?.result;

            if (result && file.type.startsWith("image") && typeof result === "string") {
                let img = $("<img>").attr("src", result).addClass("img-thumbnail");
                preview.empty().append(img);
            } else {
                preview.html("Image not available");
            }
        }

        reader.readAsDataURL(file);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    'use strict';

    const itemsField = document.getElementById("items");
    const sideNav = document.querySelector("#side-nav");

    if (itemsField instanceof HTMLInputElement && !invalidLiterals.includes(itemsField.value)) {
        items = JSON.parse(itemsField.value);
    }

    if (sideNav) {
        $(document).on("click", ".side-nav-close", (_) => {
            toggleSideNav(sideNav, true);
        })
    
        $(document).on("click", ".side-nav-open", (_) => {
            toggleSideNav(sideNav, false);
        })

        $(document).on("click", ".side-nav-toggle", (_) => {
            if (sideNav.getAttribute("data-collapsed") === "true") {
                toggleSideNav(sideNav, false);
            } else {
                toggleSideNav(sideNav, true);
            }
        })
    }

    $(document).on("click", ".svb-card", function() {
        addItem(this);
    });

    let homeHeroSwiper = new Swiper("#homeHeroSwiper", {
        effect: "cards",
        grabCursor: true,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
    });

    let swiper = new Swiper(".bookSwiper", {
        slidesPerView: 1.5,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        navigation: { 
            nextEl: '.book-swiper-button-next', 
            prevEl: '.book-swiper-button-prev', 
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

    $(document).on("htmx:confirm", showConfirm);

    $(document).on("change", "#img", function() {
        updatePreviewImage(this);
    }); 
});
