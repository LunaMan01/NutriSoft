<!DOCTYPE html>
<html>
	<head>
		<title> BUSCAR PREPARACION </title>
	</head>
	<body>
			<FORM action="BuscarPre.php" method="POST" targer="iframePRE">
				<table>
					<p> Datos a consultar </p>
					<tr>
						
						<td>
							<label for="ID_PREPARACION"> ID </label>
						</td>
						<td><input type="text" name="ID_PREPARACION" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999"></td>
					</tr>
					<tr>
						<td><label for="Nombre_Pla"> Nombre del Platillo </label></td>
						<td><input type="text" name="Nombre_Pla" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
					</tr>
				</table>
				<br>
				<input type="submit" value="Buscar" name="Buscar">
				<br>
			</FORM>

			<!--CODIGO BUSCAR GRUPOS_ALi -->
		<?php

			if (isset($_POST['Buscar'])) 
			{
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) 
				{
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conexion exitosa <br><br>";
				

				//Recuperar variables
				$ID_PREPARACION=$_POST['ID_PREPARACION'];
				
				$Nombre_Pla=$_POST['Nombre_Pla'];
				

				$sql="SELECT preparacion.ID_PREPARACION, preparacion.ID_PLATILLOS, preparacion.ID_ALIMENTOS, platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS WHERE ID_PREPARACION = '$ID_PREPARACION'";

				$sql1="SELECT preparacion.ID_PREPARACION, preparacion.ID_PLATILLOS, preparacion.ID_ALIMENTOS, platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS WHERE Nombre_Pla = '$Nombre_Pla' ORDER BY ID_PREPARACION";

				$result=mysqli_query($conectar,$sql);

				$result1=mysqli_query($conectar,$sql1);

		?>

				<table border="2">
						<tr>
							<td> ID_PREPARACION </td>
							<td> Nombre Platillo </td>
							<td> Nombre Alimento </td>
							<td> Cantidad </td>
							<td> Unidad </td>
							<td> Tipos </td>
							<td> Funciones </td>
						</tr>
				<?php		

				while ($mostrar=mysqli_fetch_array($result))
				{
		?>
					
						<tr>
							<td><?php echo $mostrar['ID_PREPARACION']?></td>
							<td><?php echo $mostrar['Nombre_Pla']?></td>
							<td><?php echo $mostrar['Nombre_Ali']?></td>
							<td><?php echo $mostrar['Cantidad_Pre']?></td>
							<td><?php echo $mostrar['Unidad_Pre']?></td>
							<td><?php echo $mostrar['Tipos_Pre']?></td>
							<td>
								<a href="ModificarPRE.php?ID_PREPARACION=<?php echo $mostrar['ID_PREPARACION']?> & ID_PLATILLOS=<?php echo $mostrar['ID_PLATILLOS'] ?> & ID_ALIMENTOS=<?php echo $mostrar['ID_ALIMENTOS'] ?>"> Modificar </a>
								<a href="EliminarPRE.php?ID_PREPARACION=<?php echo $mostrar['ID_PREPARACION']; ?>"> Eliminar </a>
							</td>
						</tr>	
		<?php
				}
			?>
				</table>
					<br><br>
		<?php
				if (mysqli_query($conectar, $sql)) 
				{
					//echo "consulta exitosa";
				}else
				{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
		?>

				<table border="2">
						<tr>
							<td> ID_PREPARACION </td>
							<td> Nombre Platillo </td>
							<td> Nombre Alimento </td>
							<td> Cantidad </td>
							<td> Unidad </td>
							<td> Tipos </td>
							<td> Funciones </td>
						</tr>
		<?php
				while ($mostrar=mysqli_fetch_array($result1))
				{
		?>
					
							
						<tr>
							<td><?php echo $mostrar['ID_PREPARACION']?></td>
							<td><?php echo $mostrar['Nombre_Pla']?></td>
							<td><?php echo $mostrar['Nombre_Ali']?></td>
							<td><?php echo $mostrar['Cantidad_Pre']?></td>
							<td><?php echo $mostrar['Unidad_Pre']?></td>
							<td><?php echo $mostrar['Tipos_Pre']?></td>
							<td>
							<a href="ModificarPRE.php?ID_PREPARACION=<?php echo $mostrar['ID_PREPARACION']?> & ID_PLATILLOS=<?php echo $mostrar['ID_PLATILLOS'] ?> & ID_ALIMENTOS=<?php echo $mostrar['ID_ALIMENTOS'] ?>"> Modificar </a>
							<a href="EliminarPRE.php?ID_PREPARACION=<?php echo $mostrar['ID_PREPARACION']; ?>"> Eliminar </a>
						</td>
						</tr>
					

		<?php
				}
		?>
				</table>
				<br><br>

		<?php

				if (mysqli_query($conectar, $sql)) 
				{
					echo "consulta exitosa";
				}else
				{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
		?>	
	</body>
</html>