<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="SisEquiv.css">
		<title> SISTEMA DE EQUIVALENCIA </title>
	
		<script src="jquery-3.4.1.js"> </script>
	</head>
	<header>
		<!--<img src="Imagenes/PRE.jpg" >-->
		Plan Alimenticio....<br> Sistema de Equivalencia
	</header>
	<body>

		<?php 

			$conexion=mysqli_connect('localhost','root','','sdn');

			$MNG="SELECT Nombre_Grupo FROM grupos_ali";

			$result=mysqli_query($conexion,$MNG);

			$TCN="SELECT platillos.ID_PLATILLOS, menus.ID_TIEMPO, Nombre_Pla, Nombre_Tiempo, Hora_Tiempo 
                FROM platillos INNER JOIN menus INNER JOIN tiempo_comida
                ON platillos.ID_PLATILLOS = menus.ID_PLATILLOS AND menus.ID_TIEMPO = tiempo_comida.ID_TIEMPO
                WHERE ID_MENU = 3 AND Dia = 'lunes' ";

			$resultTCN=mysqli_query($conexion,$TCN);


			$TCH="SELECT platillos.ID_PLATILLOS, menus.ID_TIEMPO, Nombre_Pla, Nombre_Tiempo, Hora_Tiempo 
                FROM platillos INNER JOIN menus INNER JOIN tiempo_comida
                ON platillos.ID_PLATILLOS = menus.ID_PLATILLOS AND menus.ID_TIEMPO = tiempo_comida.ID_TIEMPO
                WHERE ID_MENU = 3 AND Dia = 'lunes' ";

			$resultTCH=mysqli_query($conexion,$TCH);


			$CA="SELECT nombre_pla, alimentos.nombre_ali, nombre_grupo, nombre_tiempo, dia 
                FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos
                ON grupos_ali.id_grupos = alimentos.id_grupos 
                AND tiempo_comida.id_tiempo = menus.id_tiempo
                AND alimentos.id_alimentos = preparacion.id_alimentos
                AND menus.id_platillos = preparacion.id_platillos
                AND menus.id_platillos = platillos.id_platillos";


                $resultCA=mysqli_query($conexion,$CA);

			
                //cuenta los id almacenados
				//echo count('nombre_grupo')."\n\n\n<br>";
			
		?>

		<form>
			<table border="1">
				<tr>
					<td>
						MENU
					</td>
					<td>
						<label name="ID_MMENU"> 2 <?php //echo $mostrarp['ID_MENU']; ?> </label>
					</td>
				</tr>
				<tr>
					<td> GRUPO <br> DE <br> ALIMENTO </td>
					<td> RACIONES </td>
					 <?php 

						 while ($mostrarTCN=mysqli_fetch_array($resultTCN))
						 {

					?>
						
						<td>
							<?php echo $mostrarTCN['Nombre_Tiempo'];?>

						</td>


					<?php
						}
					?>
						
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
				<tr>
					<td>Hora:</td>
					<td></td>
					
					 <?php 

						 while ($mostrarTCH=mysqli_fetch_array($resultTCH))
						 {

					?>
						<td>
							
							<?php echo $mostrarTCH['Hora_Tiempo'];?>

						</td>


						<?php
						}
					?>

					
				</tr>
				<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
				
				<?php		
					while ($mostrar=mysqli_fetch_array($result))
					{
				?>
					
						<tr>

							<td>
								<?php echo $mostrar['Nombre_Grupo']?>
								
							</td>

							
							<td> 
								<!--------->
								<?php
									$Grupo='Verdura';
									//echo "$Verduras";
									if ($mostrar['Nombre_Grupo'] == $Grupo) {
										# code...
										TotalVerduras();
									}
									
									else{
										$Grupo='Frutas';
										if ($mostrar['Nombre_Grupo'] == $Grupo)  {
											# code...
											TotalFrutas();
										}
										else{
											$Grupo='Cereales';
											if ($mostrar['Nombre_Grupo'] == $Grupo) {
												TotalCereales();
											}
											else{
												$Grupo='Lacteos';
												if ($mostrar['Nombre_Grupo'] == $Grupo) {
												TotalLacteos();
												}
												else{
													$Grupo='Origen Animal';
													if ($mostrar['Nombre_Grupo'] == $Grupo) {
													TotalOAnimal();
													}
													else{
														$Grupo='Aceites';
														if ($mostrar['Nombre_Grupo'] == $Grupo) {
														TotalAceites();
														}
														else{
															$Grupo='Bebidas';
															if ($mostrar['Nombre_Grupo'] == $Grupo) {
															TotalBebidas();
															}
														}
													}
												}
											}
										}		
									}	 
								?>
							</td>
							<td>
								<!------DESAYUNO------>
								<?php
									$Grupo='Verdura';
									//echo "$Verduras";
									if ($mostrar['Nombre_Grupo'] == $Grupo) {
										# code...
										VerdurasDesayuno();
									}
									
									else{
										$Grupo='Frutas';
										if ($mostrar['Nombre_Grupo'] == $Grupo)  {
											# code...
											FrutasDesayuno();
										}
										else{
											$Grupo='Cereales';
											if ($mostrar['Nombre_Grupo'] == $Grupo) {
												CerealDesayuno();
											}
											else{
												$Grupo='Lacteos';
												if ($mostrar['Nombre_Grupo'] == $Grupo) {
												LacteosDesayuno();
												}
												else{
													$Grupo='Origen Animal';
													if ($mostrar['Nombre_Grupo'] == $Grupo) {
													OAnimalDesayuno();
													}
													else{
														$Grupo='Aceites';
														if ($mostrar['Nombre_Grupo'] == $Grupo) {
														AceitesDesayuno();
														}
														else{
															$Grupo='Bebidas';
															if ($mostrar['Nombre_Grupo'] == $Grupo) {
															BebidasDesayuno();
															}
														}
													}
												}
											}
										}		
									}	 
								?>

							</td>
							<td>
								<!----- COMIDA ------>
								<?php
									$Grupo='Verdura';
									//echo "$Verduras";
									if ($mostrar['Nombre_Grupo'] == $Grupo) {
										# code...
										VerdurasComida();
									}
									
									else{
										$Grupo='Frutas';
										if ($mostrar['Nombre_Grupo'] == $Grupo)  {
											# code...
											FrutasComida();
										}
										else{
											$Grupo='Cereales';
											if ($mostrar['Nombre_Grupo'] == $Grupo) {
												CerealComida();
											}
											else{
												$Grupo='Lacteos';
												if ($mostrar['Nombre_Grupo'] == $Grupo) {
												LacteosComida();
												}
												else{
													$Grupo='Origen Animal';
													if ($mostrar['Nombre_Grupo'] == $Grupo) {
													OAnimalComida();
													}
													else{
														$Grupo='Aceites';
														if ($mostrar['Nombre_Grupo'] == $Grupo) {
														AceitesComida();
														}
														else{
															$Grupo='Bebidas';
															if ($mostrar['Nombre_Grupo'] == $Grupo) {
															BebidasComida();
															}
														}
													}
												}
											}
										}		
									}	 
								?>

							</td>
							<td>
								<!---- PRIMERA COLACION --->
								<?php
									$Grupo='Verdura';
									//echo "$Verduras";
									if ($mostrar['Nombre_Grupo'] == $Grupo) {
										# code...
										VerdurasPriColacion();
									}
									
									else{
										$Grupo='Frutas';
										if ($mostrar['Nombre_Grupo'] == $Grupo)  {
											# code...
											FrutasPriColacion();
										}
										else{
											$Grupo='Cereales';
											if ($mostrar['Nombre_Grupo'] == $Grupo) {
												CerealSegColacion();
											}
											else{
												$Grupo='Lacteos';
												if ($mostrar['Nombre_Grupo'] == $Grupo) {
												LacteosPriColacion();
												}
												else{
													$Grupo='Origen Animal';
													if ($mostrar['Nombre_Grupo'] == $Grupo) {
													OAnimalPriColacion();
													}
													else{
														$Grupo='Aceites';
														if ($mostrar['Nombre_Grupo'] == $Grupo) {
														AceitesPriColacion();
														}
														else{
															$Grupo='Bebidas';
															if ($mostrar['Nombre_Grupo'] == $Grupo) {
															BebidasPriColacion();
															}
														}
													}
												}
											}
										}		
									}	 
								?>

							</td>
							<td>
								<!--- SEGUNDA COLACION --->
								<?php
									$Grupo='Verdura';
									//echo "$Verduras";
									if ($mostrar['Nombre_Grupo'] == $Grupo) {
										# code...
										VerdurasSegColacion();
									}
									
									else{
										$Grupo='Frutas';
										if ($mostrar['Nombre_Grupo'] == $Grupo)  {
											# code...
											FrutasSegColacion();
										}
										else{
											$Grupo='Cereales';
											if ($mostrar['Nombre_Grupo'] == $Grupo) {
												CerealSegColacion();
											}
											else{
												$Grupo='Lacteos';
												if ($mostrar['Nombre_Grupo'] == $Grupo) {
												LacteosSegColacion();
												}
												else{
													$Grupo='Origen Animal';
													if ($mostrar['Nombre_Grupo'] == $Grupo) {
													OAnimalSegColacion();
													}
													else{
														$Grupo='Aceites';
														if ($mostrar['Nombre_Grupo'] == $Grupo) {
														AceitesSegColacion();
														}
														else{
															$Grupo='Bebidas';
															if ($mostrar['Nombre_Grupo'] == $Grupo) {
															BebidasSegColacion();
															}
														}
													}
												}
											}
										}		
									}	 
								?>

							</td>
							<td>
								<!--- CENA --->
								<?php
									$Grupo='Verdura';
									//echo "$Verduras";
									if ($mostrar['Nombre_Grupo'] == $Grupo) {
										# code...
										VerdurasCena();
									}
									
									else{
										$Grupo='Frutas';
										if ($mostrar['Nombre_Grupo'] == $Grupo)  {
											# code...
											FrutasCena();
										}
										else{
											$Grupo='Cereales';
											if ($mostrar['Nombre_Grupo'] == $Grupo) {
												CerealCena();
											}
											else{
												$Grupo='Lacteos';
												if ($mostrar['Nombre_Grupo'] == $Grupo) {
												LacteosCena();
												}
												else{
													$Grupo='Origen Animal';
													if ($mostrar['Nombre_Grupo'] == $Grupo) {
													OAnimalCena();
													}
													else{
														$Grupo='Aceites';
														if ($mostrar['Nombre_Grupo'] == $Grupo) {
														AceitesCena();
														}
														else{
															$Grupo='Bebidas';
															if ($mostrar['Nombre_Grupo'] == $Grupo) {
															BebidasCena();
															}
														}
													}
												}
											}
										}		
									}	 
								?>

							</td>

						</tr>	
							
				<?php
					}
				?>
				</table>
			
			</form>
			<br><br>
			<input type="button" value="REGRESAR" onclick="location='http://localhost/NutriSoft/index.html#'">	
			<br><br>
			<?php 
				TotalVerduras();
			?>	
						
								
								<!-- TOTAL DE VERDURAS -->
								<?php

								function TotalVerduras()
								{
									# code...
								

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContNG = "SELECT Nombre_Grupo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'V%' AND ID_MENU = 3 AND Dia = 'lunes' OR Nombre_Grupo LIKE 'F%' AND ID_MENU = 3 AND Dia = 'lunes'";

					              $resultCNG=mysqli_query($conexion, $ContNG);
					                $mostrarCNG=mysqli_fetch_array($resultCNG);

					                $cuantos=mysqli_num_rows($resultCNG);

					                echo $cuantos;
					             }

					            
								
								?>

							
								<!-- VERDURAS EN EL DESAYUNO -->
								<?php
									 function VerdurasDesayuno()
									{
										
									
									$conexion=mysqli_connect('localhost','root','','sdn');

									$ContV = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
											FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
											ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
											AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
											AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
											AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
											AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
											WHERE Nombre_Grupo like 'V%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Desayuno' ";

						              $resultCV=mysqli_query($conexion, $ContV);
						                $mostrarCV=mysqli_fetch_array($resultCV);

						               // $conta=count('nombre_grupo');

						                //$cuantos= mysql_num_rows($resultCNG);

						                $cuantos=mysqli_num_rows($resultCV);

						                echo $cuantos;

						            }
								?>
							

								<!-- VERDURAS EN LA COMIDA -->
								<?php
								function VerdurasComida()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContV = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'V%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Comida' ";

					              $resultCV=mysqli_query($conexion, $ContV);
					                $mostrarCV=mysqli_fetch_array($resultCV);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCV);

					                echo $cuantos;

								}
								?>

							
								<!-- VERDURAS EN LA PRIMER COLACION -->
								<?php
								function VerdurasPriColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContV = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'V%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCV=mysqli_query($conexion, $ContV);
					                $mostrarCV=mysqli_fetch_array($resultCV);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCV);

					                echo $cuantos;

								}
								?>

							
								
								<!-- VERDURAS EN LA SEGUNDA COLACION -->
								<?php
								function VerdurasSegColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContV = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'V%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCV=mysqli_query($conexion, $ContV);
					                $mostrarCV=mysqli_fetch_array($resultCV);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCV);

					                echo $cuantos;

								}
								?>

							
								
								<!-- VERDURAS EN LA CENA -->
								<?php

								function VerdurasCena()
								{
									

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContV = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'V%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Cenar' ";

					              $resultCV=mysqli_query($conexion, $ContV);
					                $mostrarCV=mysqli_fetch_array($resultCV);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCV);

					                echo $cuantos;

								}
								?>


								<!-- TOTAL DE FRUTAS -->
								<?php

								function TotalFrutas()
								{
									# code...
								

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContNG = "SELECT Nombre_Grupo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'F%' AND ID_MENU = 3 AND Dia = 'lunes'";

					              $resultCNG=mysqli_query($conexion, $ContNG);
					                $mostrarCNG=mysqli_fetch_array($resultCNG);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCNG);

					                echo $cuantos;
					             }

					            
								
								?>

							
								<!-- FRUTGAS EN EL DESAYUNO -->
								<?php
									 function FrutasDesayuno()
									{
										
									
									$conexion=mysqli_connect('localhost','root','','sdn');

									$ContF = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
											FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
											ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
											AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
											AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
											AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
											AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
											WHERE Nombre_Grupo like 'F%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Desayuno' ";

						              $resultCF=mysqli_query($conexion, $ContF);
						                $mostrarCF=mysqli_fetch_array($resultCF);

						               // $conta=count('nombre_grupo');

						                //$cuantos= mysql_num_rows($resultCNG);

						                $cuantos=mysqli_num_rows($resultCF);

						                echo $cuantos;

						            }
								?>
							

								<!-- FRUTAS EN LA COMIDA -->
								<?php
								function FrutasComida()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContF = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'F%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Comida' ";

					              $resultCF=mysqli_query($conexion, $ContF);
					                $mostrarCF=mysqli_fetch_array($resultCF);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCF);

					                echo $cuantos;

								}
								?>

							
								<!-- FRUTAS EN LA PRIMER COLACION -->
								<?php
								function FrutasPriColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContF = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'F%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCF=mysqli_query($conexion, $ContF);
					                $mostrarCF=mysqli_fetch_array($resultCF);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCF);

					                echo $cuantos;

								}
								?>

							
								
								<!-- FRUTAS EN LA SEGUNDA COLACION -->
								<?php
								function FrutasSegColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContF = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'F%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCF=mysqli_query($conexion, $ContF);
					                $mostrarCF=mysqli_fetch_array($resultCF);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCF);

					                echo $cuantos;

								}
								?>

							
								
								<!-- FRUTAS EN LA CENA -->
								<?php

								function FrutasCena()
								{
									

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContF = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'F%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Cenar' ";

					              $resultCF=mysqli_query($conexion, $ContF);
					                $mostrarCF=mysqli_fetch_array($resultCF);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCF);

					                echo $cuantos;

								}
								?>


								<!-- TOTAL DE CEREALES -->
								<?php

								function TotalCereales()
								{
									# code...
								

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContNG = "SELECT Nombre_Grupo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'C%' AND ID_MENU = 3 AND Dia = 'lunes'";

					              $resultCNG=mysqli_query($conexion, $ContNG);
					                $mostrarCNG=mysqli_fetch_array($resultCNG);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCNG);

					                echo $cuantos;
					             }

					            
								
								?>

							
								<!-- CEREALES EN EL DESAYUNO -->
								<?php
									 function CerealDesayuno()
									{
										
									
									$conexion=mysqli_connect('localhost','root','','sdn');

									$ContC = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
											FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
											ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
											AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
											AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
											AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
											AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
											WHERE Nombre_Grupo like 'C%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Desayuno' ";

						              $resultCC=mysqli_query($conexion, $ContC);
						                $mostrarCC=mysqli_fetch_array($resultCC);

						               // $conta=count('nombre_grupo');

						                //$cuantos= mysql_num_rows($resultCNG);

						                $cuantos=mysqli_num_rows($resultCC);

						                echo $cuantos;

						            }
								?>
							

								<!-- CEREAL EN LA COMIDA -->
								<?php
								function CerealComida()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContC = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'C%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Comida' ";

					              $resultCC=mysqli_query($conexion, $ContC);
					                $mostrarCC=mysqli_fetch_array($resultCC);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCC);

					                echo $cuantos;

								}
								?>

							
								<!-- CEREAL EN LA PRIMER COLACION -->
								<?php
								function CerealPriColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContC = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'C%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCC=mysqli_query($conexion, $ContC);
					                $mostrarCC=mysqli_fetch_array($resultCC);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCC);

					                echo $cuantos;

								}
								?>

							
								
								<!-- CEREAL EN LA SEGUNDA COLACION -->
								<?php
								function CerealSegColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContC = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'C%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCC=mysqli_query($conexion, $ContC);
					                $mostrarCC=mysqli_fetch_array($resultCC);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCC);

					                echo $cuantos;

								}
								?>

							
								
								<!-- CEREAL EN LA CENA -->
								<?php

								function CerealCena()
								{
									

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContC = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'C%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Cenar' ";

					              $resultCC=mysqli_query($conexion, $ContC);
					                $mostrarCC=mysqli_fetch_array($resultCC);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCC);

					                echo $cuantos;

								}
								?>
								<!------------------------------------------------->


								<!-- TOTAL DE LACTEOS -->
								<?php

								function TotalLacteos()
								{
									# code...
								

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContNG = "SELECT Nombre_Grupo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'L%' AND ID_MENU = 3 AND Dia = 'lunes'";

					              $resultCNG=mysqli_query($conexion, $ContNG);
					                $mostrarCNG=mysqli_fetch_array($resultCNG);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCNG);

					                echo $cuantos;
					             }

					            
								
								?>

							
								<!-- LACTEOS EN EL DESAYUNO -->
								<?php
									 function LacteosDesayuno()
									{
										
									
									$conexion=mysqli_connect('localhost','root','','sdn');

									$ContL = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
											FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
											ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
											AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
											AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
											AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
											AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
											WHERE Nombre_Grupo like 'L%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Desayuno' ";

						              $resultCL=mysqli_query($conexion, $ContL);
						                $mostrarCL=mysqli_fetch_array($resultCL);

						               // $conta=count('nombre_grupo');

						                //$cuantos= mysql_num_rows($resultCNG);

						                $cuantos=mysqli_num_rows($resultCL);

						                echo $cuantos;

						            }
								?>
							

								<!-- LACTEOS EN LA COMIDA -->
								<?php
								function LacteosComida()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContL = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'L%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Comida' ";

					              $resultCL=mysqli_query($conexion, $ContL);
					                $mostrarCL=mysqli_fetch_array($resultCL);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCL);

					                echo $cuantos;

								}
								?>

							
								<!-- LACTEOS EN LA PRIMER COLACION -->
								<?php
								function LacteosPriColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContL = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'L%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCL=mysqli_query($conexion, $ContL);
					                $mostrarCL=mysqli_fetch_array($resultCL);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCL);

					                echo $cuantos;

								}
								?>

							
								
								<!-- LACTEOS EN LA SEGUNDA COLACION -->
								<?php
								function LacteosSegColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContL = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'L%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCL=mysqli_query($conexion, $ContL);
					                $mostrarCL=mysqli_fetch_array($resultCL);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCL);

					                echo $cuantos;

								}
								?>

							
								
								<!-- LACTEOS EN LA CENA -->
								<?php

								function LacteosCena()
								{
									

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContL = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'L%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Cenar' ";

					              $resultCL=mysqli_query($conexion, $ContL);
					                $mostrarCL=mysqli_fetch_array($resultCL);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCL);

					                echo $cuantos;

								}
								?>
								<!---------------------------------------------------->



								<!-- TOTAL DE ORIGEN ANIMAL -->
								<?php

								function TotalOAnimal()
								{
									# code...
								

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContNG = "SELECT Nombre_Grupo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'O%' AND ID_MENU = 3 AND Dia = 'lunes'";

					              $resultCNG=mysqli_query($conexion, $ContNG);
					                $mostrarCNG=mysqli_fetch_array($resultCNG);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCNG);

					                echo $cuantos;
					             }

					            
								
								?>

							
								<!-- ORIGEN ANIMAL EN EL DESAYUNO -->
								<?php
									 function OAnimalDesayuno()
									{
										
									
									$conexion=mysqli_connect('localhost','root','','sdn');

									$ContOA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
											FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
											ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
											AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
											AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
											AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
											AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
											WHERE Nombre_Grupo like 'O%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Desayuno' ";

						              $resultCOA=mysqli_query($conexion, $ContOA);
						                $mostrarCOA=mysqli_fetch_array($resultCOA);

						               // $conta=count('nombre_grupo');

						                //$cuantos= mysql_num_rows($resultCNG);

						                $cuantos=mysqli_num_rows($resultCOA);

						                echo $cuantos;

						            }
								?>
							

								<!-- ORIGEN ANIMAL EN LA COMIDA -->
								<?php
								function OAnimalComida()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContOA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'O%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Comida' ";

					              $resultCOA=mysqli_query($conexion, $ContOA);
					                $mostrarCOA=mysqli_fetch_array($resultCOA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCOA);

					                echo $cuantos;

								}
								?>

							
								<!-- ORIGEN ANIMAL EN LA PRIMER COLACION -->
								<?php
								function OAnimalPriColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContOA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'O%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCOA=mysqli_query($conexion, $ContOA);
					                $mostrarCOA=mysqli_fetch_array($resultCOA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCOA);

					                echo $cuantos;

								}
								?>

							
								
								<!-- ORIGEN ANIMAL EN LA SEGUNDA COLACION -->
								<?php
								function OAnimalSegColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContOA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'O%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCOA=mysqli_query($conexion, $ContOA);
					                $mostrarCOA=mysqli_fetch_array($resultCOA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCOA);

					                echo $cuantos;

								}
								?>

							
								
								<!-- ORIGEN ANIMAL EN LA CENA -->
								<?php

								function OAnimalCena()
								{
									

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContOA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'O%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Cenar' ";

					              $resultCOA=mysqli_query($conexion, $ContOA);
					                $mostrarCOA=mysqli_fetch_array($resultCOA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCOA);

					                echo $cuantos;

								}
								?>
								<!------------------------------------->


								<!-- TOTAL DE ACEITES -->
								<?php

								function TotalAceites()
								{
									# code...
								

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContNG = "SELECT Nombre_Grupo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'A%' AND ID_MENU = 3 AND Dia = 'lunes'";

					              $resultCNG=mysqli_query($conexion, $ContNG);
					                $mostrarCNG=mysqli_fetch_array($resultCNG);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCNG);

					                echo $cuantos;
					             }

					            
								
								?>

							
								<!-- ACEITES EN EL DESAYUNO -->
								<?php
									 function AceitesDesayuno()
									{
										
									
									$conexion=mysqli_connect('localhost','root','','sdn');

									$ContA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
											FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
											ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
											AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
											AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
											AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
											AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
											WHERE Nombre_Grupo like 'A%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Desayuno' ";

						              $resultCA=mysqli_query($conexion, $ContA);
						                $mostrarCA=mysqli_fetch_array($resultCA);

						               // $conta=count('nombre_grupo');

						                //$cuantos= mysql_num_rows($resultCNG);

						                $cuantos=mysqli_num_rows($resultCA);

						                echo $cuantos;

						            }
								?>
							

								<!-- ACEITES EN LA COMIDA -->
								<?php
								function AceitesComida()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'A%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Comida' ";

					              $resultCA=mysqli_query($conexion, $ContA);
					                $mostrarCA=mysqli_fetch_array($resultCA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCA);

					                echo $cuantos;

								}
								?>

							
								<!-- ACEITES EN LA PRIMER COLACION -->
								<?php
								function AceitesPriColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'A%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCA=mysqli_query($conexion, $ContA);
					                $mostrarCA=mysqli_fetch_array($resultCA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCA);

					                echo $cuantos;

								}
								?>

							
								
								<!-- ACEITES EN LA SEGUNDA COLACION -->
								<?php
								function AceitesSegColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'A%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCA=mysqli_query($conexion, $ContA);
					                $mostrarCA=mysqli_fetch_array($resultCA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCA);

					                echo $cuantos;

								}
								?>

							
								
								<!-- ACEITES EN LA CENA -->
								<?php

								function AceitesCena()
								{
									

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContA = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'A%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Cenar' ";

					              $resultCA=mysqli_query($conexion, $ContA);
					                $mostrarCA=mysqli_fetch_array($resultCA);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCA);

					                echo $cuantos;

								}
								?>
								<!--------------------------------------------->


								<!-- TOTAL DE BEBIDAS -->
								<?php

								function TotalBebidas()
								{
									# code...
								

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContNG = "SELECT Nombre_Grupo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'B%' AND ID_MENU = 3 AND Dia = 'lunes'";

					              $resultCNG=mysqli_query($conexion, $ContNG);
					                $mostrarCNG=mysqli_fetch_array($resultCNG);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCNG);

					                echo $cuantos;
					             }

					            
								
								?>

							
								<!-- BEBIDAS EN EL DESAYUNO -->
								<?php
									 function BebidasDesayuno()
									{
										
									
									$conexion=mysqli_connect('localhost','root','','sdn');

									$ContB = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
											FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
											ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
											AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
											AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
											AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
											AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
											WHERE Nombre_Grupo like 'B%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Desayuno' ";

						              $resultCB=mysqli_query($conexion, $ContB);
						                $mostrarCB=mysqli_fetch_array($resultCB);

						               // $conta=count('nombre_grupo');

						                //$cuantos= mysql_num_rows($resultCNG);

						                $cuantos=mysqli_num_rows($resultCB);

						                echo $cuantos;

						            }
								?>
							

								<!-- BEBIDAS EN LA COMIDA -->
								<?php
								function BebidasComida()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContB = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'B%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Comida' ";

					              $resultCB=mysqli_query($conexion, $ContB);
					                $mostrarCB=mysqli_fetch_array($resultCB);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCB);

					                echo $cuantos;

								}
								?>

							
								<!-- BEBIDAS EN LA PRIMER COLACION -->
								<?php
								function BebidasPriColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContB = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'B%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCB=mysqli_query($conexion, $ContB);
					                $mostrarCB=mysqli_fetch_array($resultCB);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCB);

					                echo $cuantos;

								}
								?>

							
								
								<!-- BEBIDAS EN LA SEGUNDA COLACION -->
								<?php
								function BebidasSegColacion()
								{
									
								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContB = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'B%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Colacion' ";

					              $resultCB=mysqli_query($conexion, $ContB);
					                $mostrarCB=mysqli_fetch_array($resultCB);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCB);

					                echo $cuantos;

								}
								?>

							
								
								<!-- BEBIDAS EN LA CENA -->
								<?php

								function BebidasCena()
								{
									

								$conexion=mysqli_connect('localhost','root','','sdn');

								$ContB = "SELECT Nombre_Grupo, Nombre_Tiempo, Dia 
										FROM alimentos INNER JOIN grupos_ali INNER JOIN tiempo_comida INNER JOIN menus INNER JOIN preparacion INNER JOIN platillos 
										ON grupos_ali.ID_GRUPOS = alimentos.ID_GRUPOS 
										AND tiempo_comida.ID_TIEMPO = menus.ID_TIEMPO 
										AND alimentos.ID_ALIMENTOS = preparacion.ID_ALIMENTOS 
										AND menus.ID_PLATILLOS = preparacion.ID_PLATILLOS 
										AND menus.ID_PLATILLOS = platillos.ID_PLATILLOS 
										WHERE Nombre_Grupo like 'B%' AND ID_MENU = 3 AND Dia = 'lunes' AND Nombre_Tiempo ='Cenar' ";

					              $resultCB=mysqli_query($conexion, $ContB);
					                $mostrarCB=mysqli_fetch_array($resultCB);

					               // $conta=count('nombre_grupo');

					                //$cuantos= mysql_num_rows($resultCNG);

					                $cuantos=mysqli_num_rows($resultCB);

					                echo $cuantos;

								}
								?>

	</body>
</html>