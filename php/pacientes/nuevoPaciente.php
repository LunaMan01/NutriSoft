<?php 
    include '../conexion.php';

    $value = $_POST['value'];
    $fechaNacimiento = $_POST['fecha-nacimiento'];
    $fechaConsulta = $_POST['fecha-consulta'];
    $fechaSiguineteConsulta = $_POST['fecha-siguiente-consulta'];

    $fechaN = explode("/", $fechaNacimiento);
    $fechaC = explode("/", $fechaConsulta);
    $fechaSC = explode("/", $fechaSiguineteConsulta);

    try{        
        if($value == 1){
            // DATOS GENERALES
            $generales = $conn->prepare("INSERT INTO pacientes (Nombre_P, AP_P, AM_P, Escolaridad, Genero, Dia_N, Mes_N, Anio_N, Calle_P, Num_P, Col_P, Ciudad, Estado, Telefono, Correo, Historial_P, Dia_C, Mes_C, Anio_C, Dia_SC, Mes_SC, Anio_SC, Observaciones)
                VALUES (:nombre, :apellidoP, :apellidoM, :escolaridad, :genero, :diaNa, :mesNa, :anioNa, :calle, :numero, :colonia, :ciudad, :estado, :telefono, :correo, :historial, :diaCon, :mesCon, :anioCon, :diaSiCon, :mesSiCon, :anioSiCon, :observaciones)");
            $generales->bindParam(':nombre', $_POST['nombre']);
            $generales->bindParam(':apellidoP', $_POST['paterno']);
            $generales->bindParam(':apellidoM', $_POST['materno']);
            $generales->bindParam(':escolaridad', $_POST['escolaridad']);
            $generales->bindParam(':genero', $_POST['genero']);            
            $generales->bindParam(':diaNa', $fechaN[0]);            
            $generales->bindParam(':mesNa', $fechaN[1]);            
            $generales->bindParam(':anioNa', $fechaN[2]);
            $generales->bindParam(':calle', $_POST['calle']);
            $generales->bindParam(':numero', $_POST['numero']);            
            $generales->bindParam(':colonia', $_POST['colonia']);
            $generales->bindParam(':ciudad', $_POST['ciudad']);
            $generales->bindParam(':estado', $_POST['estado']);
            $generales->bindParam(':telefono', $_POST['telefono']);
            $generales->bindParam(':correo', $_POST['correo']);
            $generales->bindParam(':historial', $_POST['historial']);
            $generales->bindParam(':diaCon', $fechaC[0]);
            $generales->bindParam(':mesCon', $fechaC[1]);
            $generales->bindParam(':anioCon', $fechaC[2]);
            $generales->bindParam(':diaSiCon', $fechaSC[0]);
            $generales->bindParam(':mesSiCon', $fechaSC[1]);
            $generales->bindParam(':anioSiCon', $fechaSC[2]);
            $generales->bindParam(':observaciones', $_POST['observaciones']);

            $generales->execute();
            setcookie("Id", $conn->lastInsertId(), time() + (86400), "/");
        } else if($value == 2){
            // ESTILO DE VIDA
            $lastIdPaciente = $_COOKIE['Id'];
            
            $vida = $conn->prepare("INSERT INTO estilo_vida (ID_PACIENTES, Act_Laboral, Descripcion_Act_Lab, Deportes, Estres)
                VALUES(:id, :actividad, :descripcion, :deportes, :estres)");

            $vida->bindParam(':id', $lastIdPaciente);
            $vida->bindParam(':actividad', $_POST['actividad-laboral']);
            $vida->bindParam(':descripcion', $_POST['descripcion-actividad-laboral']);
            $vida->bindParam(':deportes', $_POST['actividades-deportivas']);
            $vida->bindParam(':estres', $_POST['nivel-estres']);

            $vida->execute();
        } else if($value == 3){
            // HISTORIA CLINICA
            $lastIdPaciente = $_COOKIE['Id'];

            $clinica = $conn->prepare("INSERT INTO historia_clinica (ID_PACIENTES, Motivo_Consulta, Terapeuta_Previa, Cirugias_Realizadas, Tipo_Sangre, Alergias, Diagnostico_Previo, Vacunas, Antecedentes_Familiares) 
                VALUES (:id, :motivo, :terapeuta, :cirugias, :sangre, :alergias, :diagnostico, :vacunas, :antecedentes)");

            $clinica->bindParam(':id', $lastIdPaciente);
            $clinica->bindParam(':motivo', $_POST['motivo-consulta']);
            $clinica->bindParam(':terapeuta', $_POST['terapeutica-previa']);
            $clinica->bindParam(':cirugias', $_POST['cirugias']);
            $clinica->bindParam(':sangre', $_POST['tipo-sangre']);
            $clinica->bindParam(':alergias', $_POST['alergias']);
            $clinica->bindParam(':diagnostico', $_POST['diagnostico-previo']);
            $clinica->bindParam(':vacunas', $_POST['vacunas']);
            $clinica->bindParam(':antecedentes', $_POST['antecedentes-heredo']);

            $clinica->execute();
        } else if($value == 4){
            // ETIQUETAS DE PACIENTE
            // $etiquetas = $conn->prepare("");

            // $etiquetas->bindParam(':', $_POST['']);

            // $etiquetas->execute();
        } else if($value == 5){
            // HABITOS TOXICOS
            $cigarro = cigarro();
            $alcohol = alcohol();
            $drogas = drogas(); 

            $habitos = $conn->prepare("INSERT INTO habitos_toxicos (ID_Pacientes, Frecuencia_Cigarro, Cantidad_Cigarro, Frecuencia_Alcohol, Cantidad_Alcohol, Frecuencia_Drogas, Cantidad_Drogas)
                VALUES (:id, :freC, :canC, :freA, :canA, :freD, :canD)");

            $habitos->bindParam('id', $lastIdPaciente);
            $habitos->bindParam('freC', $cigarro);
            $habitos->bindParam('canC', $_POST['cantidad-cigarro']);
            $habitos->bindParam('freA', $alcohol);
            $habitos->bindParam('canA', $_POST['cantidad-alcohol']);
            $habitos->bindParam('freD', $drogas);
            $habitos->bindParam('canD', $_POST['cantidad-drogas']);

            $habitos->execute();
        } else if($value == 6){
            // PLAN ALIMENTICIO
            $plan = $conn->prepare("INSERT INTO plan_alimenticio (Descripcion)
                VALUES (:descripcion)");

            $plan->bindParam('descripcion', $_POST['plan-alimenticio']);

            $plan->execute();
        } else if($value == 7){
            // MEDICIONES BASICAS
            $lastIdPaciente = $_COOKIE['Id'];

            $mediciones = $conn->prepare("INSERT INTO mediciones_basicas (ID_PACIENTES, Estatura, Peso, Factor_Act, Embarazo)
                VALUES (:id, :estatura, :peso, :actividad, :embarazo)");

            $mediciones->bindParam(':id', $lastIdPaciente);
            $mediciones->bindParam(':estatura', $_POST['estatura']);
            $mediciones->bindParam(':peso', $_POST['peso']);
            $mediciones->bindParam(':actividad', $_POST['factor-actividad']);
            $emb = 0;
            if(empty($_POST['embarazo']))
                $mediciones->bindParam(':embarazo', $emb);
            else{
                $emb = 1;
                $mediciones->bindParam(':embarazo', $emb);
            }

            $mediciones->execute();
        } else if($value == 8){
            // BIOIMPEDANCIA
            $lastIdPaciente = $_COOKIE['Id'];

            $bioimpedancia = $conn->prepare("INSERT INTO bioimpedancia (ID_PACIENTES, Grasa_Total, Grasa_Superior, Grasa_Inferior, Grasa_Viseral, Masa_Libre_Grasa, Masa_Muscular, Peso_Oseo, Agua_Corporal, Edad_Metabolica)
                VALUES (:id, :total, :superior, :inferior, :viseral, :libre, :muscular, :oseo, :agua, :edad)");

            $bioimpedancia->bindParam(':id', $lastIdPaciente);
            $bioimpedancia->bindParam(':total', $_POST['grasa-total']);
            $bioimpedancia->bindParam(':superior', $_POST['grasa-superior']);
            $bioimpedancia->bindParam(':inferior', $_POST['grasa-inferior']);
            $bioimpedancia->bindParam(':viseral', $_POST['grasa-visceral']);
            $bioimpedancia->bindParam(':libre', $_POST['masa-libre-grasa']);
            $bioimpedancia->bindParam(':muscular', $_POST['masa-muscular']);
            $bioimpedancia->bindParam(':oseo', $_POST['peso-oseo']);
            $bioimpedancia->bindParam(':agua', $_POST['agua-corporal']);
            $bioimpedancia->bindParam(':edad', $_POST['edad-metabolica']);

            $bioimpedancia->execute();
        } else if($value == 9){
            // PLIEGUES
            $lastIdPaciente = $_COOKIE['Id'];

            $pliegues = $conn->prepare("INSERT INTO pliegues (ID_PACIENTES, Subescapular, Triceps, Biceps, Ileocrestal, Suprailiaco, Abdominal, muslo_Frontal, Pantorrilla_Medial, Axiliar_Medial, Pectoral)
                VALUES (:id, :subescapular, :tricep, :bicep, :ileocrestal, :suprailiaco, :abdominal, :frontal, :medial, :axiliar, :pectoral)");

            $pliegues->bindParam(':id', $lastIdPaciente);
            $pliegues->bindParam(':subescapular', $_POST['subescapular']);
            $pliegues->bindParam(':tricep', $_POST['triceps']);
            $pliegues->bindParam(':bicep', $_POST['biceps']);
            $pliegues->bindParam(':ileocrestal', $_POST['ileocrestal']);
            $pliegues->bindParam(':suprailiaco', $_POST['suprailiaco']);
            $pliegues->bindParam(':abdominal', $_POST['abdominal']);
            $pliegues->bindParam(':frontal', $_POST['muslo-frontal']);
            $pliegues->bindParam(':medial', $_POST['pantorrilla-medial']);
            $pliegues->bindParam(':axiliar', $_POST['axilar-medial']);
            $pliegues->bindParam(':pectoral', $_POST['pectoral']);

            $pliegues->execute();
        } else if($value == 10){
            // PERIMETROS
            $lastIdPaciente = $_COOKIE['Id'];
            
            $perimetros = $conn->prepare("INSERT INTO perimetros (ID_PACIENTES, Cefalico, Cuello, Brazo_Relajado, Brazo_Contraido, Antebrazo, Muneca, Meseoesternal, Umbilical, Cintura, Caderas, Muslo, Muslo_Medio, Pantorrilla)
                VALUES (:id, :cefalico, :cuello, :relajado, :contraido, :antebrazo, :muneca, :meseoesternal, :umbilical, :cintura, :caderas, :muslo, :medio, :pantorrilla)");

            $perimetros->bindParam(':id', $lastIdPaciente);
            $perimetros->bindParam(':cefalico', $_POST['cefalico']);
            $perimetros->bindParam(':cuello', $_POST['cuello']);
            $perimetros->bindParam(':relajado', $_POST['mitad-brazo-relajado']);
            $perimetros->bindParam(':contraido', $_POST['mitad-brazo-contraido']);
            $perimetros->bindParam(':antebrazo', $_POST['antebrazo']);
            $perimetros->bindParam(':muneca', $_POST['muneca']);
            $perimetros->bindParam(':meseoesternal', $_POST['meseoesternal']);
            $perimetros->bindParam(':umbilical', $_POST['umbilical']);
            $perimetros->bindParam(':cintura', $_POST['cintura']);
            $perimetros->bindParam(':caderas', $_POST['cadera']);
            $perimetros->bindParam(':muslo', $_POST['muslo']);
            $perimetros->bindParam(':medio', $_POST['muslo-medio']);
            $perimetros->bindParam(':pantorrilla', $_POST['pantorrilla']);

            $perimetros->execute();
        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }

    function cigarro(){
        if(in_array('0', $_POST['frecuencia-cigarro'])){
            $cigarro = 0;
        }

        if(in_array('1', $_POST['frecuencia-cigarro'])){
            $cigarro = 1;
        }

        if(in_array('2', $_POST['frecuencia-cigarro'])){
            $cigarro = 2;
        }

        if(in_array('3', $_POST['frecuencia-cigarro'])){
            $cigarro = 3;
        }

        if(in_array('4', $_POST['frecuencia-cigarro'])){
            $cigarro = 4;
        }
        return $cigarro ;
    }

    function alcohol(){
        if(in_array('0', $_POST['frecuencia-alcohol'])){
            $alcohol = 0;
        }

        if(in_array('1', $_POST['frecuencia-alcohol'])){
            $alcohol = 1;
        }

        if(in_array('2', $_POST['frecuencia-alcohol'])){
            $alcohol = 2;
        }

        if(in_array('3', $_POST['frecuencia-alcohol'])){
            $alcohol = 3;
        }

        if(in_array('4', $_POST['frecuencia-alcohol'])){
            $alcohol = 4;
        }
        return $alcohol;
    }

    function drogas(){
        if(in_array('0', $_POST['frecuencia-drogas'])){
            $drogas = 0;
        }

        if(in_array('1', $_POST['frecuencia-drogas'])){
            $drogas = 1;
        }

        if(in_array('2', $_POST['frecuencia-drogas'])){
            $drogas = 2;
        }

        if(in_array('3', $_POST['frecuencia-drogas'])){
            $drogas = 3;
        }

        if(in_array('4', $_POST['frecuencia-drogas'])){
            $drogas = 4;
        }
        return $drogas;
    }

    $conn = null;
?>