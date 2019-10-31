const nuevoPacienteHTML = {
    template: /*html*/`
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h1 class="my-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Datos generales
                </button>
            </h1>
        </div>
    
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <form id="datos-generales-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            <div class="col-12 col-lg-4">
                                <label for="nombre" class="col-form-label">Nombre(s):</label>                            
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="paterno" class="col-form-label">Apellido paterno:</label>                            
                                <input type="text" name="paterno" id="paterno" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="materno" class="col-form-label">Apellido materno:</label>                            
                                <input type="text" name="materno" id="materno" class="form-control">
                            </div>                                                                               
                            <div class="col-12 col-lg-12">
                                <label for="genero" class="col-form-label">Genero:</label>                            
                                <input type="text" name="genero" id="genero" class="form-control">                        
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="calle" class="col-form-label">Calle:</label>                            
                                <input type="text" name="calle" id="calle" class="form-control">                        
                            </div>
                            <div class="col-12 col-lg-1">
                                <label for="numero" class="col-form-label">Número:</label>                            
                                <input type="text" name="numero" id="numero" class="form-control">                        
                            </div>
                            <div class="col-12 col-lg-2">
                                <label for="colonia" class="col-form-label">Colonia:</label>                            
                                <input type="text" name="colonia" id="colonia" class="form-control">                        
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="ciudad" class="col-form-label">Ciudad:</label>                            
                                <input type="text" name="ciudad" id="ciudad" class="form-control">                        
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="estado" class="col-form-label">Estado:</label>                            
                                <input type="text" name="estado" id="estado" class="form-control">                        
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="escolaridad" class="col-form-label">Escolaridad:</label>                            
                                <input type="text" name="escolaridad" id="escolaridad" class="form-control">                        
                            </div>                       
                            <div class="col-12 col-lg-4">
                                <label for="correo" class="col-form-label">Correo electronico:</label>                            
                                <input type="text" name="correo" id="correo" class="form-control">                        
                            </div>
                            <div class="col-12  col-lg-4">
                                <label for="telefono" class="col-form-label">Telefono:</label>                            
                                <input type="text" name="telefono" id="telefono" class="form-control">                        
                            </div>
                            <div class="col-12  col-lg-12">
                                <label for="historial" class="col-form-label">Historial:</label>                            
                                <input type="text" name="historial" id="historial" class="form-control">                        
                            </div>
                            <div class="col-12  col-lg-12">
                                <label for="observaciones" class="col-form-label">Observaciones:</label>                            
                                <textarea class="form-control" rows="3" name="observaciones" id="observaciones"></textarea>                           
                            </div>
                            
                        </div>

                    </div> 
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Guardar</button>                                                              
                    </div>
                </form>
            </div>
        </div>    
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Estilo de vida
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <form id="estilo-vida-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            <div class="col-12 col-lg-6">
                                <label for="actividad-laboral" class="col-form-label">Actividad laboral:</label>                            
                                <input type="text" name="actividad-laboral" id="actividad-laboral" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="descripcion-actividad-laboral" class="col-form-label">Descripción de la actividad laboral:</label>                            
                                <input type="text" name="descripcion-actividad-laboral" id="descripcion-actividad-laboral" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="actividades-deportivas" class="col-form-label">Actividades deportivas:</label>                            
                                <input type="text" name="actividades-deportivas" id="actividades-deportivas" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="nivel-estres" class="col-form-label">Nivel de estres:</label>                            
                                <input type="text" name="nivel-estres" id="nivel-estres" class="form-control">
                            </div>
                        </div>
                    </div>    
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Guardar</button>                                                              
                    </div>                                                         
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Historia clínica
                </button>
            </h1>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <form id="historia-clinica-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            <div class="col-12 col-lg-4">
                                <label for="motivo-consulta" class="col-form-label">Motivo de la consulta:</label>                            
                                <input type="text" name="motivo-consulta" id="motivo-consulta" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="terapeutica-previa" class="col-form-label">Terapéutica previa:</label>                            
                                <input type="text" name="terapeutica-previa" id="terapeutica-previa" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="cirugias" class="col-form-label">Cirugías realizadas:</label>                            
                                <input type="text" name="cirugias" id="cirugias" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="tipo-sangre" class="col-form-label">Tipo de sangre:</label>                            
                                <input type="text" name="tipo-sangre" id="tipo-sangre" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="alergias" class="col-form-label">Alergias:</label>                            
                                <input type="text" name="alergias" id="alergias" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="diagnostico-previo" class="col-form-label">Diagnostico previo:</label>                            
                                <input type="text" name="diagnostico-previo" id="diagnostico-previo" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="vacunas" class="col-form-label">Vacunas(inmunizaciones):</label>                            
                                <input type="text" name="vacunas" id="vacunas" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="antecedentes-heredo" class="col-form-label">Antecedentes heredo-familiares:</label>                            
                                <input type="text" name="antecedentes-heredo" id="antecedentes-heredo" class="form-control">
                            </div>
                        </div>
                        
                    </div>   
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Guardar</button>                                                              
                    </div>                                                   
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Etiquetas de paciente
                </button>
            </h1>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <form id="etiquetas-paciente-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4 col-md-4 col-lg-4 d-flex flex-column">
                                <div class="">
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Ácido úrico alto
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Accidente vascular cerebral
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Adicción a drogas o alcohol
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Anorexia
                                    </label>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 d-flex flex-column">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Diabetes mellitus I
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Diabetes mellitus II
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Cáncer
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Bulimia
                                    </label>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-lg-4 d-flex flex-column">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Deportista
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Embarazada
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        DEnfermedad crónica
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="">
                                    <label class="form-check-label" for="">
                                        Enfermedad genética
                                    </label>
                                </div>
                            </div>
                            
                        </div>   
                    </div>    
                    <div class="text-right">
                            <button class="btn btn-success" type="submit">Guardar</button>                                                              
                        </div>            
                </form>                                                
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Hábitos toxicos
                </button>
            </h1>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
                <form id="habitos-toxicos-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            
                        </div>
                    </div>                                                             
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSix">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Plan alimenticio
                </button>
            </h1>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <form>
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            
                        </div>
                    </div>                                                             
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSeven">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                Mediciones básicas
                </button>
            </h1>
        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
            <div class="card-body">
                <form id="mediciones-basicas-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            <div class="col-12 col-lg-12">
                                <label for="estatura" class="col-form-label">Estatura:</label>                            
                                <input type="text" name="estatura" id="estatura" class="form-control">                            
                                <label for="peso" class="col-form-label">Peso:</label>                            
                                <input type="text" name="peso" id="peso" class="form-control">                            
                                <label for="factor-actividad" class="col-form-label">Factor de actividad:</label>                            
                                <input type="text" name="factor-actividad" id="factor-actividad" class="form-control">
                                <div class="m-4">
                                    <input class="form-check-input " type="checkbox" id="embarazo" name="embarazo">
                                    <label class="form-check-label " for="embarazo">
                                        Embarazo
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>      
                    <div class="text-right">
                            <button class="btn btn-success" type="submit">Guardar</button>                                                              
                        </div>                                                          
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingEight">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                Bioimpedancia
                </button>
            </h1>
        </div>
        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
            <div class="card-body">
                <form id="bioimpedancia-paciente-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            <div class="col-12 col-lg-4">
                                <label for="grasa-total" class="col-form-label">Grasa total:</label>                            
                                <input type="text" name="grasa-total" id="grasa-total" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="grasa-superior" class="col-form-label">Grasa en sección superior:</label>                            
                                <input type="text" name="grasa-superior" id="grasa-superior" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="grasa-inferior" class="col-form-label">Grasa en sección inferior:</label>
                                <input type="text" name="grasa-inferior" id="grasa-inferior" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="grasa-visceral" class="col-form-label">Grasa visceral:</label>
                                <input type="text" name="grasa-visceral" id="grasa-visceral" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="masa-libre-grasa" class="col-form-label">Masa libre de grasa:</label>                            
                                <input type="text" name="masa-libre-grasa" id="masa-libre-grasa" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="masa-muscular" class="col-form-label">Masa muscular:</label>                            
                                <input type="text" name="masa-muscular" id="masa-muscular" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="peso-oseo" class="col-form-label">Peso óseo:</label>                            
                                <input type="text" name="peso-oseo" id="peso-oseo" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="agua-corporal" class="col-form-label">Agua corporal:</label>                            
                                <input type="text" name="agua-corporal" id="agua-corporal" class="form-control">
                            </div>
                            <div class="col-12 col-lg-4">
                                <label for="edad-metabolica" class="col-form-label">Edad metabólica:</label>
                                <input type="text" name="edad-metabolica" id="edad-metabolica" class="form-control">                                
                            </div>
                        </div>
                    </div>    
                    <div class="text-right">
                            <button class="btn btn-success" type="submit">Guardar</button>                                                              
                        </div>                                                            
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingNine">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                Pliegues
                </button>
            </h1>
        </div>
        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
            <div class="card-body">
                <form id="pliegues-form" onsubmit="return false" method="post"> 
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            <div class="col-12 col-lg-6">
                                <label for="subescapular" class="col-form-label">Subescapular:</label>
                                <input type="text" name="subescapular" id="subescapular" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="triceps" class="col-form-label">Tríceps:</label>
                                <input type="text" name="triceps" id="triceps" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="biceps" class="col-form-label">Bíceps:</label>
                                <input type="text" name="biceps" id="biceps" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="ileocrestal" class="col-form-label">Ileocrestal:</label>
                                <input type="text" name="ileocrestal" id="ileocrestal" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="suprailiaco" class="col-form-label">Supraíliaco:</label>
                                <input type="text" name="suprailiaco" id="suprailiaco" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="abdominal" class="col-form-label">Abdominal:</label>
                                <input type="text" name="abdominal" id="abdominal" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="muslo-frontal" class="col-form-label">Múslo frontal:</label>
                                <input type="text" name="muslo-frontal" id="muslo-frontal" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="pantorrilla-medial" class="col-form-label">Pantorrilla medial:</label>
                                <input type="text" name="pantorrilla-medial" id="pantorrilla-medial" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="axilar-medial" class="col-form-label">Axilar medial:</label>
                                <input type="text" name="axilar-medial" id="axilar-medial" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="pectoral" class="col-form-label">Pectoral:</label>
                                <input type="text" name="pectoral" id="pectoral" class="form-control">                                
                            </div>
                        </div>
                    </div>   
                    <div class="text-right">
                            <button class="btn btn-success" type="submit">Guardar</button>                                                              
                        </div>                                                             
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTen">
            <h1 class="my-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                Perímetros
                </button>
            </h1>
        </div>
        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
            <div class="card-body">
                <form id="perimetros-form" onsubmit="return false" method="post">
                    <div class="container-fluid">
                        <div class="row form-group">                                        
                            <div class="col-12 col-lg-6">
                                <label for="cefalico" class="col-form-label">Cefálico:</label>
                                <input type="text" name="cefalico" id="cefalico" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="cuello" class="col-form-label">Cuello:</label>
                                <input type="text" name="cuello" id="cuello" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="mitad-brazo-relajado" class="col-form-label">Mitad del brazo relajado:</label>
                                <input type="text" name="mitad-brazo-relajado" id="mitad-brazo-relajado" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="mitad-brazo-contraido" class="col-form-label">Mitad del brazo contraido:</label>
                                <input type="text" name="mitad-brazo-contraido" id="mitad-brazo-contraido" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="antebrazo" class="col-form-label">Antebrazo:</label>
                                <input type="text" name="antebrazo" id="antebrazo" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="muñeca" class="col-form-label">Muñeca:</label>
                                <input type="text" name="muñeca" id="muñeca" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="mesoesternal" class="col-form-label">Mesoesternal:</label>
                                <input type="text" name="mesoesternal" id="mesoesternal" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="umbilical" class="col-form-label">Umbilical:</label>
                                <input type="text" name="umbilical" id="umbilical" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="cintura" class="col-form-label">Cintura:</label>
                                <input type="text" name="cintura" id="cintura" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="cadera" class="col-form-label">Cadera:</label>
                                <input type="text" name="cadera" id="cadera" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="muslo" class="col-form-label">Múslo (1cm):</label>
                                <input type="text" name="muslo" id="muslo" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="muslo-medio" class="col-form-label">Múslo medio:</label>
                                <input type="text" name="muslo-medio" id="muslo-medio" class="form-control">                                
                            </div>
                            <div class="col-12 col-lg-12">
                                <label for="pantorrilla" class="col-form-label">Pantorrilla:</label>
                                <input type="text" name="pantorrilla" id="pantorrilla" class="form-control">                                
                            </div>
                        </div>
                    </div>     
                    <div class="text-right">
                            <button class="btn btn-success" type="submit">Guardar</button>                                                              
                        </div>                                                           
                </form>
            </div>
        </div>
    </div>  
</div>
`
};