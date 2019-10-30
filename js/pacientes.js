const PacientesModel = (() => {
    return {
        add: (formulario) => {
            postForm('php/pacientes/nuevoPaciente', formulario);

        }
    }
})();

const UIPacientes = (() => {
    return {
        obtenerDatosGeneralesParaNuevoPacientes: () => {
            let form = document.getElementById(DOMStrings.memberForm);
            let data = new FormData(form);
            return data;
        }
    }
})();


const PacientesController = (() => {

})();