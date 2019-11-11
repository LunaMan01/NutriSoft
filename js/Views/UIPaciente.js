const UIPacientes = (() => {

    const cargarDatosGenerales  = (pacienteJSON) => {
        document.getElementById('nombre').value = pacienteJSON.nombre;
        document.getElementById('paterno').value = pacienteJSON.nombre;
        document.getElementById('materno').value = pacienteJSON.nombre;
        document.getElementById('genero').value = pacienteJSON.nombre;
        document.getElementById('calle').value = pacienteJSON.nombre;
        document.getElementById('numero').value = pacienteJSON.nombre;
        document.getElementById('colonia').value = pacienteJSON.nombre;
        document.getElementById('ciudad').value = pacienteJSON.nombre;
        document.getElementById('estado').value = pacienteJSON.nombre;
        document.getElementById('escolaridad').value = pacienteJSON.nombre;
        document.getElementById('correo').value = pacienteJSON.nombre;
        document.getElementById('telefono').value = pacienteJSON.nombre;
        document.getElementById('historial').value = pacienteJSON.nombre;
        document.getElementById('observaciones').value = pacienteJSON.nombre;
    }

    const cargarEstiloDeVida = (pacienteJSON) => {
        document.getElementById('actividad-laboral').value = pacienteJSON.nombre;
        document.getElementById('descripcion-actividad-laboral').value = pacienteJSON.nombre;
        document.getElementById('actividades-deportivas').value = pacienteJSON.nombre;
        document.getElementById('nivel-estres').value = pacienteJSON.nombre;
    }

    const cargarHistoriaClinica = (pacienteJSON) => {
        document.getElementById('motivo-consulta').value = pacienteJSON.nombre;
        document.getElementById('terapeutica-previa').value = pacienteJSON.nombre;
        document.getElementById('cirugias').value = pacienteJSON.nombre;
        document.getElementById('tipo-sangre').value = pacienteJSON.nombre;
        document.getElementById('alergias').value = pacienteJSON.nombre;
        document.getElementById('diagnostivo-previo').value = pacienteJSON.nombre;
        document.getElementById('vacunas').value = pacienteJSON.nombre;
        document.getElementById('antecedentes-heredo').value = pacienteJSON.nombre;
    }

    const cargarEtiquetasPaciente = (pacienteJSON) => {

    }

    const cargarHabitosToxicos = (pacienteJSON) => {

    }

    const cargarPlanAlimenticio = (pacienteJSON) => {
        
    }


    const cargarMedicionesBasicas = (pacienteJSON) => {

    }

    const cargarBioimpedancia = (pacienteJSON) => {
        document.getElementById('grasa-total').value = pacienteJSON.nombre;
        document.getElementById('grasa-superior').value = pacienteJSON.nombre;
        document.getElementById('grasa-inferior').value = pacienteJSON.nombre;
        document.getElementById('grasa-visceral').value = pacienteJSON.nombre;
        document.getElementById('masa-libre-grasa').value = pacienteJSON.nombre;
        document.getElementById('masa-muscular').value = pacienteJSON.nombre;
        document.getElementById('peso-oseo').value = pacienteJSON.nombre;
        document.getElementById('agua-corporal').value = pacienteJSON.nombre;
        document.getElementById('edad-metabolica').value = pacienteJSON.nombre;
    }

    const cargarPliegues = (pacienteJSON) => {
        document.getElementById('subescapular').value = pacienteJSON.nombre;
        document.getElementById('triceps').value = pacienteJSON.nombre;
        document.getElementById('biceps').value = pacienteJSON.nombre;
        document.getElementById('ileocrestal').value = pacienteJSON.nombre;
        document.getElementById('suprailiaco').value = pacienteJSON.nombre;
        document.getElementById('abdominal').value = pacienteJSON.nombre;
        document.getElementById('muslo-frontal').value = pacienteJSON.nombre;
        document.getElementById('pantorrilla-medial').value = pacienteJSON.nombre;
        document.getElementById('axiliar-medial').value = pacienteJSON.nombre;
        document.getElementById('pectorial').value = pacienteJSON.nombre;

    }

    const cargarPerimetros = (pacienteJSON) => {
        document.getElementById('cefalico').value = pacienteJSON.nombre;
        document.getElementById('cuello').value = pacienteJSON.nombre;
        document.getElementById('mitad-brazo-relajado').value = pacienteJSON.nombre;
        document.getElementById('mitad-brazo-contraido').value = pacienteJSON.nombre;
        document.getElementById('antebrazo').value = pacienteJSON.nombre;
        document.getElementById('muneca').value = pacienteJSON.nombre;
        document.getElementById('mesoesternal').value = pacienteJSON.nombre;
        document.getElementById('umbilical').value = pacienteJSON.nombre;
        document.getElementById('cintura').value = pacienteJSON.nombre;
        document.getElementById('cadera').value = pacienteJSON.nombre;
        document.getElementById('muslo').value = pacienteJSON.nombre;
        document.getElementById('muslo-medio').value = pacienteJSON.nombre;
        document.getElementById('pantorrilla').value = pacienteJSON.nombre;

    }


    return {
        obtenerDatosDeFormulario : (id) => {
            let form = document.getElementById(id);
                let data = new FormData(form);
                // data.append("value", numero);
                return data;
        },

        mostrarPacientes : (pacientes) => {
            document.getElementById('pacientes-table-body').innerHTML = pacientes;
        },

        obtenerDatoABuscar : () => {
            return document.getElementById('buscar-paciente-input').value;
        },

        obtenerId : (event) => {
            let i = event.target;
            let td = i.parentNode;
            tr = td.parentNode;
            let elements = tr.childNodes;
            let th = elements[1];
            let id = th.getAttribute('id');

            return id;
        },

        eliminarRegistroDeTabla : () => {
            tr.remove();
        },

        cargarDatosPacienteEnInputs : (pacienteJSON) => {
            cargarDatosGenerales(pacienteJSON);
            cargarEstiloDeVida(pacienteJSON);
            cargarHistoriaClinica(pacienteJSON);
            
            cargarBioimpedancia(pacienteJSON);
            cargarPliegues(pacienteJSON);
            cargarPerimetros(pacienteJSON);
        }
    }
})();