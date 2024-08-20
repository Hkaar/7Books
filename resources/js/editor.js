export class Editor {
    /**
     * Constructor method for the editor
     * 
     * @param {EditorConfig} config 
     */
    constructor(config) {
        /** @type {HTMLElement|null} */
        this.holder = document.querySelector(config.holder);

        if (this.holder === null) {
            console.error("Holder element does not exist!");
            return;
        }

        /** @type {Array<Block>} */
        this.blocks = [];

        /** @type {HTMLElement} */
        this.selected;
    }

    /**
     * Render the blocks that are being stored
     */
    render() {
        this.clear();

        this.blocks.forEach(blockData => {
            const block = this.createBlock(blockData);
            this.holder?.appendChild(block);
        });
    }

    /**
     * Add a block to the editor
     * 
     * @param {Block} data 
     */
    addBlock(data) {
        this.blocks.push(data);

        const block = this.createBlock(data);
        this.holder?.appendChild(block);
    }

    /**
     * Create a block in the editor
     * 
     * @param {Block} data 
     */
    createBlock(data) {
        const container = document.createElement("div");

        container.setAttribute("block-id", this.blocks.length.toString());
        container.classList.add('d-flex', 'flex-column')
        
        switch (data.type) {
            case "text":
                container.setAttribute("type", "text");
                
                const text = document.createElement("span");
                text.contentEditable = "true";
                text.textContent = data.content;

                container.appendChild(text);
                break;

            case "heading":
                container.setAttribute("type", "heading");
                container.setAttribute("level", data.level ? data.level.toString() : '1');

                const heading = document.createElement("span");
                heading.contentEditable = "true";
                heading.classList.add(`text-h${data.level}`);
                heading.textContent = data.content;
                
                if (data.level === 1) {
                    heading.classList.add("fw-bold");
                } else if (data.level && data.level > 1 && data.level < 6) {
                    heading.classList.add("fw-semibold");
                } else {
                    heading.classList.add("fw-medium");
                }

                container.appendChild(heading);
                break;

            case "image":
                container.setAttribute("type", "image");

                console.info("This feature is not supported yet")
                break;
        
            default:
                console.error(`${data.type} block type does not exist!`);
        }

        this._setupBlockListener(container);

        return container;
    }

    /**
     * Updates a block in the editor
     * 
     * @param {number|null} index 
     * @param {Block} data 
     */
    updateBlock(index = null, data) {
        console.log(index, data);
    }

    /**
     * Remove a block from the editor
     * 
     * @param {number|null} index 
     */
    removeBlock(index = null) {
        if (index === null) {
            this.blocks.shift();
            return true;
        }

        if (index > this.blocks.length) {
            return false;
            return;
        }

        this.blocks.splice(index, 1);
        return true;
    }

    /**
     * Gets a block from a specified index in the editor
     * 
     * @param {number|null} index 
     */
    getBlock(index = null) {
        if (index === null) {
            return this.blocks[0];
        }

        if (index > this.blocks.length) {
            return null;
        }

        return this.blocks[index];
    }

    /**
     * Export the editor state to json
     */
    export() {
        this.blocks.forEach(element => {
            //
        });
    }

    /**
     * Clears the holder element
     */
    clear() {
        while (this.holder?.firstChild) {
            this.holder.removeChild(this.holder.firstChild);
        }

        return true;
    }

    /**
     * Resets the editor
     */
    reset() {
        this.clear();

        this.blocks = [];
        return true;
    }

    /**
     * Sets up the event listeners for the block
     * 
     * @param {HTMLElement|HTMLSpanElement} element 
     */
    _setupBlockListener(element) {
        element.addEventListener("click", () => {
            if (this.selected === element) {
                return;
            }

            this.selected = element;

            console.log(this.selected);
        });
    }
}