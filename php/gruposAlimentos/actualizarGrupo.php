<?php 
    include '../conexion.php';

    try{
        $modificar = $conn->prepare("UPDATE grupos_ali SET 
            Nombre_Grupo = :nombre,
            Color_Grupo = :color
            WHERE ID_GRUPOS = ".$_POST['id']);

        $modificar->bindParam(':nombre', $_POST['']);
        $modificar->bindParam(':color', $_POST['']);

        $modificar->execute();
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;
?>