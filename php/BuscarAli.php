<?php

			// if (isset($_POST['Buscar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
			// 	echo "conexion exitosa <br><br>";
				

				//Recuperar variables
				//$ID_ALIMENTOS=$_POST['ID_ALIMENTOS'];
				$Nombre_Ali=$_POST['Nombre_Ali'];
				

				//$sql="SELECT ID_ALIMENTOS, ID_GRUPOS, Nombre_Ali, Cantidad_Ali, Unidad_Ali, Peso_Bruto, Peso_Neto, Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali FROM alimentos WHERE ID_ALIMENTOS='$ID_ALIMENTOS'";
				$sql1="SELECT alimentos.ID_ALIMENTOS, alimentos.ID_GRUPOS, 
				grupos_ali.Nombre_Grupo, alimentos.Nombre_Ali, alimentos.Cantidad_Ali, 
			alimentos.Unidad_Ali, alimentos.Peso_Bruto, alimentos.Peso_Neto, alimentos.Energia_Kal_Ali, alimentos.Proteinas_Ali, 
			alimentos.Lipidos_Ali, alimentos.Hidratos_Carbono_Ali 
					FROM alimentos INNER JOIN grupos_ali ON alimentos.ID_GRUPOS = grupos_ali.ID_GRUPOS
					WHERE Nombre_Ali LIKE '$Nombre_Ali%' OR Unidad_Ali LIKE '$Nombre_Ali%' ORDER BY ID_ALIMENTOS ";
				//$result=mysqli_query($conectar,$sql);
				
				
				/*$sql1="SELECT preparacion.ID_PREPARACION, preparacion.ID_PLATILLOS, preparacion.ID_ALIMENTOS, 
				platillos.Nombre_Pla, 
				alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre 
					FROM preparacion INNER JOIN platillos INNER JOIN alimentos 
					ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS 
					WHERE Nombre_Pla LIKE '$Nombre_Pla%' OR Nombre_Ali LIKE '$Nombre_Pla%' OR Unidad_Pre LIKE '$Nombre_Pla%' 
					OR Tipos_Pre LIKE '$Nombre_Pla%' ORDER BY ID_PREPARACION";*/
				
				
				$result=mysqli_query($conectar,$sql1);
				
		?>
		<?php

				while ($mostrar=mysqli_fetch_array($result))
				{
		?>
			
							<tr id="tr<?php echo $mostrar['ID_ALIMENTOS']; ?>">
							<td><?php echo $mostrar['ID_ALIMENTOS']?></td>
							<td><?php echo $mostrar['Nombre_Grupo']?></td>
							<td><?php echo $mostrar['Nombre_Ali']?></td>
							<td><?php echo $mostrar['Cantidad_Ali']?></td>
							<td><?php echo $mostrar['Unidad_Ali']?></td>
							<td><?php echo $mostrar['Peso_Bruto']?></td>
							<td><?php echo $mostrar['Peso_Neto']?></td>
							<td><?php echo $mostrar['Energia_Kal_Ali']?></td>
							<td><?php echo $mostrar['Proteinas_Ali']?></td>
							<td><?php echo $mostrar['Lipidos_Ali']?></td>
							<td><?php echo $mostrar['Hidratos_Carbono_Ali']?></td>
							<td>
								<i data-editar="<?php echo $mostrar['ID_ALIMENTOS']; ?>" name="<?php echo $mostrar['Nombre_Ali']?>" class="far fa-edit accion-editar acciones"></i>
								<i id="<?php echo $mostrar['ID_ALIMENTOS']; ?>" name="<?php echo $mostrar['Nombre_Ali']?>" class="far fa-trash-alt accion-eliminar acciones"></i>
							</td>
						</tr>
			
		<?php 
		
				}
		?>		
	
		
		
