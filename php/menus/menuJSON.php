<?php 
    include '../conexion.php';

    $idMenu = $_POST['id-menu'];

    try{
        $datos = "SELECT * FROM menus WHERE ID_MENU = ".$idMenu;
        
        $platillos = new \stdClass();

        foreach($conn->query($datos) as $row){
            $platillos->energia = $row['Energia_Kal_M'];
            $platillos->lipidos = $row['Proteinas_M'];
            $platillos->proteinas = $row['Lipidos_M'];
            $platillos->hidratos = $row['Hidratos_Carbono_M'];
        }
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null
?>