<?php 
    include '../conexion.php';

    $iteracion = $_POST['iteracion'];
    $diaSemana = $_POST['dia'];

    $idMenu = $_POST['id-menu'];
    $idPaciente = $_POST['id-paciente'];
    $idTiempo = $_POST['id-tiempo'];
    $idPlatillo = $_POST['id-platillo'];

    $anteriorIdTiempo = $_POST['anterior-id-tiempo'];
    $anteriorIdPlatillo = $_POST['anterior-id-platillo'];
    
    $fecha = $_POST['fecha-inicio'];
    $fechaInicio = explode("/", $fecha);
    
    try{
        $energia = getEnergia($idPlatillo,$conn);
        $proteinas = getProteinas($idPlatillo,$conn);
        $lipidos = getLipidos($idPlatillo,$conn);
        $hidratos = getHidratos($idPlatillo,$conn);

        $modificar = $conn->prepare("UPDATE menu SET
            Energia_Kal_M = :energia,
            Proteinas_M = :proteinas,
            Lipidos_M = :lipidos,
            Hidratos_Carbono_M = :hidratos,
            Dia_Ini = :dia,
            Mes_Ini = :mes,
            Anio_Ini = :anio,
            Dia = :dia,
            ID_TIEMPO = :tiempo,
            ID_PLATILLOS = :platillo
            WHERE ID_MENU = '".$idMenu."'
            AND ID_PACIENTES = '".$idPaciente."'
            AND ID_TIEMPO = '".$anteriorIdTiempo."'
            AND ID_PLATILLOS = '".$anteriorIdPlatillo."'
            AND Dia = ".$diaSemana);
        
        $modificar->bindParam(':energia', $energia);
        $modificar->bindParam(':proteinas', $proteinas);
        $modificar->bindParam(':lipidos', $lipidos);
        $modificar->bindParam(':hidratos', $hidratos);
        $modificar->bindParam(':dia', $fechaInicio[0]);
        $modificar->bindParam(':mes', $fechaInicio[1]);
        $modificar->bindParam(':anio', $fechaInicio[2]);
        $modificar->bindParam(':dia', $diaSemana);
        $modificar->bindParam(':tiempo', $idTiempo);
        $modificar->bindParam(':platillo', $idPlatillo);

        $modificar->execute();
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;

    function getEnergia($idPlatillo, $conn){
        $getEnergia = "SELECT Energia_Kal_Pla FROM platillos WHERE ID_PLATILLOS = ". $idPlatillo;
        foreach($conn->query($getEnergia) as $row){
            $energia = $row['Energia_Kal_Pla'];
        }
        return $energia;
    }

    function getProteinas($idPlatillo, $conn){
        $getProteinas = "SELECT Proteinas_Pla FROM platillos WHERE ID_PLATILLOS = ". $idPlatillo;
        foreach($conn->query($getProteinas) as $row){
            $proteinas = $row['Proteinas_Pla'];
        }
        return $proteinas;
    }

    function getLipidos($idPlatillo, $conn){
        $getLipidos = "SELECT Lipidos_Pla FROM platillos WHERE ID_PLATILLOS = ". $idPlatillo;
        foreach($conn->query($getLipidos) as $row){
            $lipidos = $row['Lipidos_Pla'];
        }
        return $lipidos;
    }

    function getHidratos($idPlatillo, $conn){
        $getHidratos = "SELECT Hidratos_Carbono_Pla FROM platillos WHERE ID_PLATILLOS = ". $idPlatillo;
        foreach($conn->query($getHidratos) as $row){
            $hidratos = $row['Hidratos_Carbono_Pla'];
        }
        return $hidratos;
    }
?>