<?php

				$dato = $_POST['dato'];

				$sql="SELECT * FROM grupos_ali 
				WHERE Nombre_Grupo = '$dato' OR Color_Grupo = '$dato'";
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				
				$result=mysqli_query($conectar,$sql);
				// $result1=mysqli_query($conectar,$sql1);

				while ($mostrar=mysqli_fetch_array($result)){
		?>
			
			<tr id="tr<?php echo $mostrar['ID_GRUPOS']?>">
					<td><?php echo $mostrar['ID_GRUPOS']?></td>
					<td><?php echo $mostrar['Nombre_Grupo']?></td>
					<td><?php echo $mostrar['Color_Grupo']?></td>
					<td>
						<i data-editar="<?php echo $mostrar['ID_GRUPOS']; ?>" class="far fa-edit accion-editar acciones"></i>
						<i id="<?php echo $mostrar['ID_GRUPOS']; ?>" name="<?php echo $mostrar['Nombre_Grupo']?>" class="far fa-trash-alt accion-eliminar acciones"></i>
					</td>
			</tr>
		<?php
				}
		?>		