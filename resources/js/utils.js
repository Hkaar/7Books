/**
 * Clears a html element of its children nodes
 * 
 * @param {Element} element 
 */
export function clearElement(element) {
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}