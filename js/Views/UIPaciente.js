const UIPacientes = (() => {

    const cargarDatosGenerales  = (pacienteJSON) => {
        document.getElementById('nombre').value = pacienteJSON.nombre;
        document.getElementById('paterno').value = pacienteJSON.paterno;
        document.getElementById('materno').value = pacienteJSON.materno;
        document.getElementById('genero').value = pacienteJSON.genero;
        document.getElementById('fecha-nacimiento').value = pacienteJSON.fechaNacimiento;
        document.getElementById('calle').value = pacienteJSON.calle;
        document.getElementById('numero').value = pacienteJSON.numero;
        document.getElementById('colonia').value = pacienteJSON.colonia;
        document.getElementById('ciudad').value = pacienteJSON.ciudad;
        document.getElementById('estado').value = pacienteJSON.estado;
        document.getElementById('escolaridad').value = pacienteJSON.escolaridad;
        document.getElementById('correo').value = pacienteJSON.correo;
        document.getElementById('telefono').value = pacienteJSON.telefono;
        document.getElementById('historial').value = pacienteJSON.historial;
        document.getElementById('fecha-consulta').value = pacienteJSON.fechaConsulta;
        document.getElementById('fecha-siguiente-consulta').value = pacienteJSON.fechaSiguienteConsulta;
        document.getElementById('observaciones').value = pacienteJSON.observaciones;
    }

    const cargarEstiloDeVida = (pacienteJSON) => {
        document.getElementById('actividad-laboral').value = pacienteJSON.laboral;
        document.getElementById('descripcion-actividad-laboral').value = pacienteJSON.descripcion;
        document.getElementById('actividades-deportivas').value = pacienteJSON.deportivas;
        document.getElementById('nivel-estres').value = pacienteJSON.estres;
    }

    const cargarHistoriaClinica = (pacienteJSON) => {
        document.getElementById('motivo-consulta').value = pacienteJSON.motivo;
        document.getElementById('terapeutica-previa').value = pacienteJSON.previa;
        document.getElementById('cirugias').value = pacienteJSON.cirugias;
        document.getElementById('tipo-sangre').value = pacienteJSON.sangre;
        document.getElementById('alergias').value = pacienteJSON.alergias;
        document.getElementById('diagnostivo-previo').value = pacienteJSON.diagnostico;
        document.getElementById('vacunas').value = pacienteJSON.vacunas;
        document.getElementById('antecedentes-heredo').value = pacienteJSON.antecedentes;
    }

    const cargarEtiquetasPaciente = (pacienteJSON) => {

    }

    const cargarHabitosToxicos = (pacienteJSON) => {
        document.getElementById('frecuencia-cigarro').value = pacienteJSON.fCigarro;
        document.getElementById('cantidad-cigarro').value = pacienteJSON.cCigarro;
        document.getElementById('frecuencia-alcohol').value = pacienteJSON.fAlcohol;
        document.getElementById('cantidad-alcohol').value = pacienteJSON.cAlcohol;
        document.getElementById('frecuencia-drogas').value = pacienteJSON.fDrogas;
        document.getElementById('cantidad-drogas').value = pacienteJSON.cDrogas;
    }

    const cargarPlanAlimenticio = (pacienteJSON) => {
        document.getElementById('plan-alimenticio').value = pacienteJSON.plan;
    }


    const cargarMedicionesBasicas = (pacienteJSON) => {
        document.getElementById('estatura').value = pacienteJSON.estatura;
        document.getElementById('peso').value = pacienteJSON.peso;
        document.getElementById('factor-actividad').value = pacienteJSON.factor;
        document.getElementById('embarazo').value = pacienteJSON.embarazo;
    }

    const cargarBioimpedancia = (pacienteJSON) => {
        document.getElementById('grasa-total').value = pacienteJSON.total;
        document.getElementById('grasa-superior').value = pacienteJSON.superior;
        document.getElementById('grasa-inferior').value = pacienteJSON.inferior;
        document.getElementById('grasa-visceral').value = pacienteJSON.viseral;
        document.getElementById('masa-libre-grasa').value = pacienteJSON.libre;
        document.getElementById('masa-muscular').value = pacienteJSON.muscular;
        document.getElementById('peso-oseo').value = pacienteJSON.oseo;
        document.getElementById('agua-corporal').value = pacienteJSON.agua;
        document.getElementById('edad-metabolica').value = pacienteJSON.edad;
    }

    const cargarPliegues = (pacienteJSON) => {
        document.getElementById('subescapular').value = pacienteJSON.subes;
        document.getElementById('triceps').value = pacienteJSON.tricep;
        document.getElementById('biceps').value = pacienteJSON.bicep;
        document.getElementById('ileocrestal').value = pacienteJSON.crestal;
        document.getElementById('suprailiaco').value = pacienteJSON.supra;
        document.getElementById('abdominal').value = pacienteJSON.abdomianl;
        document.getElementById('muslo-frontal').value = pacienteJSON.frontal;
        document.getElementById('pantorrilla-medial').value = pacienteJSON.medial;
        document.getElementById('axiliar-medial').value = pacienteJSON.axiliar;
        document.getElementById('pectoral').value = pacienteJSON.pectoral;

    }

    const cargarPerimetros = (pacienteJSON) => {
        document.getElementById('cefalico').value = pacienteJSON.cefalico;
        document.getElementById('cuello').value = pacienteJSON.cuello;
        document.getElementById('mitad-brazo-relajado').value = pacienteJSON.relajado;
        document.getElementById('mitad-brazo-contraido').value = pacienteJSON.contraido;
        document.getElementById('antebrazo').value = pacienteJSON.antebrazo;
        document.getElementById('muneca').value = pacienteJSON.muñeca;
        document.getElementById('meseoesternal').value = pacienteJSON.meseo;
        document.getElementById('umbilical').value = pacienteJSON.umbilical;
        document.getElementById('cintura').value = pacienteJSON.cintura;
        document.getElementById('cadera').value = pacienteJSON.caderas;
        document.getElementById('muslo').value = pacienteJSON.muslo;
        document.getElementById('muslo-medio').value = pacienteJSON.medio;
        document.getElementById('pantorrilla').value = pacienteJSON.pantorrilla;

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