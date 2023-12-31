
const token = document.querySelector('input[name="_token"]').value;

export function createSearcher(input, list, inputHidden, tipo){
    input.addEventListener('input', function(event) {
        getInputValue(event, list, inputHidden, tipo);
    });
    list.addEventListener('click', function(event) {
        selectElementClick(event, input, this, inputHidden);
    });
    input.addEventListener('keydown', function(event) {
        enableElementList(event, list, this, inputHidden);
    });
}

async function getInputValue(event, list, inputHidden, tipo){
    const value = event.target.value.trim().toLowerCase();
    const model = event.target.dataset.model;  
    if(!value){
        hiddenList(list); 
        inputHidden.value = '';
        return;
    }
    const results = await filterResults(value, model, tipo);
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
        return acc + `<li data-id="${cv.id}" class="${(i===0?'selected':'')}" >${cv.nombre || cv.descripcion}</li>`
    }, "");
    list.innerHTML = elements;
    list.classList.remove('hidden');
}

async function filterResults(value, model, tipo){
    return await fetch(`http://127.0.0.1:8000/${model}/filtrar/${tipo}`, {
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

function selectElementClick( evento, input, list, inputHidden ){
    if(!(evento.target.nodeName === "LI")) return;
    const value = evento.target.textContent;
    input.value = value;
    inputHidden.value = evento.target.dataset.id;
    hiddenList(list);
}

function enableElementList(event, list, input, inputHidden){
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
    else if(key==="Enter"){
        event.preventDefault();
        input.value = elemento.textContent;
        inputHidden.value = elemento.dataset.id;
        hiddenList(list);
    } 
    enableElement(elemento);
}

function enableElement(element){
    element.classList.add('selected');
}

