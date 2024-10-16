console.log('agregar_personas.js');

const fetchPersonaData = () => {
    const personaId = document.getElementById('personas-edit').value;

    if (personaId){
        fetch(`/personas/${personaId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById('nombre-edit').value = data.nombre;
                document.getElementById('apellido-edit').value = data.apellido;
                document.getElementById('fecha_nacimiento-edit').value = data.fecha_nacimiento;
            })
            .catch(error => console.error('Error:' ,error));
    }
    else {
        document.getElementById('nombre-edit').value = '';
        document.getElementById('apellido-edit').value = '';
        document.getElementById('fecha_nacimiento-edit').value = '';
    }
}
