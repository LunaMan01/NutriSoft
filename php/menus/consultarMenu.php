<?php 
    include '../conexion.php';

    try{
        $menus = "SELECT DISTINCT pacientes.ID_PACIENTES, ID_MENU, Nombre_P, AP_P, AM_P, Dia_Ini, Mes_Ini, Anio_Ini 
            FROM menus INNER JOIN pacientes
            ON menus.ID_PACIENTES = pacientes.ID_PACIENTES";

        foreach($conn->query($menus) as $row){
            echo '<tr>                
                    <th id="'.$row['ID_PACIENTES'].'">'.$row['ID_MENU'].'</th>'.
                    '<td>'.$row['Nombre_P'].' '.$row['AP_P'].' '.$row['AM_P'].'</td>'.
                    '<td>'.$row['Dia_Ini'].'/'.$row['Mes_Ini'].'/'.$row['Anio_Ini'].'</td>'.
                '<td>
                    <i data-idmenu="'.$row['ID_MENU'].'" data-fechainicio="'.$row['Dia_Ini'].'/'.$row['Mes_Ini'].'/'.$row['Anio_Ini'].'" class="far fa-eye accion-ver acciones"></i>
                    <i data-idmenu="'.$row['ID_MENU'].'" class="far fa-trash-alt accion-eliminar acciones"></i>
                    <i data-idmenu="'.$row['ID_MENU'].'" data-idpaciente="'.$row['ID_PACIENTES'].'" class="far fa-edit accion-editar acciones"></i>
                </tr>';
        }
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null
?>