<!-- <!DOCTYPE html>
<html>
	<head>
		<title> AGREGAR ALIMENTOS </title>
	</head> -->
	<!-- <body> -->
		<div class="card-pacientes">
			<div class="container">
				<h3 class="mb-5">Nuevo alimento</h3>
				<div id="agregar">
					<form action="php\AgregarAli.php" method="POST">				
								<div class="form-group">
									<label for="ID_ALIMENTOS"> ID_ALIMENTOS </label>
								
									<input type="text" class="form-control" name="ID_ALIMENTOS" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
								</div>
							
								<div class="form-group">
									<label for="ID_GRUPOS"> ID_GRUPOS </label>
								
									<input type="text" name="ID_GRUPOS" class="form-control" value="" pattern="[0-9]{1,5}" title="Numero dentro del rango de 1-99999">
								</div>
							
								<div class="form-group">
									<label for="Nombre_Ali"> Nombre </label>
								
									<input type="text" name="Nombre_Ali" class="form-control" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
								</div>
							
								<div class="form-group">
									<label for="Cantidad_Ali"> Cantidad </label>
								
									<input type="text" name="Cantidad_Ali" class="form-control" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
								</div>
								<div class="form-group">
									<label class="form-group" for="Unidad_Ali"> Unidad </label>
									<input type="text" name="Unidad_Ali" class="form-control" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
								</div>
													
								
							
								<div class="form-group">
									<label for="Peso_Bruto"> Peso Bruto </label>
								
									<input type="text" name="Peso_Bruto" class="form-control" value="" pattern="[0-9]{1,5}" title="Numero que este dentro del rango de 1-99999">
								<div>
							
								<div class="form-group">
									<label for="Peso_Neto"> Peso Neto </label>
								
									<input type="text" name="Peso_Neto" class="form-control" value="" pattern="[0-9]{1,5}" title="Solo numeros">
								<div>
							
								<div class="form-group">
									<label for="Energia_Kal_Ali"> Energias Kal. </label>
									<input type="text" name="Energia_Kal_Ali" class="form-control" value="" pattern="[0-9]{1,5}" title="Solo numeros">
								<div>
							
								<div class="form-group">
									<label for="Proteinas_Ali"> Proteinas </label>
								
									<input type="text" name="Proteinas_Ali" class="form-control" value="" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal">
								<div>
							
								<div class="form-group">
									<label for="Lipidos_Ali"> Lipidos </label>
								
									<input type="text" name="Lipidos_Ali" class="form-control" value="" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal">
								<div>
							
								<div class="form-group">
									<label for="Hidratos_Carbono_Ali"> Hidratos de Carbono </label>
								
									<input type="text" name="Hidratos_Carbono_Ali" class="form-control" value="" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal">
								</div>				

						<div class="text-right">
							<input type="reset" value="Limpiar" class="btn btn-secondary">
							<input type="submit" value="Ingresar" name="Agregar" class="btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>

		<!--CODIGO INSERTAR GRUPOS_ALi -->
		<?php
			
			if (isset($_POST['Agregar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";
				//Recuperar variables
				$ID_ALIMENTOS=$_POST['ID_ALIMENTOS'];
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

				$sql="INSERT INTO alimentos ( ID_ALIMENTOS, ID_GRUPOS, Nombre_Ali, Cantidad_Ali, Unidad_Ali, Peso_Bruto, Peso_Neto, Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali ) VALUES ( '$ID_ALIMENTOS', '$ID_GRUPOS', '$Nombre_Ali','$Cantidad_Ali', '$Unidad_Ali', '$Peso_Bruto', '$Peso_Neto', '$Energia_Kal_Ali', '$Proteinas_Ali', '$Lipidos_Ali', '$Hidratos_Carbono_Ali' )";

				if (mysqli_query($conectar, $sql)) {
					echo "datos guardados";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
		?>

	<!-- </body>
</html> -->