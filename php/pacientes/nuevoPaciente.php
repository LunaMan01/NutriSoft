<?php 
    include '../conexion.php';

    $value = $_POST['value'];

    $lastIdPaciente;

    try{
        if($value == 1){
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
            $vida = $conn->prepare("INSERT INTO estilo_vida (ID_PACIENTES, Act_Laboral, Descripcion_Act_Lab, Deportes, Estres)
                VALUES(:id, :actividad, :descripcion, :deportes, :estres)");

            $vida->bindParam(':id', $lastIdPaciente);
            $vida->bindParam(':actividad', $_POST['actividadLaboral']);
            $vida->bindParam(':descripcion', $_POST['descripcion']);
            $vida->bindParam(':deportes', $_POST['deportes']);
            $vida->bindParam(':estres', $_POST['estres']);

            $vida->execute();
        } else if($value == 3){
            
        } else if($value == 4){
            
        } else if($value == 5){
            
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