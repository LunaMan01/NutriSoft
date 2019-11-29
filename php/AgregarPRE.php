<!DOCTYPE html>
<html>
	<head>
		<title> AGREGAR PREPARACION </title>
		<script src="jquery-3.4.1.js"> </script>
	</head>
	<body>

		<fieldset>
					<legend> ¿Cuantos Alimentos Va a Utilizar?</legend>
					<form method="POST" action="AgregarPRE.php">
						<input type="text" name="CantInput">
						<input type="submit" name="" value="Generar">
					</form>
				</fieldset>


		<!--<form id="agregarpre" action="AgregarPRE.php" method="POST" target="iframePRE">-->
			<FORM id="agregarPla" action="AgregarPRE.php" method="POST" target="iframePRE">

				<p> Ingrese el Nombre del Platillo  </p>

				<label for="Nombre_Pla"> Nombre Del Platillo </label>
				<select  name="ID_PLATILLOS">
					<option> Platillos: </option>
						<?php
							$conexion=mysqli_connect('localhost','root','','sdn');

							$sql="SELECT * from platillos";
							$result=mysqli_query($conexion,$sql);

							while ($mostrar=mysqli_fetch_array($result)){
						?>
							<option value="<?php echo $mostrar['ID_PLATILLOS']?>"> <?php echo $mostrar['Nombre_Pla']?> </option>
					  		<?php
					  			}
					  		?>
				</select>
			<!--</FORM>-->
				
				<br><br>

				

				<br><br>
				<!--<FORM id="siguiente" action="AgregarPRE.php" method="POST" target="iframePRE" >-->
					<?php 
						if (isset($_POST['CantInput'])) 
						{ ?>
						
							<?php 
								for ($i=1; $i <= $_POST['CantInput']; $i++) 
								{ ?>						
							

									<p> Ingrese el Alimentos a utilizar en la Preparacion del Platillo </p>
										
									<label for="Nombre_Ali"> Nombre Del Alimento </label>
													
									<select name="ID_ALIMENTOS[]">
										<option> Alimentos... </option>
										<?php

											$conexion=mysqli_connect('localhost','root','','sdn');

											$sql="SELECT * from alimentos";
											$result=mysqli_query($conexion,$sql);

											//$contador = 0;

											while ($mostrar=mysqli_fetch_array($result))
											{
												//$contador++;
										?>
												<option value="<?php echo $mostrar['ID_ALIMENTOS']?>"> <?php echo $mostrar['Nombre_Ali']?> </option>

												<?php
											}
												?>

									</select>

									<br><br>

									<label for="Cantidad_Pre"> Cantidad </label>
									<input type="text" name="Cantidad_Pre[]" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
									<br><br>				
									<label for="Unidad_Pre"> Unidad </label>
									<input type="text" name="Unidad_Pre[]" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
									<br><br>				
									<label for="Tipos_Pre"> Tipo </label>
									<input type="text" name="Tipos_Pre[]" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
									<br><br>
								<?php 
								} 
							?>
						<?php 
						} 
					?>
					<br><br>

					<!--<input type="submit" value="Siguiente Alimento" name="SA" form="siguiente">-->
					<input type="submit" value="Guardar Platillo" name="AgregarPla" form="agregarPla">
			</FORM>
			<br><br>
		<!--CODIGO INSERTAR Preparacion -->
		<?php
			if (isset($_POST['AgregarPla'])) 
			{
				//echo '<pre>';
				//print_r($_POST);//imprimo en forma de array los datos mandados del formulario

				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) 
				{
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conexion exitosa <br>";

				
				$arreglo = $_POST;//guardo los datos del formulario en un arreglo

				//asigno los datos de cada posicion a su variable correspondiente
				$id_alimento = $_POST['ID_ALIMENTOS'];
				$cantidad = $_POST['Cantidad_Pre'];
				$unidad = $_POST['Unidad_Pre'];
				$tipo = $_POST['Tipos_Pre'];

				//cuenta los id almacenados
				echo count($id_alimento)."\n\n\n";

				//ciclo para guardar los datos qque contiene el arreglo
				for ($i=0; $i < count($id_alimento); $i++) {

					if($i == 0){
						$sql="INSERT INTO preparacion ( ID_PLATILLOS, ID_ALIMENTOS, Cantidad_Pre, Unidad_Pre, Tipos_Pre) VALUES 
						(".$_POST['ID_PLATILLOS'].", ".$id_alimento[$i].", ".$cantidad[$i].", '".$unidad[$i]."', 
						'".$tipo[$i]."' )";

						if (mysqli_query($conectar, $sql)) 
						{
							
						}else{
							echo "error: " . $sql . "<br>" . mysqli_error($conectar);
						}
						
					}else{
						$id = mysqli_insert_id($conectar);
						$sql="INSERT INTO preparacion (ID_PREPARACION, ID_PLATILLOS, ID_ALIMENTOS, Cantidad_Pre, Unidad_Pre, Tipos_Pre) VALUES (".$id.", ".$_POST['ID_PLATILLOS'].", ".$id_alimento[$i].", ".$cantidad[$i].", '".$unidad[$i]."', 
						'".$tipo[$i]."' )";

						if (mysqli_query($conectar, $sql)) 
						{
							echo "datos guardados";
						}else{
							echo "error: " . $sql . "<br>" . mysqli_error($conectar);
						}
					}
				}
				mysqli_close($conectar);
			}
		?>
	</body>
</html>