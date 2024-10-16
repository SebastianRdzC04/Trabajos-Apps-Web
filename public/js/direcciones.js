console.log('direcciones.js');


const fetchDireccionData = () => {
    const direccionId = document.getElementById('direccion-edit').value;

    if (direccionId){
        
        fetch(`/direcciones/${direccionId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById('calle-edit').value = data.calle;
                document.getElementById('numero-edit').value = data.numero;
                document.getElementById('colonia-edit').value = data.colonia;
            })
            .catch(error => console.error('Error:' ,error));
    }else {
        document.getElementById('calle-edit').value = '';
        document.getElementById('numero-edit').value = '';
        document.getElementById('colinia-edit').value = '';
    }
}

const changeOwner = (selectElement) => {
    if (!confirm('¿Estás seguro de cambiar de dueño?')) {
        //si la persona niega el confirm que tampoco cambie el valor del select, que se quede como estaba antes de darle click al boton
        document.getElementById('owner').value = document.getElementById('owner').dataset.originalValue;

        return;
    }

    const newOwner = document.getElementById('owner').value;
    const form = selectElement.closest('form');
    form.submit();
}

//crear un evento que escuche cuando se envie el formulario de id changePersona, para que cuando se envie se actualicen los valores pero no se recargue la pagina
document.getElementById('changeDireccion').addEventListener('submit', (event) => {
    event.preventDefault();
    changeOwner(event.target);
});