<?php 

	require_once '../driver/consulta_driver.php';
	include_once '../db/form.php';

	$idpaciente=$_POST['id'];

	$paciente=Controlador::traerFavoritos($idpaciente);
	
	$temp=Controlador::temperatura($idpaciente, 1);			
	$ps=Controlador::presions($idpaciente, 1);
	$pd=Controlador::presiond($idpaciente, 1);
	$hz=Controlador::hertz($idpaciente, 1);

		
		echo "<header class='w3-container w3-dark-gray'>";

		?>
		
		<span onclick="document.getElementById('expandirFav').style.display='none'" 
		class="w3-button w3-display-topright">&times;</span>

<?php	
		echo "<h3 class='w3-bar-item'>".$paciente["nombre"]." ".$paciente["apellido"]."</h3>";
		echo "<p class='w3-small w3-bar-item '>DNI: ".$paciente["dni"]."</p>";		
		echo "</header>";
		echo "<div class='w3-container w3-light-grey'>";
			

			echo "<div class='w3-container w3-quarter'>";

			echo "</br>";

			echo "<hr style='border-color:black;'>";
			echo "<p>Edad: ".$paciente["edad"]."</p>";
			echo "<hr style='border-color:black;'>";
			echo "<p>Sexo: ".$paciente["sexo"]."</p>";
			echo "<hr style='border-color:black;'>";
			echo "<p>Teléfono: ".$paciente["tel"]."</p>";			
			echo "<hr style='border-color:black;'>";
			echo "<p>Contacto: ".$paciente["mail"]."</p>";
			echo "<hr style='border-color:black;'>";
			echo "<p>Observaciones: ".$paciente["obs"]."</p>";
			echo "<hr style='border-color:black;'>";				
			
			echo "</div>";

			echo "<div class='w3-container w3-quarter'>";

			
			
			
			if ( $temp['valor'] > 39) {
				echo "<div id='temperatura' class='w3-red'>";
			}elseif ( 40 > $temp['valor'] && $temp['valor'] > 37 ) {
				echo "<div id='temperatura' class='w3-orange'>";
			}else{
				echo "<div id='temperatura'>";
			}
			
			echo "<hr style='border-color:black;'>";
			echo "<p class='w3-tiny w3-center'>Temperatura</p>";			
			echo "<p class='w3-xlarge w3-center'>".$temp['valor']."°</p>";			
			echo "<hr style='border-color:black;'>";
			echo "</div>";
			
			

			if( $ps['valor'] > 130 || $pd['valor'] > 89){
				echo "<div id='presion' class='w3-red'>";	
			}elseif ( (130 > $ps['valor'] && $ps['valor'] > 120)||( 90 > $pd['valor'] && $pd['valor'] > 80) ) {
				echo "<div id='presion' class='w3-orange'>";
			}else{
				echo "<div id='presion'>";
			}

			echo "<hr style='border-color:black;'>";
			echo "<p class='w3-center w3-tiny'>mmHg</p>";
			echo "<p class='w3-xlarge w3-center'>".round($ps['valor'])."/".round($pd['valor'])."</p>";
			echo "<hr style='border-color:black;'>";
			echo "</div>";

			
			
			if($hz['valor']>84){
				echo "<div id='cardio' class='w3-red'>";	
			}elseif ( 85 > $hz['valor'] && $hz['valor'] > 70 ) {
				echo "<div id='cardio' class='w3-orange'>";
			}else{
				echo "<div id='cardio'>";
			}

			echo "<hr style='border-color:black;'>";			
			echo "<p class='w3-center w3-tiny'>ppm</p>";			
			echo "<p class='w3-xlarge w3-center'>".round($hz['valor'])."</p>";
			echo "<hr style='border-color:black;'>";
			echo "</div>";

				
			
			echo "</div>";


			echo "<div class='w3-container w3-half'>";
			echo "</br>";
			echo "</br>";
			

			?>
			<div id="grafico">
			<canvas id='label' width='400' height='360' style='border:1px solid #000000;'></canvas>
			</div>
			<?php


			echo "</div>";



		echo "</div>";


?>

			

