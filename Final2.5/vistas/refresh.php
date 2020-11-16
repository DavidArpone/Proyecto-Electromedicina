<?php 
	require_once '../driver/consulta_driver.php';
	include_once '../db/form.php';

?>

<div>

	<?php $usr=$_POST['data']; ?>
	
	<h2>Vivo: </h2>
		
		<p>Temperatura corporal: 
		<?php 
			$temp=Controlador::temperatura($usr);
			echo $temp['temp']."°";
		?></p>
		
		<p>Presión arterial:
		<?php 
			$prss=Controlador::presions($usr);
			$prsd=Controlador::presiond($usr);

			echo $prss['presions']."/".$prsd['presiond']."mmHg";
		?></p>
		
		<p>Frecuencia cardíaca:
			<?php  
			$hz=Controlador::hertz($usr);
			echo $hz['hzcardio']."Hz";
		?></p>	
</div>