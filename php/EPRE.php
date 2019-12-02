<?php

			if (isset($_GET['Eliminar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conecxion exitosa <br><br>";
				//Recuperar variables
				$ID_PREPARACION=$_GET['ID_PREPARACION'];


				echo "PREPARACION: $ID_PREPARACION   ELIMINADA<br><br>";

				$sql="DELETE FROM preparacion WHERE ID_PREPARACION='$ID_PREPARACION'";

				if (mysqli_query($conectar, $sql)) {
					echo "datos eliminados ";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
?>
<br><br>
<a type="button" href="BuscarPre.php"> <button> REGRESAR </button></a> 