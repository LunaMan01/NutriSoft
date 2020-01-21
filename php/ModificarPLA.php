		<?php 
			$ID_PLATILLOS=$_POST['ID_PLATILLOS'];

			$conexion=mysqli_connect('localhost','root','','sdn');

			$sql="SELECT * FROM platillos WHERE ID_PLATILLOS='$ID_PLATILLOS'";
			
			
			/*$sql="SELECT preparacion.ID_PREPARACION, preparacion.ID_ALIMENTOS, preparacion.ID_PLATILLOS, 
					platillos.Nombre_Pla, alimentos.Nombre_Ali, preparacion.Cantidad_Pre, preparacion.Unidad_Pre, 
					preparacion.Tipos_Pre FROM preparacion INNER JOIN platillos INNER JOIN alimentos 
					ON preparacion.ID_PLATILLOS = platillos.ID_PLATILLOS  AND preparacion.ID_ALIMENTOS = alimentos.ID_ALIMENTOS 
					WHERE preparacion.ID_PREPARACION = '$anteriorID_PREPARACION' AND preparacion.ID_ALIMENTOS = '$anteriorID_ALIMENTOS' ";
			*/
			
			$result=mysqli_query($conexion,$sql);
			$mostrar=$result->fetch_assoc();

		?>
		<div class="d-none">
			<iframe src="" frameborder="1" name="iframeP"></iframe>
		</div>
		<div id="modificar" class="card-pacientes mt-5">
			<FORM action="php\ModificarPLA.php?ID_PLATILLOS=<?php echo $mostrar['ID_PLATILLOS']; ?>" method="POST" target="iframeP" onsubmit="mostrarMensaje('Platillo modificado correctamente', 'success')">
				<div class="table-responsive">
					<table class="table table-borderless">
						<!-- <p> Datos a modificar </p> -->
						<tr>
							<td>
								<label for="Nombre_Pla"> Nombre Platillo </label>
							</td>
							<td>
								<input type="text" class="form-control rounded-pill" name="Nombre_Pla" value="<?php echo $mostrar['Nombre_Pla']; ?>" >
								<!-- pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas" -->
							</td>
						</tr>
						
						
					</table>
				</div>	
			
				<div class="text-right mt-5">
					<!-- <input type="reset" value="Limpiar" class="btn btn-secondary"> -->
					<input type="submit" value="Modificar" name="Modificar" class="btn btn-success mr-5">
					
				</div>
			</FORM>
		</div>
		<!--CODIGO MODIFICAR PLATILLO -->
		<?php

			if (isset($_POST['Modificar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";
				//Recuperar variables
				$ID_PLATILLOS=$_REQUEST['ID_PLATILLOS'];
				
				$Nombre_Pla=$_POST['Nombre_Pla'];
				
				//$Energia_Kal_Pla=$_POST['Energia_Kal_Pla'];
				//$Lipidos_Pla=$_POST['Lipidos_Pla'];
				//$Proteinas_Pla=$_POST['Proteinas_Pla'];
				//$Hidratos_Carbono_Pla=$_POST['Hidratos_Carbono_Pla'];
				
				
				/*
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
						'".$tipo[$i]."' )";
				}
				*/
				
				$sql="UPDATE platillos SET Nombre_Pla='$Nombre_Pla' WHERE ID_PLATILLOS='$ID_PLATILLOS'";

				if (mysqli_query($conectar, $sql)) {
					echo "Datos Modificados";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
		?>

	</body>
</html>