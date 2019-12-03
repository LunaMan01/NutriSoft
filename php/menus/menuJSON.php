<?php 
    include '../conexion.php';

    $idMenu = $_POST['id-menu'];
    $array = array();

    try{
        $datos = "SELECT * FROM menus WHERE ID_MENU = ".$idMenu;
        
        $platillos = new \stdClass();

        foreach($conn->query($datos) as $row){
            $dia = $row['Dia_Ini'];
            $mes = $row['Mes_Ini'];
            $año = $row['Anio_Ini'];

            $fecha = $dia."/".$mes."/".$año;

            $platillos->fechaMenu = $fecha;
            $platillos->energia = $row['Energia_Kal_M'];
            $platillos->lipidos = $row['Proteinas_M'];
            $platillos->proteinas = $row['Lipidos_M'];
            $platillos->hidratos = $row['Hidratos_Carbono_M'];

            array_push($array, $platillos);
        }
        $platillosJSON = json_encode($array);
        echo $platillosJSON;
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null
?>