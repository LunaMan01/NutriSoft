<?php
				
				$conexion=mysqli_connect('localhost','root','','sdn');

				$sql="SELECT * from tiempo_comida";
				$result=mysqli_query($conexion,$sql);

				while ($mostrar=mysqli_fetch_array($result)){
			?>
                    <option data-idtiempo="<?php echo $mostrar['ID_TIEMPO']?>" data-nombre="<?php echo $mostrar['Nombre_Tiempo']?>"  data-hora="<?php echo $mostrar['Hora_Tiempo']?>">
                        <?php echo $mostrar['Nombre_Tiempo']?>
                    </option>    

			<?php
				}
			?>		