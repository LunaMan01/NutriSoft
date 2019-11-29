<!DOCTYPE html>
<html>
	<head>
		<title> ELIMINAR PREPARACION </title>
	</head>
	<body>

		<?php 
			$ID_PREPARACION=$_GET['ID_PREPARACION'];

			$conexion=mysqli_connect('localhost','root','','sdn');

			$sql="SELECT preparacion.ID_PREPARACION, preparacion.ID_PLATILLOS, preparacion.ID_ALIMENTOS, platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS WHERE ID_PREPARACION = '$ID_PREPARACION'";

			$result=mysqli_query($conexion,$sql);

		?>
			<FORM action="EPRE.php" method="GET" target="iframePRE">
				<input type="hidden" name="ID_PREPARACION" value="<?php echo $ID_PREPARACION?>">
				<table border="2">
					<p> ¿SEGURO QUE DESEA ELIMINAR LA PREPARACION...<?php echo $ID_PREPARACION?>?</p>
						<tr>
							<td> ID_PREPARACION </td>
							<td> Nombre Platillo </td>
							<td> Nombre Alimento </td>
							<td> Cantidad </td>
							<td> Unidad </td>
							<td> Tipos </td>
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
						</tr>	
		<?php
				}
			?>
				</table>
				<br><br>
				<input type="submit" value="Eliminar" name="Eliminar">
			</FORM>
	</body>
</html>