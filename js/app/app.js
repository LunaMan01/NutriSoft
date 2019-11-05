const load = (url, element) => {
  let req = new XMLHttpRequest();
  req.open("GET", url, false);
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


  }
})();




const controller = (() => {

  const setUpEvents = () => {
    document.getElementById('pacientes-link').addEventListener('click', UIController.abrirPacientes);

  }

  return {
    init: () => {
      UIController.abrirPacientes();
      setUpEvents();
    }
  }

})(UIController);

controller.init();