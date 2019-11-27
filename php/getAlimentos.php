<?php

											$conexion=mysqli_connect('localhost','root','','sdn');

											$sql="SELECT * from alimentos";
											$result=mysqli_query($conexion,$sql);

											

											while ($mostrar=mysqli_fetch_array($result))
											{
												
												echo "<option value='".$mostrar['ID_ALIMENTOS']."'>".$mostrar['Nombre_Ali']."</option>";


											}
?>