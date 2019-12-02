const PreparacionController = (() => {



    const post = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    // const eliminarPlatillo = (idAEliminar) => {
    //     let respuesta = post('php/EliminarPLA.php', 'ID_PLATILLOS=' + idAEliminar);
    //     console.log('res' + respuesta);
    //     if (respuesta.trim() === 'success') {
    //         document.getElementById('tr' + idAEliminar).remove();
    //         swal("Alimento eliminado correctamente", {
    //             icon: "success",
    //         });
    //     }
    //      else {
    //         swal("Alimento eliminado correctamente", {
    //             icon: "Ha ocurrido un erro inesperado",
    //         });
    //     }
    // }

    // const configurarEventoEliminar = () => {
    //     document.getElementById('platillos-table-body').addEventListener('click', (e) => {
    //         if (e.target.matches('.accion-eliminar')) {
    //             let idPlatilloAEliminar = e.target.getAttribute('id');
    //             let nombrePlatillo = e.target.getAttribute('name');
    //             console.log(idPlatilloAEliminar);
    //             swal({
    //                 title: "¿Está seguro?",
    //                 text: `El platillos "${nombrePlatillo}" será eliminado permanentemente`,
    //                 icon: "warning",
    //                 buttons: true,
    //                 dangerMode: true,
    //             })
    //                 .then((aceptar) => {
    //                     if (aceptar) {
    //                         eliminarPlatillo(idPlatilloAEliminar);
    //                     }
    //                 });


    //         }
    //     })
    // }

    const configurarEventoEliminar = () => {
        document.getElementById('preparacion-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idPreparacion = e.target.getAttribute('data-idpreparacion');
               
                let req = new XMLHttpRequest();
                req.open("POST", 'php/EliminarPRE.php', false);
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                req.send('ID_PREPARACION='+idPreparacion);
                document.getElementById('contenido-preparacion').innerHTML = req.responseText;
               

            }
        })
    }

    const configurarEventoEditar = () => {
        document.getElementById('preparacion-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                let idPreparacion = e.target.getAttribute('data-idpreparacion');
                let idPlatillos = e.target.getAttribute('data-idplatillos');
                let idAlimentos = e.target.getAttribute('data-idalimentos');
                let req = new XMLHttpRequest();
                req.open("POST", 'php/ModificarPRE.php', false);
                req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                req.send('ID_PLATILLOS='+idPlatillos+'&ID_PREPARACION='+idPreparacion+'&ID_ALIMENTOS='+idAlimentos);
                document.getElementById('contenido-preparacion').innerHTML = req.responseText;
               

            }
        })
    }

    const cargarEventos = () => {
        document.getElementById('agregar-preparacion-btn').addEventListener('click', () => {
            //load('php/AgregarAli.php', contentPanel);
            load('php/ASGPre.php', document.getElementById('contenido-preparacion'));
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

        document.getElementById('buscar-preparacion-input').addEventListener('keyup', () => {
            var req = new XMLHttpRequest();
            req.open("POST", 'php/BuscarPRE.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send('Nombre_Pla=' + document.getElementById('buscar-preparacion-input').value);
            document.getElementById('preparacion-table-body').innerHTML = req.responseText;
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

PreparacionController.init();