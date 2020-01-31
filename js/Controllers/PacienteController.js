const PacientesController = (() => {

    let guardado = false;
    let idPacienteAEditar;
    const postMenu = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }
    // --------------------------------------------------------
    //    FUNCIONES NECESARIAS PARA AGREGAR UN NUEVO PACIENTE
    // --------------------------------------------------------
    const addDatosGenerales = () => {
        console.log('datos.generales');
        let datos = UIPacientes.obtenerDatosDeFormulario('datos-generales-form');
        datos.append('value', 1);
        PacientesModel.add(datos);
        swal('Datos Generales Guardados', {
            icon: 'success',
        });
    }

    const addDatosEstiloVida = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('estilo-vida-form');
        datos.append('value', 2);
        PacientesModel.add(datos);
    }

    const addDatosHistoriaClinica = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('historia-clinica-form');
        datos.append('value', 3);
        PacientesModel.add(datos);
    }

    const addDatosEtiquetaPacientes = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('etiquetas-paciente-form');
        datos.append('value', 4);
        PacientesModel.add(datos);
    }

    //Falta añadir a html
    const addDatosHabitosToxicos = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('habitos-toxicos-form');
        datos.append('value', 5);
        PacientesModel.add(datos);
    }

    //Falta añadir a html
    const addDatosPlanAlimenticio = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('plan-alimenticio-form');
        datos.append('value', 6);
        PacientesModel.add(datos);
    }

    const addDatosMedicionesBasicas = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('mediciones-basicas-form');
        datos.append('value', 7);
        PacientesModel.add(datos);
    }

    const addDatosBioimpedancia = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('bioimpedancia-paciente-form');
        datos.append('value', 8);
        PacientesModel.add(datos);
    }

    const addDatosPeliegues = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('pliegues-form');
        datos.append('value', 9);
        PacientesModel.add(datos);
    }

    const addDatosPerimetros = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('perimetros-form');
        datos.append('value', 10);
        PacientesModel.add(datos);
    }

    const configurarCalendariosEnInputs = () => {
        new Lightpick({
            field: document.getElementById('fecha-nacimiento'),
            onSelect: () => {

            }
        });

        new Lightpick({
            field: document.getElementById('fecha-consulta'),
            minDate: moment(),
            onSelect: () => {

            }
        });

        new Lightpick({
            field: document.getElementById('fecha-siguiente-consulta'),
            minDate: moment(),
            onSelect: () => {

            }
        });
    }

    const cargarEventosNuevoPaciente = () => {
        document.getElementById('datos-generales-form').addEventListener('submit', addDatosGenerales);
        document.getElementById('estilo-vida-form').addEventListener('submit', addDatosEstiloVida);
        document.getElementById('historia-clinica-form').addEventListener('submit', addDatosHistoriaClinica);
        document.getElementById('etiquetas-paciente-form').addEventListener('submit', addDatosEtiquetaPacientes);
        document.getElementById('mediciones-basicas-form').addEventListener('submit', addDatosMedicionesBasicas);
        document.getElementById('bioimpedancia-paciente-form').addEventListener('submit', addDatosBioimpedancia);
        document.getElementById('pliegues-form').addEventListener('submit', addDatosPeliegues);
        document.getElementById('perimetros-form').addEventListener('submit', addDatosPerimetros);
        document.getElementById('habitos-toxicos-form').addEventListener('submit', addDatosHabitosToxicos);
        document.getElementById('plan-alimenticio-form').addEventListener('submit', addDatosPlanAlimenticio);
        configurarCalendariosEnInputs();
    }

    const abrirVentanaNuevoPaciente = () => {
        load('html/pacientes/nuevo-paciente.html', contentPanel);
        cargarEventosNuevoPaciente();
    }

    //---------------------------------------
    //  CONSULTAR TODOS LOS PACIENTES
    //---------------------------------------
    const mostrarTodosLosPacientes = () => {
        UIPacientes.mostrarPacientes(PacientesModel.consultarTodosLosPacientes());
    }

    //---------------------------------------
    //  CONSULTA DINAMICA DE PACIENTES
    //---------------------------------------
    const consultaDinamicaPacientes = () => {
        let datoABuscar = UIPacientes.obtenerDatoABuscar();

        setTimeout(function () {
            console.log(datoABuscar)
            UIPacientes.mostrarPacientes(PacientesModel.buscarPaciente(datoABuscar));
        }, 2000);

    }

    //---------------------------------------
    //  ELIMINAR PACIENTE
    //---------------------------------------
    const eliminarPaciente = (idPacienteAEliminar) => {
        if (PacientesModel.eliminarPaciente(idPacienteAEliminar)) {
            UIPacientes.eliminarRegistroDeTabla();
            swal("Paciente eliminado correctamente", {
                icon: "success",
            });
        } else {
            console.log('No se elimino');
        }
    }

    const configurarEventoEliminar = () => {
        document.getElementById('pacientes-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idPacienteAEliminar = UIPacientes.obtenerId(e);
                swal({
                    title: "¿Está seguro?",
                    text: "Este paciente será eliminado permanentemente",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((aceptar) => {
                        if (aceptar) {
                            eliminarPaciente(idPacienteAEliminar);
                        }
                    });


            }
        })
    }



    //------------------------------------------------------
    // FUNCIONES NECESARIAS PARA ACTUALIZAR UN PACIENTE
    //------------------------------------------------------

    const editarDatosGenerales = () => {
        console.log('datos.generales');
        let datos = UIPacientes.obtenerDatosDeFormulario('datos-generales-form');
        PacientesModel.actualizar(datos, 1, idPacienteAEditar);
    }

    const editarDatosEstiloVida = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('estilo-vida-form');
        PacientesModel.actualizar(datos, 2, idPacienteAEditar);
    }

    const editarDatosHistoriaClinica = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('historia-clinica-form');
        PacientesModel.actualizar(datos, 3, idPacienteAEditar);
    }

    const editarDatosEtiquetaPacientes = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('etiquetas-paciente-form');
        PacientesModel.actualizar(datos, 4, idPacienteAEditar);
    }

    //Falta añadir a html
    const editarDatosHabitosToxicos = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('habitos-toxicos-form');
        PacientesModel.actualizar(datos, 5, idPacienteAEditar);
    }

    //Falta añadir a html
    const editarDatosPlanAlimenticio = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('plan-alimenticio-form');
        PacientesModel.actualizar(datos, 6, idPacienteAEditar);
    }

    const editarDatosMedicionesBasicas = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('mediciones-basicas-form');
        PacientesModel.actualizar(datos, 7, idPacienteAEditar);
    }

    const editarDatosBioimpedancia = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('bioimpedancia-paciente-form');
        PacientesModel.actualizar(datos, 8, idPacienteAEditar);
    }

    const editarDatosPliegues = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('pliegues-form');
        PacientesModel.actualizar(datos, 9, idPacienteAEditar);
    }

    const editarDatosPerimetros = () => {
        let datos = UIPacientes.obtenerDatosDeFormulario('perimetros-form');
        PacientesModel.actualizar(datos, 10, idPacienteAEditar);
    }

    const cargarEventosEditarPaciente = () => {
        document.getElementById('datos-generales-form').addEventListener('submit', editarDatosGenerales);
        document.getElementById('estilo-vida-form').addEventListener('submit', editarDatosEstiloVida);
        document.getElementById('historia-clinica-form').addEventListener('submit', editarDatosHistoriaClinica);
        document.getElementById('etiquetas-paciente-form').addEventListener('submit', editarDatosEtiquetaPacientes);
        document.getElementById('mediciones-basicas-form').addEventListener('submit', editarDatosMedicionesBasicas);
        document.getElementById('bioimpedancia-paciente-form').addEventListener('submit', editarDatosBioimpedancia);
        document.getElementById('pliegues-form').addEventListener('submit', editarDatosPliegues);
        document.getElementById('perimetros-form').addEventListener('submit', editarDatosPerimetros);
        configurarCalendariosEnInputs();
    }

    const abrirVentanaEditarPaciente = (idPaciente) => {

        let pacienteJSON = PacientesModel.obtenerPacienteJSON(idPaciente); //Descomentar cuando json de paciente este completado
        load('html/pacientes/editar-paciente.html', contentPanel);
        UIPacientes.cargarDatosPacienteEnInputs(pacienteJSON); // Descomentar cuando json de paciente este completado
        cargarEventosEditarPaciente();
    }

    const configurarEventoEditar = () => {
        document.getElementById('pacientes-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                idPacienteAEditar = UIPacientes.obtenerId(e);
                abrirVentanaEditarPaciente(idPacienteAEditar);
            }
        });
    }

    //------------------------------------------------------
    // FUNCIONES NECESARIAS PARA VER LOS DATOS DE UN PACIENTE
    //------------------------------------------------------

    const configurarEventoVerPaciente = () => {
        document.getElementById('pacientes-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-ver')) {
                idPacienteAEditar = UIPacientes.obtenerId(e);
                let pacienteJSON = PacientesModel.obtenerPacienteJSON(idPacienteAEditar); //Descomentar cuando json de paciente este completado
                load('html/pacientes/ver-paciente.html', contentPanel);
                UIPacientes.cargarDatosPacienteEnInputs(pacienteJSON); // Descomentar cuando json de paciente este completado
                document.getElementById('editar-paciente-link').addEventListener('click', () => {
                    abrirVentanaEditarPaciente(idPacienteAEditar);
                })
            }
        });
    }


    //----------------------------------------------------------------------------------------------------------------------------
    //--------------------------FUNCIONES PARA MENUS DE PACIENTES-----------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------

    let idsPlatillos = [];
    let datosDieta = []
    let datosDietaLunes = []
    let datosDietaMartes = []
    let datosDietaMiercoles = []
    let datosDietaJueves = []
    let datosDietaViernes = []
    let datosDietaSabado = []
    let datosDietaDomingo = []


    let idTiempos = [];
    let dia = "";
    let datosAEnviar = [];
    let fechaInicio = "";



    const compararDatosActualesConDatosDeseados = (totalCalorias, totalProteinas, totalLipidos, totalHidratos) => {
        let caloriasDeseadas = document.getElementById('calorias-deseadas').value;
        let proteinasDeseadas = document.getElementById('proteinas-deseadas').value;
        let lipidosDeseados = document.getElementById('lipidos-deseados').value;
        let hidratosDeseados = document.getElementById('hidratos-deseados').value;

        if (totalCalorias > caloriasDeseadas)
            document.getElementById('energia-td').classList.add('bg-danger');
        else
            document.getElementById('energia-td').classList.remove('bg-danger');

        if (totalProteinas > proteinasDeseadas)
            document.getElementById('proteinas-td').classList.add('bg-danger');
        else
            document.getElementById('proteinas-td').classList.remove('bg-danger');


        if (totalLipidos > lipidosDeseados)
            document.getElementById('lipidos-td').classList.add('bg-danger');
        else
            document.getElementById('lipidos-td').classList.remove('bg-danger');


        if (totalHidratos > hidratosDeseados)
            document.getElementById('hidratos-td').classList.add('bg-danger');
        else
            document.getElementById('hidratos-td').classList.remove('bg-danger');
    }

    //Calcula los totales de todo
    const calcularTotales = (datosDieta, energiaTd, proteinasTd, lipidosTd, hidratosTd) => {
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

            document.getElementById(energiaTd).innerHTML = totalCalorias + " kal";
            document.getElementById(proteinasTd).innerHTML = totalProteinas;
            document.getElementById(lipidosTd).innerHTML = totalLipidos;
            document.getElementById(hidratosTd).innerHTML = totalHidratos;

            compararDatosActualesConDatosDeseados(totalCalorias, totalProteinas, totalLipidos, totalHidratos);
        } else {
            document.getElementById(energiaTd).innerHTML = "";
            document.getElementById(proteinasTd).innerHTML = "";
            document.getElementById(lipidosTd).innerHTML = "";
            document.getElementById(hidratosTd).innerHTML = "";
        }
    }

    const verificarDiaParaCalcularTotales = (dia, index) => {
        console.log('dia', dia);
        switch (dia) {
            case 'lunes':
                datosDietaLunes.splice(index, 1);
                calcularTotales(datosDietaLunes, 'energia-td-lunes', 'proteinas-td-lunes', 'lipidos-td-lunes', 'hidratos-td-lunes');
                break;
            case 'martes':
                datosDietaMartes.splice(index, 1);
                calcularTotales(datosDietaMartes, 'energia-td-martes', 'proteinas-td-martes', 'lipidos-td-martes', 'hidratos-td-martes');
                break;
            case 'miercoles':
                datosDietaMiercoles.splice(index, 1);
                calcularTotales(datosDietaMiercoles, 'energia-td-miercoles', 'proteinas-td-miercoles', 'lipidos-td-miercoles', 'hidratos-td-miercoles');
                break;
            case 'jueves':
                datosDietaJueves.splice(index, 1);
                calcularTotales(datosDietaJueves, 'energia-td-jueves', 'proteinas-td-jueves', 'lipidos-td-jueves', 'hidratos-td-jueves');
                break;
            case 'viernes':
                datosDietaViernes.splice(index, 1);
                calcularTotales(datosDietaViernes, 'energia-td-viernes', 'proteinas-td-viernes', 'lipidos-td-viernes', 'hidratos-td-viernes');
                break;
            case 'sabado':
                datosDietaSabado.splice(index, 1);
                calcularTotales(datosDietaSabado, 'energia-td-sabado', 'proteinas-td-sabado', 'lipidos-td-sabado', 'hidratos-td-sabado');
                break;
            case 'domingo':
                datosDietaDomingo.splice(index, 1);
                calcularTotales(datosDietaDomingo, 'energia-td-domingo', 'proteinas-td-domingo', 'lipidos-td-domingo', 'hidratos-td-domingo');
                break;
        }
    }

    const eliminarPlatillos = (e, dia) => {
        let id = (e.target).getAttribute('data-ideliminar');
        let idTiempo = (e.target).getAttribute('data-idtiempo');
        datosAEnviar.forEach((element, i) => {
            if (element.idPlatillo === id && element.dia === dia && element.idTiempo === idTiempo) {
                datosAEnviar.splice(i, 1);
                datosDieta.splice(i, 1);
                // if(datosDieta.length > 0)
                calcularTotales(datosDieta, 'energia-td', 'proteinas-td', 'lipidos-td', 'hidratos-td', i);
                verificarDiaParaCalcularTotales(dia);
            }
        });

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

    function agregarPlatilloHTML(tiempoObj, atributosPlatillo) {

        let template = `
            <tr>
                <td>${atributosPlatillo.nombre}</td>
                <td>${tiempoObj.nombre}  ${tiempoObj.hora}</td>
                <td><i class="far fa-trash-alt eliminar-platillo acciones" data-ideliminar=${atributosPlatillo.id} data-idtiempo=${tiempoObj.id}></i></td>
            </tr>    
        `;

        console.log('aqui');
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

    const guardarMenu = () => {
        let fechaInicio = document.getElementById('fecha-inicio').value;
        datosAEnviar.forEach((element, i) => {
            console.log(element);
            let data = `id-paciente=${idPacienteAEditar}&iteracion=${i}&dia=${element.dia}&id-tiempo=${element.idTiempo}&id-platillo=${element.idPlatillo}&fecha-inicio=${fechaInicio}`;
            let respuesta = postMenu('php/menus/agregarMenu.php', data);
            console.log(respuesta);
            console.log(fechaInicio);
        });


    }

    let contadoreventos = 0;
    const eventoAgregarPlatillo = () => {
        if (contadoreventos == 0)
            document.getElementById('platillos-table-modal').addEventListener('click', (e) => {
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

                    if (dia == 'lunes') {
                        datosDietaLunes.push(atributosPlatillo);
                        calcularTotales(datosDietaLunes, 'energia-td-lunes', 'proteinas-td-lunes', 'lipidos-td-lunes', 'hidratos-td-lunes');
                    } else if (dia == 'martes') {
                        datosDietaMartes.push(atributosPlatillo);
                        calcularTotales(datosDietaMartes, 'energia-td-martes', 'proteinas-td-martes', 'lipidos-td-martes', 'hidratos-td-martes');
                    } else if (dia == 'miercoles') {
                        datosDietaMiercoles.push(atributosPlatillo);
                        calcularTotales(datosDietaMiercoles, 'energia-td-miercoles', 'proteinas-td-miercoles', 'lipidos-td-miercoles', 'hidratos-td-miercoles');
                    } else if (dia == 'jueves') {
                        datosDietaJueves.push(atributosPlatillo);
                        calcularTotales(datosDietaJueves, 'energia-td-jueves', 'proteinas-td-jueves', 'lipidos-td-jueves', 'hidratos-td-jueves');
                    } else if (dia == 'viernes') {
                        datosDietaViernes.push(atributosPlatillo);
                        calcularTotales(datosDietaViernes, 'energia-td-viernes', 'proteinas-td-viernes', 'lipidos-td-viernes', 'hidratos-td-viernes');
                    } else if (dia == 'sabado') {
                        datosDietaSabado.push(atributosPlatillo);
                        calcularTotales(datosDietaSabado, 'energia-td-sabado', 'proteinas-td-sabado', 'lipidos-td-sabado', 'hidratos-td-sabado');
                    } else if (dia == 'domingo') {
                        datosDietaDomingo.push(atributosPlatillo);
                        calcularTotales(datosDietaDomingo, 'energia-td-domingo', 'proteinas-td-domingo', 'lipidos-td-domingo', 'hidratos-td-domingo');
                    }

                    // debugger;
                    agregarPlatilloHTML(tiempoObj, atributosPlatillo);

                    let enviar = {
                        dia: dia,
                        idTiempo: idTiempo,
                        idPlatillo: idPlatilloAAgregar
                    }

                    datosAEnviar.push(enviar)

                    calcularTotales(datosDieta, 'energia-td', 'proteinas-td', 'lipidos-td', 'hidratos-td');


                    $('#modal-platillos').modal('hide');
                    contadoreventos++;

                }
            });

    }

    const irANuevoMenu = () => {

        document.getElementById('pacientes-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.nuevo-menu')) {
                console.log('evento');
                idPacienteAEditar = UIPacientes.obtenerId(e);
                load('html/menus/nuevo-menu.html', contentPanel);
                // cargarPlatillos();
                // cargarTiempos();
                document.getElementById('platillos-lunes').innerHTML = "";
                eventoAgregarPlatillo();

                new Lightpick({
                    field: document.getElementById('fecha-inicio'),
                    minDate: moment(),
                    onSelect: () => {

                    }
                });

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

                document.getElementById('guardar-menu-btn').addEventListener('click', guardarMenu);

                // document.getElementById('calorias-deseadas').addEventListener('keyup', calcularTotales);
                // document.getElementById('proteinas-deseadas').addEventListener('keyup', calcularTotales);
                // document.getElementById('lipidos-deseados').addEventListener('keyup', calcularTotales);
                // document.getElementById('hidratos-deseados').addEventListener('keyup', calcularTotales);

            }
        });
    }



    //----------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------------------------------------------------



    const addEventos = () => {
        datosAEnviar = [];
        datosDieta = [];
        atributosPlatillo = [];
        tiemposObj = [];
        document.getElementById('nuevo-paciente-btn').addEventListener('click', abrirVentanaNuevoPaciente);
        document.getElementById('buscar-paciente-input').addEventListener('keyup', consultaDinamicaPacientes);
        configurarEventoEliminar();
        configurarEventoEditar();
        configurarEventoVerPaciente();
        irANuevoMenu();
    }

    return {

        init: () => {

            mostrarTodosLosPacientes();
            addEventos();
        }
    }
})();




PacientesController.init();