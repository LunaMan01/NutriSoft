<?php 
    include '../conexion.php';

    try{
        $eliminar = $conn->prepare("DELETE FROM grupos_ali WHERE ID_GRUPOS = ".$_POST['id']);
        $eliminar->execute();
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;
?>