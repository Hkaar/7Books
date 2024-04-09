/** @type {Object.<number, number>} */
let items = {};

/**
 * Add the selected item to the current array
 * 
 * @param {Element} card
 */
function addItem(card) {
    const itemId = Number(card.getAttribute("data-item"));
    
    /** @type {HTMLInputElement} */
    const itemsField = document.getElementById("items");

    if (!card.classList.contains("active")) {
        /** @type {HTMLInputElement} */
        const amountField = document.getElementById("selectInputAmount");
        let amount = 1;

        if (amountField && amountField.value) {
            amount = Number(amountField.value);
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
    const cards = document.querySelectorAll(".item-card");

    cards.forEach(card => {
        const itemId = Number(card.getAttribute("data-item"));

        if (itemId in items) {
            card.classList.add("active");  
        }
    });

}

$(document).ready(() => {
    'use strict';

    if (document.querySelector("#side-nav")) {
        $(document).on("click", ".side-nav-close", (event) => {
            document.querySelector("#side-nav").setAttribute("data-collapsed", "true")
        })
    
        $(document).on("click", ".side-nav-open", (event) => {
            document.querySelector("#side-nav").setAttribute("data-collapsed", "false")
        })
    }

    if ($(".item-card")) {
        $(document).on("click", ".item-card", function() {
            addItem(this);
        })
    }

    if ($('#img')) {
        $(document).on("change", "#img", function() {
            let file = this.files[0];
            let preview = $('#preview');

            if (file) {
                let reader = new FileReader();

                reader.onload = (e) => {
                    if (file.type.startsWith('image')) {
                        let img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail');
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
    }
})