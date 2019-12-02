
		<div class="d-none">
			<iframe src="" name="iframePRE" frameborder="0"></iframe>
		</div>
		<!--<form id="agregarpre" action="AgregarPRE.php" method="POST" target="iframePRE">-->
		<div class="card-pacientes mt-5">
			<div class="container-fluid"> 
				<FORM id="agregarPla" action="php/ASGPRE.php" method="POST" target="iframePRE">

					<p> Ingrese el Nombre del Platillo  </p>

					<!-- <label for="Nombre_Pla"> Nombre Del Platillo </label> -->
					<select  name="ID_PLATILLOS" class="custom-select">
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
					<!--<FORM id="siguiente" action="AgregarPRE.php" method="POST" target="iframePRE" >-->	

					<br><br><br><br>					
					<p> Ingrese el Alimentos a utilizar en la Preparacion del Platillo </p>
					<div class="table-responsive">		
						<table class="table table-botderless"  id="tabla">
									<tr class="fila-fija">
											<td>
												<div class="input-group input-group-sm">
													<div class="custom-file">
														<!-- <label for="Nombre_Ali" class="text-center"> Alimento </label> -->
														<select name="ID_ALIMENTOS[]" class="custom-select" style="width:auto;">
															<option> Alimento </option>
															<?php

																$conexion=mysqli_connect('localhost','root','','sdn');

																$sql="SELECT * from alimentos";
																$result=mysqli_query($conexion,$sql);

																

																while ($mostrar=mysqli_fetch_array($result))
																{
																	
															?>
																	<option value="<?php echo $mostrar['ID_ALIMENTOS']?>"> <?php echo $mostrar['Nombre_Ali']?> </option>

																	<?php
																}
																	?>

														</select>
															
													</div>
												</div>	
											</td>
											<td>
												<div class="input-group input-group-sm">
													<div class="custom-file">
														<label for="Cantidad_Pre" class="text-center"> Cantidad </label>
														<input type="text" name="Cantidad_Pre[]" value="" pattern="[0-9]{1,5}" title="numero en rango de 1-99999" class="form-control ml-3">
													</div>
												</div>
											</td>	
											<td>
												<div class="input-group input-group-sm">
													<div class="custom-file">
														<label for="Unidad_Pre" class="text-center"> Unidad </label>
														<input type="text" name="Unidad_Pre[]" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" class="form-control ml-3">
													</div>	
												</div>
											</td>	
											<td>
												<div class="input-group input-group-sm">
													<div class="custom-file">
														<label for="Tipos_Pre" class="text-center"> Tipo </label>
														<input type="text" name="Tipos_Pre[]" value="" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" class="form-control ml-3">
													</div>		
												</div>
											</td>
											<td class="eliminar input-group input-group-sm"><input type="button" class="btn btn-danger"  value="Menos -"/></td>
									</tr>
								</table>
						</div>
						<br><br>
					<div class="btn-der">
						<button id="adicional" name="adicional" type="button" class="btn btn-info"> Siguiente Alimento </button>
						<br><br><br>
						<input type="submit" class="btn btn-success" value="Guardar Platillo" name="AgregarPla" form="agregarPla">
					</div>
				</FORM>
			</div>
		</div>
			<br>
			<!-- <script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			  -->
				<!-- // Evento que selecciona la fila y la elimina 
		// 		$(document).on("click",".eliminar",function(){
		// 			var parent = $(this).parents().get(0);
		// 			$(parent).remove();
		// 		}); -->
		<!-- // 	}); -->
		<!-- // </script> -->


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
				echo count($id_alimento)."\n\n\n<br>";

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
							
						}else{
							echo "error: " . $sql . "<br>" . mysqli_error($conectar);
						}
					}

				}
				echo "datos guardados";
				mysqli_close($conectar);
			}
		?>
		