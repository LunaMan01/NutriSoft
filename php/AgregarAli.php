<!-- <!DOCTYPE html>
<html>
	<head>
		<title> AGREGAR ALIMENTOS </title>
	</head> -->
	<body>
		<h1>Agregar alimentosss</h1>
		<div id="agregar" target="iframeA">
			<FORM action="AgregarAli.php" method="POST">
				<table>
					<tr>
						<td><label for="ID_ALIMENTOS"> ID_ALIMENTOS </label></td>
						<td><input type="text" name="ID_ALIMENTOS" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999"></td>
					</tr>
					<tr>
						<td><label for="ID_GRUPOS"> ID_GRUPOS </label></td>
						<td><input type="text" name="ID_GRUPOS" value="" pattern="[0-9]{1,5}" title="Numero dentro del rango de 1-99999"></td>
					</tr>
					<tr>
						<td><label for="Nombre_Ali"> Nombre </label></td>
						<td><input type="text" name="Nombre_Ali" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
					</tr>
					<tr>
						<td><label for="Cantidad_Ali"> Cantidad </label></td>
						<td><input type="text" name="Cantidad_Ali" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
					</tr>
					<tr>
						<td><label for="Unidad_Ali"> Unidad </label></td>
						<td><input type="text" name="Unidad_Ali" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
					</tr>
					<tr>
						<td><label for="Peso_Bruto"> Peso Bruto </label></td>
						<td><input type="text" name="Peso_Bruto" value="" pattern="[0-9]{1,5}" title="Numero que este dentro del rango de 1-99999"></td>
					</tr>
					<tr>
						<td><label for="Peso_Neto"> Peso Neto </label></td>
						<td><input type="text" name="Peso_Neto" value="" pattern="[0-9]{1,5}" title="Solo numeros"></td>
					</tr>
					<tr>
						<td><label for="Energia_Kal_Ali"> Energias Kal. </label></td>
						<td><input type="text" name="Energia_Kal_Ali" value="" pattern="[0-9]{1,5}" title="Solo numeros"></td>
					</tr>
					<tr>
						<td><label for="Proteinas_Ali"> Proteinas </label></td>
						<td><input type="text" name="Proteinas_Ali" value="" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal"></td>
					</tr>
					<tr>
						<td><label for="Lipidos_Ali"> Lipidos </label></td>
						<td><input type="text" name="Lipidos_Ali" value="" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal"></td>
					</tr>
					<tr>
						<td><label for="Hidratos_Carbono_Ali"> Hidratos de Carbono </label></td>
						<td><input type="text" name="Hidratos_Carbono_Ali" value="" pattern="[0-9]{1,5}" title="Solo numeros con punto decimal"></td>
					</tr>
				</table>

				<input type="submit" value="Ingresar" name="Agregar">
				<input type="reset" value="Limpiar">
			</FORM>
		</div>

		<!--CODIGO INSERTAR GRUPOS_ALi -->
		<?php
			echo 'SIIII';
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