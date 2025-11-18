function cargarBotones() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("opciones").innerHTML = ajax.responseText;
        }
    };
    ajax.send();
}

function cargarContenido(url)
{
    fetch(`${url}`)
    .then(response => response.text())
    .then(data => {
                document.getElementById("contenido").innerHTML = data;
    })
    
}

function crearMedico(){
    var ajax = new XMLHttpRequest();
    var datos=new FormData(document.querySelector('#formMedico'));
    ajax.open("post", "createMedicos.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;
            
            setTimeout(function(){
                cargarContenido('listarMedicos.php');
            }, 1000);
            
        }
    }
    ajax.send(datos);
}

function crearPaciente(){
        var ajax = new XMLHttpRequest();
        var datos=new FormData(document.querySelector('#formPaciente'));
        ajax.open("post", "createPacientes.php", true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.querySelector('#contenido').innerHTML = ajax.responseText;
                
                setTimeout(function(){
                    cargarContenido('listarPacientes.php');
                }, 1000);
                
            }
        }
        ajax.send(datos);
}

function editarMedico(){
    var ajax = new XMLHttpRequest();
    var datos=new FormData(document.querySelector('#formMedicoEdit'));
    ajax.open("post", "editMedico.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;

            setTimeout(function(){
                cargarContenido('listarMedicos.php');
            }, 1000);
        }
    }
    ajax.send(datos);
}

function editarPaciente(){
    var ajax = new XMLHttpRequest();
    var datos=new FormData(document.querySelector('#formPacienteEdit'));
    ajax.open("post", "editPaciente.php", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.querySelector('#contenido').innerHTML = ajax.responseText;

            setTimeout(function(){
                cargarContenido('listarPacientes.php');
            }, 1000);
        }
    }
    ajax.send(datos);
}


function eliminarMedico(id){
    if(confirm("¿Estás seguro de eliminar este médico?")){
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "deleteMedico.php?id=" + id, true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.querySelector('#contenido').innerHTML = ajax.responseText;
                setTimeout(function(){
                    cargarContenido('listarMedicos.php');
                }, 1000);
            }
        };
        ajax.send();
    }
}

function eliminarPaciente(id){
    if(confirm("¿Estás seguro de eliminar este paciente?")){
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "deletePaciente.php?id=" + id, true);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.querySelector('#contenido').innerHTML = ajax.responseText;
                setTimeout(function(){
                    cargarContenido('listarPacientes.php');
                }, 1000);
            }
        };
        ajax.send();
    }
}

cargarBotones();