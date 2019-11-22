<?php 
    include '../conexion.php';

    $dato = $_POST['dato'];

    try{
        $dinamica = " SELECT * FROM grupos_ali 
            WHERE Nombre_Grupo = ? OR Color_Grupo = ?";

        $dinamica->execute(array($dato."%", $dato."%"));

        while($results = $dinamica->fetch()){
            echo '<tr>
                <td id="'.$row['ID_GRUPOS'].'">'.$results['Nombre_Grupo'].'</td>'.
                '<td>'.$results['Color_Grupo'].'</td>'.
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