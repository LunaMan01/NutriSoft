const PacientesHTML = {
    template:/*html*/ `
<div>
 <div class="row align-items-center  justify-content-between pacientes-cabecera">
                    <div class="col-md-12  text-center">
                        <span class="slogan text-white">"Nutre tu vida para que la vida te nutra"</span>
                        <hr>
                    </div>
                    <div class="col-lg-7">


                        <div class="pb-4">
                            <span class="font-weight-bold t text-white">Pacientes</span>

                        </div>
                    </div>
                    <div class="col-lg-1  d-flex pb-4  align-items-center">

                        <router-link class="btn btn-success d-flex p-2" to='/nuevo-paciente'>
                            <i class="material-icons">add</i>
                            Nuevo
                        </router-link>
                    </div>
                    <div class="col-lg-4  ml-lg-0 d-flex align-items-center justify-content-end text-right pb-4">
                        <input type="text" class="form-control rounded-pill" placeholder="Burcar...">

                    </div>
                </div>

                <div class="row mt-5 card-pacientes">

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Correo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-sm-flex flex-sm-column d-md-inline">
                                            <img src="img/perfil.jpg" alt="Rosy Michel"
                                                class="img-fluid mr-1 rounded rounded-circle" style="width: 50px;">
                                            Rosy Michel
                                        </div>
                                    </th>
                                    <td>3414209734</td>
                                    <td>michel91_3@hotmail.com</td>

                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-sm-flex flex-sm-column d-md-inline">
                                            <img src="img/perfil.jpg" alt="Rosy Michel"
                                                class="img-fluid mr-1 rounded rounded-circle" style="width: 50px;">
                                            Rosy Michel
                                        </div>
                                    </th>
                                    <td>3414209734</td>
                                    <td>michel91_3@hotmail.com</td>

                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-sm-flex flex-sm-column d-md-inline">
                                            <img src="img/perfil.jpg" alt="Rosy Michel"
                                                class="img-fluid mr-1 rounded rounded-circle" style="width: 50px;">
                                            Rosy Michel
                                        </div>
                                    </th>
                                    <td>3414209734</td>
                                    <td>michel91_3@hotmail.com</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
</div>
</div>
`};