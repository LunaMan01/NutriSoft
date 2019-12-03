<?php 
    include '../conexion.php';

    $dato = $_POST['dato'];

    try{
        $menus = $conn->prepare("SELECT DISTINCT pacientes.ID_PACIENTES, ID_MENU, Nombre_P, AP_P, AM_P, Dia_Ini, Mes_Ini, Anio_Ini 
            FROM menus INNER JOIN pacientes
            ON menus.ID_PACIENTES = pacientes.ID_PACIENTES
            WHERE ID_MENU LIKE ? OR Nombre_P LIKE ? OR AP_P LIKE ? OR AM_P LIKE ?");

        $menus->execute(array($dato."%", $dato."%", $dato."%", $dato."%"));
            
        while($results = $menus->fetch()){
            echo '<tr>                
                    <th id="'.$results['ID_PACIENTES'].'">'.$results['ID_MENU'].'</th>'.
                    '<td>'.$results['Nombre_P'].' '.$results['AP_P'].' '.$results['AM_P'].'</td>'.
                    '<td>'.$results['Dia_Ini'].'/'.$results['Mes_Ini'].'/'.$results['Anio_Ini'].'</td>'.
                '<td>
                    <i class="far fa-eye accion-ver acciones"></i>
                    <i class="far fa-trash-alt accion-eliminar acciones"></i>
                    <i class="far fa-edit accion-editar acciones"></i>
                </tr>';
        }
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null
?>