<?php 
    include '../conexion.php';

    $id = $_POST['id'];

    try{
        $datos = "SELECT * FROM grupos_ali WHERE ID_GRUPOS = ". $id;

        $consulta = new \stdClass();

        foreach($conn->query($datos) as $row){
            $consulta->nombre = $row['Nombre_Grupo'];
            $consulta->color = $row['Color_Grupo'];
        }

        $consultaJSON = json_encode($consulta);
        echo $consultaJSON;
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;
?>