
const Bar = { template: '<div>bar</div>' }

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
  { path: '/', component: PacientesHTML },
  { path: '/platillos', component: PlatillosHTML },
  { path: '/nuevo-paciente', component: nuevoPacienteHTML}
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
  routes // short for `routes: routes`
})

// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
const app = new Vue({
  router
}).$mount('#app')

const postForm = (url, formToSend) => {
  var req = new XMLHttpRequest();
  req.open("POST", url, false);
  req.send(formToSend);
  return req.responseText;
}

const post = (url, data) => {
  var req = new XMLHttpRequest();
  req.open("POST", url, false);
  req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  req.send(data);
  return req.responseText;
}
