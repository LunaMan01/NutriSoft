const GruposAlimentosController = (() => {

    const post = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    const eliminarGrupo = (idAEliminar) => {
        let respuesta = post('php/EliminarGA.php', 'id=' + idAEliminar);
        console.log('res' + respuesta);
        if (respuesta.trim() === 'success') {
            document.getElementById('tr' + idAEliminar).remove();
            swal("Alimento eliminado correctamente", {
                icon: "success",
            });
        }
         else {
            swal("Alimento eliminado correctamente", {
                icon: "Ha ocurrido un erro inesperado",
            });
        }
    }

    const configurarEventoEliminar = () => {
        document.getElementById('grupos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idAEliminar = e.target.getAttribute('id');
                let nombre = e.target.getAttribute('name');
                console.log(idAEliminar);
                swal({
                    title: "¿Está seguro?",
                    text: `El grupo "${nombre}" será eliminado permanentemente`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((aceptar) => {
                        if (aceptar) {
                            eliminarGrupo(idAEliminar);
                        }
                    });


            }
        })
    }

    const configurarEventoEditar = () => {
        document.getElementById('grupos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                let idAEditar = e.target.getAttribute('data-editar');
                let req = new XMLHttpRequest();
                req.open("POST", 'php/ModificarGA.php', false);
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                req.send('ID_GRUPOS='+idAEditar);
                document.getElementById('contenido-grupos').innerHTML = req.responseText;
               

            }
        })
    }

    const cargarEventos = () => {
        document.getElementById('agregar-grupos-btn').addEventListener('click', () => {
            //load('php/AgregarAli.php', contentPanel);
            load('php/AgregarGA.php', document.getElementById('contenido-grupos'));
        });

        document.getElementById('buscar-grupos-input').addEventListener('keyup', () => {
            var req = new XMLHttpRequest();
            req.open("POST", 'php/BuscarGA.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            // req.send('dato=' + document.getElementById('buscar-grupos-input').value);
            req.send('dato=' + document.getElementById('buscar-grupos-input').value);
            document.getElementById('grupos-table-body').innerHTML = req.responseText;
        });
        configurarEventoEliminar();
        configurarEventoEditar();
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

GruposAlimentosController.init();