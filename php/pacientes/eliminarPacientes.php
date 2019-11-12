<?php 
    include '../conexion.php';

    try{
        $delete = $conn->prepare("DELETE FROM Pacientes WHERE ID_PACIENTES = ".$_POST['id']);
        $delete->execute();
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>