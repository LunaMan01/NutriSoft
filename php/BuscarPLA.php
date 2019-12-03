
		<!--CODIGO BUSCAR GRUPOS_ALi -->
		<?php

				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				// echo "conecxion exitosa <br><br>";
				

				//Recuperar variables
				// $ID_PLATILLOS=$_POST['ID_PLATILLOS'];
				$Nombre_Pla=$_POST['Nombre_Pla'];
				

				// $sql="SELECT ID_PLATILLOS, Nombre_Pla, Energia_Kal_Pla, Lipidos_Pla, Proteinas_Pla, Hidratos_Carbono_Pla FROM platillos WHERE ID_PLATILLOS='$ID_PLATILLOS'";
				$sql1="SELECT ID_PLATILLOS, Nombre_Pla, Energia_Kal_Pla, Lipidos_Pla, Proteinas_Pla, Hidratos_Carbono_Pla 
					FROM platillos WHERE Nombre_Pla LIKE '$Nombre_Pla%'";
				// $result=mysqli_query($conectar,$sql);
				$result1=mysqli_query($conectar,$sql1);

				while ($mostrar=mysqli_fetch_array($result1)){
			?>
					
			
						<tr id="tr<?php echo $mostrar['ID_PLATILLOS']?>">
							<td><?php echo $mostrar['ID_PLATILLOS']?></td>
							<td><?php echo $mostrar['Nombre_Pla']?></td>
							<td><?php echo $mostrar['Energia_Kal_Pla']?></td>
							<td><?php echo $mostrar['Lipidos_Pla']?></td>
							<td><?php echo $mostrar['Proteinas_Pla']?></td>
							<td><?php echo $mostrar['Hidratos_Carbono_Pla']?></td>
							<td>
								<i data-editar="<?php echo $mostrar['ID_PLATILLOS']; ?>" class="far fa-edit accion-editar acciones"></i>
								<i id="<?php echo $mostrar['ID_PLATILLOS']; ?>" name="<?php echo $mostrar['Nombre_Pla']?>" class="far fa-trash-alt accion-eliminar acciones"></i>
							</td>
						</tr>
			<?php 
				}
				if (mysqli_query($conectar, $sql1)) {
					// echo "consulta exitosa: <br><br>";
				}else{
					echo "error: " . $sql1 . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			
		?>
