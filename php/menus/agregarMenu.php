<?php 
    include '../conexion.php';

    $iteracion = $_POST['iteracion'];
    $dia = $_POST['dia'];
    $idTiempo = $_POST['id-tiempo'];
    $idPlatillo = $_POST['id-platillo'];
    
    $fecha = $_POST['fecha-inicio'];
    $fechaInicio = explode("/", $fecha);

    echo $iteracion;
    
    try{
        if($iteracion == 0){
            





            $agregar = $conn->prepare("INSERT INTO menus (Energia_Kal_M, Proteinas_M, Lipidos_M, Hidratos_Carbono_M, ID_PACIENTES, Dia_Ini, Mes_Ini, Año_Ini, Dia, ID_TIEMPO, ID_PLATILLOS)
                VALUES (:energia, :proteinas, :lipidos, :hidratos, :paciente, :diaI, :mesI, :añoI, :dia, :tiempo, :platillo)");

            $agregar->bindParam(':energia', $_POST['']);
            $agregar->bindParam(':proteinas', $_POST['']);
            $agregar->bindParam(':lipidos', $_POST['']);
            $agregar->bindParam(':hidratos', $_POST['']);
            $agregar->bindParam(':paciente', $_POST['']);
            $agregar->bindParam(':diaI', $_POST['']);
            $agregar->bindParam(':mesI', $_POST['']);
            $agregar->bindParam(':añoI', $_POST['']);
            $agregar->bindParam(':dia', $_POST['']);
            $agregar->bindParam(':tiempo', $_POST['']);
            $agregar->bindParam(':platillo', $_POST['']);
            $agregar->execute();
            setcookie("Id", $conn->lastInsertId(), time() + (86400), "/");
        } else {
            $lastIdPaciente = $_COOKIE['Id'];

            $agregar = $conn->prepare("INSERT INTO menus (ID_MENU, Energia_Kal_M, Proteinas_M, Lipidos_M, Hidratos_Carbono_M, ID_PACIENTES, Dia_Ini, Mes_Ini, Año_Ini, Dia, ID_TIEMPO, ID_PLATILLOS)
                VALUES (:menu, :energia, :proteinas, :lipidos, :hidratos, :paciente, :diaI, :mesI, :añoI, :dia, :tiempo, :platillo)");

            $agregar->bindParam(':energia', $lastIdPaciente);
            $agregar->bindParam(':energia', $_POST['']);
            $agregar->bindParam(':proteinas', $_POST['']);
            $agregar->bindParam(':lipidos', $_POST['']);
            $agregar->bindParam(':hidratos', $_POST['']);
            $agregar->bindParam(':paciente', $_POST['']);
            $agregar->bindParam(':diaI', $_POST['']);
            $agregar->bindParam(':mesI', $_POST['']);
            $agregar->bindParam(':añoI', $_POST['']);
            $agregar->bindParam(':dia', $_POST['']);
            $agregar->bindParam(':tiempo', $_POST['']);
            $agregar->bindParam(':platillo', $_POST['']);
            $agregar->execute();
        }
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null
?>