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
            // MEDICIONES BASICAS
            $mediciones = $conn->prepape("INSERT INTO mediciones_basicas (ID_PACIENTES, Estatura, Peso, Factor_Act, Embarazo)
                VALUES (:id, :estatura, :peso, :actividad, :embarazo)");

            $mediciones->bindPAram(':id', $lastIdPaciente);
            $mediciones->bindPAram(':estatura', $_POST['estatura']);
            $mediciones->bindPAram(':peso', $_POST['peso']);
            $mediciones->bindPAram(':actividad', $_POST['factorActividad']);
            $mediciones->bindPAram(':embarazo', $_POST['embarazo']);

            $mediciones->execute();
        } else if($value == 6){
            
        } else if($value == 7){
            
        } else if($value == 8){
            
        } else if($value == 9){
            
        } else if($value == 10){
            
        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>