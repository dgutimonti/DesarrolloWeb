// FUNCION PRINCIPAL: cargarContenido()

function cargarContenido(abrir) {
    var contenedor = document.getElementById('contenido');

    fetch(abrir)
    .then(response => response.text())
    .then(data => {
        contenedor.innerHTML = data;
    })
}

// MODULO MEDICOS

function crearMedico() {
    var datos = new FormData(document.querySelector('#formMedico'));
    var contenedor = document.getElementById('contenido');

    fetch("medicos/createMedico.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        setTimeout(function(){
            cargarContenido('medicos/readMedicos.php');
        }, 2000);
    });
}

function editarMedico(id){
    var contenedor = document.getElementById('contenido');
    
    fetch(`medicos/formEditMedico.php?id=${id}`)
        .then(response => response.text())
        .then(data => contenedor.innerHTML = data);
}

function actualizarMedico(){
    var datos = new FormData(document.querySelector('#formEditMedico'));
    var contenedor = document.getElementById('contenido');

    fetch("medicos/editMedico.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        setTimeout(function() {
            cargarContenido('medicos/readMedicos.php');
        }, 2000);
    });
}

function eliminarMedico(id){
    if(confirm("Esta segudo de eliminar este medico?")){
        fetch(`medicos/deleteMedico.php?=${id}`)
            .then(response => response.text())
            .then(data => {
                alert(data);
                setTimeout(function() {
                    cargarContenido('medicos/readMedicos.php')
                }, 1500);
            });
    }
}

// MODULO PACIENTES

function crearPaciente(){
    var data = new FormData(document.querySelector('#formPaciente'));
    var contenedor = document.getElementById('contenido');

    fetch("pacientes/createPaciente.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        setTimeout(() => {
            cargarContenido('pacientes/readPacientes.php')
        }, 2000);
    });
}

function editarPaciente(){
    var contenedor = document.getElementById('contenido');
    fetch(`pacientes/formEditarPaciente.php?${id}`)
        .then(response => response.text())
        .then(data => contenedor.innerHTML = data)
}

function actualizarPaciente(){
    var datos = new FormData(document.querySelector('#formEditPaciente'));
    var contenedor = document.getElementById('contenido');

    fetch("pacientes/editPaciente.php", {
        method: "POST",
        body: data
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        setTimeout(() => {
            cargarContenido('pacientes/readPacientes.php')
        }, 1500);
    })
}

function eliminarPaciente(){
    if(confirm("Esta seguro de eliminar este paciente")){
        fetch(`pacientes/deletePaciente.php?${id}`)
            .then(response => response.text())
            .then(data => {
                alert(data);
                setTimeout(() => {
                    cargarContenido('pacientes/readPacientes.php')
                }, 1500);
            })
    }
}