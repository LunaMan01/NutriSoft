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


    const cargarEventosNuevoPaciente = () => {
        document.getElementById('datos-generales-form').addEventListener('submit', addDatosGenerales);
        document.getElementById('estilo-vida-form').addEventListener('submit', addDatosEstiloVida);
        document.getElementById('historia-clinica-form').addEventListener('submit', addDatosHistoriaClinica);
        document.getElementById('etiquetas-paciente-form').addEventListener('submit', addDatosEtiquetaPacientes);
        document.getElementById('mediciones-basicas-form').addEventListener('submit', addDatosMedicionesBasicas);
        document.getElementById('bioimpedancia-paciente-form').addEventListener('submit', addDatosBioimpedancia);
        document.getElementById('pliegues-form').addEventListener('submit', addDatosPeliegues);
        document.getElementById('perimetros-form').addEventListener('submit', addDatosPerimetros);
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
            if(e.target.matches('.accion-eliminar')) {
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
    const configurarEventoEditar = () => {
        document.getElementById('pacientes-table-body').addEventListener('click', (e) => {
            if(e.target.matches('.accion-editar')) {
                idPacienteAEditar = UIPacientes.obtenerId(e);
                let pacienteJSON = UIPacientes.obtenerPacienteJSON(idPacienteAEditar);
                load('html/pacientes/editar-paciente.html', contentPanel);
                UIPacientes.cargarDatosPacienteEnInputs(pacienteJSON);
                
            }
        }) 
    }


    
    

    const addEventos = () => {

        document.getElementById('nuevo-paciente-btn').addEventListener('click', abrirVentanaNuevoPaciente);
        document.getElementById('buscar-paciente-input').addEventListener('keyup', consultaDinamicaPacientes);
        configurarEventoEliminar();
        configurarEventoEditar();
    }

    return {
        init : () => {
            // mostrarTodosLosPacientes();
            addEventos();
        }
    }
})();




PacientesController.init();