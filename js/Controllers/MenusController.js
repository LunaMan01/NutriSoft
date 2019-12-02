const MenusController = (() => {

    let guardado = false;
    let idPacienteMenu;
    let idMenuAEditar;

    const post = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    let idsPlatillos = [];
    let datosDieta = [];
    let idTiempos = [];
    let dia = "";
    let datosAEnviar = [];
    let fechaInicio = "";

    

    const calcularTotales = () => {
        if (datosDieta.length > 0) {
            let calorias = datosDieta.map(element => {
                return parseFloat(element.energia);
            });
            let proteinas = datosDieta.map(element => {
                return parseFloat(element.proteinas);
            });
            let lipidos = datosDieta.map(element => {
                return parseFloat(element.lipidos);
            });
            let hidratos = datosDieta.map(element => {
                return parseFloat(element.hidratos);
            });

            let totalCalorias = calorias.reduce((acumulador, actual) => acumulador + actual);
            let totalProteinas = proteinas.reduce((acumulador, actual) => acumulador + actual);
            let totalLipidos = lipidos.reduce((acumulador, actual) => acumulador + actual);
            let totalHidratos = hidratos.reduce((acumulador, actual) => acumulador + actual);

            document.getElementById('energia-td').innerHTML = totalCalorias + " kal";
            document.getElementById('proteinas-td').innerHTML = totalProteinas;
            document.getElementById('lipidos-td').innerHTML = totalLipidos;
            document.getElementById('hidratos-td').innerHTML = totalHidratos;
        } else {
            document.getElementById('energia-td').innerHTML = "";
            document.getElementById('proteinas-td').innerHTML = "";
            document.getElementById('lipidos-td').innerHTML = "";
            document.getElementById('hidratos-td').innerHTML = "";
        }
    }


    const eliminarPlatillos = (e, dia) => {
        let id = (e.target).getAttribute('data-ideliminar');
        let idTiempo = (e.target).getAttribute('data-idtiempo');

        datosAEnviar.push({
            dia: dia,
            idTiempo: idTiempo,
            idPlatillo: id,
            opcion: 2
        });

        // datosAEnviar.forEach((element, i) => {
        //     if (element.idPlatillo === id && element.dia === dia && element.idTiempo === idTiempo) {
        //         datosAEnviar.splice(i, 1);
        //         datosDieta.splice(i, 1);
               
        //         calcularTotales();

        //     }
        // });

        (((e.target).parentNode).parentNode).remove();
        console.log(datosAEnviar);
    }

    const eventoEliminarPlatillos = () => {
        document.getElementById('platillos-lunes').addEventListener('click', (e) => {
            if (e.target.matches('.eliminar-platillo'))
                eliminarPlatillos(e, 'lunes');
        });
        document.getElementById('platillos-martes').addEventListener('click', (e) => {
            if (e.target.matches('.eliminar-platillo'))
                eliminarPlatillos(e, 'martes');
        });
        document.getElementById('platillos-miercoles').addEventListener('click', (e) => {
            if (e.target.matches('.eliminar-platillo'))
                eliminarPlatillos(e, 'miercoles');
        });
        document.getElementById('platillos-jueves').addEventListener('click', (e) => {
            if (e.target.matches('.eliminar-platillo'))
                eliminarPlatillos(e, 'jueves');
        });
        document.getElementById('platillos-viernes').addEventListener('click', (e) => {
            if (e.target.matches('.eliminar-platillo'))
                eliminarPlatillos(e, 'viernes');
        });
        document.getElementById('platillos-sabado').addEventListener('click', (e) => {
            if (e.target.matches('.eliminar-platillo'))
                eliminarPlatillos(e, 'sabado');
        });
        document.getElementById('platillos-domingo').addEventListener('click', (e) => {
            if (e.target.matches('.eliminar-platillo'))
                eliminarPlatillos(e, 'domingo');
        });
    }


    const agregarPlatilloHTML = (tiempoObj, atributosPlatillo) => {

        let template = `
            <tr>
                <td>${atributosPlatillo.nombre}</td>
                <td>${tiempoObj.nombre}  ${tiempoObj.hora}</td>
                <td><i class="far fa-trash-alt eliminar-platillo acciones" data-ideliminar=${atributosPlatillo.id} data-idtiempo=${tiempoObj.id}></i></td>
            </tr>    
        `;

        switch (dia) {
            case "lunes":
                document.getElementById('platillos-lunes').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "martes":
                document.getElementById('platillos-martes').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "miercoles":
                document.getElementById('platillos-miercoles').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "jueves":
                document.getElementById('platillos-jueves').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "viernes":
                document.getElementById('platillos-viernes').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "sabado":
                document.getElementById('platillos-sabado').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "domingo":
                document.getElementById('platillos-domingo').innerHTML += template;
                eventoEliminarPlatillos();
                return;



        }


    }



    const editarMenu = () => {
        let fechaInicio = document.getElementById('fecha-inicio').value;
        datosAEnviar.forEach((element, i) => {
            console.log(element);
            //TODO cambiar iteracion por id menu

            let data = `id-menu=${idMenuAEditar}&id-paciente=${idPacienteMenu}&opcion=${element.opcion}&dia=${element.dia}&id-tiempo=${element.idTiempo}&id-platillo=${element.idPlatillo}&fecha-inicio=${fechaInicio}`;
            let respuesta = postMenu('php/menus/modificarMenu.php', data);

            console.log(respuesta);
            console.log(fechaInicio);
        });


    }

    let contadoreventos = 0
    const eventoAgregarPlatillo = () => {
        if(contadoreventos == 0)
            document.getElementById('platillos-table-modal').addEventListener('click', (e) => {
                console.log('ds');
                if (e.target.matches('.agregar-platillo')) {
                    let option = document.getElementById('select-tiempo').options[document.getElementById('select-tiempo').selectedIndex];
                    let idTiempo = option.getAttribute('data-idtiempo');
                    idTiempos.push(idTiempo);

                    let tiempoObj = {
                        id: idTiempo,
                        nombre: option.getAttribute('data-nombre'),
                        hora: option.getAttribute('data-hora')
                    }

                    let idPlatilloAAgregar = (e.target).getAttribute('data-idplatillo');
                    let atributosPlatillo = {
                        id: idPlatilloAAgregar,
                        nombre: (e.target).getAttribute('data-nombre'),
                        energia: (e.target).getAttribute('data-energia'),
                        lipidos: (e.target).getAttribute('data-lipidos'),
                        proteinas: (e.target).getAttribute('data-proteinas'),
                        hidratos: (e.target).getAttribute('data-hidratos')
                    }
                    idsPlatillos.push(idPlatilloAAgregar);
                    datosDieta.push(atributosPlatillo);

                    agregarPlatilloHTML(tiempoObj, atributosPlatillo);

                    let enviar = {
                        dia: dia,
                        idTiempo: idTiempo,
                        idPlatillo: idPlatilloAAgregar,
                        opcion: 1
                    }

                    datosAEnviar.push(enviar)

                    calcularTotales();

                    $('#modal-platillos').modal('hide');
                }
                contadoreventos++;
            });
    }




    const configuracionBotonesAgregarPlatillosSegunDia = () => {
        document.getElementById("btn-lunes").addEventListener('click', () => {
            dia = "lunes";
        });
        document.getElementById("btn-martes").addEventListener('click', () => {
            dia = "martes";
        });
        document.getElementById("btn-miercoles").addEventListener('click', () => {
            dia = "miercoles";
        });
        document.getElementById("btn-jueves").addEventListener('click', () => {
            dia = "jueves";
        });
        document.getElementById("btn-viernes").addEventListener('click', () => {
            dia = "viernes";
        });
        document.getElementById("btn-sabado").addEventListener('click', () => {
            dia = "sabado";
        });
        document.getElementById("btn-domingo").addEventListener('click', () => {
            dia = "domingo";
        });

    }

    const configurarEventoEditar = () => {
        document.getElementById('menus-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                load('html/menus/editar-menu.html', contentPanel);

                idPacienteMenu = (e.target).getAttribute('data-idpaciente');
                let platillosLunes = post('php/platillos-menu.php','dia=lunes');
                let platillosMartes = post('php/platillos-menu.php','dia=martes');
                let platillosMiercoles = post('php/platillos-menu.php','dia=miercoles');
                let platillosJueves = post('php/platillos-menu.php','dia=jueves');
                let platillosViernes = post('php/platillos-menu.php','dia=viernes');
                let platillosSabados = post('php/platillos-menu.php','dia=sabado');
                let platillosDomingos = post('php/platillos-menu.php','dia=domingo');

                let datosDietaJSON = post('php/platillos-menu.php','dia=domingo')
                datosDietaJSON = JSON.parse(datosDietaJSON);
                datosDieta.push(datosDietaJSON);
                calcularTotales();
                document.getElementById('platillos-lunes').innerHTML = platillosLunes;
                document.getElementById('platillos-martes').innerHTML = platillosMartes;
                document.getElementById('platillos-miercoles').innerHTML = platillosMiercoles;
                document.getElementById('platillos-jueves').innerHTML = platillosJueves;
                document.getElementById('platillos-viernes').innerHTML = platillosViernes;
                document.getElementById('platillos-sabado').innerHTML = platillosSabados;
                document.getElementById('platillos-domingo').innerHTML = platillosDomingos;

                eventoAgregarPlatillo();

                new Lightpick({
                    field: document.getElementById('fecha-inicio'),
                    minDate: moment(),
                    onSelect: () => {

                    }
                });
                configuracionBotonesAgregarPlatillosSegunDia();
                
                document.getElementById('editar-menu-btn').addEventListener('click', editarMenu);

            }

        });
    }



    //---------------------------------------
    //  ELIMINAR MENU
    //---------------------------------------
    const eliminarMenu = (idAEliminar, e) => {
        if (post('php/menus/eliminarMenu.php', 'id-menu='+idAEliminar).trim() == 'success') {
            (((e.target).parentNode).parentNode).remove();
            swal("Paciente eliminado correctamente", {
                icon: "success",
            });
        } else {
            console.log('No se elimino');
        }
    }

    const configurarEventoEliminar = () => {
        document.getElementById('menus-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idAEliminar = (e.target).getAttribute('data-idmenu');
                swal({
                    title: "¿Está seguro?",
                    text: "El menu será eliminado permanentemente",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((aceptar) => {
                        if (aceptar) {
                            eliminarMenu(idAEliminar, e);
                        }
                    });


            }
        })
    }

    //---------------------------------------
    //  VER MENU
    //---------------------------------------
    const configurarEventoVerMenu = () => {
        document.getElementById('menus-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-ver')) {
                load('html/menus/ver-menu.html', contentPanel);

                idPacienteMenu = (e.target).getAttribute('data-idpaciente');
                idMenuAEditar = (e.target).getAttribute('data-idmenu');
                document.getElementById('fecha-inicio').value = (e.target).getAttribute('data-fechainicio');
                
                let platillosLunes = post('php/platillos-menu.php','dia=lunes');
                let platillosMartes = post('php/platillos-menu.php','dia=martes');
                let platillosMiercoles = post('php/platillos-menu.php','dia=miercoles');
                let platillosJueves = post('php/platillos-menu.php','dia=jueves');
                let platillosViernes = post('php/platillos-menu.php','dia=viernes');
                let platillosSabados = post('php/platillos-menu.php','dia=sabado');
                let platillosDomingos = post('php/platillos-menu.php','dia=domingo');

                document.getElementById('platillos-lunes').innerHTML = platillosLunes;
                document.getElementById('platillos-martes').innerHTML = platillosMartes;
                document.getElementById('platillos-miercoles').innerHTML = platillosMiercoles;
                document.getElementById('platillos-jueves').innerHTML = platillosJueves;
                document.getElementById('platillos-viernes').innerHTML = platillosViernes;
                document.getElementById('platillos-sabado').innerHTML = platillosSabados;
                document.getElementById('platillos-domingo').innerHTML = platillosDomingos;
            }

        });
    }

    //Busca menu

    const buscarMenu = () => {
        let dato = document.getElementById('buscar-menu-input').value;
        document.getElementById('menus-table-body').innerHTML = post('php/menu/busquedaDinamica.php','dato='+dato);
    }

    const mostrarTodosLosMenus = () => {
        document.getElementById('menus-table-body').innerHTML = post('php/menus/consultarMenu.php',null); 
    }


    const cargarEventos = () => {
        mostrarTodosLosMenus();
        configurarEventoEditar();
        configurarEventoEliminar();
        configurarEventoVerMenu();

        document.getElementById('buscar-menu-input').addEventListener('keyup', buscarMenu);
    }

    return {

        init: () => {
            cargarEventos();
        }
    }
})();




MenusController.init();