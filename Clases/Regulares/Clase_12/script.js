function cargarContenido(){

}

function cargarDepartamentos(){
    var departamento = document.getElementById('departamento');
    fetch('departamentos.php')
        .then(response => response.text())
        .then(data => {
            objeto = JSON.parse(data)
            
            for(i=0;i<objeto.lenght;i++){
                let opcion = document.createElement('option');
                opcion.value = objeto[i].id;
                opcion.innerHTML = objeto[i].departamento.
                console.log(objeto[i]);
                document.getElementById('departamento').departamento.appendchild(opcion);
            }

        });
}

