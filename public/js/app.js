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