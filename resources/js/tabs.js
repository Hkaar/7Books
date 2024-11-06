/**
 * Switches tabs for a tab container
 * 
 * @param {Element} target 
 * @param {string} tabContainer 
 */
function changeTab(target, tabContainer) {
    document.querySelectorAll(`[svb-tab-container=${tabContainer}]`).forEach(tab => {
        tab.classList.add("d-none");
    })

    target.classList.remove("d-none");
}

/** 
 * Convenient setup function for enabling svb-tab functionality
 */
export function setupTabs() {
    document.querySelectorAll("[svb-tab]").forEach(element => {
        const target = element.getAttribute("svb-target");
        const tabContainer = element.getAttribute("svb-tab");

        if (target === null || tabContainer === null) {
            console.error("Tab Element is missing a svb-target and/or svb-tab element to work!");
            return;
        }

        const targetElement = document.querySelector(target);

        if (element.classList.contains('active')) {
            targetElement?.classList.remove('d-none');
        } else {
            targetElement?.classList.add('d-none');
        }

        element.addEventListener("click", () => {
            const targetElement = document.querySelector(target);

            if (targetElement === null) {
                console.error(`Element for tab switching [${target}] doesnt exist!`);
                return;
            }

            document.querySelectorAll(`[svb-tab=${tabContainer}]`).forEach(tab => {
                tab.classList.remove('active');
            });

            element.classList.add("active");

            changeTab(targetElement, tabContainer);
        });
    }); 
}