<?php 
			$ID_TIEMPO=$_REQUEST['ID_TIEMPO'];

			$conexion=mysqli_connect('localhost','root','','sdn');

			$sql="SELECT * FROM tiempo_comida WHERE ID_TIEMPO='$ID_TIEMPO'";
			$result=mysqli_query($conexion,$sql);
			$mostrar=$result->fetch_assoc();

		?>
		<div class="">
			<iframe src="" frameborder="1" name="iframeTC"></iframe>
		</div>
		<div id="modificar" class="card-pacientes">
			<FORM action="php\ModificarTC.php?ID_TIEMPO=<?php echo $mostrar['ID_TIEMPO']; ?>" method="POST" target="iframeTC" onsubmit="mostrarMensaje('Tiempo modificado correctamente', 'success')">
				<div class="table-responsive">
					<table class="table table-borderless">
						<!-- <p> Datos a modificar </p> -->
						<tr>
							<td>
								<label for="Nombre_Tiempo"> Nombre </label>
							</td>
							<td>
								<input type="text" name="Nombre_Tiempo" class="form-control rounded-pill" value="<?php echo $mostrar['Nombre_Tiempo']; ?>" pattern="[a-zA-Z]{1,15}" title="solo letras Mayusculas y Minusculas">
							</td>
						</tr>
						<tr>
							<td>
								<label for="Hora_Tiempo"> Hora </label>
							</td>
							<td>
								<input type="text" name="Hora_Tiempo" class="form-control rounded-pill" value="<?php echo $mostrar['Hora_Tiempo']; ?>" pattern="[0-9]{1,5}" title="numero en rango de 1-99999">
							</td>
						</tr>
					</table>
				</div>
				<div class="text-right mt-5">
					<input type="reset" value="Limpiar" class="btn btn-secondary">
					<input type="submit" value="Modificar" name="Modificar" class="btn btn-success">
				</div>
			</FORM>
		</div>
		<!--CODIGO MODIFICAR Tiempo Comida -->
		<?php

			if (isset($_POST['Modificar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br>";
				//Recuperar variables
				$ID_TIEMPO=$_REQUEST['ID_TIEMPO'];

				$Nombre_Tiempo=$_POST['Nombre_Tiempo'];
				$Hora_Tiempo=$_POST['Hora_Tiempo'];

				$sql="UPDATE tiempo_comida SET Nombre_Tiempo='$Nombre_Tiempo', Hora_Tiempo='$Hora_Tiempo' WHERE ID_TIEMPO='$ID_TIEMPO'";

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