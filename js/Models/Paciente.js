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
            let req = new XMLHttpRequest();
            req.open("POST", 'php/pacientes/dinamicaPacientes.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send('dato='+datoABuscar);            
            console.log(req.responseText);
            return req.responseText;
        },

        eliminarPaciente : (idPacienteAEliminar) => {
            let req = new XMLHttpRequest();
            req.open("POST", 'php/pacientes/eliminarPacientes.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send('id='+idPacienteAEliminar);            
            console.log(req.responseText);
            return JSON.parse(req.responseText);
        },

        obtenerPacienteJSON : (idPaciente) => {
            let req = new XMLHttpRequest();
            req.open("POST", 'php/pacientes/pacienteJSON.php', false);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send('id='+idPaciente);            
            console.log(req.responseText);
            return JSON.parse(req.responseText);            
        },

        actualizar : (data, numeroDeFormulario, idPaciente) => {
            data.append("value", numeroDeFormulario);
            data.append("id", idPaciente);
            let req = new XMLHttpRequest();
            req.open("POST", 'php/pacientes/actualizarPaciente.php', false);
            req.send(data);
            console.log(req.responseText);
            return req.responseText;
        }
    }
})();