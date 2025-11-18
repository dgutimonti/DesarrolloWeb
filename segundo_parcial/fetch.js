// Cargar tipos de receta
function cargarTipoReceta(){
    fetch('listar_recetas.php')
    .then(response => response.text())
    .then(data => {
        let objeto = JSON.parse(data);
        for (let i = 0; i < objeto.length; i++) {
            let opcion = document.createElement('option');
            opcion.value = objeto[i].id;
            opcion.innerHTML = objeto[i].tiporeceta;
            document.getElementById('tiporeceta').appendChild(opcion);
        }
    });
}

// Filtrar por tipo de receta
function filtrar() {
    var tipo = document.getElementById('tiporeceta').value;
    let ruta = (tipo == "Seleccionar") ? 'catalogo_1.php' : 'catalogo_1.php?tipo='+tipo;
    cargarContenido(ruta);
}

// Cargar contenido dinámico
function cargarContenido(abrir){
    fetch(abrir)
    .then(response => response.text())
    .then(data => {
        document.getElementById('contenido').innerHTML = data;
    });
}

// Modal para imágenes
function abrirModal(id, fotografia){
    var modal = document.getElementById('modal');
    var modalCuerpo = document.getElementById('modal-cuerpo');
    modalCuerpo.innerHTML = "<img src='"+fotografia+"' width='200px'>";
    modal.style.display = "block";
}
function cerrarModal(){
    document.getElementById('modal').style.display = "none";
}
window.onclick = function(event){
    var modal = document.getElementById('modal');
    if(event.target == modal) modal.style.display = "none";
}

