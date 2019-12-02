<?php 
    include '../conexion.php';

    $dia = $_POST['dia'];
    $idMenu = $_POST['id-menu'];
    $opcion = $_POST['opcion'];

    try{
        if($opcion == 2){
            $platillos = "SELECT platillos.ID_PLATILLOS, menus.ID_TIEMPO, Nombre_Pla, Nombre_Tiempo, Hora_Tiempo 
                FROM platillos INNER JOIN menus INNER JOIN tiempo_comida
                ON platillos.ID_PLATILLOS = menus.ID_PLATILLOS AND menus.ID_TIEMPO = tiempo_comida.ID_TIEMPO
                WHERE ID_MENU = ".$idMenu." AND Dia = '".$dia."' ";
            
            foreach($conn->query($platillos) as $row){
                echo '<tr>                
                    <th>'.$row['Nombre_Pla'].'</th>'.
                    '<td>'.$row['Nombre_Tiempo'].' '.$row['Hora_Tiempo'].'</td>'.
                '<td>
                    <i data-ideliminar="'.$row['ID_PLATILLOS'].'" data-idtiempo="'.$row['ID_TIEMPO'].'" class="far fa-trash-alt eliminar-platillo acciones"></i>
                </tr>';
            }
        } else{
            $platillos = "SELECT platillos.ID_PLATILLOS, menus.ID_TIEMPO, Nombre_Pla, Nombre_Tiempo, Hora_Tiempo 
                FROM platillos INNER JOIN menus INNER JOIN tiempo_comida
                ON platillos.ID_PLATILLOS = menus.ID_PLATILLOS AND menus.ID_TIEMPO = tiempo_comida.ID_TIEMPO
                WHERE ID_MENU = ".$idMenu." AND Dia = '".$dia."' ";
            
            foreach($conn->query($platillos) as $row){
                echo '<tr>                
                    <th>'.$row['Nombre_Pla'].'</th>'.
                    '<td>'.$row['Nombre_Tiempo'].' '.$row['Hora_Tiempo'].'</td>'.
                '<td>
                    
                </tr>';
            }
        }
    }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
    }
    $conn = null;
?>