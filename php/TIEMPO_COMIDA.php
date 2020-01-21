<?php
				
				$conexion=mysqli_connect('localhost','root','','sdn');

				$sql="SELECT * from tiempo_comida";
				$result=mysqli_query($conexion,$sql);

				while ($mostrar=mysqli_fetch_array($result)){
			?>

			<tr id="tr<?php echo $mostrar['ID_TIEMPO']?>">
				<td><?php echo $mostrar['ID_TIEMPO']?></td>
				<td><?php echo $mostrar['Nombre_Tiempo']?></td>
				<!-- <td><?php// echo $mostrar['Hora_Tiempo']?></td> -->
				<td>
				<i data-editar="<?php echo $mostrar['ID_TIEMPO']; ?>" class="far fa-edit accion-editar acciones"></i>
								<i id="<?php echo $mostrar['ID_TIEMPO']; ?>" name="<?php echo $mostrar['Nombre_Tiempo']?>" class="far fa-trash-alt accion-eliminar acciones"></i>
				</td>
			</tr>

			<?php
				}
			?>		

		