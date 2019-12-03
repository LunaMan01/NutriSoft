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
				$sql1="SELECT ID_ALIMENTOS, ID_GRUPOS, Nombre_Ali, Cantidad_Ali, Unidad_Ali, Peso_Bruto, Peso_Neto, Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali 
					FROM alimentos WHERE Nombre_Ali LIKE '$Nombre_Ali%' OR Unidad_Ali LIKE '$Nombre_Ali%' ";
				//$result=mysqli_query($conectar,$sql);
				$result=mysqli_query($conectar,$sql1);

				while ($mostrar=mysqli_fetch_array($result)){
		?>
			
							<tr id="tr<?php echo $mostrar['ID_ALIMENTOS']; ?>">
							<td><?php echo $mostrar['ID_ALIMENTOS']?></td>
							<td><?php echo $mostrar['ID_GRUPOS']?></td>
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
	
		
		
