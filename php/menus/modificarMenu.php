<?php 
    include '../conexion.php';

    $idMenu = $_POST['id-menu'];
    $opcion = $_POST['opcion'];
    $diaSemana = $_POST['dia'];
    $idPaciente = $_POST['id-paciente'];
    $idTiempo = $_POST['id-tiempo'];
    $idPlatillo = $_POST['id-platillo'];
    
    $fecha = $_POST['fecha-inicio'];
    $fechaInicio = explode("/", $fecha);
    
    try{
        if($opcion == 1){
            //MODIFICAR FECHA
            $update = $conn->prepare("UPDATE menus SET 
                Dia_Ini = :dia,
                Mes_Ini = :mes,
                Anio_Ini = :anio
                WHERE ID_MENU = ".$idMenu);

            $update->bindParam(':dia', $fechaInicio[0]);
            $update->bindParam(':mes', $fechaInicio[1]);
            $update->bindParam(':anio', $fechaInicio[2]);
            $update->execute();
            
            // AGREGAR
            $energia = getEnergia($idPlatillo,$conn);
            $proteinas = getProteinas($idPlatillo,$conn);
            $lipidos = getLipidos($idPlatillo,$conn);
            $hidratos = getHidratos($idPlatillo,$conn);

            $agregar = $conn->prepare("INSERT INTO menus (ID_MENU, Energia_Kal_M, Proteinas_M, Lipidos_M, Hidratos_Carbono_M, ID_PACIENTES, Dia_Ini, Mes_Ini, Anio_Ini, Dia, ID_TIEMPO, ID_PLATILLOS)
                VALUES (:menu, :energia, :proteinas, :lipidos, :hidratos, :paciente, :diaI, :mesI, :anioI, :dia, :tiempo, :platillo)");
            
            $agregar->bindParam(':menu', $idMenu);
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
            
        } else if($opcion == 2){
            //MODIFICAR FECHA
            $update = $conn->prepare("UPDATE menus SET 
                Dia_Ini = :dia,
                Mes_Ini = :mes,
                Anio_Ini = :anio
                WHERE ID_MENU = ".$idMenu);

            $update->bindParam(':dia', $fechaInicio[0]);
            $update->bindParam(':mes', $fechaInicio[1]);
            $update->bindParam(':anio', $fechaInicio[2]);
            $update->execute();

            // ELIMINAR
            $delete = $conn->prepare("DELETE FROM menus 
                WHERE ID_MENU = :menu
                AND ID_PACIENTES = :paciente
                AND ID_PLATILLOS = :platillo
                AND ID_TIEMPO = :tiempo
                AND Dia = :dia");
            
            $delete->bindParam(':menu', $idMenu);
            $delete->bindParam(':paciente', $idPaciente);
            $delete->bindParam(':platillo', $idPlatillo);
            $delete->bindParam(':tiempo', $idTiempo);
            $delete->bindParam(':dia', $diaSemana);
            $delete->execute();

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