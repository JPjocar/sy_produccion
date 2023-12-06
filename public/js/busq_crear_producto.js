import { createSearcher } from "./busqueda.js";

const inputMarca = document.getElementById('input_search_marca');
const listMarca = document.getElementById('resultsList_marca');
const inputMarcaHidden = document.getElementById('id_marca_hidden');

const inputPresentacion = document.getElementById('input_search_presentacion');
const listPresentacion = document.getElementById('resultsList_presentacion');
const inputPresentacionHidden = document.getElementById('id_presentacion_hidden');

createSearcher(inputMarca, listMarca, inputMarcaHidden);
createSearcher(inputPresentacion, listPresentacion, inputPresentacionHidden);