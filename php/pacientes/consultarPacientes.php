<?php 
    include '../conexion.php';

    try{
        $pacientes = "SELECT ID_PACIENTES, Nombre_P, Ap_P, Telefono, Correo FROM Pacientes";

        foreach($conn->query($pacientes) as $row){
            echo '<tr>                
                <td id="'.$row['ID_PACIENTES'].'">'.$row['Nombre_P'].' '.$row['Ap_P'].'</td>'.
                '<td>'.$row['Telefono'].'</td>'.
                '<td>'.$row['Correo'].'</td>'.
                '<td>
                    <i class="far fa-trash-alt accion-eliminar acciones"></i>
                    <i class="far fa-edit accion-editar acciones"></i>
                </tr>';
        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>