<?php
							$conexion=mysqli_connect('localhost','root','','sdn');

							$sql="SELECT * from platillos";
							$result=mysqli_query($conexion,$sql);

							while ($mostrar=mysqli_fetch_array($result)){
						
							    echo "<option value='".$mostrar['ID_PLATILLOS']."'>".$mostrar['Nombre_Pla']." </option>";
					  	
					  			}
?>