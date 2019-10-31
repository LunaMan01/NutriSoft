<?php 
    include '../conexion.php';

    $value = $_POST['value'];

    $lastIdPaciente;

    try{
        if($value == 1){
            // DATOS GENERALES
            $generales = $conn->prepare("INSERT INTO pacientes (Nombre_P, AP_P, AM_P, Escolaridad, Genero, Dia_N, Mes_N, Año_N, Calle_P, Num_P, Col_P, Ciudad, Estado, Telefono, Correo, Historial_P, Dia_C, Mes_C, Año_C, Dia_SC, Mes_SC, Año_SC, Observaciones)
                VALUES (:nombre, :apellidoP, :apellidoM, :escolaridad, :genero, :diaNa, :mesNa, :añoNa, :calle, :numero, :colonia, :ciudad, :estado, :telefono, :correo, :historial, :diaCon, :mesCon, :añoCon, :diaSiCon, :mesSiCon, :añoSiCon, :observaciones)");

            $generales->bindParam(':nombre', $_POST['nombre']);
            $generales->bindParam(':apellidoP', $_POST['paterno']);
            $generales->bindParam(':apellidoM', $_POST['materno']);
            $generales->bindParam(':escolaridad', $_POST['escolaridad']);
            $generales->bindParam(':genero', $_POST['genero']);
            $generales->bindParam(':diaNa', $_POST['diaNacimiento']);
            $generales->bindParam(':mesNa', $_POST['mesNacimiento']);
            $generales->bindParam(':añoNa', $_POST['añoNacimiento']);
            $generales->bindParam(':calle', $_POST['calle']);
            $generales->bindParam(':numero', $_POST['numero']);
            $generales->bindParam(':colonia', $_POST['colonia']);
            $generales->bindParam(':ciudad', $_POST['ciudad']);
            $generales->bindParam(':estado', $_POST['estado']);
            $generales->bindParam(':telefono', $_POST['telefono']);
            $generales->bindParam(':correo', $_POST['correo']);
            $generales->bindParam(':historial', $_POST['historial']);
            $generales->bindParam(':diaCon', $_POST['diaConsulta']);
            $generales->bindParam(':mesCon', $_POST['mesConsulta']);
            $generales->bindParam(':añoCon', $_POST['añoConsulta']);
            $generales->bindParam(':diaSiCon', $_POST['diaSiguienteConsulta']);
            $generales->bindParam(':mesSiCon', $_POST['mesSiguienteConsulta']);
            $generales->bindParam(':añoSiCon', $_POST['añoSiguienteConsulta']);
            $generales->bindParam(':observaciones', $_POST['observaciones']);

            $generales->execute();

            $lastIdPaciente = $conn->lastInsertId();

        } else if($value == 2){
            // ESTILO DE VIDA
            $vida = $conn->prepare("INSERT INTO estilo_vida (ID_PACIENTES, Act_Laboral, Descripcion_Act_Lab, Deportes, Estres)
                VALUES(:id, :actividad, :descripcion, :deportes, :estres)");

            $vida->bindParam(':id', $lastIdPaciente);
            $vida->bindParam(':actividad', $_POST['actividadLaboral']);
            $vida->bindParam(':descripcion', $_POST['descripcion']);
            $vida->bindParam(':deportes', $_POST['deportes']);
            $vida->bindParam(':estres', $_POST['estres']);

            $vida->execute();
        } else if($value == 3){
            // HISTORIA CLINICA
            $clinica = $conn->prepare("INSERT INTO historia_clinica (ID_PACIENTES, Motivo_Consulta, Terapeuta_Previa, Cirugias_Realizadas, Tipo_Sangre, Alergias, Diagnostico_Previo, Vacunas, Antecendentes_Familiares) 
                VALUES (:id, :motivo, :terapeuta, :cirugias, :sangre, :alergias, :diagnostico, :vacunas, :antecedentes)");

            $clinica->bindParam(':id', $lastIdPaciente);
            $clinica->bindParam(':motivo', $_POST['motivoConsulta']);
            $clinica->bindParam(':terapeuta', $_POST['terapeutaPrevio']);
            $clinica->bindParam(':cirugias', $_POST['cirugiasRealizadas']);
            $clinica->bindParam(':sangre', $_POST['tipoSangre']);
            $clinica->bindParam(':alergias', $_POST['alergias']);
            $clinica->bindParam(':diagnostico', $_POST['diagnosticoPrevio']);
            $clinica->bindParam(':vacunas', $_POST['vacunas']);
            $clinica->bindParam(':antecedentes', $_POST['antecedentesFamiliares']);

            $clinica->execute();
        } else if($value == 4){
            // ETIQUETAS DE PACIENTE
            $etiquetas = $conn->prepare("");

            $etiquetas->bindParam(':', $_POST['']);

            $etiquetas->execute();
        } else if($value == 5){
            // HABITOS TOXICOS            
        } else if($value == 6){
            // PLAN ALIMENTICIO            
        } else if($value == 7){
            // MEDICIONES BASICAS
            $mediciones = $conn->prepape("INSERT INTO mediciones_basicas (ID_PACIENTES, Estatura, Peso, Factor_Act, Embarazo)
                VALUES (:id, :estatura, :peso, :actividad, :embarazo)");

            $mediciones->bindPAram(':id', $lastIdPaciente);
            $mediciones->bindPAram(':estatura', $_POST['estatura']);
            $mediciones->bindPAram(':peso', $_POST['peso']);
            $mediciones->bindPAram(':actividad', $_POST['factorActividad']);
            $mediciones->bindPAram(':embarazo', $_POST['embarazo']);

            $mediciones->execute();
        } else if($value == 8){
            // BIOIMPEDANCIA
            $bioimpedancia = $conn->prepare("INSERT INTO bioimpedancia (ID_PACIENTES, Grasa_Total, Grasa_Superior, Grasa_Inferior, Grasa_Viseral, Masa_Libre_Grasa, Masa_Muscular, Peso_Oseo, Agua_Corporal, Edad_Metabolica)
                VALUES (:id, :total, :superior, :inferior, :viseral, :libre, :muscular, :oseo, :agua, :edad)");

            $bioimpedancia->bindParam(':id', $lastIdPaciente);
            $bioimpedancia->bindParam(':total', $_POST['grasaTotal']);
            $bioimpedancia->bindParam(':superior', $_POST['grasaSuperior']);
            $bioimpedancia->bindParam(':inferior', $_POST['grasaInferior']);
            $bioimpedancia->bindParam(':viseral', $_POST['grasaViseral']);
            $bioimpedancia->bindParam(':libre', $_POST['masaLibreGrasa']);
            $bioimpedancia->bindParam(':muscular', $_POST['masaMuscular']);
            $bioimpedancia->bindParam(':oseo', $_POST['pesoOseo']);
            $bioimpedancia->bindParam(':agua', $_POST['aguaCorporal']);
            $bioimpedancia->bindParam(':edad', $_POST['edadMetabolica']);

            $bioimpedancia->execute();
        } else if($value == 9){
            // PLIEGUES
            $pliegues = $conn->prepare("INSERT INTO pliegues (ID_PACIENTES, Subescapular, Triceps, Biceps, Ileocrestal, Suprailiaco, Abdominal, muslo_Frontal, Pantorrilla_Medial, Axiliar_Medial, Pectoral)
                VALUES (:id, :subescapular, :tricep, :bicep, :ileocrestal, :suprailiaco, :abdominal, :frontal, :medial, :axiliar, :pectoral)");

            $pliegues->bindParam(':id', $lastIdPaciente);
            $pliegues->bindParam(':subescapular', $_POST['subescapular']);
            $pliegues->bindParam(':tricep', $_POST['tricep']);
            $pliegues->bindParam(':bicep', $_POST['bicep']);
            $pliegues->bindParam(':ileocrestal', $_POST['ileocrestal']);
            $pliegues->bindParam(':suprailiaco', $_POST['suprailiaco']);
            $pliegues->bindParam(':abdominal', $_POST['abdominal']);
            $pliegues->bindParam(':frontal', $_POST['frontal']);
            $pliegues->bindParam(':medial', $_POST['medial']);
            $pliegues->bindParam(':axiliar', $_POST['axiliar']);
            $pliegues->bindParam(':pectoral', $_POST['pectoral']);

            $pliegues->execute();
        } else if($value == 10){
            // PERIMETROS
            $perimetros = $conn->prepare("INSERT INTO perimetros (ID_PACIENTES, Cefalico, Cuello, Brazo_Relajado, Brazo_Contraido, Antebrazo, Muñeca, Meseoesternal, Umbilical, Cintura, Caderas, Muslo, Muslo_Medio, Pantorrilla)
                VALUES (:id, :cefalico, :cuello, :relajado, :contraido, :antebrazo, :muñeca, :mesoesternal, :umbilical, :cintura, :caderas, :muslo, :medio, :pantorrilla)");

            $perimetros->bindParam(':id', $lastIdPaciente);
            $perimetros->bindParam(':cefalico', $_POST['cefalico']);
            $perimetros->bindParam(':cuello', $_POST['cuello']);
            $perimetros->bindParam(':relajado', $_POST['relajado']);
            $perimetros->bindParam(':contraido', $_POST['contraido']);
            $perimetros->bindParam(':antebrazo', $_POST['antebrazo']);
            $perimetros->bindParam(':muñeca', $_POST['muñeca']);
            $perimetros->bindParam(':mesoesternal', $_POST['mesoesternal']);
            $perimetros->bindParam(':umbilical', $_POST['umbilical']);
            $perimetros->bindParam(':cintura', $_POST['cintura']);
            $perimetros->bindParam(':caderas', $_POST['caderas']);
            $perimetros->bindParam(':muslo', $_POST['muslo']);
            $perimetros->bindParam(':medio', $_POST['medio']);
            $perimetros->bindParam(':pantorrilla', $_POST['pantorrilla']);

            $perimetros->execute();
        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>