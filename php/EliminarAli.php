<?php

	
		$conectar=mysqli_connect('localhost','root','','sdn');
		if (!$conectar) {
			die("conexion fallida: ".mysqli_connect_error());
		}
		
		//Recuperar variables
		$ID_ALIMENTOS=$_POST['ID_ALIMENTOS'];

		$sql="DELETE FROM alimentos WHERE ID_ALIMENTOS='$ID_ALIMENTOS'";

		if (mysqli_query($conectar, $sql)) {
			echo "success";
		}
		else{
			echo "error: " . $sql . "<br>" . mysqli_error($conectar);
		}
					mysqli_close($conectar);
	
?>

