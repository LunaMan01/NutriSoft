<div class="d-none">
	<iframe id="iframeTC" name="iframeTC" frameborder="1"></iframe>
</div>
<div class="card-pacientes">
<div class="container">
<h3 class="mb-5">Nuevo tiempo de comida</h3>
	<div id="agregar" >
			<FORM action="php\AgregarTC.php" method="POST" target="iframeTC" onsubmit="mostrarMensaje('Tiempo de comida agregado correctamente', 'success')">
			<div class="form-group">
							<label for="Nombre_Tiempo"> Nombre </label>
							<input type="text" name="Nombre_Tiempo" value=""  class="form-control">
							<!-- pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" -->
			</div>
			<!-- 
			<div class="form-group">
							<label for="Hora_Tiempo">  Hora </label>
							<input type="text" name="Hora_Tiempo" value="" class="form-control">
							<!-- pattern="[0-9]{1,5}" title="numero en rango de 1-99999" 
			</div>	
			-->
			<div class="text-right mt-">
				<!-- <input type="reset" value="Limpiar" class="btn btn-secondary"> -->
				<input type="submit" value="Ingresar" name="Agregar" class="btn btn-success ml-2">
			</div>
			</FORM>
		</div>
		<!--CODIGO INSERTAR Tiempo de Comida -->
		<?php

			if (isset($_POST['Agregar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";

				//Recuperar variables
				
				$Nombre_Tiempo=$_POST['Nombre_Tiempo'];
				//$Hora_Tiempo=$_POST['Hora_Tiempo'];

				$sql="INSERT INTO tiempo_comida ( Nombre_Tiempo) VALUES ( '$Nombre_Tiempo')";

				if (mysqli_query($conectar, $sql)) {
					echo "datos guardados";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
		?>
