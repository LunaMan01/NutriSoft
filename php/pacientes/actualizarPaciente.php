<?php 
    include '../conexion.php';

    $value = $_POST['value'];
    $id = $_POST['id'];

    try{
        if($value == 1){
            
            // MEDICIONES BASICAS
            $fechaNacimiento = $_POST['fecha-nacimiento'];
            $fechaConsulta = $_POST['fecha-consulta'];
            $fechaSiguiente = $_POST['fecha-siguiente-consulta'];

            $fechaN = explode("/", $fechaNacimiento);
            $fechaC = explode("/", $fechaConsulta);
            $fechaS = explode("/", $fechaSiguiente);

            $generales = $conn->prepare("UPDATE pacientes SET
                Nombre_P = :nombre,
                AP_P = :apellidoP,
                AM_P = :apellidoM,
                Escolaridad = :escolaridad,
                Genero = :genero,
                Dia_N = :diaN,
                Mes_N = :mesN,
                Anio_N = :anioN,
                Calle_P = :calle,
                Num_P = :numero,
                Col_P = :colonia,
                Ciudad = :ciudad,
                Estado = :estado,
                Telefono = :telefono,
                Correo = :correo,
                Historial_P = :historial,
                Dia_C = :diaC,
                Mes_C = :mesC,
                Anio_C = :anioC,
                Dia_SC = :diaS,
                Mes_SC = :mesS,
                Anio_SC = :anioS,
                Observaciones = :observaciones
                WHERE ID_PACIENTES = ".$id);

            $generales->bindParam(':nombre', $_POST['nombre']);
            $generales->bindParam(':apellidoP', $_POST['paterno']);
            $generales->bindParam(':apellidoM', $_POST['materno']);
            $generales->bindParam(':escolaridad', $_POST['escolaridad']);
            $generales->bindParam(':genero', $_POST['genero']);            
            $generales->bindParam(':diaN', $fechaN[0]);            
            $generales->bindParam(':mesN', $fechaN[1]);            
            $generales->bindParam(':anioN', $fechaN[2]);
            $generales->bindParam(':calle', $_POST['calle']);
            $generales->bindParam(':numero', $_POST['numero']);            
            $generales->bindParam(':colonia', $_POST['colonia']);
            $generales->bindParam(':ciudad', $_POST['ciudad']);
            $generales->bindParam(':estado', $_POST['estado']);
            $generales->bindParam(':telefono', $_POST['telefono']);
            $generales->bindParam(':correo', $_POST['correo']);
            $generales->bindParam(':historial', $_POST['historial']);
            $generales->bindParam(':diaC', $fechaC[0]);
            $generales->bindParam(':mesC', $fechaC[1]);
            $generales->bindParam(':anioC', $fechaC[2]);
            $generales->bindParam(':diaS', $fechaS[0]);
            $generales->bindParam(':mesS', $fechaS[1]);
            $generales->bindParam(':anioS', $fechaS[2]);
            $generales->bindParam(':observaciones', $_POST['observaciones']);
            $generales->execute();

        } else if($value == 2){
            // ESTILO DE VIDA
            $vida = $conn->prepare("UPDATE estilo_vida SET 
                Act_Laboral = :actividad, 
                Descripcion_Act_Lab = :descripcion, 
                Deportes = :deportes, 
                Estres = :estres
                WHERE ID_PACIENTES = ".$id);

            $vida->bindParam(':actividad', $_POST['actividad-laboral']);
            $vida->bindParam(':descripcion', $_POST['descripcion-actividad-laboral']);
            $vida->bindParam(':deportes', $_POST['actividades-deportivas']);
            $vida->bindParam(':estres', $_POST['nivel-estres']);
            $vida->execute();

        } else if($value == 3){
            // HISTORIA CLINICA
            $clinica = $conn->prepare("UPDATE historia_clinica SET
                Motivo_Consulta = :motivo, 
                Terapeuta_Previa = :terapeuta, 
                Cirugias_Realizadas = :cirugias, 
                Tipo_Sangre = :sangre, 
                Alergias = :alergias, 
                Diagnostico_Previo = :diagnostico, 
                Vacunas = :vacunas, 
                Antecedentes_Familiares = :antecedentes
                WHERE ID_PACIENTES = ".$id);

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
            

        } else if($value == 5){
            // HABITOS TOXICOS
            $cigarro = cigarro();
            $alcohol = alcohol();
            $drogas = drogas(); 

            $habitos = $conn->prepare("UPDATE habitos_toxicos SET
                Frecuencia_Cigarro = :freC,
                Cantidad_Cigarro = :canC,
                Frecuencia_Alcohol = :freA,
                Cantidad_Alcohol = :canA,
                Frecuencia_Drogas = :freD,
                Cantidad_Drogas = :canD
                WHERE ID_PACIENTES = ".$id);
            
            $habitos->bindParam('freC', $cigarro);
            $habitos->bindParam('canC', $_POST['cantidad-cigarro']);
            $habitos->bindParam('freA', $alcohol);
            $habitos->bindParam('canA', $_POST['cantidad-alcohol']);
            $habitos->bindParam('freD', $drogas);
            $habitos->bindParam('canD', $_POST['cantidad-drogas']);
            $habitos->execute();

        } else if($value == 6){
            // PLAN ALIMENTICIO
            $plan = $conn->prepare("UPDATE plan_alimenticio SET
                Descripcion = :descripcion
                WHERE ID_PACIENTES = ".$id);

            $plan->bindParam('descripcion', $_POST['plan-alimenticio']);
            $plan->execute();

        } else if($value == 7){
            // MEDICIONES BASICAS
            $mediciones = $conn->prepare("UPDATE mediciones_basicas SET
                Estatura = :estatura,
                Peso = :peso,
                Factor_Act = :actividad,
                Embarazo = :embarazo
                WHERE ID_PACIENTES = ".$id);

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
            $bioimpedancia = $conn->prepare("UPDATE bioimpedancia SET
                Grasa_Total = :total,
                Grasa_Superior = :superior,
                Grasa_Inferior = :inferior,
                Grasa_Viseral = :viseral,
                Masa_Libre_Grasa = :libre,
                Masa_Muscular = :muscular,
                Peso_Oseo = :oseo,
                Agua_Corporal = :agua,
                Edad_Metabolica = :edad
                WHERE ID_PACIENTES = ".$id);

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
            $pliegues = $conn->prepare("UPDATE pliegues SET
                Subescapular = :subescapular,
                Triceps = :tricep, 
                Biceps = :bicep,
                Ileocrestal = :ileocrestal,
                Suprailiaco = :suprailiaco,
                Abdominal = :abdominal,
                muslo_Frontal = :frontal,
                Pantorrilla_Medial = :medial,
                Axiliar_Medial = :axiliar,
                Pectoral = :pectoral
                WHERE ID_PACIENTES = ".$id);

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
            $perimetros = $conn->prepare("UPDATE perimetros SET 
                Cefalico = :cefalico,
                Cuello = :cuello,
                Brazo_Relajado = :relajado,
                Brazo_Contraido = :contraido,
                Antebrazo = :antebrazo,
                Muneca = :muneca,
                Meseoesternal = :meseoesternal,
                Umbilical = :umbilical,
                Cintura = :cintura,
                Caderas = :caderas,
                Muslo = :muslo,
                muslo_Medio = :medio,
                Pantorrilla = :pantorrilla
                WHERE ID_PACIENTES = ".$id);

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
            $cigarro = "1 día/semana";
        }

        if(in_array('2', $_POST['frecuencia-cigarro'])){
            $cigarro = "2 días/semana";
        }

        if(in_array('3', $_POST['frecuencia-cigarro'])){
            $cigarro = "3 días/semana";
        }

        if(in_array('4', $_POST['frecuencia-cigarro'])){
            $cigarro = "4 días/semana";
        }

        if(in_array('5', $_POST['frecuencia-cigarro'])){
            $cigarro = "5 días/semana";
        }

        if(in_array('6', $_POST['frecuencia-cigarro'])){
            $cigarro = "6 días/semana";
        }

        if(in_array('7', $_POST['frecuencia-cigarro'])){
            $cigarro = "7 días/semana";
        }
        return $cigarro ;
    }

    function alcohol(){
        if(in_array('0', $_POST['frecuencia-alcohol'])){
            $alcohol = 0;
        }

        if(in_array('1', $_POST['frecuencia-alcohol'])){
            $alcohol = "1 día/semana";
        }

        if(in_array('2', $_POST['frecuencia-alcohol'])){
            $alcohol = "2 días/semana";
        }

        if(in_array('3', $_POST['frecuencia-alcohol'])){
            $alcohol = "3 días/semana";
        }

        if(in_array('4', $_POST['frecuencia-alcohol'])){
            $alcohol = "4 días/semana";
        }

        if(in_array('5', $_POST['frecuencia-alcohol'])){
            $alcohol = "5 días/semana";
        }

        if(in_array('6', $_POST['frecuencia-alcohol'])){
            $alcohol = "6 días/semana";
        }

        if(in_array('7', $_POST['frecuencia-alcohol'])){
            $alcohol = "7 días/semana";
        }
        return $alcohol;
    }

    function drogas(){
        if(in_array('0', $_POST['frecuencia-drogas'])){
            $drogas = 0;
        }

        if(in_array('1', $_POST['frecuencia-drogas'])){
            $drogas = "1 día/semana";
        }

        if(in_array('2', $_POST['frecuencia-drogas'])){
            $drogas = "2 días/semana";
        }

        if(in_array('3', $_POST['frecuencia-drogas'])){
            $drogas = "3 días/semana";
        }

        if(in_array('4', $_POST['frecuencia-drogas'])){
            $drogas = "4 días/semana";
        }

        if(in_array('5', $_POST['frecuencia-drogas'])){
            $drogas = "5 días/semana";
        }

        if(in_array('6', $_POST['frecuencia-drogas'])){
            $drogas = "6 días/semana";
        }

        if(in_array('7', $_POST['frecuencia-drogas'])){
            $drogas = "7 días/semana";
        }
        return $drogas;
    }
    $conn = null;
?>