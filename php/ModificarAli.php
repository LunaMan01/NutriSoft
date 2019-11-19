
		<?php 
			$ID_ALIMENTOS=$_POST['ID_ALIMENTOS'];

			$conexion=mysqli_connect('localhost','root','','sdn');

			$sql="SELECT * FROM alimentos WHERE ID_ALIMENTOS='$ID_ALIMENTOS'";
			if($result=mysqli_query($conexion,$sql)) {
				// echo $ID_ALIMENTOS;
			} else {
				echo 'no';
			}
			$mostrar=$result->fetch_assoc();
		?>
		<div class="d-none">
			<iframe id="iframeAli" name="iframeAli" frameborder="1"></iframe>
		</div>

		<div id="modificar" class="card-pacientes">
			<FORM action="php\modificarAli.php?ID_ALIMENTOS=<?php echo $mostrar['ID_ALIMENTOS']; ?>" method="POST" target="iframeAli" onsubmit="mostrarMensaje('Alimento modificado correctamente','success')">
				<div class="table-responsive ">
					<table class="table table-borderless">
							<p class="text-center">  Datos a Modificar </p>
						<tr>
							<td><label for="ID_GRUPOS"> ID_GRUPOS </label></td>
							<td><input type="text" class="form-control rounded-pill" name="ID_GRUPOS" value="<?php echo $mostrar['ID_GRUPOS']; ?>" pattern="[0-9]{1,5}" title="Numero dentro del rango de 1-99999"></td>
						</tr>
						<tr>
							<td><label for="Nombre_Ali"> Nombre </label></td>
							<td><input type="text" name="Nombre_Ali" class="form-control rounded-pill" value="<?php echo $mostrar['Nombre_Ali']; ?>" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
						</tr>
						<tr>
							<td><label for="Cantidad_Ali"> Cantidad </label></td>
							<td><input type="text" class="form-control rounded-pill" name="Cantidad_Ali" value="<?php echo $mostrar['Cantidad_Ali']; ?>" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
						</tr>
						<tr>
							<td><label for="Unidad_Ali"> Unidad </label></td>
							<td><input type="text" name="Unidad_Ali" class="form-control rounded-pill" value="<?php echo $mostrar['Unidad_Ali']; ?>" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
						</tr>
						<tr>
							<td><label for="Peso_Bruto"> Peso Bruto </label></td>
							<td><input type="text" name="Peso_Bruto" class="form-control rounded-pill" value="<?php echo $mostrar['Peso_Bruto']; ?>" pattern="[0-9]{1,5}" title="Numero que este dentro del rango de 1-99999"></td>
						</tr>
						<tr>
							<td><label for="Peso_Neto"> Peso Neto </label></td>
							<td><input type="text" name="Peso_Neto" class="form-control rounded-pill" value="<?php echo $mostrar['Peso_Neto']; ?>" pattern="[0-9]{1,5}" title="Solo numeros"></td>
						</tr>
						<tr>
							<td><label for="Energia_Kal_Ali"> Energias Kal. </label></td>
							<td><input type="text" name="Energia_Kal_Ali" class="form-control rounded-pill" value="<?php echo $mostrar['Energia_Kal_Ali']; ?>" pattern="[0-9]{1,5}" title="Solo numeros"></td>
						</tr>
						<tr>
							<td><label for="Proteinas_Ali"> Proteinas </label></td>
							<td><input type="text" name="Proteinas_Ali" class="form-control rounded-pill" value="<?php echo $mostrar['Proteinas_Ali']; ?>" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal"></td>
						</tr>
						<tr>
							<td><label for="Lipidos_Ali"> Lipidos </label></td>
							<td><input type="text" name="Lipidos_Ali" class="form-control rounded-pill" value="<?php echo $mostrar['Lipidos_Ali']; ?>" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal"></td>
						</tr>
						<tr>
							<td><label for="Hidratos_Carbono_Ali"> Hidratos de Carbono </label></td>
							<td><input type="text" name="Hidratos_Carbono_Ali" class="form-control rounded-pill" value="<?php echo $mostrar['Hidratos_Carbono_Ali']; ?>" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal"></td>
						</tr>
					</table>
				<br><br>
				<div class="text-right p-5">
					<input type="reset" value="Limpiar" class="btn btn-secondary">
					<input type="submit" value="Modificar" name="Modificar" class="btn btn-success ml-3">
				</div>
				</div>
			</FORM>
			
		</div>
		<!--CODIGO MODIFICAR ALIMENTOS -->
		<?php

			if (isset($_POST['Modificar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
						echo "conecxion exitosa <br>";
						//Recuperar variables
						$ID_ALIMENTOS=$_REQUEST['ID_ALIMENTOS'];

						$ID_GRUPOS=$_POST['ID_GRUPOS'];
						$Nombre_Ali=$_POST['Nombre_Ali'];
						$Cantidad_Ali=$_POST['Cantidad_Ali'];
						$Unidad_Ali=$_POST['Unidad_Ali'];
						$Peso_Bruto=$_POST['Peso_Bruto'];
						$Peso_Neto=$_POST['Peso_Neto'];
						$Energia_Kal_Ali=$_POST['Energia_Kal_Ali'];
						$Proteinas_Ali=$_POST['Proteinas_Ali'];
						$Lipidos_Ali=$_POST['Lipidos_Ali'];
						$Hidratos_Carbono_Ali=$_POST['Hidratos_Carbono_Ali'];

						$sql="UPDATE alimentos SET ID_GRUPOS='$ID_GRUPOS', Nombre_Ali='$Nombre_Ali', Cantidad_Ali='$Cantidad_Ali', Unidad_Ali='$Unidad_Ali', Peso_Bruto='$Peso_Bruto', Peso_Neto='$Peso_Bruto', Energia_Kal_Ali='$Energia_Kal_Ali', Proteinas_Ali='$Proteinas_Ali', Lipidos_Ali='$Lipidos_Ali', Hidratos_Carbono_Ali='$Hidratos_Carbono_Ali' WHERE ID_ALIMENTOS='$ID_ALIMENTOS'";

						if (mysqli_query($conectar, $sql)) {
							
						}else{
							echo "error: " . $sql . "<br>" . mysqli_error($conectar);
						}
						mysqli_close($conectar);
					
					}
		?>
