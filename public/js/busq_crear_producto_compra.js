import { createSearcher } from "./busqueda.js";

const inputProducto = document.getElementById('input_search_producto');
const listProducto = document.getElementById('resultsList_producto');
const inputProductoHidden = document.getElementById('id_producto_hidden');

createSearcher(inputProducto, listProducto, inputProductoHidden);
