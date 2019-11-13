<?php 
    include 'conexion.php';

    $value = $_POST['value'];
    $id = $_POST['id'];

    try{
        if($value == 1){
            // DATOS GENERALES
            $generales = $conn->prepare("SELECT * FROM Pacientes WHERE ID_PACIENTES = ".$id);

            $generales = new \stdClass();

            foreach($conn->query($datos) as $row){
                $generales->nombre = $row['Nombre_P'];
                $generales->paterno = $row['AP_P'];
                $generales->materno = $row['AM_P'];
                $generales->escolaridad = $row['Escolaridad'];
                $generales->genero = $row['Genero'];

                $diaN = $row['Dia_N'];
                $mesN = $row['Mes_N'];
                $añoN = $row['Anio_N'];
                $generales->fechaNacimiento = $diaN."/".$mesN."/".$añoN;
                
                $generales->calle = $row['Calle_P'];
                $generales->numero = $row['Num_P'];
                $generales->colonia = $row['Col_P'];
                $generales->ciudad = $row['Ciudad'];
                $generales->estado = $row['Estado'];
                $generales->telefono = $row['Telefono'];
                $generales->correo = $row['Correo'];
                $generales->historial = $row['Historial_P'];
                
                $diaC = $row['Dia_C'];
                $mesC = $row['Mes_C'];
                $añoC = $row['Anio_C'];
                $generales->fechaConsulta = $diaC."/".$mesC."/".$añoC;

                $diaSC = $row['Dia_SC'];
                $mesSC = $row['Mes_SC'];
                $añoSC = $row['Anio_SC'];
                $generales->fechaSiguienteConsulta = $diaSC."/".$mesSC."/".$añoSC;
                
                $generales->observaciones = $row['Observaciones'];
            }
            $generalesJSON = json_encode($generales);
            echo $generalesJSON;

        } else if($value == 2){
            // ESTILO DE VIDA
            $estilo = $conn->prepare("SELECT * FROM estilo_vida WHERE ID_PACIENTES = ".$id);

            $estilo = new \stdClass();

            foreach($conn->query($estilo) as $row){
                $estilo->laboral = $row['Act_Laboral'];
                $estilo->descripcion = $row['escripcion_Act_Lab'];
                $estilo->deportivas = $row['Deportes'];
                $estilo->estres = $row['Estres'];
            }
            $estiloJSON = json_encode($estilo);
            echo $estiloJSON;

        } else if($value == 3){
            // HISTORIA CLINICA
            $historia = $conn->prepare("SELECT * FROM historia_clinica WHERE ID_PACIENTES = ".$id);

            $historia = new \stdClass();

            foreach($conn->query($historia) as $row){
                $historia->$motivo = $row['Motivo_Consulta'];
                $historia->$previa = $row['Terapeuta_Previa'];
                $historia->$cirugias = $row['Cirugias_Realizadas'];
                $historia->$sangre = $row['Tipo_Sangre'];
                $historia->$alergias = $row['Alergias'];
                $historia->$diagnostico = $row['Diagnostivo_Previo'];
                $historia->$vacunas = $row['Vacunas'];
                $historia->$antecedentes = $row['Antecedentes_Familiares'];
            }
            $historiaJSON = json_encode($historia);
            echo $historiaJSON;

        } else if($value == 4){
            // ETIQUETAS DE PACIENTE
        } else if($value == 5){
            // HABITOS TOXICOS
            $toxicos = $conn->prepare("SELECT * FROM habitos_toxicos WHERE ID_PACIENTES = ".$id);

            $toxicos = new \stdClass();

            foreach($conn->query($toxicos) as $row){
                $toxicos->fCigarro = $row['Frecuencia_Cigarro'];
                $toxicos->cCigarro = $row['Cantidad_Cigarro'];
                $toxicos->fAlcohol = $row['Frecuencia_Alcohol'];
                $toxicos->cAlcohol = $row['Cantidad_Alcohol'];
                $toxicos->fDrogas = $row['Frecuencia_Drogas'];
                $toxicos->cDrogas = $row['Cantidad_Drogas'];
            }
            $toxicosJSON = json_encode($toxicos);
            echo $toxicosJSON;
            
        } else if($value == 6){
            // PLAN ALIMENTICIO
            $plan = $conn->prepare("SELECT * FROM plan_alimenticio WHERE ID_PACIENTES = ".$id);

            $plan = new \stdClass();

            foreach($conn->query($plan) as $row){
                $plan->plan = $row['Descripcion'];
            }
            $planJSON = json_encode($plan);
            echo $planJSON;

        } else if($value == 7){
            // MEDICIONES BASICAS
            $mediciones = $conn->prepare("SELECT * FROM mediciones_basicas WHERE ID_PACIENTES = ".$id);

            $mediciones = new \stdClass();

            foreach($conn->query($mediciones) as $row){
                $mediciones->estatura = $row['Estatura'];
                $mediciones->peso = $row['Peso'];
                $mediciones->factor = $row['Factor_Act'];
                $mediciones->embarazo = $row['Embarazo'];
            }
            $medicionesJSON = json_encode($mediciones);
            echo $medicionesJSON;

        } else if($value == 8){
            // BIOIMPEDANCIA
            $bioimpedancia = $conn->prepare("SELECT * FROM bioimpedancia WHERE ID_PACIENTES = ".$id);

            $bioimpedancia = new \stdClass();

            foreach($conn->query($bioimpedancia) as $row){
                $bioimpedancia->total = $row['Grasa_Total'];
                $bioimpedancia->superior = $row['Grasa_Superior'];
                $bioimpedancia->inferior = $row['Grasa_Inferior'];
                $bioimpedancia->viseral = $row['Grasa_Viseral'];
                $bioimpedancia->libre = $row['Masa_Libre_Grasa'];
                $bioimpedancia->muscular = $row['Masa_Muscular'];
                $bioimpedancia->oseo = $row['Peso_Oseo'];
                $bioimpedancia->agua = $row['Agua_Corporal'];
                $bioimpedancia->edad = $row['Edad_Metabolica'];
            }
            $bioimpedanciaJSON = json_encode($bioimpedancia);
            echo $bioimpedanciaJSON;

        } else if($value == 9){
            // PLIEGUES
            $pliegues = $conn->prepare("SELECT * FROM pliegues WHERE ID_PACIENTES = ".$id);

            $pliegues = new \stdClass();

            foreach($conn->query($pliegues) as $row){
                $pliegues->subes = $row['Subescapular'];
                $pliegues->tricep = $row['Triceps'];
                $pliegues->bicep = $row['Biceps'];
                $pliegues->crestal = $row['Ileocrestal'];
                $pliegues->supra = $row['Suprailiaco'];
                $pliegues->abdomianl = $row['Abdominal'];
                $pliegues->frontal = $row['muslo_Frontal'];
                $pliegues->medial = $row['Pantorrilla_Medial'];
                $pliegues->axiliar = $row['Axiliar_Medial'];
                $pliegues->pectoral = $row['Pectoral'];
            }
            $plieguesJSON = json_encode($pliegues);
            echo $plieguesJSON;

        } else if($value == 10){
            // PERIMETROS
            $perimetros = $conn->prepare("SELECT * FROM perimetros WHERE ID_PACIENTES = ".$id);

            $perimetros = new \stdClass();

            foreach($conn->query($perimetros) as $row){
                $perimetros->cefalico = $row['Cefalico'];
                $perimetros->cuello = $row['Cuello'];
                $perimetros->relajado = $row['Brazo_Relajado'];
                $perimetros->contraido = $row['Brazo_Contraido'];
                $perimetros->antebrazo = $row['Antebrazo'];
                $perimetros->muñeca = $row['Muneca'];
                $perimetros->meseo = $row['Meseoesternal'];
                $perimetros->umbilical = $row['Umbilical'];
                $perimetros->cintura = $row['Cintura'];
                $perimetros->caderas = $row['Caderas'];
                $perimetros->muslo = $row['Muslo'];
                $perimetros->medio = $row['Muslo_Medio'];
                $perimetros->pantorrilla = $row['Pantorrilla'];
            }
            $perimetrosJSON = json_encode($perimetros);
            echo $perimetrosJSON;

        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>