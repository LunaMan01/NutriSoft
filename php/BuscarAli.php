<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div id="buscar">
			<FORM action="BuscarAli.php" method="POST">
				<table>
					<p> Datos a consultar </p>
					<tr>
						
						<td><label for="ID_ALIMENTOS"> ID </label></td>
						<td><input type="text" name="ID_ALIMENTOS" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999"></td>
					</tr>
					<tr>
						<td><label for="Nombre_Ali"> Nombre </label></td>
						<td><input type="text" name="Nombre_Ali" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
					</tr>
				</table>

				<input type="submit" value="Buscar" name="Buscar">
				<input type="reset" value="Limpiar">
			</FORM>
		</div>
		<!--CODIGO BUSCAR ALIMENTOS -->
		
		<?php

			if (isset($_POST['Buscar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conexion exitosa <br><br>";
				

				//Recuperar variables
				$ID_ALIMENTOS=$_POST['ID_ALIMENTOS'];
				$Nombre_Ali=$_POST['Nombre_Ali'];
				

				$sql="SELECT ID_ALIMENTOS, ID_GRUPOS, Nombre_Ali, Cantidad_Ali, Unidad_Ali, Peso_Bruto, Peso_Neto, Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali FROM alimentos WHERE ID_ALIMENTOS='$ID_ALIMENTOS'";
				$sql1="SELECT ID_ALIMENTOS, ID_GRUPOS, Nombre_Ali, Cantidad_Ali, Unidad_Ali, Peso_Bruto, Peso_Neto, Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali FROM alimentos WHERE Nombre_Ali='$Nombre_Ali'";
				$result=mysqli_query($conectar,$sql);
				$result1=mysqli_query($conectar,$sql1);

				while ($mostrar=mysqli_fetch_array($result)){
		?>
		<table border="2" align="center">
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
				</tr>
				<br><br>

		<?php
			}
			if (mysqli_query($conectar, $sql)) {
				
			}else{
				echo "error: " . $sql . "<br>" . mysqli_error($conectar);
			}

			while ($mostrar=mysqli_fetch_array($result1)){
		?>

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
				</tr>
				<br><br>

		<?php 
			}
			if (mysqli_query($conectar, $sql1)) {
				echo "consulta exitosa";
			}else{
				echo "error: " . $sql1 . "<br>" . mysqli_error($conectar);
			}


			mysqli_close($conectar);
			}
		?>

	</body>
</html>