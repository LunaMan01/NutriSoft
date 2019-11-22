<?php

			
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				// echo "conecxion exitosa <br>";
				//Recuperar variables
				$ID_GRUPOS=$_REQUEST['id'];

				$sql="DELETE FROM grupos_ali WHERE ID_GRUPOS='$ID_GRUPOS'";

				if (mysqli_query($conectar, $sql)) {
					echo "success";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			
		
?>