console.log('hola mundo');

const changeOwner = (selectElement) => {
    if (!confirm('¿Estás seguro de cambiar de dueño?')) {
        //si la persona niega el confirm que tampoco cambie el valor del select, que se quede como estaba antes de darle click al boton
        document.getElementById('estado').value = document.getElementById('estado').dataset.originalValue;

        return;
    }

    const newOwner = document.getElementById('estado').value;
    const form = selectElement.closest('form');
    form.submit();
}

const botonesEditar = document.querySelectorAll('.editar-btn');

botonesEditar.forEach(boton => {
    boton.addEventListener('click', (e) => {
        console.log('click');
        e.preventDefault();
        if (boton.innerHTML === 'editar'){
            boton.innerHTML = 'Cancelar';
            let row = boton.closest('tr');
            let inputs = row.querySelectorAll('input');
            inputs.forEach(input => {
            input.removeAttribute('readonly');
            });
            row.querySelector('.confirmar-btn').style.display = 'block';
        }
        else if (boton.innerHTML === 'Cancelar'){
            boton.innerHTML = 'editar';
            let row = boton.closest('tr');
            let inputs = row.querySelectorAll('input');
            inputs.forEach(input => {
            input.setAttribute('readonly', true);
            });
            row.querySelector('.confirmar-btn').style.display = 'none';
        }
    });
});

const botonesConfirmar = document.querySelectorAll('.confirmar-btn');

botonesConfirmar.forEach(boton => {
    boton.addEventListener('click', (e) => {
        console.log('click');
        e.preventDefault();
       let row = boton.closest('tr');
       let inputs = row.querySelectorAll('input');
       
    });
});