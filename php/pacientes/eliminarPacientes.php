<?php 
    include '../conexion.php';
    echo $_POST['id'];
    try{
        $delete = $conn->prepare("DELETE FROM Pacientes WHERE ID_PACIENTES = ".$_POST['id']);
        $delete->execute();
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>