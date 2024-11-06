import './bootstrap';

import htmx from 'htmx.org';
import * as bootstrap from 'bootstrap';
import Swal from "sweetalert2";

import { setupSlides } from "./slides.js";
import { setupSearch, setupStoredSearchableLoaders } from "./search.js";
import { setupThemes } from "./themes.js";
import { setupTabs } from "./tabs.js";

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
 * Shows a modal upon an event being triggered
 * 
 * @param {CustomEvent<any>} event 
 */
function triggerModal(event) {
    if (!(event.target instanceof Element)) {
        console.error(`Issued event target ${event} was not an element!`);
        return;
    }

    if (event.target.matches('[delete-confirmation]')) {
        event.preventDefault();

        Swal.fire({
            title: "Confirmation",
            text: `Are you sure, you want to delete this ${event.detail.question}?`,
            icon: "question",
            showCancelButton: true,
            showConfirmButton: true,
            timer: 5000,
            timerProgressBar: true,
            backdrop: true,
            allowOutsideClick: false,
        }).then(response => {
            if (response.isConfirmed) {
                event.detail.issueRequest(true);

                Swal.fire({
                    title: "Successfull!",
                    text: `Successfully deleted a ${event.detail.question}`,
                    icon: "success",
                    timer: 5000,
                    timerProgressBar: true,
                });
            }
        })

        return;
    }
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
    let preview = document.getElementById("preview");

    if (file && preview) {
        let reader = new FileReader();
        
        reader.onload = (e) => {
            let result = e.target?.result;

            if (result && file.type.startsWith("image") && typeof result === "string") {
                let img = document.createElement("img");
                img.setAttribute("src", result);
                img.classList.add("md:size-1/2", "block");
            
                while (preview.firstChild) {
                    preview.removeChild(preview.firstChild);
                }
            
                preview.appendChild(img);
            } else {
                preview.textContent = "Gambar tidak tersedia";
            }
        }

        reader.readAsDataURL(file);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    'use strict';

    const itemsField = document.getElementById("items");

    if (itemsField instanceof HTMLInputElement && !invalidLiterals.includes(itemsField.value)) {
        items = JSON.parse(itemsField.value);
    }

    setupSlides();
    setupThemes();

    setupSearch();
    setupTabs();
    setupStoredSearchableLoaders();

    const sideNav = document.querySelector("#side-nav");

    if (sideNav) {
        document.querySelectorAll(".side-nav-toggle").forEach((element) => {
            element.addEventListener("click", () => {
                if (sideNav.getAttribute("data-collapsed") === "true") {
                    toggleSideNav(sideNav, false);
                } else {
                    toggleSideNav(sideNav, true);
                }
            });
        });
    }

    document.addEventListener("click", (event) => {
        if (!(event.target instanceof Element)) {
            console.error(`Event target ${event} was not an element!`);
            return;
        }

        if (event.target.matches(".svb-card[item-card]")) {
            addItem(event.target);
        }
    });

    document.addEventListener("change", (event) => {
        if (!(event.target instanceof HTMLInputElement)) {
            console.error(`Event target ${event} was not an element!`);
            return;
        }

        if (event.target.matches("#img")) {
            updatePreviewImage(event.target);
        }
    });

    document.addEventListener("htmx:confirm", function(e) {
        const event = /** @type {CustomEvent<any>} */ (e);

        triggerModal(event);
    });
});
