<?php 
			$ID_GRUPOS=$_POST['ID_GRUPOS'];

			$conexion=mysqli_connect('localhost','root','','sdn');

			$sql="SELECT * FROM grupos_ali WHERE ID_GRUPOS='$ID_GRUPOS'";
			
			$result=mysqli_query($conexion,$sql);
			$mostrar=$result->fetch_assoc();

?>
		<div class="d-none">
			<iframe src="" frameborder="1" name="iframeGA"></iframe>
		</div>
		<div id="modificar" class="card-pacientes mt-5 p-5">
			<h3 class="text-center">Editar grupo</h3>
			<FORM action="php\ModificarGA.php?ID_GRUPOS=<?php echo $mostrar['ID_GRUPOS']; ?>"  method="POST" target="iframeGA" onsubmit="mostrarMensaje('Grupo modificado correctamente', 'success')">
			<div class="table-responsive">	
				<table class="table table-borderless">
					
					<tr>
						<td><label for="Nombre"> Nombre </label></td>
						<td><input type="text" name="Nombre_Grupo" class="form-control rounded-pill" value="<?php echo $mostrar['Nombre_Grupo']; ?>" ></td>
						<!-- pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" -->
					</tr>
					<tr>
						<td><label for="Color"> Color </label></td>
						<td><input type="text" name="Color_Grupo" class="form-control rounded-pill" value="<?php echo $mostrar['Color_Grupo']; ?>" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas"></td>
					</tr>
				</table>
				<div class="text-right mt-5">
					<input type="reset" value="Limpiar" class="btn btn-secondary">
					<input type="submit" value="Modificar" name="Modificar" class="btn btn-success mr-5">
				</div>
				</FORM>
		</div>
		<!--CODIGO MODIFICAR GRUPOS_ALi -->
		<?php

			if (isset($_POST['Modificar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";
				
				//Recuperar variables
				$ID_GRUPOS=$_REQUEST['ID_GRUPOS'];
				
				$Nombre_Grupo=$_POST['Nombre_Grupo'];
				$Color_Grupo=$_POST['Color_Grupo'];

				$sql="UPDATE grupos_ali SET  Nombre_Grupo='$Nombre_Grupo', Color_Grupo='$Color_Grupo'WHERE ID_GRUPOS='$ID_GRUPOS'";

				if (mysqli_query($conectar, $sql)) {
					echo "Datos Modificados";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
		?>

