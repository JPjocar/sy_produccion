export function confirmationMessage(data){
    document.addEventListener('click', (e) => {
        if(!(e.target instanceof Element)) return;
        for(let clase of e.target.classList){   
            const mensaje = data[clase];
            if(mensaje){
                const response = confirm(mensaje);
                if(!response) e.preventDefault();
                break;
            } 
        }   
        
    });
}
