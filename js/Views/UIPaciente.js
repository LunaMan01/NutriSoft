const UIPaciente = (() => {
    return {
        obtenerDatosDeFormulario = (id, numero) => {
            let form = document.getElementById(id);
                let data = new FormData(form);
                data.append("value", numero);
                return data;
        }
    }
})();