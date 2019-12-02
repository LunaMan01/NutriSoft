<?php 
    include '../conexion.php';

    try{
        $delete = $conn->prepare("DELETE FROM menus WHERE ID_MENU = ". $_POST['menu']);
        $delete->execute();
        echo 'success';
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;
?>