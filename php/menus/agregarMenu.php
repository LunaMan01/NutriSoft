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
        if($iteracion == 0){
            
            $energia = getEnergia($idPlatillo,$conn);
            $proteinas = getProteinas($idPlatillo,$conn);
            $lipidos = getLipidos($idPlatillo,$conn);
            $hidratos = getHidratos($idPlatillo,$conn);

            $agregar = $conn->prepare("INSERT INTO menus (Energia_Kal_M, Proteinas_M, Lipidos_M, Hidratos_Carbono_M, ID_PACIENTES, Dia_Ini, Mes_Ini, Anio_Ini, Dia, ID_TIEMPO, ID_PLATILLOS)
                VALUES (:energia, :proteinas, :lipidos, :hidratos, :paciente, :diaI, :mesI, :anioI, :dia, :tiempo, :platillo)");

            $agregar->bindParam(':energia', $energia);
            $agregar->bindParam(':proteinas', $proteinas);
            $agregar->bindParam(':lipidos', $lipidos);
            $agregar->bindParam(':hidratos', $hidratos);
            $agregar->bindParam(':paciente', $idPaciente);
            $agregar->bindParam(':diaI', $fechaInicio[0]);
            $agregar->bindParam(':mesI', $fechaInicio[1]);
            $agregar->bindParam(':anioI', $fechaInicio[2]);
            $agregar->bindParam(':dia', $diaSemana);
            $agregar->bindParam(':tiempo', $idTiempo);
            $agregar->bindParam(':platillo', $idPlatillo);
            $agregar->execute();

            setcookie("idMenu", $conn->lastInsertId(), time() + (7200), "/");
            setcookie("energia", $energia, time() + (7200), "/");
            setcookie("proteinas", $proteinas, time() + (7200), "/");
            setcookie("lipidos", $lipidos, time() + (7200), "/");
            setcookie("hidratos", $hidratos, time() + (7200), "/");
        } else {
            $lastIdMenu = $_COOKIE['idMenu'];

            $energia = getEnergia($idPlatillo,$conn);
            $proteinas = getProteinas($idPlatillo,$conn);
            $lipidos = getLipidos($idPlatillo,$conn);
            $hidratos = getHidratos($idPlatillo,$conn);

            $energia = $energia + $_COOKIE['energia'];
            $proteinas = $proteinas + $_COOKIE['proteinas'];
            $lipidos = $lipidos + $_COOKIE['lipidos'];
            $hidratos = $hidratos + $_COOKIE['hidratos'];

            $agregar = $conn->prepare("INSERT INTO menus (ID_MENU, Energia_Kal_M, Proteinas_M, Lipidos_M, Hidratos_Carbono_M, ID_PACIENTES, Dia_Ini, Mes_Ini, Anio_Ini, Dia, ID_TIEMPO, ID_PLATILLOS)
                VALUES (:menu, :energia, :proteinas, :lipidos, :hidratos, :paciente, :diaI, :mesI, :anioI, :dia, :tiempo, :platillo)");

            $agregar->bindParam(':menu', $lastIdMenu);
            $agregar->bindParam(':energia', $energia);
            $agregar->bindParam(':proteinas', $proteinas);
            $agregar->bindParam(':lipidos', $lipidos);
            $agregar->bindParam(':hidratos', $hidratos);
            $agregar->bindParam(':paciente', $idPaciente);
            $agregar->bindParam(':diaI', $fechaInicio[0]);
            $agregar->bindParam(':mesI', $fechaInicio[1]);
            $agregar->bindParam(':anioI', $fechaInicio[2]);
            $agregar->bindParam(':dia', $diaSemana);
            $agregar->bindParam(':tiempo', $idTiempo);
            $agregar->bindParam(':platillo', $idPlatillo);
            $agregar->execute();

            setcookie("energia", $energia, time() + (7200), "/");
            setcookie("proteinas", $proteinas, time() + (7200), "/");
            setcookie("lipidos", $lipidos, time() + (7200), "/");
            setcookie("hidratos", $hidratos, time() + (7200), "/");

            $update = $conn->prepare("UPDATE menus SET
                Energia_Kal_M = :energia, 
                Proteinas_M = :proteinas, 
                Lipidos_M = :lipidos, 
                Hidratos_Carbono_M = :hidratos
                WHERE ID_MENU = ".$lastIdMenu);
            
            $update->bindParam(':energia', $energia);
            $update->bindParam(':proteinas', $proteinas);
            $update->bindParam(':lipidos', $lipidos);
            $update->bindParam(':hidratos', $hidratos);

            $update->execute();
        }
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