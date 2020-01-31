<?php
	
	require ('fpdf/fpdf.php');
	//require ('conexion.php');
	
	class PDF extends FPDF
	{
		public $tiemposA = array( );
		function Header()
		{	
			$conn = new mysqli('localhost', 'root', '', 'sdn');
	
			if($conn->connect_error){
				
				die('Error en la conexion' . $conn->connect_error);
				echo 'chale';
			}
			//Logo
			$this->Image('reporte.png', 5, 5, 30 );
			//Letra, Negrita, tamaño
			$this->SetFont('Arial','B',10);
			//Centrado
			$this->Cell(30);
			//Titulo
			$this->Cell(120,10, ' MENU y EQUIVALENCIAS',1,0,'C');
			//Salto de Linea
			$this->Ln(20);
			
			$idMenu=4;
			$dia = "lunes";
			
			
			
			
			$getTiempos = "SELECT DISTINCT tiempo_comida.ID_TIEMPO, Nombre_Tiempo, Hora_Tiempo
                FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos
                ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
                AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO
                AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS
                AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS
                AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS
                WHERE ID_MENU = ".$idMenu." AND Dia = '".$dia."'";
            
			$this->SetFillColor(232,232,232);
			$this->cell(30,6, 'Grupos', 1,0,'c',1);
			
			
			$arreglo = $conn->query($getTiempos);
			$longitud = $arreglo->num_rows;
			
			$i = 0;
            foreach($arreglo as $row){
                $tiempos = new \stdClass();
                $tiempos->idTiempo = $row['ID_TIEMPO'];
                $tiempos->hora = $row['Hora_Tiempo'];
                $tiempos->nombre = $row['Nombre_Tiempo'];
				$this->SetFillColor(232,232,232);
				
				// if($i == $longitud-1)
					// $this->cell(40,6, $row['Nombre_Tiempo'], 1,1,'c',1);
				// else
					$this->cell(40,6, $row['Nombre_Tiempo'], 1,0,'c',1);
                $i++;
				
				array_push($this->tiemposA, $row['Nombre_Tiempo']);
            }
			
			
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
	
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	//letra, negritas, tamaño
	$pdf->SetFont('Arial','B',9);

	
	$conn = new mysqli('localhost', 'root', '', 'sdn');
	
			if($conn->connect_error){
				
				die('Error en la conexion' . $conn->connect_error);
				
			}
			
	$idMenu=4;
	$dia = "lunes";
	
	/*
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
				
				$pdf->Cell(30,6,utf8_decode($row['Nombre_Grupo']),1,1,'C');
				
               
            }
			*/

	function encontrarTiempo ($nombreTiempo, $cantidad, $arreglo, $pdf) {
		$i = 0;
		foreach($arreglo as $tiempo) {
			if(strcmp($nombreTiempo, $tiempo) == 0) {
				if($tiempo === end($arreglo))
					$pdf->Cell(40,6,$cantidad,1,1,'C');
				else
					$pdf->Cell(40,6,$cantidad,1,0,'C');
				
				$i++;

				break;
			}
		}
		return $i;
	
	}		
		
	$getAlimentos = "SELECT DISTINCT alimentos.ID_ALIMENTOS, tiempo_comida.Nombre_Tiempo, grupos_ali.Nombre_Grupo, grupos_ali.ID_GRUPOS, 
				tiempo_comida.ID_TIEMPO, COUNT(grupos_ali.ID_GRUPOS) as cantidad
                FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos
                ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
                AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO
                AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS
                AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS
                AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS
                WHERE ID_MENU = ".$idMenu." AND Dia = '".$dia."' GROUP BY grupos_ali.ID_GRUPOS, tiempo_comida.ID_TIEMPO ";
			
				
			$Grup = array( );
			$tiempos = array();
			$yaEsta = false;
			$aux = 0;

			$rowsAImprimir = array();
			$i = 0;
            foreach($conn->query($getAlimentos) as $row){
                			
				foreach($Grup as $Ex){
					if($Ex == $row['Nombre_Grupo']) {
						$yaEsta = true;
						break;
					}
				}

				
				if($yaEsta == false) {
					$pdf->Ln();
					$pdf->Cell(30,6,utf8_decode($row['Nombre_Grupo']),1,0,'C');
					array_push($Grup, $row['Nombre_Grupo']);
					// $pdf->Cell(30,6,utf8_decode($row['cantidad']),1,1,'C');	
					
				} 
				$pdf->Cell(40,6,utf8_decode($row['cantidad']),1,0,'C');
					

				
					
				
					
				
				$yaEsta = false;
				
            }
	
	
	$pdf->Output();
?>