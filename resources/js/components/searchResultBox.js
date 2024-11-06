/**
* Create a search result box component
*
* @param {string} title - The title of the box
* @param {number} id - The item id of the box
* @param {Element} container - The parent container where the box is placed at
* @param {HTMLInputElement} target - The input element where the box is stored as state
*/
export function searchResultBox(title, id, container, target) {
   const root = document.createElement("div");
   root.classList.add(
       "d-flex",
       "align-items-center",
       "justify-content-between",
       "p-3",
       "rounded",
       "bg-body-tertiary"
   );

   const titleElement = document.createElement("span");
   titleElement.classList.add(
       "d-flex",
       "align-items-center",
       "justify-content-center"
   );
   titleElement.textContent = title;

   const deleteButton = document.createElement("button");
   deleteButton.classList.add("btn", "btn-danger");

   const deleteIcon = document.createElement("i");
   deleteIcon.className = "fa-regular fa-trash";
   deleteButton.appendChild(deleteIcon);

   root.appendChild(titleElement);
   root.appendChild(deleteButton);

   deleteButton.addEventListener("click", () => {
       container.removeChild(root);

       const decoded = JSON.parse(target.value);
       delete decoded[id];

       target.value = JSON.stringify(decoded);
   });

   return root;
}