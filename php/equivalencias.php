<?php 
    include 'conexion.php';

    $idMenu = $_POST['id-menu'];
    $dia = $_POST['dia'];

    try{
        /*$d = "SELECT nombre_pla, alimentos.nombre_ali, nombre_grupo, nombre_tiempo, dia 
            FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos
            ON grupos_ali.id_grupos = alimentos.id_grupos 
            AND tiempo_comida.id_tiempo = menus.id_tiempo
            AND alimentos.id_alimentos = preparacion.id_alimentos
            AND menus.id_platillos = preparacion.id_platillos
            AND menus.id_platillos = platillos.id_platillos";*/
        
        // GRUPOS DE ALIMENTOS // ID_GRUPO - NOMBRE_GRUPO
        if($_POST['opcion'] == 1){
            $array = array();
            $getGrupos = "SELECT DISTINCT grupos_ali.ID_GRUPOS, Nombre_Grupo
                FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos
                ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
                AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO
                AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS
                AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS
                AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS
                WHERE ID_MENU = ".$idMenu." AND Dia = '".$dia."'";
            
            foreach($conn->query($getGrupos) as $row){
                $grupos = new \stdClass();
                $grupos->idGrupo = $row['ID_GRUPOS'];
                $grupos->nombre = $row['Nombre_Grupo'];
                array_push($array, $grupos);
            }
            $gruposJSON = json_encode($array);
            echo $gruposJSON;
        }

        // TIEMPOS DE COMIDA // ID_TIEMPO - NOMBRE_TIEMPO
        if($_POST['opcion'] == 2) {
            $array = array();
            
            $getTiempos = "SELECT DISTINCT tiempo_comida.ID_TIEMPO, Nombre_Tiempo, Hora_Tiempo
                FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos
                ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
                AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO
                AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS
                AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS
                AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS
                WHERE ID_MENU = ".$idMenu." AND Dia = '".$dia."'";
            
            foreach($conn->query($getTiempos) as $row){
                $tiempos = new \stdClass();
                $tiempos->idTiempo = $row['ID_TIEMPO'];
                $tiempos->hora = $row['Hora_Tiempo'];
                $tiempos->nombre = $row['Nombre_Tiempo'];
                array_push($array, $tiempos);
            }
            $tiemposJSON = json_encode($array);
            echo $tiemposJSON;
        }
        // DATOS DE ALIMENTOS // ID_ALIMENTO - ID GRUPO QUE PERTENECE - ID_TIEMPO - CANTIDAD
        if($_POST['opcion'] == 3) {
            $array = array();
            $getAlimentos = "SELECT DISTINCT alimentos.ID_ALIMENTOS, grupos_ali.ID_GRUPOS, tiempo_comida.ID_TIEMPO, COUNT(grupos_ali.ID_GRUPOS) as cantidad
                FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos
                ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
                AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO
                AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS
                AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS
                AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS
                WHERE ID_MENU = ".$idMenu." AND Dia = '".$dia."' GROUP BY grupos_ali.ID_GRUPOS, tiempo_comida.ID_TIEMPO";

            foreach($conn->query($getAlimentos) as $row){
                $alimentos = new \stdClass();

                $alimentos->idAlimento = $row['ID_ALIMENTOS'];
                $alimentos->idGrupo = $row['ID_GRUPOS'];
                $alimentos->idTiempo = $row['ID_TIEMPO'];
                $alimentos->cantidad = $row['cantidad'];

                array_push($array, $alimentos);
            }
            $alimentosJSON = json_encode($array);
            echo $alimentosJSON;
        }
    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>