function cargarContenido(url) {
    var main;
    main = document.getElementById("main");
    fetch(url)
        .then(response => response.text())
        .then(data => main.innerHTML = data);
}



function crear()
{
    var datos=new FormData(document.querySelector('#form-insertar'));
	datos = document.getElementById('main');
    fetch("insertar.php",
        {method:"POST",
		body:datos})
		.then(response => response.text())
		.then(data => {main.innerHTML=data
        });

}