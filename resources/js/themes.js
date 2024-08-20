/**
 * Sets the app to the provided theme
 * 
 * @param {string} theme 
 */
export function setTheme(theme) {
    document.querySelector("html")?.setAttribute("data-bs-theme", theme);
    localStorage.setItem("theme", theme);
}

/**
 * Loads the current existing theme stored in the user's browser
 */
export function loadTheme() {
    const theme = localStorage.getItem("theme");

    if (!theme) {return;}

    setTheme(theme);
}

/**
 * Updates (if exists) the theme switch element
 * 
 * @param {string|null} theme
 */
export function updateThemeSwitch(theme = null) {
    const themeSwitch = document.querySelector("#themeSwitch");

    if (!(themeSwitch instanceof Element)) {return;}

    if (theme === null) {
        const theme = localStorage.getItem("theme");

        if (theme === "dark") {
            themeSwitch.querySelector(".fa-sun")?.classList.remove("d-none");
            themeSwitch.querySelector(".fa-moon")?.classList.add("d-none");
        } else {
            themeSwitch.querySelector(".fa-sun")?.classList.add("d-none");
            themeSwitch.querySelector(".fa-moon")?.classList.remove("d-none");
        }

        return;
    }

    switch (theme) {
        case "dark":
            themeSwitch.querySelector(".fa-sun")?.classList.remove("d-none");
            themeSwitch.querySelector(".fa-moon")?.classList.add("d-none");
            break;

        case "light":
            themeSwitch.querySelector(".fa-sun")?.classList.add("d-none");
            themeSwitch.querySelector(".fa-moon")?.classList.remove("d-none");
            break;
    
        default:
            console.error(`Theme ${theme} is not supported yet...`);
            break;
    }
}