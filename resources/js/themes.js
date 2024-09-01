/**
 * Sets the theme of the application
 * 
 * @param {string} theme 
 */
export function setTheme(theme) {
    document.querySelector("html")?.setAttribute("data-bs-theme", theme);
    localStorage.setItem("theme", theme);

    return theme;
}

/**
 * Sets the theme toggle to the specified theme
 * 
 * @param {string} theme 
 */
function setThemeToggles(theme) {
    const themeMap = {
        dark: 'fa-moon',
        light: 'fa-sun',
    }

    const themeSwitch = document.getElementById("themeSwitch");

    if (themeSwitch === null) {
        console.error("Theme switch was not found!")
        return;
    }

    switch (theme) {
        case "light":
            themeSwitch.querySelector(themeMap.dark)?.classList.add("d-none");
            themeSwitch.querySelector(themeMap.light)?.classList.remove("d-none");
            break;

        case "dark":
            themeSwitch.querySelector(themeMap.dark)?.classList.remove("d-none");
            themeSwitch.querySelector(themeMap.light)?.classList.add("d-none");
            break;
    
        default:
            console.error(`Theme ${theme} does not exist!`);
            break;
    }
}

/**
 * Loads the theme (if any) from the localStorage to the application
 */
function loadTheme() {
    const theme = localStorage.getItem("theme");

    if (!theme) {
        setTheme("light");
        localStorage.setItem("theme", "light");
        setThemeToggles("light");
        
        return;
    }

    setTheme(theme);
    setThemeToggles(theme);
}

/**
 * Convenient theme setup wrapper for Seven Books
 */
export function setupThemes() {
    loadTheme();

    const themeSwitch = document.getElementById("themeSwitch");

    if (themeSwitch === null) {
        console.error("Theme switch was not found!")
        return;
    }

    themeSwitch.addEventListener("click", () => {
        if (document.querySelector("html")?.getAttribute("data-bs-theme") === "light") {
            setTheme("dark");
            setThemeToggles("dark");
        } else {
            setTheme("light");
            setThemeToggles("light");
        }
    });
}