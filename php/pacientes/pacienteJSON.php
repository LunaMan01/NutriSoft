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
                $generales->nombre = $row['nombre'];
                $generales->paterno = $row['paterno'];
                $generales->materno = $row['materno'];
                $generales->escolaridad = $row['escolaridad'];
                $generales->genero = $row['genero'];

                $diaN = $row['Dia_N'];
                $mesN = $row['Mes_N'];
                $añoN = $row['Anio_N'];
                $generales->fechaNacimiento = $diaN."/".$mesN."/".$añoN;
                
                $generales->calle = $row['calle'];
                $generales->numero = $row['numero'];
                $generales->colonia = $row['colonia'];
                $generales->ciudad = $row['ciudad'];
                $generales->estado = $row['estado'];
                $generales->telefono = $row['telefono'];
                $generales->correo = $row['correo'];
                $generales->historial = $row['historial'];
                
                $diaC = $row['Dia_C'];
                $mesC = $row['Mes_C'];
                $añoC = $row['Anio_C'];
                $generales->fechaConsulta = $diaC."/".$mesC."/".$añoC;

                $diaSC = $row['Dia_SC'];
                $mesSC = $row['Mes_SC'];
                $añoSC = $row['Anio_SC'];
                $generales->fechaSiguienteConsulta = $diaSC."/".$mesSC."/".$añoSC;
                
                $generales->observaciones = $row['observaciones'];
            }
            $generalesJSON = json_encode($generales);
            echo $generalesJSON;
        } else if($value == 2){
            // ESTILO DE VIDA
        } else if($value == 3){
            // HISTORIA CLINICA
        } else if($value == 4){
            // ETIQUETAS DE PACIENTE
        } else if($value == 5){
            // HABITOS TOXICOS
        } else if($value == 6){
            // PLAN ALIMENTICIO
        } else if($value == 7){
            // MEDICIONES BASICAS
        } else if($value == 8){
            // BIOIMPEDANCIA
        } else if($value == 9){
            // PLIEGUES
        } else if($value == 10){
            //PERIMETROS
        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>