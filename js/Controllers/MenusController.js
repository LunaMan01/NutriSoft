const MenusController = (() => {

    let guardado = false;
    let idPacienteAEditar;
   
    const post = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    const cargarPlatillos = () => {
        let respuesta = post('php/platillosModal.php', null);
        document.getElementById('platillos-table-modal').innerHTML = respuesta;
    }
    

    return {

        init : () => {
           cargarPlatillos();
           console.log('inicio');
        }
    }
})();




MenusController.init();