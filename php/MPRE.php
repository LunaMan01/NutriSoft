<?php

			if (isset($_GET['Modificar'])) {
				$conectar=mysqli_connect('localhost','root','','sdn');
				if (!$conectar) {
					die("conexion fallida: ".mysqli_connect_error());
				}
				echo "conexion exitosa <br>";

				//Recuperar variables
				$anteriorID_PREPARACION=$_GET['anteriorID_PREPARACION'];
				$anteriorID_ALIMENTOS=$_GET['anteriorID_ALIMENTOS'];
				$anteriorID_PLATILLOS=$_GET['anteriorID_PLATILLOS'];

				echo "VALORES ANTERIORES <br>";
				echo "$anteriorID_PREPARACION <br>";
				echo "$anteriorID_PLATILLOS <br>";
				echo "$anteriorID_ALIMENTOS <br>";

				$ID_PLATILLOS=$_GET['ID_PLATILLOS'];
				$ID_ALIMENTOS=$_GET['ID_ALIMENTOS'];
				$Cantidad_Pre=$_GET['Cantidad_Pre'];
				$Unidad_Pre=$_GET['Unidad_Pre'];
				$Tipos_Pre=$_GET['Tipos_Pre'];

				echo "VALORES NUEVOS <br>";
				echo "$anteriorID_PREPARACION <br>";
				echo "$ID_PLATILLOS <br>";
				echo "$ID_ALIMENTOS <br>";
				
				////////////////
				/*
				$Energia_Kal_Pla=;
				$Lipidos_Pla=;
				$Proteinas_Pla=;
				$Hidratos_Carbono_Pla=;
				
				
				//for ($i=0; $i < count($ID_ALIMENTOS); $i++) {

					
						
						$sumar ="SELECT Energia_Kal_Ali, Proteinas_Ali, Lipidos_Ali, Hidratos_Carbono_Ali FROM alimentos 
								WHERE ID_ALIMENTOS = $ID_ALIMENTOS[$i]";
						$Resultsumar=mysqli_query($conectar, $sumar);
						$Result=$Resultsumar->fetch_assoc();
						
						$Energia_Kal_Pla = $Energia_Kal_Pla+($Result['Energia_Kal_Ali']*$Cantidad_Pre[$i]);
						$Proteinas_Pla = $Proteinas_Pla+($Result['Proteinas_Ali']*$Cantidad_Pre[$i]);
						$Lipidos_Pla = $Lipidos_Pla+($Result['Lipidos_Ali']*$Cantidad_Pre[$i]);
						$Hidratos_Carbono_Pla = $Hidratos_Carbono_Pla+($Result['Hidratos_Carbono_Ali']*$Cantidad_Pre[$i]);
						
						
				//}
				
				$ModPla="UPDATE platillos SET ID_PLATILLOS='$ID_PLATILLOS', Energia_Kal_Pla='$Energia_Kal_Pla',
					Proteinas_Pla='$Proteinas_Pla', Lipidos_Pla='$Lipidos_Pla, Hidratos_Carbono_Pla='$Hidratos_Carbono_Pla'
					WHERE ID_PLATILLOS = '$anteriorID_PLATILLOS'";
				$resultModPla=mysqli_query($conectar, $ModPla);
				$ResultPla=$ResultModPla->fetch_assoc();
				
				*/
				////////////////////////////////////////
				$sql="UPDATE preparacion SET ID_PLATILLOS='$ID_PLATILLOS', ID_ALIMENTOS='$ID_ALIMENTOS', 
					Cantidad_Pre='$Cantidad_Pre', Unidad_Pre='$Unidad_Pre', Tipos_Pre='$Tipos_Pre' 
					WHERE ID_PREPARACION='$anteriorID_PREPARACION' AND ID_PLATILLOS = '$anteriorID_PLATILLOS' 
					AND ID_ALIMENTOS = '$anteriorID_ALIMENTOS' ";


				if (mysqli_query($conectar, $sql)) {
					echo "Datos Modificados";
				}else{
					echo "error: " . $sql . "<br>" . mysqli_error($conectar);
				}
				mysqli_close($conectar);
			}
?>

<br><br>
<a type="button" href="BuscarPre.php">  <button> REGRESAR </button> </a> 