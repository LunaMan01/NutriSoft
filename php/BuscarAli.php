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
				$sql1="SELECT ID_ALIMENTOS, ID_GRUPOS, Nombre_Ali, Cantidad_Ali, Unidad_Ali, Peso_Bruto, Peso_Neto, Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali FROM alimentos WHERE Nombre_Ali='$Nombre_Ali'";
				//$result=mysqli_query($conectar,$sql);
				$result=mysqli_query($conectar,$sql1);

				while ($mostrar=mysqli_fetch_array($result)){
		?>
			<div class="card-pacientes mt-5">
				<div class="table-responsive">
					<table class="table table-borderless">
						<thead>
							<tr>
							<td> ID_ALIMENTOS </td>
							<td> ID_GRUPOS </td>
							<td> Nombre </td>
							<td> Cantidad </td>
							<td> Unidad </td>
							<td> Peso Bruto </td>
							<td> Peso Neto </td>
							<td> Energias Kal. </td>
							<td> Proteinas </td>
							<td> Lipidos </td>
							<td> Hidratos de Carbono </td>
							<td> Funciones </td>
						</thead>
						</tr>
						<tr>
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
								<a href="ModificarAli.php?ID_ALIMENTOS=<?php echo $mostrar['ID_ALIMENTOS']; ?>"> Modificar </a>
								<a href="EliminarAli.php?ID_ALIMENTOS=<?php echo $mostrar['ID_ALIMENTOS']; ?>"> Eliminar </a>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<br><br>
		<?php 
		
				}
		?>		
	
		
		
