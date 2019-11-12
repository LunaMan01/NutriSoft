const AlimentosController = (() => {

    const cargarEventos = () => {
        document.getElementById('agregar-alimento-btn').addEventListener('click', () => {
            //load('php/AgregarAli.php', contentPanel);
            load('php/AgregarAli.php', document.getElementById('contenido-alimentos'));
        });

        document.getElementById('buscar-alimento-input').addEventListener('keyup', () => {
            var req = new XMLHttpRequest();
            req.open("POST", 'php/BuscarAli.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send('Nombre_Ali=' + document.getElementById('buscar-alimento-input').value);
            document.getElementById('contenido-alimentos').innerHTML = req.responseText;
        });
    }



    return {
        init: () => {
            cargarEventos();
        },

        captarRespuesta: () => {
            console.log('verga');
        }
    }
})();

AlimentosController.init();