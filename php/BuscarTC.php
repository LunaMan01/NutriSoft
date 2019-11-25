<?php

			
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				// echo "conecxion exitosa <br><br>";
				

				//Recuperar variables
				// $ID_TIEMPO=$_POST['ID_TIEMPO'];
				$Nombre_Tiempo=$_POST['Nombre_Tiempo'];
				

				// $sql="SELECT ID_TIEMPO, Nombre_Tiempo, Hora_Tiempo FROM tiempo_comida WHERE ID_TIEMPO='$ID_TIEMPO'";
				$sql="SELECT ID_TIEMPO, Nombre_Tiempo, Hora_Tiempo FROM tiempo_comida WHERE Nombre_Tiempo='$Nombre_Tiempo'";
				$result=mysqli_query($conectar,$sql);
				// $result1=mysqli_query($conectar,$sql1);

				while ($mostrar=mysqli_fetch_array($result)){
		?>		<!-- BUSQUEDA POR ID -->
				
			<tr id="tr<?php echo $mostrar['ID_TIEMPO']?>">
				<td><?php echo $mostrar['ID_TIEMPO']?></td>
				<td><?php echo $mostrar['Nombre_Tiempo']?></td>
				<td><?php echo $mostrar['Hora_Tiempo']?></td>
				<td>
				<i data-editar="<?php echo $mostrar['ID_TIEMPO']; ?>" class="far fa-edit accion-editar acciones"></i>
								<i id="<?php echo $mostrar['ID_TIEMPO']; ?>" name="<?php echo $mostrar['Nombre_Tiempo']?>" class="far fa-trash-alt accion-eliminar acciones"></i>
				</td>
			</tr>
		

			<?php
				}
				mysqli_close($conectar);
			?>
					
				
			
