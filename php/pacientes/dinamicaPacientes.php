<?php 
    include '../conexion.php';

    $dato = $_POST['dato'];

    try{
        $query = $conn->prepare("SELECT ID_PACIENTES, Nombre_P, Ap_P, Telefono, Correo FROM Pacientes
            WHERE Nombre_P LIKE ? OR Ap_P LIKE ? OR Telefono LIKE ? OR Correo LIKE ?");

        $query->execute(array($dato."%", $dato."%", $dato."%", $dato."%"));
    
        while($results = $query->fetch()){
            echo '<tr>
                <td>'.$results['Nombre_P'].' '.$results['Ap_P'].'</td>'.
                '<td>'.$results['Telefono'].'</td>'.
                '<td>'.$results['Correo'].'</td>'.
            '<td>
                <i class="far fa-eye accion-ver acciones"></i>
                <i class="far fa-trash-alt accion-eliminar acciones"></i>
                <i class="far fa-edit accion-editar acciones"></i>
            </tr>';
        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>