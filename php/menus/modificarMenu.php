<?php 
    include '../conexion.php';

    $iteracion = $_POST['iteracion'];
    $diaSemana = $_POST['dia'];
    $idTiempo = $_POST['id-tiempo'];
    $idPlatillo = $_POST['id-platillo'];
    $idPaciente = $_POST['id-paciente'];
    
    $fecha = $_POST['fecha-inicio'];
    $fechaInicio = explode("/", $fecha);
    
    try{
        $modificar = $conn->prepare("UPDATE menu SET
            Energia_Kal_M = :energia,
            Proteinas_M = :proteinas,
            Lipidos_M = :lipidos,
            Hidratos_Carbono_M = :hidratos,
            Dia_Ini = :dia,
            Mes_Ini = :mes,
            Anio_Ini = :anio
            WHERE ID_MENU = 
            AND ID_PACIENTES =
            AND ID_TIEMPO = 
            AND ID_PLATILLOS = 
            AND Dia =");
        
        /*$modificar->bindParam(':energia', );
        $modificar->bindParam(':proteinas', );
        $modificar->bindParam(':lipidos', );
        $modificar->bindParam(':hidratos', );
        $modificar->bindParam(':dia', );
        $modificar->bindParam(':mes', );
        $modificar->bindParam(':anio', );*/

        $modificar->execute();
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null
?>