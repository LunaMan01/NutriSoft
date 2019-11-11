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

            let respuesta = post('php/pacientes/consultarPacientes.php', 'dato='+datoABuscar);
            console.log(respuesta);
            return respuesta;
        },

        eliminarPaciente : (idPacienteAEliminar) => {
            let respuesta = post('php/pacientes/eliminarPaciente', 'id='+idPacienteAEliminar);
            console.log(respuesta);
            return respuesta.trim() == 'success'  ? true : false;
        },

        obtenerPacienteJSON : (idPaciente) => {
            let respuesta = post('php/pacientes/pacienteJSON', 'id='+idPaciente);
            return JSON.parse(respuesta);
        },

        actualizar : (data, numeroDeFormulario, idPaciente) => {
            data.append('value', numeroDeFormulario);    
            data.append('id-paciente', idPaciente);
            let respuesta = postForm('php/pacientes/nuevoPaciente.php', data);
            console.log(respuesta);
        }
    }
})();