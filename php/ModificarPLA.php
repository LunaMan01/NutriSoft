		<?php 
			$ID_PLATILLOS=$_POST['ID_PLATILLOS'];

			$conexion=mysqli_connect('localhost','root','','sdn');

			$sql="SELECT * FROM platillos WHERE ID_PLATILLOS='$ID_PLATILLOS'";
			$result=mysqli_query($conexion,$sql);
			$mostrar=$result->fetch_assoc();

		?>
		<div class="d-none">
			<iframe src="" frameborder="1" name="iframeP"></iframe>
		</div>
		<div id="modificar" class="card-pacientes mt-5">
			<FORM action="php\ModificarPLA.php?ID_PLATILLOS=<?php echo $mostrar['ID_PLATILLOS']; ?>" method="POST" target="iframeP" onsubmit="mostrarMensaje('Platillo modificado correctamente', 'success')">
			<div class="table-responsive">
				<table class="table table-borderless">
						<!-- <p> Datos a modificar </p> -->
						<tr>
							<td>
								<label for="Nombre_Pla"> Nombre_Pla </label>
							</td>
							<td>
								<input type="text" class="form-control rounded-pill" name="Nombre_Pla" value="<?php echo $mostrar['Nombre_Pla']; ?>" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
							</td>
						</tr>
						<tr>
							<td>
								<label for="Energia_Kal_Pla"> Energia Kal. </label>
							</td>
							<td>
								<input type="text" class="form-control rounded-pill" name="Energia_Kal_Pla" value="<?php echo $mostrar['Energia_Kal_Pla']; ?>" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
							</td>
						</tr>
						<tr>
							<td>
								<label for="Lipidos_Pla"> Lipidos </label>
							</td>
							<td>
								<input type="text" class="form-control rounded-pill" name="Lipidos_Pla" value="<?php echo $mostrar['Lipidos_Pla']; ?>" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
							</td>
						</tr>
						<tr>
							<td>
								<label for="Proteinas_Pla"> Proteinas </label>
							</td>
							<td>
								<input type="text" class="form-control rounded-pill" name="Proteinas_Pla" value="<?php echo $mostrar['Proteinas_Pla']; ?>" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
							</td>
						</tr>
						<tr>
							<td>
								<label for="Hidratos_Carbono_Pla"> Hidratos de Carbono </label>
							</td>
							<td>
								<input type="text" class="form-control rounded-pill" name="Hidratos_Carbono_Pla" value="<?php echo $mostrar['Hidratos_Carbono_Pla']; ?>" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
							</td>
						</tr>
					</table>
				</div>	
				<div class="text-right mt-5">
					<input type="reset" value="Limpiar" class="btn btn-secondary">
					<input type="submit" value="Modificar" name="Modificar" class="btn btn-success mr-5">
					
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
				$ID_PLATILLOS=$_REQUEST['ID_PLATILLOS'];
				
				$Nombre_Pla=$_POST['Nombre_Pla'];
				$Energia_Kal_Pla=$_POST['Energia_Kal_Pla'];
				$Lipidos_Pla=$_POST['Lipidos_Pla'];
				$Proteinas_Pla=$_POST['Proteinas_Pla'];
				$Hidratos_Carbono_Pla=$_POST['Hidratos_Carbono_Pla'];

				$sql="UPDATE platillos SET Nombre_Pla='$Nombre_Pla', Energia_Kal_Pla='$Energia_Kal_Pla', Lipidos_Pla='$Lipidos_Pla', Proteinas_Pla='$Proteinas_Pla', Hidratos_Carbono_Pla='$Hidratos_Carbono_Pla' WHERE ID_PLATILLOS='$ID_PLATILLOS'";

				if (mysqli_query($conectar, $sql)) {
					echo "Datos Modificados";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
		?>

	</body>
</html>