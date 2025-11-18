document.addEventListener('DOMContentLoaded', function() {
    mostrarInicio();
});

function toggleMenu() {
    var menuButtons = document.getElementById('menu-buttons');
    if (menuButtons.style.display === 'none') {
        menuButtons.style.display = 'block';
    } else {
        menuButtons.style.display = 'none';
    }
    addToHistory('Menu');
}

function mostrarInicio() {
    var barra = document.getElementById('barra');
    barra.innerHTML = `
        <p>Nombre Estudiante: Daniel Vargas</p>
        <p>CU: 111000111</p>
        <p>Fecha: <span id="fecha">${new Date().toLocaleDateString()}</span></p>
        <p>Numero Visitas: <span id="visitas"></span></p>
    `;
    fetch('contador.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('visitas').innerText = data;
        });
    addToHistory('Inicio');
}

function pregunta1() {
    fetch('galeria.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        });
    addToHistory('Pregunta 1');
}

function pregunta2() {
    let contenido = document.getElementById('contenido');
    let table = '<table>';
    for (let i = 0; i < 3; i++) {
        table += '<tr>';
        for (let j = 0; j < 3; j++) {
            table += `<td style="background-color: #${Math.floor(Math.random()*16777215).toString(16)}" onclick="changeColor(this)"></td>`;
        }
        table += '</tr>';
    }
    table += '</table>';
    let select = `
        <select id="secciones">
            <option value="barra">Barra</option>
            <option value="menu-buttons">Menu</option>
            <option value="contenido">Contenido</option>
            <option value="historial">Historial</option>
        </select>
    `;
    contenido.innerHTML = table + select;
    addToHistory('Pregunta 2');
}

function changeColor(cell) {
    let seccion = document.getElementById('secciones').value;
    document.getElementById(seccion).style.backgroundColor = cell.style.backgroundColor;
}

function pregunta3() {
    // This is for the login modal, as per the second "Pregunta 3" in the PDF
    let modal = document.createElement('div');
    modal.id = 'login-modal';
    modal.className = 'modal';
    modal.style.display = 'block';
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Login</h2>
            <input type="text" id="username" placeholder="Usuario">
            <input type="password" id="password" placeholder="Contraseña">
            <button onclick="login()">Login</button>
        </div>
    `;
    document.body.appendChild(modal);
    addToHistory('Pregunta 3');
}

function closeLoginModal() {
    let modal = document.getElementById('login-modal');
    if (modal) {
        modal.remove();
    }
}

function login() {
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('login').innerHTML = `<p>Usuario: ${data.user.email} | Nivel: ${data.user.nivel}</p>`;
            closeLoginModal();
        } else {
            alert('Usuario o contraseña incorrectos');
        }
    });
}

function pregunta4() {
    fetch('listar.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        });
    addToHistory('Pregunta 4');
}


function addToHistory(action) {
    var historial = document.getElementById('historial');
    historial.innerHTML += `<p>${action}</p>`;
}

function openModal(img) {
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById('img01');
    modal.style.display = 'block';
    modalImg.src = img.src;
}

function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
}