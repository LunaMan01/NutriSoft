		<?php 

			$anteriorID_PREPARACION=$_POST['ID_PREPARACION'];

			//setcookie("ID_PREPARACION",$_GET['ID_PREPARACION'],time()+(3600),"/");
			
			$anteriorID_PLATILLOS=$_POST['ID_PLATILLOS'];

			//setcookie("Nombre_Pla",$_GET['Nombre_Pla'],time()+(3600),"/");

			$anteriorID_ALIMENTOS=$_POST['ID_ALIMENTOS'];

			//setcookie("Nombre_Ali",$_GET['Nombre_Ali'],time()+(3600),"/");

			/*$ID_PREPARACION=$_COOKIE['ID_PREPARACION'];
			$Nombre_Pla=$_COOKIE['Nombre_Pla'];
			$Nombre_Ali=$_COOKIE['Nombre_Ali'];*/

			// echo  "$anteriorID_PREPARACION <br>";
			// echo "$anteriorID_PLATILLOS <br>";
			// echo "$anteriorID_ALIMENTOS";

			$conexion=mysqli_connect('localhost','root','','sdn');

			/*$sql="SELECT * FROM preparacion WHERE ID_PREPARACION='$ID_PREPARACION'";*/

			$sql="SELECT preparacion.ID_PREPARACION, preparacion.ID_ALIMENTOS, preparacion.ID_PLATILLOS, 
					platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, 
					preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos 
					ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS 
					WHERE preparacion.ID_PREPARACION = '$anteriorID_PREPARACION' AND preparacion.ID_ALIMENTOS = '$anteriorID_ALIMENTOS' ";

			$result=mysqli_query($conexion,$sql);
			//$mostrarp=$result->fetch_assoc();

			//$mostrarp=mysqli_fetch_array($result)

		?>
			<div class="d-none">
				<iframe src="" name="iframePRE" frameborder="0"></iframe>
			</div>
			<FORM id="Modi" action="php\MPRE.php?ID_PLATILLOS = <?php echo $mostrarpl['ID_PLATILLOS'] ?> & ID_ALIMENTOS = <?php echo $mostrara['ID_ALIMENTOS'] ?> & Cantidad_Pre = <?php echo $mostrar['Cantidad_Pre'] ?> & Unidad_Pre = <?php echo $mostrar['Unidad_Pre'] ?> & Tipos_Pre = <?php echo $mostrar['Tipos_Pre']?>"  method="GET" target="iframePRE" 
			onsubmit="mostrarMensaje('Modificacion correcta', 'success')">
				
				<input type="hidden" name="anteriorID_PREPARACION" value="<?php echo $anteriorID_PREPARACION?>">
				<input type="hidden" name="anteriorID_PLATILLOS" value="<?php echo $anteriorID_PLATILLOS?>">
				<input type="hidden" name="anteriorID_ALIMENTOS" value="<?php echo $anteriorID_ALIMENTOS?>">
			<div class="card-pacientes mt-5 table-responsive">
				<table class="table table-borderless">
					<!-- <p> Datos a Modificar </p> -->
					<tr>
						<td>
							<label for="ID_PREPARACION"> PREPARACION </label>
						</td>
						<td>
							<label for="ID_PLATILLOS"> Platillo </label>
						</td>
						<td>
							<label for="ID_ALIMENTOS"> Alimento </label>
						</td>
						<td>
							<label for="Cantidad_Pre"> Cantidad </label>
						</td>
						<td>
							<label for="Unidad_Pre"> Unidad </label>
						</td>
						<td>
							<label for="Tipos_Pre"> Tipo </label>
						</td>
					</tr>
					
				<?php		

					while ($mostrar=mysqli_fetch_array($result))
					{
				?>
					
					<tr>
						<td>
							 <label name="ID_PREPARACION"> <?php echo $mostrar['ID_PREPARACION']; ?> </label> 
						</td>
						<td>
							 <!--<label name="ID_PLATILLOS"> <?php echo $mostrar['Nombre_Pla']; ?> </label>-->					
							<select  name="ID_PLATILLOS" class="custom-select" style="width:auto;">
								<option> <?php echo $mostrar['Nombre_Pla']?> </option>
									<?php
										$conexion=mysqli_connect('localhost','root','','sdn');

										$sql="SELECT * from platillos";
										$result=mysqli_query($conexion,$sql);

										while ($mostrarpl=mysqli_fetch_array($result)){
									?>
										<option value="<?php echo $mostrarpl['ID_PLATILLOS']?>"> <?php echo $mostrarpl['Nombre_Pla']?> </option>
								  		<?php
								  			}
								  		?>
							</select>
						</td>
						<td>
							<select name="ID_ALIMENTOS" class="custom-select" style="width:auto;">
								<option> <?php echo $mostrar['Nombre_Ali']?> </option>
									<?php

										$conexion=mysqli_connect('localhost','root','','sdn');

										$sql="SELECT * from alimentos";
										$result=mysqli_query($conexion,$sql);

										while ($mostrara=mysqli_fetch_array($result))
										{
											
									?>
											<option value="<?php echo $mostrara['ID_ALIMENTOS']?>"> <?php echo $mostrara['Nombre_Ali']?> </option>

									<?php
											}
									?>

							</select>
						</td>
						<td>
							<input type="text" name="Cantidad_Pre" value="<?php echo $mostrar['Cantidad_Pre']; ?>" >
							<!-- pattern="[0-9]{1,5}" title="numero en rango de 1-99999" class="form-control" -->
						</td>
						<td>
							<input type="text" name="Unidad_Pre" value="<?php echo $mostrar['Unidad_Pre']; ?>"  class="form-control">
							<!-- pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" -->
						</td>
						<td>
							<input type="text" name="Tipos_Pre" value="<?php echo $mostrar['Tipos_Pre']; ?>" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" class="form-control">
						</td>
					</tr>
					
				<?php
				}
				?>
				</table>
			</div>
				<br><br>
				<div class="text-right">
				<input type="submit" class="btn btn-success" value="Modificar" name="Modificar" id="Modificar" >
				</div>
				
			</FORM>
