const AlimentosController = (() => {

    //---------------------------------------
    //  ELIMINAR Alimento
    //---------------------------------------

    const postAlimentos = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    const eliminarAlimento = (idAlimentoAEliminar) => {
        let respuesta = postAlimentos('php/EliminarAli.php', 'ID_ALIMENTOS=' + idAlimentoAEliminar);
        console.log('res' + respuesta);
        if (respuesta.trim() === 'success') {
            document.getElementById('tr' + idAlimentoAEliminar).remove();
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
        document.getElementById('alimentos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idAlimentoAEliminar = e.target.getAttribute('id');
                let nombreAlimento = e.target.getAttribute('name');
                console.log(idAlimentoAEliminar);
                swal({
                    title: "¿Está seguro?",
                    text: `El alimento "${nombreAlimento}" será eliminado permanentemente`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((aceptar) => {
                        if (aceptar) {
                            eliminarAlimento(idAlimentoAEliminar);
                        }
                    });


            }
        })
    }

    const configurarEventoEditar = () => {
        document.getElementById('alimentos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                let idAlimentoAEditar = e.target.getAttribute('data-editar');
                let req = new XMLHttpRequest();
                req.open("POST", 'php/ModificarAli.php', false);
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                req.send('ID_ALIMENTOS='+idAlimentoAEditar);
                document.getElementById('contenido-alimentos').innerHTML = req.responseText;
               

            }
        })
    }

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
            document.getElementById('alimentos-table-body').innerHTML = req.responseText;
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

AlimentosController.init();