/**
 * @typedef {import('jquery')}
 * @type {import('bootstrap')}
 */

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

$(document).ready(() => {
    'use strict';

    const itemsField = document.getElementById("items");
    const sideNav = document.querySelector("#side-nav");

    if (itemsField instanceof HTMLInputElement && !invalidLiterals.includes(itemsField.value)) {
        items = JSON.parse(itemsField.value);
    }

    if (sideNav) {
        $(document).on("click", ".side-nav-close", (event) => {
            sideNav.setAttribute("data-collapsed", "true");
        })
    
        $(document).on("click", ".side-nav-open", (event) => {
            sideNav.setAttribute("data-collapsed", "false");
        })
    }

    $(document).on("click", ".svb-card", function() {
        addItem(this);
    });

    $(document).on("htmx:confirm", showConfirm);

    $(document).on("change", "#img", function() {
        let file = this.files[0];
        let preview = $('#preview');

        if (file) {
            let reader = new FileReader();

            reader.onload = (e) => {
                /** @type {string} */
                // @ts-ignore
                let result = e.target?.result;

                if (file.type.startsWith('image') && result) {
                    let img = $('<img>').attr('src', result).addClass('img-thumbnail');
                    preview.empty().append(img);
                } else {
                    preview.html('Image not available');
                }
            };

            reader.readAsDataURL(file);
        } else {
            preview.empty();
        }
    }); 
})
