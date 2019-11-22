<?php 
    include '../conexion.php';

    try{
        $consultar = "SELECT * FROM grupos_ali";

        foreach($conn->query($consultar) as $row){
            echo '<tr>                
                    <th id="'.$row['ID_GRUPOS'].'">'.$row['Nombre_Grupo'].'</th>'.
                    '<td>'.$row['Color_Grupo'].'</td>'.
                '<td>
                    <i class="far fa-eye accion-ver acciones"></i>
                    <i class="far fa-trash-alt accion-eliminar acciones"></i>
                    <i class="far fa-edit accion-editar acciones"></i>
                </tr>';
        }
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;
?>