const MenusController = (() => {

    let guardado = false;
    let idPacienteAEditar;

    const post = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    const configuracionBotonesAgregarPlatillosSegunDia = () => {
        document.getElementById("btn-lunes").addEventListener('click', () => {
            dia = "lunes";
        });
        document.getElementById("btn-martes").addEventListener('click', () => {
            dia = "martes";
        });
        document.getElementById("btn-miercoles").addEventListener('click', () => {
            dia = "miercoles";
        });
        document.getElementById("btn-jueves").addEventListener('click', () => {
            dia = "jueves";
        });
        document.getElementById("btn-viernes").addEventListener('click', () => {
            dia = "viernes";
        });
        document.getElementById("btn-sabado").addEventListener('click', () => {
            dia = "sabado";
        });
        document.getElementById("btn-domingo").addEventListener('click', () => {
            dia = "domingo";
        });

    }

    const configurarEventoEditar = () => {
        document.getElementById('menus-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-editar')) {
                load('html/menus/editar-menu.html', contentPanel);

                let platillosLunes = post('php/platillos-menu.php','dia=lunes');
                let platillosMartes = post('php/platillos-menu.php','dia=martes');
                let platillosMiercoles = post('php/platillos-menu.php','dia=miercoles');
                let platillosJueves = post('php/platillos-menu.php','dia=jueves');
                let platillosViernes = post('php/platillos-menu.php','dia=viernes');
                let platillosSabados = post('php/platillos-menu.php','dia=sabado');
                let platillosDomingos = post('php/platillos-menu.php','dia=domingo');

                document.getElementById('platillos-lunes').innerHTML = platillosLunes;
                document.getElementById('platillos-martes').innerHTML = platillosMartes;
                document.getElementById('platillos-miercoles').innerHTML = platillosMiercoles;
                document.getElementById('platillos-jueves').innerHTML = platillosJueves;
                document.getElementById('platillos-viernes').innerHTML = platillosViernes;
                document.getElementById('platillos-sabado').innerHTML = platillosSabados;
                document.getElementById('platillos-domingo').innerHTML = platillosDomingos;

                eventoAgregarPlatillo();

                new Lightpick({
                    field: document.getElementById('fecha-inicio'),
                    minDate: moment(),
                    onSelect: () => {

                    }
                });
                configuracionBotonesAgregarPlatillosSegunDia();
                
                document.getElementById('editar-menu-btn').addEventListener('click', editarMenu);

            }

        });
    }

    const cargarEventos = () => {
        configurarEventoEditar();
    }

    return {

        init: () => {
            cargarEventos();
        }
    }
})();




MenusController.init();