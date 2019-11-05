const UIPacientes = (() => {
    return {
        obtenerDatosDeFormulario : (id) => {
            let form = document.getElementById(id);
                let data = new FormData(form);
                data.append("value", numero);
                return data;
        },

        mostrarPacientes : (pacientes) => {
            document.getElementById('pacientes-table-body').innerHTML = pacientes;
        },

        obtenerDatoABuscar : () => {
            return document.getElementById('buscar-paciente-input').value;
        },

        obtenerId : () => {
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
        }
    }
})();