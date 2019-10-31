const PacienteModel = (() => {
    
    return{
        addDatosNuevoPaciente : (formulario) => {
            let respuesta = postForm('php/pacientes/nuevoPaciente', formulario);
        }

    }
})