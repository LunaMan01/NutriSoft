<?php

	$conectar=mysqli_connect('localhost','root','','sdn');
	if (!$conectar) {
		die("conexion fallida: ".mysqli_connect_error());
	}
	
				//Recuperar variables
	$ID_TIEMPO=$_POST['ID_TIEMPO'];

	$sql="DELETE FROM tiempo_comida WHERE ID_TIEMPO='$ID_TIEMPO'";

	if (mysqli_query($conectar, $sql)) {
		echo "success";
	}else{
		echo "error: " . $sql . "<br>" . mysqli_error($conectar);
	}
	mysqli_close($conectar);
			
?>
