$(document).ready(() => {
    if (document.querySelector("#side-nav")) {
        $(document).on("click", ".side-nav-close", (event) => {
            document.querySelector("#side-nav").setAttribute("data-collapsed", "true")
        })
    
        $(document).on("click", ".side-nav-open", (event) => {
            document.querySelector("#side-nav").setAttribute("data-collapsed", "false")
        })
    }
})