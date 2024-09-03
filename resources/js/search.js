import axios from "axios";
import htmx from "htmx.org";

import { searchResultBox } from "./components/searchResultBox.js";
import { clearElement } from "./utils.js";

/**
 * Initiate a GET request to a URL for searches
 *
 * @param {string} url
 * @param {string} query
 * @returns {Promise<string>}
 */
async function search(url, query) {
    if (query === "") {
        return `
        <span class="d-flex align-items-center gap-2 bg-body-tertiary rounded p-3">
            <i class="fa-regular fa-magnifying-glass"></i>
            No results were found
        </span>
        `;
    }

    const searchUrl = `${url}/${query}`;

    try {
        const response = await axios.get(searchUrl);
        return response.data;
    } catch (error) {
        console.error(error);
        return `
            <span class="d-flex align-items-center gap-2 bg-body-tertiary rounded p-3">
                <i class="fa-regular fa-magnifying-glass"></i>
                No results were found
            </span>
        `;
    }
}

/**
 * Loads the items in the contained in a searchable
 *
 * @param {string} container
 * @param {string} target
 */
function loadStoredSearchables(container, target) {
    const containerElement = document.querySelector(container);
    const targetElement = document.querySelector(target);

    if (containerElement === null) {
        console.error(`Container element ${container} does not exist!`);
        return;
    }

    if (!(targetElement instanceof HTMLInputElement)) {
        console.error(`Target element ${target} must be a input!`);
        return;
    }

    clearElement(containerElement);

    /** @type {Object<number, string>} */
    const decoded = JSON.parse(targetElement.value);

    Object.keys(decoded).forEach((key) => {
        const id = Number(key);
        const itemTitle = decoded[id];

        containerElement.appendChild(
            searchResultBox(itemTitle, id, containerElement, targetElement)
        );
    });
}

/**
 * Sets up stored searche loading by elements with the svb-search-load attribute
 */
export function setupStoredSearchableLoaders() {
    document.querySelectorAll("[svb-search-load]").forEach((element) => {
        const target = element.getAttribute("svb-target");
        const container = element.getAttribute("svb-container");

        if (target === null) {
            console.error("Element needs a svb-target attribute to work!");
            return;
        }

        if (container === null) {
            console.error("Element needs a svb-container attribute to work!");
            return;
        }

        element.addEventListener("click", () => {
            loadStoredSearchables(container, target);
        });
    });
}

/**
 * Sets up search for elements with the svb-search attribute
 */
export async function setupSearch() {
    const searchables = document.querySelectorAll("input[svb-search]");

    searchables.forEach((element) => {
        if (!(element instanceof HTMLInputElement)) {
            return;
        }

        const container = element.getAttribute("svb-container");

        if (container === null) {
            console.error("Element needs a svb-container attribute to work!");
            return;
        }

        const containerElement = document.querySelector(container);

        if (containerElement === null) {
            console.error("Container element doesn't exist!");
            return;
        }

        const target = element.getAttribute("svb-target");

        if (target === null) {
            console.error("Element needs a svb-target attribute to work!");
            return;
        }

        const targetElement = document.querySelector(target);

        if (!(targetElement instanceof HTMLInputElement)) {
            console.error("Target element must be an input element!");
            return;
        }

        containerElement.addEventListener("click", (event) => {
            const clicked = event.target;

            if (!(clicked instanceof Element)) {
                console.debug("No target was found!")
                return;
            }

            const dataElement = clicked.closest("[data-item-id]");
    
            if (dataElement === null) {
                console.error("data element not found!");
                return; 
            }
    
            const itemId = dataElement.getAttribute("data-item-id");
            const itemTitle = dataElement.getAttribute("data-item-title");
    
            if (!itemId) {
                console.error(`${dataElement} doesn't have a data-item-id attribute!`);
                return;
            }
            
            const decoded = JSON.parse(targetElement.value || '{}');

            if (!dataElement.classList.contains("active")) {
                decoded[parseInt(itemId)] = itemTitle;
                dataElement.classList.add("active");
            } else {
                delete decoded[parseInt(itemId)];
                dataElement.classList.remove("active");
            }
    
            targetElement.value = JSON.stringify(decoded);
        });

        element.addEventListener("change", async () => {
            const url = element.getAttribute("svb-search");
            const query = element.value;

            if (!url) {
                console.error("Element with svb-search needs at least a URL!");
                return;
            }

            const result = await search(url, query);

            clearElement(containerElement);
            containerElement.innerHTML = result;

            // @ts-ignore
            htmx.process(containerElement);
        
            containerElement.querySelectorAll("[data-item-id]").forEach(dataElement => {
                const itemId = dataElement.getAttribute("data-item-id");
        
                if (!itemId) {
                    console.error(`${dataElement} doesn't have a data-item-id attribute!`);
                    return;
                }
        
                const decoded = JSON.parse(targetElement.value || '{}');
                if (itemId in decoded) {
                    dataElement.classList.add("active");
                }
            });
        });
    });
}
