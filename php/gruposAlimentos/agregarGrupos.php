<?php 
    include '../conexion.php';

    try{
        $agregar = $conn->prepare("INSERT INTO grupos_ali (Nombre_Grupo, Color_Grupo)
            VALUES (:nombre, :color)");

        $agregar->bindParam(':nombre', $_POST['']);
        $agregar->bindParam(':color', $_POST['']);

        $agregar->execute();
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;
?>