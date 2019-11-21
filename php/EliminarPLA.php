<?php

			
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				
				//Recuperar variables
				$ID_PLATILLOS=$_POST['ID_PLATILLOS'];
				
				$sql="DELETE FROM platillos WHERE ID_PLATILLOS='$ID_PLATILLOS'";

				if (mysqli_query($conectar, $sql)) {
					echo "success";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			
		?>
