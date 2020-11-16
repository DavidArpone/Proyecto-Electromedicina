<?php 
	require_once '../driver/consulta_driver.php';
	include_once '../db/form.php';

	$idpaciente=$_POST['id'];
	$control=$_POST['seleccion'];

	if($control==1){
		# code.. Temperatura
		$metrica=Controlador::temperatura($idpaciente, 2);		

	}
	if ($control==2) {
		# code... Presion
		$metrica=Controlador::presions($idpaciente, 2);

	}
	if ($control==3) {
		# code... Cardio
		$metrica=Controlador::hertz($idpaciente, 2);		

	}


	foreach ($metrica as $key => $value) {
		$datos[$key]=$value['valor'];
		$hora[$key]=$value['hora'];

	}

	echo json_encode(array($datos,$hora));
?>