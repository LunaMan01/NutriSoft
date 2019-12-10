const load = (url, element) => {
  let req = new XMLHttpRequest();
  req.open("GET", url, false);
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  req.send(null);
  element.innerHTML = req.responseText;
}

const postForm = (url, formToSend) => {
  var req = new XMLHttpRequest();
  req.open("POST", url, false);
  req.send(formToSend);
  return req.responseText;
}

const post = (url, data) => {
  var req = new XMLHttpRequest();
  req.open("POST", url, false);
  // req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  req.send(data);
  return req.responseText;
}

function isEmpty(string) {
  string = string.trim();
  return (!string || 0 === string.length);
}






const contentPanel = document.querySelector('.content');

const HTMLRoutes = {
  pacientes: 'html/pacientes/pacientes.html',
  alimentos: 'html/alimentos/alimentos.html',
  platillos: 'html/platillos/platillos.html',
  grupoAlimentos: 'html/grupos-alimentos/grupos-alimentos.html',
  tiemposComidas: 'html/tiempo-comida/tiempo-comida.html',
  menus: 'html/menus/menus.html',
  preparacion: 'html/preparacion/preparacion.html'
};


const UIController = (() => {

  const addControllerScript = (scriptId, scripSrc) => {
    if (document.getElementById(scriptId) == null) {
      let script = document.createElement('script');
      script.setAttribute('src', scripSrc);
      script.setAttribute('id', scriptId);
      document.head.appendChild(script);
    }
  }

  const changeActiveItem = (elementId) => {
    document.querySelector('.active').classList.remove('active');
    document.getElementById(elementId).classList.add('active');
  }

  return {

    abrirPacientes: () => {
      load(HTMLRoutes.pacientes, contentPanel);
      changeActiveItem('li-pacientes');
      addControllerScript('pacientes-controller', 'js/Controllers/PacienteController.js');
      if (typeof PacientesController !== 'undefined') {
        PacientesController.init();
      }
    },

    abrirAlimentos: () => {
      load(HTMLRoutes.alimentos, contentPanel);
      changeActiveItem('li-alimentos');
      addControllerScript('alimentos-controller', 'js/Controllers/AlimentosController.js');
      if (typeof AlimentosController !== 'undefined') {
        AlimentosController.init();
      }
    },

    abrirPlatillos: () => {
      load(HTMLRoutes.platillos, contentPanel);
      changeActiveItem('li-platillos');
      addControllerScript('platillos-controller', 'js/Controllers/PlatillosController.js');
      if (typeof PlatillosController !== 'undefined') {
        PlatillosController.init();
      }
    },

    
    abrirPreparacion: () => {
      load(HTMLRoutes.preparacion, contentPanel);
      changeActiveItem('li-preparacion');
      addControllerScript('preparacion-controller', 'js/Controllers/PreparacionController.js');
      if (typeof PreparacionController !== 'undefined') {
        PreparacionController.init();
      }
    },

    abrirGruposAlimentos: () => {
      load(HTMLRoutes.grupoAlimentos, contentPanel);
      changeActiveItem('li-grupos-alimentos');
      addControllerScript('gpsalimentos-controller', 'js/Controllers/GpsAlimentosController.js');
      if (typeof GruposAlimentosController !== 'undefined') {
        GruposAlimentosController.init();
      }
    },

    abrirMenus: () => {
      load(HTMLRoutes.menus, contentPanel);
      changeActiveItem('li-menus');
      addControllerScript('menus-controller', 'js/Controllers/MenusController.js');
      if (typeof MenusController !== 'undefined') {
        MenusController.init();
      }
    },

    abrirTiemposComida: () => {
      load(HTMLRoutes.tiemposComidas, contentPanel);
      changeActiveItem('li-tiempos');
      addControllerScript('tiempos-controller', 'js/Controllers/TiemposController.js');
      if (typeof TiemposController !== 'undefined') {
        TiemposController.init();
      }
      // addControllerScript('menus-controller', 'js/Controllers/MenusController.js');
      // if (typeof MenusController !== 'undefined') {
      //   MenusController.init();
      // }
    }

  }
})();




const controller = (() => {
  const cargarPlatillos = () => {
    let respuesta = post('php/platillosModal.php', null);
    document.getElementById('platillos-table-modal').innerHTML = respuesta;
  }

  const cargarTiempos = () => {
    let respuesta = post('php/tiemposModal.php', null);
    console.log(respuesta);
    document.getElementById('select-tiempo').innerHTML = respuesta;
  }

  const setUpEvents = () => {
    document.getElementById('pacientes-link').addEventListener('click', UIController.abrirPacientes);
    document.getElementById('alimentos-link').addEventListener('click', UIController.abrirAlimentos);
    document.getElementById('platillos-link').addEventListener('click', UIController.abrirPlatillos);
    document.getElementById('grupo-alimentos-link').addEventListener('click', UIController.abrirGruposAlimentos);
    document.getElementById('tiempos-link').addEventListener('click', UIController.abrirTiemposComida);
    document.getElementById('menus-link').addEventListener('click', UIController.abrirMenus);
    document.getElementById('preparacion-link').addEventListener('click', UIController.abrirPreparacion);
  }

  return {
    init: () => {
      UIController.abrirPacientes();
      setUpEvents();
      cargarPlatillos();
      cargarTiempos();
    }
  }

})(UIController);

const mostrarMensaje = (mensaje, tipo) => {
  swal(mensaje, {
    icon: tipo,
  });
  
}

const preparacionEliminada = (mensaje,tipo) => {
  swal(mensaje, {
    icon: tipo,
  });
  console.log('entros');
  setTimeout(function() {
    UIController.abrirPreparacion();
  }, 1000)
  
}
controller.init();

