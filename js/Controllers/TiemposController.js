const TiemposController = (() => {



    const post = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    const eliminarTiempo = (idAEliminar) => {
        let respuesta = post('php/EliminarTC.php', 'ID_TIEMPO=' + idAEliminar);
        console.log('res' + respuesta);
        if (respuesta.trim() === 'success') {
            document.getElementById('tr' + idAEliminar).remove();
            swal("Tiempo de comida eliminado correctamente", {
                icon: "success",
            });
        }
         else {
            swal("Error inesperado", {
                icon: "warning",
            });
        }
    }

    const configurarEventoEliminar = () => {
        document.getElementById('tiempos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idAEliminar = e.target.getAttribute('id');
                let nombre = e.target.getAttribute('name');
                console.log(idAEliminar);
                swal({
                    title: "¿Está seguro?",
                    text: `El platillos "${nombre}" será eliminado permanentemente`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((aceptar) => {
                        if (aceptar) {
                            eliminarTiempo(idAEliminar);
                        }
                    });


            }
        })
    }

    const configurarEventoEditar = () => {
        document.getElementById('tiempos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                let idAEditar = e.target.getAttribute('data-editar');
                let req = new XMLHttpRequest();
                req.open("POST", 'php/ModificarTC.php', false);
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                req.send('ID_TIEMPO='+idAEditar);
                document.getElementById('contenido-tiempos').innerHTML = req.responseText;
               

            }
        })
    }

    const cargarEventos = () => {
        document.getElementById('agregar-tiempos-btn').addEventListener('click', () => {
            //load('php/AgregarAli.php', contentPanel);
            load('php/AgregarTC.php', document.getElementById('contenido-tiempos'));
        });

        document.getElementById('buscar-tiempo-input').addEventListener('keyup', () => {
            var req = new XMLHttpRequest();
            req.open("POST", 'php/BuscarTC.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send('Nombre_Tiempo=' + document.getElementById('buscar-tiempo-input').value);
            document.getElementById('tiempos-table-body').innerHTML = req.responseText;
        });
        configurarEventoEliminar();
        configurarEventoEditar();
    }

    const mostrarTiempos = () => {
        let respuesta = post('php/TIEMPO_COMIDA.php', null);
        document.getElementById('tiempos-table-body').innerHTML = respuesta;
    }



    return {
        init: () => {
            mostrarTiempos();
            cargarEventos();
        },

        captarRespuesta: () => {
            console.log('verga');
        }
    }
})();

TiemposController.init();