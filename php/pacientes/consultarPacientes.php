<?php 
    include '../conexion.php';

    try{
        $pacientes = "SELECT ID_PACIENTES, Nombre_P, Ap_P, Telefono, Correo FROM Pacientes";

        foreach($conn->query($pacientes) as $row){
            echo '<tr>                
                    <th id="'.$row['ID_PACIENTES'].'">'.$row['Nombre_P'].' '.$row['Ap_P'].'</th>'.
                    '<td>'.$row['Telefono'].'</td>'.
                    '<td>'.$row['Correo'].'</td>'.
                '<td>
                    <i class="fas fa-book-open nuevo-menu acciones"></i>
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