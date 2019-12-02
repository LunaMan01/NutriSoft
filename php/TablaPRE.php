<!DOCTYPE html>
<html>
	<head>
		<title> TABLA PREPARACION </title>
	</head>
	<body>
		<table border="2" align="center" target="iframePRE">
			<tr>
				<td> ID_PREPARACION </td>
				<td> Nombre Platillo </td>
				<td> Nombre Alimento </td>
				<td> Cantidad </td>
				<td> Unidad </td>
				<td> Tipo </td>
				<td> Funciones </td>
			</tr>

			<?php
				
				$conexion=mysqli_connect('localhost','root','','sdn');

				$sql="SELECT Preparacion.ID_PREPARACION, platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS ORDER BY ID_PREPARACION ";


				$result=mysqli_query($conexion,$sql);

				while ($mostrar=mysqli_fetch_array($result)){
			?>

			<tr>
				<td><?php echo $mostrar['ID_PREPARACION']?></td>
				<td><?php echo $mostrar['Nombre_Pla']?></td>
				<td><?php echo $mostrar['Nombre_Ali']?></td>
				<td><?php echo $mostrar['Cantidad_Pre']?></td>
				<td><?php echo $mostrar['Unidad_Pre']?></td>
				<td><?php echo $mostrar['Tipos_Pre']?></td>
				<td>
					<a href="ModificarPRE.php?ID_PREPARACION=<?php echo $mostrar['ID_PREPARACION']; ?>"> Modificar </a>
					<a href="EliminarPRE.php?ID_PREPARACION=<?php echo $mostrar['ID_PREPARACION']; ?>"> Eliminar </a>
				</td>
			</tr>

			<?php
				}
			?>		

		</table>
	</body>
</html>