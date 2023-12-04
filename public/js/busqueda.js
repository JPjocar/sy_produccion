const token = document.querySelector('input[name="_token"]').value;

const inputMarca = document.querySelector('#input_search_marca');
const listMarca = document.querySelector('#resultsList_marca');

const inputPresentacion = document.querySelector('#input_search_marca');



function createSearcher(input, list){
    input.addEventListener('input', (event) => {
        getInputValue(event, list);
    });
    list.addEventListener('click', (event) => {
        selectElement(event, input, list);
    });
    input.addEventListener('keydown', (event) => {
        enableElementList(event, list);
    });
}

createSearcher(inputMarca, listMarca);

async function getInputValue(event, list){
    const value = event.target.value.trim().toLowerCase();
    const model = event.target.dataset.model;  
    if(!value){
        hiddenList(list); 
        return;
    }
    const results = await filterResults(value, model);
    showResults(results, list);
}

function hiddenList(list){
    deleteElements(list);
    list.classList.add('hidden');
}

function deleteElements(list){
    list.innerHTML = '';
}

function showResults(results, list){
    const elements = results.reduce((acc, cv, i) => {
        return acc + `<li data-id="${cv.id}" class="${(i===0?'selected':'')}" >${cv.nombre}</li>`
    }, "");
    list.innerHTML = elements;
    list.classList.remove('hidden');
}

async function filterResults(value, model){
    return await fetch(`http://127.0.0.1:8000/${model}/filtrar`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({word: value})
    })
    .then(response => response.json())
    .catch(error => console.log(error))
}

function selectElement( evento, input, list ){
    if(!(evento.target.nodeName = "LI")) return;
    const value = evento.target.textContent;
    input.value = value;
    hiddenList(list);
}

function enableElementList(event, list){
    const { key } = event;
    let elemento = list.querySelector('li[class="selected"]');
    if(!elemento) return;
    elemento.classList.remove('selected');
    if(key==="ArrowUp"){
        elemento = elemento.previousElementSibling;
        if(!elemento) elemento = list.lastElementChild;
    }else if(key==="ArrowDown"){
        elemento = elemento.nextElementSibling;
        if(!elemento) elemento = list.firstElementChild;
    }
    // else if(key==="Enter"){
    //     input.value = elemento.textContent;
    //     hiddenList();
    // }
    enableElement(elemento);
}

function enableElement(element){
    element.classList.add('selected');
}

