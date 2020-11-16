<?php 

	class Conexion{

		static public function conectar(){

			#PDO(Servidor;db;usuario;contraseña)
			$link = new PDO("mysql:host=localhost;dbname=practicas",
			"root",
			"root");

			$link->exec("set names uf8");

			return $link;
		}
	}
