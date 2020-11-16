<?php 
	require_once '../driver/consulta_driver.php';
	include_once '../db/form.php';

	echo "<p>Favoritos:</p>";

	$usr=$_POST['data'];

	$idfavoritos=Controlador::traerIdFavoritos($usr);

	#idmetricas|idpacientes|dato|valor|fecha|obs|

	if(empty($idfavoritos)){

		echo "<p>Agregue un paciente a su lista de favoritos</p>";

	}else{

		echo "<div class='w3-row-padding'>";
		
			foreach ($idfavoritos as $key => $value) {
			# code...
				$favoritos=Controlador::traerFavoritos($value['idpacientes']);
				$temp=Controlador::temperatura($value['idpacientes'], 1);			
				$ps=Controlador::presions($value['idpacientes'], 1);
				$pd=Controlador::presiond($value['idpacientes'], 1);
				$hz=Controlador::hertz($value['idpacientes'], 1);

					
					echo "<div class='w3-row w3-quarter'>";
						echo "<div class='w3-card-4 w3-blue'>";

							echo "<div class='w3-bar w3-light-grey'>";
								echo "<h5 class='w3-bar-item w3-left'>";
									echo $favoritos["nombre"]." ".$favoritos["apellido"];
								echo "</h5>";
								echo "<h6 class='w3-bar-item w3-right'>";
									echo "DNI: ".$favoritos["dni"];
								echo "</h6>";
							echo "</div>";
						
							echo "<div class='w3-container w3-half'>";				
								
								
								echo "</br>";
								echo "</br>";

								if ( $temp['valor'] > 39) {
									echo "<div class='w3-red'>";
								}elseif ( 40 > $temp['valor'] && $temp['valor'] > 37 ) {
									echo "<div class='w3-orange'>";
								}else{
									echo "<div>";
								}

								echo "<hr>";
								echo "<p class='w3-tiny'>Temperatura</p>";
								echo "<p class='w3-xxxlarge w3-center'>".$temp['valor']."°</p>";
								echo "<hr>";
								echo "</div>";

							
							echo "</div>";

							echo "<div class='w3-container w3-half'>";
								
								
								if( $ps['valor'] > 130 || $pd['valor'] > 89){
									echo "<div class='w3-red'>";	
								}elseif ( (130 > $ps['valor'] && $ps['valor'] > 120)||( 90 > $pd['valor'] && $pd['valor'] > 80) ) {
									echo "<div class='w3-orange'>";
								}else{
									echo "<div>";
								}

								echo "<hr>";
								echo "<p class='w3-right w3-tiny'>mmHg</p>";
								echo "<p class='w3-xxlarge w3-center'>".round($ps['valor'])."/".round($pd['valor'])."</p>";
								echo "<hr>";
								echo "</div>";
								
								if($hz['valor']>84){
									echo "<div class='w3-red'>";	
								}elseif ( 85 > $hz['valor'] && $hz['valor'] > 70 ) {
									echo "<div class='w3-orange'>";
								}else{
									echo "<div>";
								}

								echo "<hr>";
								echo "<p class='w3-right w3-tiny'>ppm</p>";
								echo "<p class='w3-xxlarge w3-center'>".round($hz['valor'])."</p>";								
								echo "<hr>";
								echo "</div>";

							echo "</div>";

							?>

							<button class='w3-button w3-block w3-dark-grey' onclick="expandirFav('<?php echo $value['idpacientes']; ?>');">Expandir</button>

						<?php 
						echo "</div>";

					echo "</div>";

					
			}
		echo "</div>";
	}

	
	
?>