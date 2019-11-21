
		<div class="d-none">
			<iframe id="iframeAli" name="iframeP" frameborder="1"></iframe>
		</div>
	<div class="card-pacientes">
	<div class="container">
	<h3 class="mb-5">Nuevo platillo</h3>
	<div id="agregar" >
			<FORM action="php\AgregarPLa.php" method="POST" target="iframeP" onsubmit="mostrarMensaje('Platillo agregado correctamente', 'success')">
				<div class="form-group">
							<label for="Nombre_Pla"> Nombre </label>
						
							<input type="text" name="Nombre_Pla" class="form-control" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
				</div>
				<div class="form-group">
							<label for="Energia_Kal_Pla"> Energia Kal. </label>
							<input type="text" name="Energia_Kal_Pla" class="form-control" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
				<div class="form-group">		
							<label for="Lipidos_Pla"> Lipidos </label>
						
							<input type="text" name="Lipidos_Pla" class="form-control" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
				</div>			
				<div class="form-group">	
							<label for="Proteinas_Pla"> Proteinas </label>
						
							<input type="text" name="Proteinas_Pla" class="form-control" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
							</div>			
				<div class="form-group">	
							<label for="Hidratos_Carbono_Pla"> Hidratos de Carbono </label>
						
							<input type="text" name="Hidratos_Carbono_Pla" class="form-control" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
				</div>			
				<div class="text-right">
					
					<input type="reset" value="Limpiar" class="btn btn-secondary">
					<input type="submit" value="Ingresar" name="Agregar" class="btn btn-success">
				</div>
			</FORM>
		<!-- </div> -->
		<!--CODIGO INSERTAR GRUPOS_ALi -->
		<?php

			if (isset($_POST['Agregar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";

				//Recuperar variables
				
				$Nombre_Pla=$_POST['Nombre_Pla'];
				$Energia_Kal_Pla=$_POST['Energia_Kal_Pla'];
				$Lipidos_Pla=$_POST['Lipidos_Pla'];
				$Proteinas_Pla=$_POST['Proteinas_Pla'];
				$Hidratos_Carbono_Pla=$_POST['Hidratos_Carbono_Pla'];


				$sql="INSERT INTO platillos ( Nombre_Pla, Energia_Kal_Pla, Lipidos_Pla, Proteinas_Pla, Hidratos_Carbono_Pla) VALUES ( '$Nombre_Pla','$Energia_Kal_Pla', '$Lipidos_Pla', '$Proteinas_Pla', '$Hidratos_Carbono_Pla')";

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