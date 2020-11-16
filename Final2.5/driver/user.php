<?php 

include_once 'consulta_driver.php';


class User{

	#

	public function setUser($user){
		
		$respuesta=Controlador::getUser($user);

		$this->usuario=$respuesta['nombre'];
		$this->apellido=$respuesta['apellido'];
		$this->id=$respuesta['idprofesionales'];


	}

	public function getUser(){

		return $this->usuario;
	}

	public function getApell(){

		return $this->apellido;
	}

	public function getId(){

		return $this->id;
	}


}


?>