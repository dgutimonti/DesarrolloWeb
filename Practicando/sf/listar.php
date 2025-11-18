<?php
session_start();
include 'db.php';

$sql = "SELECT * FROM libros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        if (isset($_SESSION['user']) && $_SESSION['user']['nivel'] == 'admin') {
            echo "<li onclick='editBook({$row['id_libro']})'>{$row['titulo']}</li>";
        } else {
            echo "<li onclick='showNoPermission()'>{$row['titulo']}</li>";
        }
    }
    echo "</ul>";
} else {
    echo "0 results";
}
$conn->close();
?>

<script>
function editBook(id) {
    fetch('get_book_details.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            let modal = document.createElement('div');
            modal.id = 'edit-modal';
            modal.className = 'modal';
            modal.style.display = 'block';
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="close" onclick="closeEditModal()">&times;</span>
                    <h2>Editar Libro</h2>
                    <input type="hidden" id="book_id" value="${data.id_libro}">
                    <input type="text" id="titulo" value="${data.titulo}">
                    <input type="text" id="autor" value="${data.autor}">
                    <input type="text" id="genero" value="${data.genero}">
                    <input type="text" id="anio" value="${data.anio}">
                    <button onclick="saveBook()">Guardar</button>
                </div>
            `;
            document.body.appendChild(modal);
        });
}

function closeEditModal() {
    let modal = document.getElementById('edit-modal');
    if (modal) {
        modal.remove();
    }
}

function saveBook() {
    let id = document.getElementById('book_id').value;
    let titulo = document.getElementById('titulo').value;
    let autor = document.getElementById('autor').value;
    let genero = document.getElementById('genero').value;
    let anio = document.getElementById('anio').value;

    let formData = new FormData();
    formData.append('id', id);
    formData.append('titulo', titulo);
    formData.append('autor', autor);
    formData.append('genero', genero);
    formData.append('anio', anio);

    fetch('update_book.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        closeEditModal();
        pregunta4();
    });
}

function showNoPermission() {
    alert('Usted no tiene permiso');
}
</script>