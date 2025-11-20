function cargarContenido(abrir){
    fetch(abrir)
    .then(response => response.text())
    .then(data => {
        document.getElementById('contenido').innerHTML = data;
    });
}

function pregunta2() {
    fetch('listar_recetas.php')
        .then(response => response.json())
        .then(data => {
            let contenido = document.getElementById('contenido');
            
            let selectHTML = '<select id="tipoRecetaSelect" onchange="filtrarRecetas()">';
            selectHTML += '<option>Todos</option>';
            data.tipos.forEach(tipo => {
                selectHTML += `<option>${tipo}</option>`;
            });
            selectHTML += '</select>';

            let tablaHTML = `
                <table border="1">
                    <thead>
                        <tr>
                            <th>Fotografía</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Preparación</th>
                        </tr>
                    </thead>
                    <tbody id="recetas-tabla-body">
                        ${generarFilasTabla(data.recetas)}
                    </tbody>
                </table>
            `;

            contenido.innerHTML = selectHTML + tablaHTML;
        });
}

function filtrarRecetas() {
    let tipo = document.getElementById('tipoRecetaSelect').value;
    fetch(`listar_recetas.php?tipo=${tipo}`)
        .then(response => response.json())
        .then(data => {
            actualizarTabla(data.recetas);
        });
}

function actualizarTabla(recetas) {
    let tablaBody = document.getElementById('recetas-tabla-body');
    tablaBody.innerHTML = generarFilasTabla(recetas);
}

function generarFilasTabla(recetas) {
    let filas = '';
    recetas.forEach(receta => {
        filas += `
            <tr>
                <td><img src="images/${receta.fotografia}" width="50"></td>
                <td>${receta.titulo}</td>
                <td>${receta.tiporeceta}</td>
                <td>${receta.preparacion.substring(0, 50)}</td>
            </tr>
        `;
    });
    return filas;
}

// Modal para imágenes
function abrirModal(id) {
    fetch(`get_receta.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }
            const modal = document.getElementById('modal');
            const modalCuerpo = document.getElementById('modal-cuerpo');
            modalCuerpo.innerHTML = `
                <img src="images/${data.imagen}" alt="${data.titulo}" style="width: 100%; max-width: 320px; height: auto; border-radius: 8px;">
                <h2>${data.titulo}</h2>
                <p><strong>Tipo:</strong> ${data.tiporeceta}</p>
            `;
            modal.style.display = 'block';
        });
}

function cerrarModal() {
    document.getElementById('modal').style.display = "none";
}

window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}