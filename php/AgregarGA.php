		<div class="d-none">
			<iframe id="iframeGA" name="iframeGA" frameborder="1"></iframe>
		</div>
		<div class="card-pacientes">
		<div class="container">
		<h3 class="mb-5">Nuevo grupo de alimentos</h3>
		<!-- agregar grupos_Ali -->
		<div id="agregar">
			<FORM action="php\AgregarGA.php" method="POST" target="iframeGA">
					<div class="form-group">	
						<label for="Nombre"> Nombre </label>
						<input type="text" name="Nombre_Grupo" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" class="form-control" ></td>
					</div>
					<div class="form-group">	
						<label for="Color"> Color </label>
						<input type="text" name="Color_Grupo" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" class="form-control" ></td>
					<div> 
				<div class="text-right mt-5">
					<input type="reset" value="Limpiar" class="btn btn-secondary">
					<input type="submit" value="Ingresar" name="Agregar" class="btn btn-success" >
				</div>
			</FORM>
		
		<!--CODIGO INSERTAR GRUPOS_ALi -->
		<?php

			if (isset($_POST['Agregar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";
				//Recuperar variables
				$Nombre_Grupo=$_POST['Nombre_Grupo'];
				$Color_Grupo=$_POST['Color_Grupo'];

				$sql="INSERT INTO grupos_ali ( Nombre_Grupo, Color_Grupo) VALUES ( '$Nombre_Grupo','$Color_Grupo')";

				if (mysqli_query($conectar, $sql)) {
					echo "datos guardados";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
		?>

		</div>
		</div>
		</div>