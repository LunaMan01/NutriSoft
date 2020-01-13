const PlatillosController = (() => {



    const postPlatillos = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    const eliminarPlatillo = (idAEliminar) => {
        let respuesta = postPlatillos('php/EliminarPLA.php', 'ID_PLATILLOS=' + idAEliminar);
        console.log('res' + respuesta);
        if (respuesta.trim() === 'success') {
            document.getElementById('tr' + idAEliminar).remove();
            swal("Platillo eliminado correctamente", {
                icon: "success",
            });
        }
         else {
            swal("Platillo eliminado correctamente", {
                icon: "Ha ocurrido un erro inesperado",
            });
        }
    }

    const configurarEventoEliminar = () => {
        document.getElementById('platillos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idPlatilloAEliminar = e.target.getAttribute('id');
                let nombrePlatillo = e.target.getAttribute('name');
                console.log(idPlatilloAEliminar);
                swal({
                    title: "¿Está seguro?",
                    text: `El platillos "${nombrePlatillo}" será eliminado permanentemente`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((aceptar) => {
                        if (aceptar) {
                            eliminarPlatillo(idPlatilloAEliminar);
                        }
                    });


            }
        })
    }

    const configurarEventoEditar = () => {
        document.getElementById('platillos-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                let idAEditar = e.target.getAttribute('data-editar');
                let req = new XMLHttpRequest();
                req.open("POST", 'php/ModificarPla.php', false);
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                req.send('ID_PLATILLOS='+idAEditar);
                document.getElementById('contenido-platillos').innerHTML = req.responseText;
               

            }
        })
    }

    const cargarEventos = () => {
        document.getElementById('agregar-platillos-btn').addEventListener('click', () => {
            //load('php/AgregarAli.php', contentPanel);
            load('php/AgregarPLA.php', document.getElementById('contenido-platillos'));
            $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional").on('click', function(){
                    $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                });
             
                // Evento que selecciona la fila y la elimina 
                $(document).on("click",".eliminar",function(){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                });
            });
        });


        document.getElementById('buscar-platillo-input').addEventListener('keyup', () => {
            var req = new XMLHttpRequest();
            req.open("POST", 'php/BuscarPLA.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send('Nombre_Pla=' + document.getElementById('buscar-platillo-input').value);
            document.getElementById('platillos-table-body').innerHTML = req.responseText;
        });
        configurarEventoEliminar();
        configurarEventoEditar();
    }



    return {
        init: () => {
            cargarEventos();
        },

        
    }
})();

PlatillosController.init();