function cargarContenido(abrir) {
    fetch(abrir) // 1. Makes a GET request to the URL passed in 'abrir' (e.g., 'read.php')
        .then(response => {
            // 2. This block runs when the server sends back an initial response
            if (!response.ok) { // Checks if the request was successful (e.g., status 200)
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text(); // 3. Reads the response body as text (HTML) and returns it as a new promise
        })
        .then(data => {
            // 4. This block runs when the text is fully loaded
            document.querySelector('#contenido').innerHTML = data; // 5. Injects the HTML data into the '#contenido' div
        })
}

function crear() {
    const form = document.querySelector('#form-insertar'); // 1. Selects the 'insert' form
    const formData = new FormData(form); // 2. Creates a FormData object, which gathers all form input values

    fetch('create.php', { // 3. Makes a POST request to 'create.php'
        method: 'POST',
        body: formData // 4. The form data is sent as the request body
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        // 5. Displays the server's response (e.g., "Record created successfully")
        document.querySelector('#contenido').innerHTML = data;
        // 6. After 5 seconds, it refreshes the content by loading the list of records again
        setTimeout(() => {
            cargarContenido('read.php');
        }, 5000);
    })
}


function formEditar(id) {
    // 1. Makes a GET request to 'formeditar.php', passing the record's 'id' as a URL parameter
    fetch(`formeditar.php?id=${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            // 2. Displays the returned HTML form in the '#contenido' div
            document.querySelector('#contenido').innerHTML = data;
        })
}


function editar() {
    const form = document.querySelector('#form-editar'); // 1. Selects the 'edit' form
    const formData = new FormData(form); // 2. Gathers the updated data from the form

    fetch('edit.php', { // 3. Makes a POST request to 'edit.php'
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        // 4. Displays the server's response (e.g., "Record updated")
        document.querySelector('#contenido').innerHTML = data;
        // Note: It might be a good idea to also refresh the list here, like in the `crear` function.
    })
}


function eliminar(id) {
    // 1. Shows a confirmation dialog to the user
    if (confirm("Estas seguro que quieres eliminar")) {
        // 2. If the user clicks "OK", it makes a GET request to 'delete.php' with the record's 'id'
        fetch(`delete.php?id=${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                // 3. Displays the server's response and implicitly refreshes the list
                // (assuming delete.php returns the updated list)
                document.querySelector('#contenido').innerHTML = data;
            })
    }
}

