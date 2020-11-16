<?php 

	require_once 'conexion.php';

	class Formulario{

		static public function update($tabla, $place1, $place2, $place3, $valor1, $valor2, $valor3){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla($place1, $place2, $place3) VALUES (:$valor1, :$valor2, $valor3);");

			$stmt->bindParam(":".$valor1, $valor1, PDO::PARAM_STR);
			$stmt->bindParam(":".$valor2, $valor2, PDO::PARAM_STR);
			#$stmt->bindParam(":".$valor3, $valor3, PDO::PARAM_STR);

			if( $stmt->execute() ){
				
				return "ok";

			}else{

				return "fail";

			}

			$stmt -> close();
			$stmt = null;

		}

		static public function ingreso($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
			$stmt=null;
		}

		static public function getUser($tabla,$place,$valor){
			
			$stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $place = :$valor");

			$stmt->bindParam(":".$valor, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
			$stmt=null;
		}

		static public function medicion($tabla,$place,$place2,$valor,$valor2,$control){

			$stmt= Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m %H:%i hs') as hora FROM $tabla WHERE $place = :$valor and $place2 = :$valor2 and timestamp(fecha) > timestamp(DATE_SUB( NOW(),INTERVAL 24 HOUR)) ORDER BY fecha DESC;");

			$stmt->bindParam(":".$valor, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":".$valor2, $valor2, PDO::PARAM_STR);

			$stmt->execute();

			if($control==2){
				return $stmt->fetchAll();
			}else{
				return $stmt->fetch();
			}

			$stmt->close();
			$stmt=null;
		}

		static public function search($tabla,$place,$place2,$valor){
 

			$stmt= Conexion::conectar()->prepare("SELECT * FROM ".$tabla." WHERE concat(".$place.",'',".$place2.") LIKE '%".$valor."%'");
			

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();
			$stmt=null;
		}

		static public function addFav($tabla,$place,$place2,$valor1,$valor2){

			$stmt= Conexion::conectar()->prepare("SELECT * FROM ".$tabla." WHERE $place = :$valor1 AND $place2= :$valor2");

			$stmt->bindParam(":".$valor1, $valor1, PDO::PARAM_STR);
			$stmt->bindParam(":".$valor2, $valor2, PDO::PARAM_STR);

			$stmt->execute();

			if($stmt->fetch()){

				return 'antes';

			}else{

				$stmt= Conexion::conectar()->prepare("INSERT INTO $tabla(`idprofesionales`, `idpacientes`) VALUES (:$valor1, :$valor2);");

				$stmt->bindParam(":".$valor1, $valor1, PDO::PARAM_STR);
				$stmt->bindParam(":".$valor2, $valor2, PDO::PARAM_STR);

				if($stmt->execute()){

					return 'ok';

				}else{

					return 'fail';
				}
			}

			$stmt->close();
			$stmt=null;
		}

		static public function traeridFavoritos($tabla,$place,$valor1){

			$stmt= Conexion::conectar()->prepare("SELECT * FROM ".$tabla." WHERE $place = :$valor1");

			$stmt->bindParam(":".$valor1, $valor1, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();
			$stmt=null;

		}

		static public function traerFavoritos($tabla,$place,$valor1){

			$stmt= Conexion::conectar()->prepare("SELECT * FROM ".$tabla." WHERE $place = :$valor1");

			$stmt->bindParam(":".$valor1, $valor1, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
			$stmt=null;
		}


	}
