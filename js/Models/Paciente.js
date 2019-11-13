const PacientesModel = (() => {

    function postForm(url, formToSend) {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.send(formToSend);
        return req.responseText;
    }
    
    return{
        add : (formulario) => {
            let respuesta = postForm('php/pacientes/nuevoPaciente.php', formulario);
            console.log(respuesta);
        },

        consultarTodosLosPacientes : () => {
            let respuesta = post('php/pacientes/consultarPacientes.php', null);
            console.log(respuesta);
            return respuesta;
        },

        buscarPaciente : (datoABuscar) => {

            let respuesta = post('php/pacientes/dinamicaPacientes.php', 'dato='+datoABuscar);
            console.log(respuesta);
            return respuesta;
        },

        eliminarPaciente : (idPacienteAEliminar) => {
            let respuesta = post('php/pacientes/eliminarPacientes.php', 'id='+idPacienteAEliminar);
            console.log(respuesta);
            return respuesta.trim() == 'success'  ? true : false;
        },

        obtenerPacienteJSON : (idPaciente) => {
            let respuesta = post('php/pacientes/pacienteJSON.php', 'id='+idPaciente);
            return JSON.parse(respuesta);
        },

        actualizar : (data, numeroDeFormulario, idPaciente) => {
            data.append('value', numeroDeFormulario);    
            data.append('id-paciente', idPaciente);
            let respuesta = postForm('php/pacientes/actualizarPaciente.php', data);
            console.log(respuesta);
        }
    }
})();