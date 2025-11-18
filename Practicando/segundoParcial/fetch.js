function cargarContenido(url){
    fetch(`${url}`)
    .then(responde => responde.text())
    .then(data => {
        document.getElementById("contenido").innerHTML=data;
    })
}

function mostrarInicio() {
    var contenido = document.getElementById('contenido');
    contenido.innerHTML = `
    <p>Nombre: Daniel Gutierrez</p>
    <p>CU: 35-5932</p>
    <p>Fecha: ${new Date().toLocaleDateString()}</p>
    <p>Numero Visitas: <span id="visitas"></span></p>
    `;
        fetch('pregunta_1/contador.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('visitas').textContent = data;
        });
    agregarHistorial('Inicio');
}

function agregarHistorial(accion){
    var historialDiv = document.getElementById('historial');
    var p = document.createElement('p');
    p.textContent = `Boton presionado: ${accion}`;
    historialDiv.appendChild(p);
}
function toggleMenu(){
    var menuButtons = document.getElementById('menu-buttons');
    if(menuButtons.style.display == 'none'){
        menuButtons.style.display = 'flex';
    } else {
        menuButtons.style.display = 'none';
    }
    agregarHistorial('Menu');
}
window.onload = function() {
    const fechaSpan = document.getElementById('fecha');
    const today = new Date();
    fechaSpan.textContent = today.toLocaleDateString();


    mostrarInicio();
}
