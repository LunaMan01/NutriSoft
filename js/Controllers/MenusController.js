const MenusController = (() => {

    let guardado = false;
    let idPacienteMenu;
    let idMenuAEditar;

    const post = (url, data) => {
        var req = new XMLHttpRequest();
        req.open("POST", url, false);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.send(data);
        return req.responseText;
    }

    let idsPlatillos = [];
    let datosDieta = [];
    let idTiempos = [];
    let dia = "";
    let datosAEnviar = [];
    let fechaInicio = "";

    let datosDietaLunes = []
    let datosDietaMartes = []
    let datosDietaMiercoles = []
    let datosDietaJueves = []
    let datosDietaViernes = []
    let datosDietaSabado = []
    let datosDietaDomingo = []

    let coloresLunes = [];




    //Calcula los totales de todo
    const calcularTotales = (datosDieta, energiaTd, proteinasTd, lipidosTd, hidratosTd) => {
        if (datosDieta.length > 0) {
            let calorias = datosDieta.map(element => {
                return parseFloat(element.energia);
            });
            let proteinas = datosDieta.map(element => {
                return parseFloat(element.proteinas);
            });
            let lipidos = datosDieta.map(element => {
                return parseFloat(element.lipidos);
            });
            let hidratos = datosDieta.map(element => {
                return parseFloat(element.hidratos);
            });

            let totalCalorias = calorias.reduce((acumulador, actual) => acumulador + actual);
            let totalProteinas = proteinas.reduce((acumulador, actual) => acumulador + actual);
            let totalLipidos = lipidos.reduce((acumulador, actual) => acumulador + actual);
            let totalHidratos = hidratos.reduce((acumulador, actual) => acumulador + actual);

            document.getElementById(energiaTd).innerHTML = totalCalorias + " kal";
            document.getElementById(proteinasTd).innerHTML = totalProteinas;
            document.getElementById(lipidosTd).innerHTML = totalLipidos;
            document.getElementById(hidratosTd).innerHTML = totalHidratos;
        } else {
            document.getElementById(energiaTd).innerHTML = "";
            document.getElementById(proteinasTd).innerHTML = "";
            document.getElementById(lipidosTd).innerHTML = "";
            document.getElementById(hidratosTd).innerHTML = "";
        }
    }

    const verificarDiaParaCalcularTotales = (dia, index) => {
        console.log('dia', dia);
        switch (dia) {
            case 'lunes':
                datosDietaLunes.splice(index, 1);
                calcularTotales(datosDietaLunes, 'energia-td-lunes', 'proteinas-td-lunes', 'lipidos-td-lunes', 'hidratos-td-lunes');
                break;
            case 'martes':
                datosDietaMartes.splice(index, 1);
                calcularTotales(datosDietaMartes, 'energia-td-martes', 'proteinas-td-martes', 'lipidos-td-martes', 'hidratos-td-martes');
                break;
            case 'miercoles':
                datosDietaMiercoles.splice(index, 1);
                calcularTotales(datosDietaMiercoles, 'energia-td-miercoles', 'proteinas-td-miercoles', 'lipidos-td-miercoles', 'hidratos-td-miercoles');
                break;
            case 'jueves':
                datosDietaJueves.splice(index, 1);
                calcularTotales(datosDietaJueves, 'energia-td-jueves', 'proteinas-td-jueves', 'lipidos-td-jueves', 'hidratos-td-jueves');
                break;
            case 'viernes':
                datosDietaViernes.splice(index, 1);
                calcularTotales(datosDietaViernes, 'energia-td-viernes', 'proteinas-td-viernes', 'lipidos-td-viernes', 'hidratos-td-viernes');
                break;
            case 'sabado':
                datosDietaSabado.splice(index, 1);
                calcularTotales(datosDietaSabado, 'energia-td-sabado', 'proteinas-td-sabado', 'lipidos-td-sabado', 'hidratos-td-sabado');
                break;
            case 'domingo':
                datosDietaDomingo.splice(index, 1);
                calcularTotales(datosDietaDomingo, 'energia-td-domingo', 'proteinas-td-domingo', 'lipidos-td-domingo', 'hidratos-td-domingo');
                break;
        }
    }


    const eliminarPlatillos = (e, dia) => {
        let id = (e.target).getAttribute('data-ideliminar');
        let idTiempo = (e.target).getAttribute('data-idtiempo');

        console.log("ELIMINAR");
        datosAEnviar.push({
            dia: dia,
            idTiempo: idTiempo,
            idPlatillo: id,
            opcion: 2
        });

        console.log("DATOS DIETAS ANTES", datosDieta);
        datosDieta.forEach((element, i) => {
            console.log("elemento");
            if (dia == 'lunes') {
                datosDietaLunes.splice(i, 1);
                calcularTotales(datosDietaLunes, 'energia-td-lunes', 'proteinas-td-lunes', 'lipidos-td-lunes', 'hidratos-td-lunes');
            } else if (dia == 'martes') {
                datosDietaMartes.splice(i, 1);
                calcularTotales(datosDietaMartes, 'energia-td-martes', 'proteinas-td-martes', 'lipidos-td-martes', 'hidratos-td-martes');
            } else if (dia == 'miercoles') {
                datosDietaMiercoles.splice(i, 1);
                calcularTotales(datosDietaMiercoles, 'energia-td-miercoles', 'proteinas-td-miercoles', 'lipidos-td-miercoles', 'hidratos-td-miercoles');
            } else if (dia == 'jueves') {
                datosDietaJueves.splice(i, 1);
                calcularTotales(datosDietaJueves, 'energia-td-jueves', 'proteinas-td-jueves', 'lipidos-td-jueves', 'hidratos-td-jueves');
            } else if (dia == 'viernes') {
                datosDietaViernes.splice(i, 1);
                calcularTotales(datosDietaViernes, 'energia-td-viernes', 'proteinas-td-viernes', 'lipidos-td-viernes', 'hidratos-td-viernes');
            } else if (dia == 'sabado') {
                datosDietaSabado.splice(i, 1);
                calcularTotales(datosDietaSabado, 'energia-td-sabado', 'proteinas-td-sabado', 'lipidos-td-sabado', 'hidratos-td-sabado');
            } else if (dia == 'domingo') {
                datosDietaDomingo.splice(i, 1);
                calcularTotales(datosDietaDomingo, 'energia-td-domingo', 'proteinas-td-domingo', 'lipidos-td-domingo', 'hidratos-td-domingo');
            }
            if (element.idPlatillo === id && element.dia === dia && element.idTiempo === idTiempo) {
                datosDieta.splice(i, 1);
                calcularTotales(datosDieta, 'energia-td', 'proteinas-td', 'lipidos-td', 'hidratos-td');
            }
        });



        console.log("DATOS DIETAS DESPES", datosDieta);

        calcularTotales(datosDieta, 'energia-td', 'proteinas-td', 'lipidos-td', 'hidratos-td');
        (((e.target).parentNode).parentNode).remove();
        console.log(datosAEnviar);
        console.log('eliminadofs');
    }

    let cl = 0, cm = 0, cmi = 0, cj = 0, cv = 0, cs = 0, cd = 0;
    const eventoEliminarPlatillos = () => {
        if (cl == 0) {
            document.getElementById('platillos-lunes').addEventListener('click', (e) => {
                if (e.target.matches('.eliminar-platillo')) {
                    eliminarPlatillos(e, 'lunes');
                    cl++;
                }
                cl++;
            });
            cl++;
        }
        if (cm == 0)
            document.getElementById('platillos-martes').addEventListener('click', (e) => {
                if (e.target.matches('.eliminar-platillo')) {
                    eliminarPlatillos(e, 'martes');
                    cm++;
                }
                cm++;
            });
        if (cmi == 0)
            document.getElementById('platillos-miercoles').addEventListener('click', (e) => {
                if (e.target.matches('.eliminar-platillo')) {
                    eliminarPlatillos(e, 'miercoles');
                    cmi++;
                }
                cmi++;
            });
        if (cj == 0)
            document.getElementById('platillos-jueves').addEventListener('click', (e) => {
                if (e.target.matches('.eliminar-platillo')) {
                    eliminarPlatillos(e, 'jueves');
                    cj++
                }
                cj++;
            });
        if (cv == 0)
            document.getElementById('platillos-viernes').addEventListener('click', (e) => {
                if (e.target.matches('.eliminar-platillo')) {
                    eliminarPlatillos(e, 'viernes');
                    cv++;
                }
                cv++;
            });
        if (cs == 0)
            document.getElementById('platillos-sabado').addEventListener('click', (e) => {
                if (e.target.matches('.eliminar-platillo')) {
                    eliminarPlatillos(e, 'sabado');
                    cs++;
                }
                cs++;
            });
        if (cd == 0)
            document.getElementById('platillos-domingo').addEventListener('click', (e) => {
                if (e.target.matches('.eliminar-platillo')) {
                    eliminarPlatillos(e, 'domingo');
                    cd++;
                }
                cd++;
            });
    }


    const agregarPlatilloHTML = (tiempoObj, atributosPlatillo) => {

        let template = `
            <tr>
                <td>${atributosPlatillo.nombre}</td>
                <td>${tiempoObj.nombre}  ${tiempoObj.hora}</td>
                <td><i class="far fa-trash-alt eliminar-platillo acciones" data-ideliminar=${atributosPlatillo.idPlatillo} data-idtiempo=${tiempoObj.id}></i></td>
            </tr>    
        `;

        switch (dia) {
            case "lunes":
                document.getElementById('platillos-lunes').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "martes":
                document.getElementById('platillos-martes').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "miercoles":
                document.getElementById('platillos-miercoles').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "jueves":
                document.getElementById('platillos-jueves').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "viernes":
                document.getElementById('platillos-viernes').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "sabado":
                document.getElementById('platillos-sabado').innerHTML += template;
                eventoEliminarPlatillos();
                return;
            case "domingo":
                document.getElementById('platillos-domingo').innerHTML += template;
                eventoEliminarPlatillos();
                return;
        }


    }


    const editarMenu = () => {
        // editarFecha();
        let fechaInicio = document.getElementById('fecha-inicio').value;
        datosAEnviar.forEach((element, i) => {
            console.log(element);
            //TODO cambiar iteracion por id menu

            let data = `id-menu=${idMenuAEditar}&id-paciente=${idPacienteMenu}&opcion=${element.opcion}&dia=${element.dia}&id-tiempo=${element.idTiempo}&id-platillo=${element.idPlatillo}&fecha-inicio=${fechaInicio}`;
            let respuesta = post('php/menus/modificarMenu.php', data);

            console.log(respuesta);
            console.log(fechaInicio);
            console.log(data);
        });


    }


    let contadoreventos = 0
    const eventoAgregarPlatillo = () => {
        if (contadoreventos == 0) {
            document.getElementById('platillos-table-modal').addEventListener('click', (e) => {
                console.log('ds');
                if (e.target.matches('.agregar-platillo')) {
                    let option = document.getElementById('select-tiempo').options[document.getElementById('select-tiempo').selectedIndex];
                    let idTiempo = option.getAttribute('data-idtiempo');
                    idTiempos.push(idTiempo);

                    let tiempoObj = {
                        id: idTiempo,
                        nombre: option.getAttribute('data-nombre'),
                        hora: option.getAttribute('data-hora')
                    }

                    let idPlatilloAAgregar = (e.target).getAttribute('data-idplatillo');
                    let atributosPlatillo = {
                        idPlatillo: idPlatilloAAgregar,
                        nombre: (e.target).getAttribute('data-nombre'),
                        energia: (e.target).getAttribute('data-energia'),
                        lipidos: (e.target).getAttribute('data-lipidos'),
                        proteinas: (e.target).getAttribute('data-proteinas'),
                        hidratos: (e.target).getAttribute('data-hidratos'),
                        idTiempo: idTiempo,
                        dia: dia

                    }
                    idsPlatillos.push(idPlatilloAAgregar);
                    datosDieta.push(atributosPlatillo);

                    if (dia == 'lunes') {
                        datosDietaLunes.push(atributosPlatillo);
                        calcularTotales(datosDietaLunes, 'energia-td-lunes', 'proteinas-td-lunes', 'lipidos-td-lunes', 'hidratos-td-lunes');
                    } else if (dia == 'martes') {
                        datosDietaMartes.push(atributosPlatillo);
                        calcularTotales(datosDietaMartes, 'energia-td-martes', 'proteinas-td-martes', 'lipidos-td-martes', 'hidratos-td-martes');
                    } else if (dia == 'miercoles') {
                        datosDietaMiercoles.push(atributosPlatillo);
                        calcularTotales(datosDietaMiercoles, 'energia-td-miercoles', 'proteinas-td-miercoles', 'lipidos-td-miercoles', 'hidratos-td-miercoles');
                    } else if (dia == 'jueves') {
                        datosDietaJueves.push(atributosPlatillo);
                        calcularTotales(datosDietaJueves, 'energia-td-jueves', 'proteinas-td-jueves', 'lipidos-td-jueves', 'hidratos-td-jueves');
                    } else if (dia == 'viernes') {
                        datosDietaViernes.push(atributosPlatillo);
                        calcularTotales(datosDietaViernes, 'energia-td-viernes', 'proteinas-td-viernes', 'lipidos-td-viernes', 'hidratos-td-viernes');
                    } else if (dia == 'sabado') {
                        datosDietaSabado.push(atributosPlatillo);
                        calcularTotales(datosDietaSabado, 'energia-td-sabado', 'proteinas-td-sabado', 'lipidos-td-sabado', 'hidratos-td-sabado');
                    } else if (dia == 'domingo') {
                        datosDietaDomingo.push(atributosPlatillo);
                        calcularTotales(datosDietaDomingo, 'energia-td-domingo', 'proteinas-td-domingo', 'lipidos-td-domingo', 'hidratos-td-domingo');
                    }

                    agregarPlatilloHTML(tiempoObj, atributosPlatillo);

                    let enviar = {
                        dia: dia,
                        idTiempo: idTiempo,
                        idPlatillo: idPlatilloAAgregar,
                        opcion: 1
                    }

                    datosAEnviar.push(enviar)

                    calcularTotales(datosDieta, 'energia-td', 'proteinas-td', 'lipidos-td', 'hidratos-td');
                    console.log("DATOS ENVIAR ", datosAEnviar);
                    $('#modal-platillos').modal('hide');
                    contadoreventos++;
                }

            });
            contadoreventos++;
        }
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
                cl = 0; cm = 0; cmi = 0; cj = 0; cv = 0; cs = 0; cd = 0;
                datosDieta = [];
                datosDietaLunes = [];
                datosDietaMartes = [];
                datosDietaMiercoles = [];
                datosDietaJueves = [];
                datosDietaViernes = [];
                datosDietaSabado = [];
                datosDietaDomingo = [];

                idPacienteMenu = (e.target).getAttribute('data-idpaciente');
                idMenuAEditar = (e.target).getAttribute('data-idmenu');
                load('html/menus/editar-menu.html', contentPanel);
                let platillosLunes = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=lunes&opcion=${2}`);
                let platillosMartes = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=martes&opcion=${2}`);
                let platillosMiercoles = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=miercoles&opcion=${2}`);
                let platillosJueves = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=jueves&opcion=${2}`);
                let platillosViernes = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=viernes&opcion=${2}`);
                let platillosSabados = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=sabado&opcion=${2}`);
                let platillosDomingos = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=domingo&opcion=${2}`);

                let datosDietaJSON = post('php/menus/menuJSON.php', `id-menu=${idMenuAEditar}`);

                console.log("DIETASTRING", datosDietaJSON);
                datosDietaJSON = JSON.parse(datosDietaJSON);
                document.getElementById('fecha-inicio').value = datosDietaJSON[0].fechaMenu;




                datosDietaJSON.forEach(element => {
                    if (element.dia == 'lunes') {
                        datosDietaLunes.push(element);
                        calcularTotales(datosDietaLunes, 'energia-td-lunes', 'proteinas-td-lunes', 'lipidos-td-lunes', 'hidratos-td-lunes');
                    } else if (element.dia == 'martes') {
                        datosDietaMartes.push(element);
                        calcularTotales(datosDietaMartes, 'energia-td-martes', 'proteinas-td-martes', 'lipidos-td-martes', 'hidratos-td-martes');
                    } else if (element.dia == 'miercoles') {
                        datosDietaMiercoles.push(element);
                        calcularTotales(datosDietaMiercoles, 'energia-td-miercoles', 'proteinas-td-miercoles', 'lipidos-td-miercoles', 'hidratos-td-miercoles');
                    } else if (element.dia == 'jueves') {
                        datosDietaJueves.push(element);
                        calcularTotales(datosDietaJueves, 'energia-td-jueves', 'proteinas-td-jueves', 'lipidos-td-jueves', 'hidratos-td-jueves');
                    } else if (element.dia == 'viernes') {
                        datosDietaViernes.push(element);
                        calcularTotales(datosDietaViernes, 'energia-td-viernes', 'proteinas-td-viernes', 'lipidos-td-viernes', 'hidratos-td-viernes');
                    } else if (element.dia == 'sabado') {
                        datosDietaSabado.push(element);
                        calcularTotales(datosDietaSabado, 'energia-td-sabado', 'proteinas-td-sabado', 'lipidos-td-sabado', 'hidratos-td-sabado');
                    } else if (element.dia == 'domingo') {
                        datosDietaDomingo.push(element);
                        calcularTotales(datosDietaDomingo, 'energia-td-domingo', 'proteinas-td-domingo', 'lipidos-td-domingo', 'hidratos-td-domingo');
                    }

                    datosDieta.push(element);
                });

                console.log("DTOS DIETA", datosDieta);
                datosAEnviar = [];
                // console.log("DATOS ENVIAR ",datosAEnviar)
                calcularTotales(datosDieta, 'energia-td', 'proteinas-td', 'lipidos-td', 'hidratos-td');
                document.getElementById('platillos-lunes').innerHTML = platillosLunes;
                document.getElementById('platillos-martes').innerHTML = platillosMartes;
                document.getElementById('platillos-miercoles').innerHTML = platillosMiercoles;
                document.getElementById('platillos-jueves').innerHTML = platillosJueves;
                document.getElementById('platillos-viernes').innerHTML = platillosViernes;
                document.getElementById('platillos-sabado').innerHTML = platillosSabados;
                document.getElementById('platillos-domingo').innerHTML = platillosDomingos;

                eventoAgregarPlatillo();
                eventoEliminarPlatillos();

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



    //---------------------------------------
    //  ELIMINAR MENU
    //---------------------------------------
    const eliminarMenu = (idAEliminar, e) => {
        let respuesta = post('php/menus/eliminarMenu.php', 'menu=' + idAEliminar);
        console.log(respuesta);
        if (respuesta.trim() == 'success') {
            (((e.target).parentNode).parentNode).remove();
            swal("Menu eliminado correctamente", {
                icon: "success",
            });
        } else {
            console.log('No se elimino');
        }
    }

    const configurarEventoEliminar = () => {
        document.getElementById('menus-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-eliminar')) {
                let idAEliminar = (e.target).getAttribute('data-idmenu');
                swal({
                    title: "¿Está seguro?",
                    text: "El menu será eliminado permanentemente",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((aceptar) => {
                        if (aceptar) {
                            eliminarMenu(idAEliminar, e);
                        }
                    });


            }
        })
    }

    //-------------------------------------------------------------------
    //-------------------------------------------------------------------
    //-------------------------------------------------------------------

    let tiemposSemanales = [];
    let gruposSemanales = [];
    let alimentosSemanales = [];

    const noExisteEnTiempos = tiempo => {
        tiemposSemanales.forEach(t => {
            if (t == tiempo)
                return true;
        });

        return false;
    }

    const noExisteEnGrupos = grupo => {
        gruposSemanales.forEach(s => {
            if (s == grupo)
                return true;
        });

        return false;
    }

    const obtenerEquivalenciasSemanales = () => {
        let tiemposHEAD = '';
        let tiemposTDSemanal = '';
        let gruposHTML = '';

        tiemposHEAD += `<th scope="col">Grupos</th>`

        tiemposSemanales.forEach(element => {
            if (document.getElementById(`headSemanal${element.nombre}${element.hora}`) == null)
                tiemposHEAD += `<th scope="col" id="headSemanal${element.nombre}${element.hora}">${element.nombre} ${element.hora}</th>`;
            document.getElementById(`equivalencias-table-head-semanal`).innerHTML = tiemposHEAD;
        });

        tiemposSemanales.forEach(element => {
            if (document.getElementById(`tiempoSemanal${element.idTiempo}`) == null)
                tiemposTDSemanal += `<td class="tiempoSemanal${element.idTiempo}" id="tiempoSemanal${element.idTiempo}"></td>`;


        });

        console.log(tiemposSemanales);

        gruposSemanales.forEach(element => {
            let n = element.nombre;
            if (document.getElementById(`semanal${element.idGrupo}`) == null)
                gruposHTML += `
                    <tr id="semanal${element.idGrupo}" class="trSemanal">
                        <td> ${n} </td>
                    </tr>`;
            document.getElementById(`equivalencias-table-body-semanal`).innerHTML = gruposHTML;
        });




        let tr = document.getElementsByClassName('trSemanal')
        Array.from(tr).forEach(element => {
            element.innerHTML += tiemposTDSemanal;
        });

        console.log("ALIMENTOOOSS SEMAnales", alimentosSemanales);
        alimentosSemanales.forEach((grupoAlimentosDiarios) => {
            grupoAlimentosDiarios.forEach(alimento => {
                let cantidadAnterior = 0;
                cantidadAnterior += parseFloat(document.querySelector(`#semanal${alimento.idGrupo} .tiempoSemanal${alimento.idTiempo}`).innerHTML);

                if (document.querySelector(`#semanal${alimento.idGrupo} .tiempoSemanal${alimento.idTiempo}`).innerHTML == '')
                    document.querySelector(`#semanal${alimento.idGrupo} .tiempoSemanal${alimento.idTiempo}`).innerHTML = alimento.cantidad;
                else
                    document.querySelector(`#semanal${alimento.idGrupo} .tiempoSemanal${alimento.idTiempo}`).innerHTML = cantidadAnterior + parseFloat(alimento.cantidad);

            });
        });





    }

    const obtenerEquivalenciasPorDia = (dia) => {

        let tiempos = post('php/equivalencias.php', `id-menu=${idMenuAEditar}&opcion=2&dia=${dia}`);
        tiempos = JSON.parse(tiempos);
        console.log("Tiepos", tiempos);
        let grupos = post('php/equivalencias.php', `id-menu=${idMenuAEditar}&opcion=1&dia=${dia}`);
        grupos = JSON.parse(grupos);

        tiempos.forEach(tiempo => {
            if (noExisteEnTiempos)
                tiemposSemanales.push(tiempo);
        });

        grupos.forEach(grupo => {
            if (noExisteEnGrupos)
                gruposSemanales.push(grupo);
            if (dia == 'lunes')
                coloresLunes.push(grupo.color);
        });

        let alimentos = post('php/equivalencias.php', `id-menu=${idMenuAEditar}&opcion=3&dia=${dia}`);
        alimentos = JSON.parse(alimentos);

        if (alimentos.length > 0)
            alimentosSemanales.push(alimentos);

        // console.log("ALISMENTOS SEMANALES", alimentosSemanales);

        let tiemposHEAD = '';
        let tiemposTD = '';
        let gruposHTML = '';

        tiemposHEAD += `<th scope="col">Grupos</th>`

        tiempos.forEach(element => {
            tiemposHEAD += `<th scope="col">${element.nombre} ${element.hora}</th>`;
        });

        tiempos.forEach(element => {
            tiemposTD += `<td class="tiempo${element.idTiempo}"></td>`;
        });

        grupos.forEach(element => {
            let n = element.nombre;
            gruposHTML += `
            <tr id="${dia}${element.idGrupo}" class="tr" bgColor="255,154,154">
                <td> ${n} </td>
            </tr>`;
        });

        document.getElementById(`equivalencias-table-head-${dia}`).innerHTML = tiemposHEAD;
        document.getElementById(`equivalencias-table-body-${dia}`).innerHTML = gruposHTML;

        let tr = document.getElementsByClassName('tr')
        Array.from(tr).forEach(element => {
            element.innerHTML += tiemposTD;
        });


        alimentos.forEach(element => {
            document.querySelector(`#${dia}${element.idGrupo} .tiempo${element.idTiempo}`).innerHTML = element.cantidad;
        });

    }

    const generarEquivalencias = () => {
        let dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        dias.forEach(dia => {
            obtenerEquivalenciasPorDia(dia);
        });

        console.log("WAIR");
        obtenerEquivalenciasSemanales();
    }

    //---------------------------------------
    //  VER MENU
    //---------------------------------------
    const configurarEventoVerMenu = () => {
        document.getElementById('menus-table-body').addEventListener('click', (e) => {
            if (e.target.matches('.accion-ver')) {
                load('html/menus/ver-menu.html', contentPanel);

                idPacienteMenu = (e.target).getAttribute('data-idpaciente');
                idMenuAEditar = (e.target).getAttribute('data-idmenu');
                document.getElementById('fecha-inicio').value = (e.target).getAttribute('data-fechainicio');

                let datosDietaJSON = post('php/menus/menuJSON.php', `id-menu=${idMenuAEditar}`);

                console.log("DIETASTRING", datosDietaJSON);
                datosDietaJSON = JSON.parse(datosDietaJSON);
                document.getElementById('fecha-inicio').value = datosDietaJSON[0].fechaMenu;
                console.log("DITASJSON", datosDietaJSON);
                datosDietaJSON.forEach(element => {
                    if (element.dia == 'lunes') {
                        datosDietaLunes.push(element);
                        calcularTotales(datosDietaLunes, 'energia-td-lunes', 'proteinas-td-lunes', 'lipidos-td-lunes', 'hidratos-td-lunes');
                    } else if (element.dia == 'martes') {
                        datosDietaMartes.push(element);
                        calcularTotales(datosDietaMartes, 'energia-td-martes', 'proteinas-td-martes', 'lipidos-td-martes', 'hidratos-td-martes');
                    } else if (element.dia == 'miercoles') {
                        datosDietaMiercoles.push(element);
                        calcularTotales(datosDietaMiercoles, 'energia-td-miercoles', 'proteinas-td-miercoles', 'lipidos-td-miercoles', 'hidratos-td-miercoles');
                    } else if (element.dia == 'jueves') {
                        datosDietaJueves.push(element);
                        calcularTotales(datosDietaJueves, 'energia-td-jueves', 'proteinas-td-jueves', 'lipidos-td-jueves', 'hidratos-td-jueves');
                    } else if (element.dia == 'viernes') {
                        datosDietaViernes.push(element);
                        calcularTotales(datosDietaViernes, 'energia-td-viernes', 'proteinas-td-viernes', 'lipidos-td-viernes', 'hidratos-td-viernes');
                    } else if (element.dia == 'sabado') {
                        datosDietaSabado.push(element);
                        calcularTotales(datosDietaSabado, 'energia-td-sabado', 'proteinas-td-sabado', 'lipidos-td-sabado', 'hidratos-td-sabado');
                    } else if (element.dia == 'domingo') {
                        datosDietaDomingo.push(element);
                        calcularTotales(datosDietaDomingo, 'energia-td-domingo', 'proteinas-td-domingo', 'lipidos-td-domingo', 'hidratos-td-domingo');
                    }

                    datosDieta.push(element);
                });

                calcularTotales(datosDieta, 'energia-td', 'proteinas-td', 'lipidos-td', 'hidratos-td');

                let platillosLunes = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=lunes&opcion=${1}`);
                let platillosMartes = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=martes&opcion=${1}`);
                let platillosMiercoles = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=miercoles&opcion=${1}`);
                let platillosJueves = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=jueves&opcion=${1}`);
                let platillosViernes = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=viernes&opcion=${1}`);
                let platillosSabados = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=sabado&opcion=${1}`);
                let platillosDomingos = post('php/menus/platillosMenu.php', `id-menu=${idMenuAEditar}&dia=domingo&opcion=${1}`);

                console.log("PLATILLOS MIERCOLES", platillosMiercoles);

                document.getElementById('platillos-lunes').innerHTML = platillosLunes;
                document.getElementById('platillos-martes').innerHTML = platillosMartes;
                document.getElementById('platillos-miercoles').innerHTML = platillosMiercoles;
                document.getElementById('platillos-jueves').innerHTML = platillosJueves;
                document.getElementById('platillos-viernes').innerHTML = platillosViernes;
                document.getElementById('platillos-sabado').innerHTML = platillosSabados;
                document.getElementById('platillos-domingo').innerHTML = platillosDomingos;

                document.getElementById('equivalencias-btn').addEventListener('click', generarEquivalencias);
                document.getElementById('pdf-btn').addEventListener('click', descargarPDF)

            }

        });
    }

    //Busca menu

    const buscarMenu = () => {
        let dato = document.getElementById('buscar-menu-input').value;
        document.getElementById('menus-table-body').innerHTML = post('php/menus/dinamicaMenu.php', 'dato=' + dato);
    }

    const mostrarTodosLosMenus = () => {
        document.getElementById('menus-table-body').innerHTML = post('php/menus/consultarMenu.php', null);
    }



    const cargarEventos = () => {
        mostrarTodosLosMenus();
        configurarEventoEditar();
        configurarEventoEliminar();
        configurarEventoVerMenu();

        document.getElementById('buscar-menu-input').addEventListener('keyup', buscarMenu);
    }

    function descargarPDF() {
        let yPos = 15;
        let xPos = 15;



        var doc = new jsPDF();

        /* Encabezado*/
        doc.setFont('times');
        doc.setFontType('italic')
        // doc.addImage(imgData, 'JPEG', 20, 20, 20, 20);
        doc.text(xPos += 80, yPos += 15, 'XXXX');

        /*Lineas*/
        doc.setDrawColor(84, 173, 88);
        doc.setLineWidth(.5);
        doc.line(15, 45, doc.internal.pageSize.getWidth() - 15, 45);
        doc.line(15, 55, doc.internal.pageSize.getWidth() - 15, 55);

        //Lateral IZQ
        doc.line(5, 5, 5, doc.internal.pageSize.getHeight() - 5);
        //TOP
        doc.line(5, 5, doc.internal.pageSize.getWidth() - 5, 5);
        //Lateral DER
        doc.line(doc.internal.pageSize.getWidth() - 5, 5, doc.internal.pageSize.getWidth() - 5, doc.internal.pageSize.getHeight() - 5);
        //BAJO
        doc.line(5, doc.internal.pageSize.getHeight() - 5, doc.internal.pageSize.getWidth() - 5, doc.internal.pageSize.getHeight() - 5);
        // Color: Negro
        doc.setDrawColor(0, 0, 0);

        /*Letrero R E P O R T E   D E  .. .. ..*/

        doc.setFontType('normal');

        xPos = xPos - 5;
        yPos = yPos + 22;
        doc.text(xPos, yPos, 'Equivalencias');

        let r = 80;
        let g = 154;



        if (document.querySelector('#tabla-lunes') != null) {

           

            yPos += 12;
            doc.text('Equivalencias lunes', 15, yPos);

            doc.autoTable({
                startY: number = yPos + 8,
                html: '#tabla-lunes',
                headStyles: { fillColor: [84, 173, 88] },
                theme: 'grid',
                // bodyStyles: {0: {fillColor: [255, 173, 88]} }
                columnStyles: {
                    "0": {fillColor: [255,0,0]} 
                },
                willDrawCell: function (data) {
                    var rows = data.table.body;


                    if (data.row.index < rows.length) {
                        console.log('datakey', data.column.dataKey)
                        // doc.setTextColor(255, 255, 255);
                        doc.setFontType('bold')
                        // data.row.cells[0].styles.textColor = 'blue'
                        // data.row.cells[0].styles.fillColor = [255,0,0]
                        if(data.column.dataKey == 0) {
                            doc.setFillColor(coloresLunes[data.row.index]);
                            doc.setTextColor(255, 255, 255);
                        }

                    }


                    // console.log("ROW INDEX",data.row.index);
                }
            });

            yPos = doc.autoTableEndPosY();
        }
        // if (document.querySelector('#clientes-masVisitas-table') != null) {
        //     yPos += 12;
        //     doc.text('Top 5 Clientes con mayor número de visitas', 15, yPos);
        //     doc.autoTable(
        //         {
        //             startY: number = yPos + 5,
        //             html: '#clientes-masVisitas-table',
        //             headStyles: { fillColor: [84, 173, 88] },
        //             theme: 'grid'
        //         });
        //     yPos = doc.autoTableEndPosY();
        // }

        // if (document.querySelector('#clientes-menosVisitas-table') != null) {
        //     yPos += 12;
        //     doc.text('Top 5 Clientes con menor número de visitas', 15, yPos);
        //     doc.autoTable(
        //         {
        //             startY: number = yPos + 5,
        //             html: '#clientes-menosVisitas-table',
        //             headStyles: { fillColor: [84, 173, 88] },
        //             theme: 'grid'
        //         });
        // }
        doc.save('equivalencias.pdf');
    }

    return {

        init: () => {
            cargarEventos();
        }
    }
})();




MenusController.init();