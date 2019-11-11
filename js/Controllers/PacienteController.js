const PacientesController = (() => {

    let guardado = false;
    let idPacienteAEditar;
    // --------------------------------------------------------
    //    FUNCIONES NECESARIAS PARA AGREGAR UN NUEVO PACIENTE
    // --------------------------------------------------------
    const addDatosGenerales = () => {
        console.log('datos.generales');
        let datos = UIPacientes.obtenerDatosDeFormulario('datos-generales-form');
        datos.append('value', 1);
        PacientesModel.add(datos);
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
            minDate: moment(),
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

        //let pacienteJSON = PacientesModel.obtenerPacienteJSON(idPaciente); //Descomentar cuando json de paciente este completado
        load('html/pacientes/editar-paciente.html', contentPanel);
        // UIPacientes.cargarDatosPacienteEnInputs(pacienteJSON); // Descomentar cuando json de paciente este completado
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
                //let pacienteJSON = PacientesModel.obtenerPacienteJSON(idPacienteAEditar); //Descomentar cuando json de paciente este completado
                load('html/pacientes/ver-paciente.html', contentPanel);
                // UIPacientes.cargarDatosPacienteEnInputs(pacienteJSON); // Descomentar cuando json de paciente este completado
                document.getElementById('editar-paciente-link').addEventListener('click', () => {
                    abrirVentanaEditarPaciente(idPacienteAEditar);
                })
            }
        });
    }



    const addEventos = () => {

        document.getElementById('nuevo-paciente-btn').addEventListener('click', abrirVentanaNuevoPaciente);
        document.getElementById('buscar-paciente-input').addEventListener('keyup', consultaDinamicaPacientes);
        configurarEventoEliminar();
        configurarEventoEditar();
        configurarEventoVerPaciente();
    }

    return {

        init : () => {
            mostrarTodosLosPacientes();
            addEventos();
        }
    }
})();




PacientesController.init();