<?php 

	require_once '../driver/consulta_driver.php';
	include_once '../db/form.php';

	$idpaciente=$_POST['hola'];
	$idprofesional=$_POST['chau'];

	$add=Controlador::favAdd($idprofesional, $idpaciente); 

	if($add == "ok"){

		echo "<p>La persona se ha agregado exitosamente a favoritos.</p>";

	}elseif ($add == "antes") {
		
		echo "<p>Esta persona ya está en su lista de favoritos.</p>";			    	
				
			
		
	}else{
		echo $add;
		echo "<p>Ha ocurrido un error inesperado. Intente luego.</p>";

	}

?>