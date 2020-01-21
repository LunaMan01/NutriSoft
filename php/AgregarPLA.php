
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
						
							<input type="text" name="Nombre_Pla" class="form-control" value="" >
							<!-- pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" -->
				</div>
				
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
														<input type="text" name="Cantidad_Pre[]" value=""  class="form-control ml-3">
														<!-- pattern="[0-9]{1,5}" title="numero en rango de 1-99999" -->
													</div>
												</div>
											</td>	
											<td>
												<div class="input-group input-group-sm">
													<div class="custom-file">
														<label for="Unidad_Pre" class="text-center"> Unidad </label>
														<input type="text" name="Unidad_Pre[]" value=""  class="form-control ml-3">
														<!-- pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" -->
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
						
						<div class="btn-der">
							<button id="adicional" name="adicional" type="button" class="btn btn-info"> Siguiente Alimento </button>
							<br><br><br>
							<input type="submit" class="btn btn-success" value="Guardar Platillo" name="AgregarPla" >
						</div>
					
				<!--
				<div class="form-group">
							<label for="Energia_Kal_Pla"> Energia Kal. </label>
							<input type="text" name="Energia_Kal_Pla" class="form-control" value="" >
							<!-- pattern="[0-9]{1,5}" title="numero en rango de 1-99999" 
				<div class="form-group">		
							<label for="Lipidos_Pla"> Lipidos </label>
						
							<input type="text" name="Lipidos_Pla" class="form-control" value="" >
							<!-- pattern="[0-9]{1,5}" title="numero en rango de 1-99999" 
				</div>			
				<div class="form-group">	
							<label for="Proteinas_Pla"> Proteinas </label>
						
							<input type="text" name="Proteinas_Pla" class="form-control" value="" >
							<!-- pattern="[0-9]{1,5}" title="numero en rango de 1-99999" 
							</div>			
				<div class="form-group">	
							<label for="Hidratos_Carbono_Pla"> Hidratos de Carbono </label>
						
							<input type="text" name="Hidratos_Carbono_Pla" class="form-control" value="" >
							<!-- pattern="[0-9]{1,5}" title="numero en rango de 1-99999" 
				</div>		
				<div class="text-right">
					
					<input type="reset" value="Limpiar" class="btn btn-secondary">
					<input type="submit" value="Ingresar" name="Agregar" class="btn btn-success">
				</div> -->
			</FORM>
		<!-- </div> -->
		<!--CODIGO INSERTAR GRUPOS_ALi -->
		<?php
			//echo "hola";
			if (isset($_POST['AgregarPla'])) {
				//echo "entro";
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";

				//Recuperar variables
				
				$Nombre_Pla=$_POST['Nombre_Pla'];
				$id_alimento = $_POST['ID_ALIMENTOS'];
				$cantidad = $_POST['Cantidad_Pre'];
				$unidad = $_POST['Unidad_Pre'];
				$tipo = $_POST['Tipos_Pre'];
				
				
				$Energia_Kal_Pla=0;
				$Lipidos_Pla=0;
				$Proteinas_Pla=0;
				$Hidratos_Carbono_Pla=0;
				
				
				for ($i=0; $i < count($id_alimento); $i++) {

					
						
						$sumar ="SELECT Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali FROM alimentos 
								WHERE ID_ALIMENTOS = $id_alimento[$i]";
						$Resultsumar=mysqli_query($conectar, $sumar);
						$Result=$Resultsumar->fetch_assoc();
						
						$Energia_Kal_Pla = $Energia_Kal_Pla+($Result['Energia_Kal_Ali']*$cantidad[$i]);
						$Proteinas_Pla = $Proteinas_Pla+($Result['Proteinas_Ali']*$cantidad[$i]);
						$Lipidos_Pla = $Lipidos_Pla+($Result['Lipidos_Ali']*$cantidad[$i]);
						$Hidratos_Carbono_Pla = $Hidratos_Carbono_Pla+($Result['Hidratos_Carbono_Ali']*$cantidad[$i]);
						
						
						
						/*$sql="INSERT INTO preparacion ( ID_PLATILLOS, ID_ALIMENTOS, Cantidad_Pre, Unidad_Pre, Tipos_Pre) VALUES 
						(".$_POST['ID_PLATILLOS'].", ".$id_alimento[$i].", ".$cantidad[$i].", '".$unidad[$i]."', 
						'".$tipo[$i]."' )";*/
				}
				
				$InsertPLA="INSERT INTO platillos ( Nombre_Pla, Energia_Kal_Pla, Lipidos_Pla, Proteinas_Pla, Hidratos_Carbono_Pla) 
							VALUES ( '$Nombre_Pla','$Energia_Kal_Pla', '$Lipidos_Pla', '$Proteinas_Pla', '$Hidratos_Carbono_Pla')"; 
				$result=mysqli_query($conectar, $InsertPLA);
				
				$id = mysqli_insert_id($conectar);
				$id_platillo = $id;
				for ($i=0; $i < count($id_alimento); $i++) {

					if($i == 0){
						$sql="INSERT INTO preparacion ( ID_PLATILLOS, ID_ALIMENTOS, Cantidad_Pre, Unidad_Pre, Tipos_Pre) VALUES 
						(".$id.", ".$id_alimento[$i].", ".$cantidad[$i].", '".$unidad[$i]."', 
						'".$tipo[$i]."' )";

						if (mysqli_query($conectar, $sql)) 
						{
							
						}else{
							echo "error: " . $sql . "<br>" . mysqli_error($conectar);
						}
						
					}else{
						$id = mysqli_insert_id($conectar);
						$sql="INSERT INTO preparacion (ID_PREPARACION, ID_PLATILLOS, ID_ALIMENTOS, Cantidad_Pre, Unidad_Pre, Tipos_Pre) 
						VALUES (".$id.", ".$id_platillo.", ".$id_alimento[$i].", ".$cantidad[$i].", '".$unidad[$i]."', 
						'".$tipo[$i]."' )";

						if (mysqli_query($conectar, $sql)) 
						{
							
						}else{
							echo "error: " . $sql . "<br>" . mysqli_error($conectar);
						}
					}

				}
				

				
				mysqli_close($conectar);
			}
		?>
</div>
		</div>
		</div>