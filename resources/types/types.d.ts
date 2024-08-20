type EditorConfig = {
    holder: string
}

type Block = {
    type: string,
    font?: string,
    level?: number,
    size?: number,
    align?: string,
    weight?: number,
    content: string,
    parent?: Block,
    children?: Array<Block>
}
