const UIPaciente = (() => {
    return {
        obtenerDatosDeFormulario = (id) => {
            let form = document.getElementById(id);
                let data = new FormData(form);
                return data;
        }
    }
})();