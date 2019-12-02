<?php
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) 
				{
					die("conexion fallida: ".mysqli_connect_error());
				}
				// echo "conexion exitosa <br><br>";
				

				//Recuperar variables
				// $ID_PREPARACION=$_POST['ID_PREPARACION'];
				
				$Nombre_Pla=$_POST['Nombre_Pla'];
				

				// $sql="SELECT preparacion.ID_PREPARACION, preparacion.ID_PLATILLOS, preparacion.ID_ALIMENTOS, platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS WHERE ID_PREPARACION = '$ID_PREPARACION'";

				$sql1="SELECT preparacion.ID_PREPARACION, preparacion.ID_PLATILLOS, preparacion.ID_ALIMENTOS, platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS WHERE Nombre_Pla = '$Nombre_Pla' ORDER BY ID_PREPARACION";

				// $result=mysqli_query($conectar,$sql);

				$result=mysqli_query($conectar,$sql1);

		?>

				<?php		

				while ($mostrar=mysqli_fetch_array($result))
				{
		?>
					
						<tr id="tr<?php echo $mostrar['ID_PREPARACION']?>">
							<td><?php echo $mostrar['ID_PREPARACION']?></td>
							<td><?php echo $mostrar['Nombre_Pla']?></td>
							<td><?php echo $mostrar['Nombre_Ali']?></td>
							<td><?php echo $mostrar['Cantidad_Pre']?></td>
							<td><?php echo $mostrar['Unidad_Pre']?></td>
							<td><?php echo $mostrar['Tipos_Pre']?></td>
							<td>
								<i data-idpreparacion="<?php echo $mostrar['ID_PREPARACION']?>" data-idplatillos="<?php echo $mostrar['ID_PLATILLOS'] ?>" data-idalimentos="<?php echo $mostrar['ID_ALIMENTOS'] ?>" class="far fa-edit accion-editar acciones"></i>
								<i data-idpreparacion="<?php echo $mostrar['ID_PREPARACION'];?>" class="far fa-trash-alt accion-eliminar acciones"></i>
							</td>
						</tr>	
		<?php
				}
			?>
			