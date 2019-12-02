<!DOCTYPE html>
<html>
	<head>
		<title> ELIMINAR PREPARACION </title>
	</head>
	<body>

		<?php 
			$ID_PREPARACION=$_POST['ID_PREPARACION'];

			$conexion=mysqli_connect('localhost','root','','sdn');

			$sql="SELECT preparacion.ID_PREPARACION, preparacion.ID_PLATILLOS, preparacion.ID_ALIMENTOS, platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS WHERE ID_PREPARACION = '$ID_PREPARACION'";

			$result=mysqli_query($conexion,$sql);

		?>
		<div class="d-none">
			<iframe src="" name="iframePRE" frameborder="0"></iframe>
		</div>
			<FORM action="php\EPRE.php" method="GET" target="iframePRE" class="mt-5" onsubmit="preparacionEliminada('Preparacion eliminada correctamente', 'success')">
				<input type="hidden" name="ID_PREPARACION" value="<?php echo $ID_PREPARACION?>">
				<div class="card-pacientes table-responsive">
				<table class="table table-borderless">
					<p class="text-bold"> ¿SEGURO QUE DESEA ELIMINAR LA PREPARACION...<?php echo $ID_PREPARACION?>?</p>
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
				</div>
				<div class="text-right mt-5 ml-3">
				<input type="submit"  class="btn btn-success" value="Eliminar" name="Eliminar">
				</div>
			</FORM>
	</body>
</html>