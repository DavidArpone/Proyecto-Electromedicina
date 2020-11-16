<?php 

include_once 'driver_session.php';
	
	$userSession=new userSession();
	$userSession->closeSession();

	header("location: ../");

