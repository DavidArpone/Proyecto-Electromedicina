<?php 

include_once 'driver_session.php';

class Controlador{

		static public function subir(){

			$tabla = "metricas";

			$place1 = "idpacientes";
			$place2 = "dato";
			$place3 = "valor";

			$valor1 = $_POST['idpaciente'];
			$valor2 = $_POST['dato'];
			$valor3 = $_POST['metrica'];
			
			$update = Formulario::update($tabla, $place1, $place2, $place3, $valor1, $valor2, $valor3);
			
			return $update;

		}


		static public function ingresar(){


			if(isset($_POST["UsuarioLogin"])){
			
				$tabla="profesionales";
				$item="dni";
				$valor=$_POST["UsuarioLogin"];


				$respuesta = Formulario::ingreso($tabla, $item, $valor);

				if($respuesta['dni']==$_POST['UsuarioLogin'] && $respuesta['psw']==$_POST['ContraLogin']){				

					return "ok";				

				}else{
				
					return "no";

				}
			}
		}
		
		static public function getUser($user){

			$tabla="profesionales";			
			$place="dni";
			$valor=$user;

		
			$respuesta=Formulario::getUser($tabla, $place, $valor);

			return $respuesta;
		}

		static public function temperatura($user, $control){

			$tabla="metricas";						
			$place="idpacientes";
			$valor=$user;
			$place2="dato";
			$valor2="temp";

			$respuesta = Formulario::medicion($tabla,$place,$place2,$valor,$valor2,$control);

			return $respuesta;
		}

		static public function presions($user, $control){

			$tabla="metricas";						
			$place="idpacientes";
			$valor=$user;
			$place2="dato";
			$valor2="ps";

			$respuesta = Formulario::medicion($tabla,$place,$place2,$valor,$valor2,$control);

			return $respuesta;
		}

		static public function presiond($user, $control){

			$tabla="metricas";						
			$place="idpacientes";
			$valor=$user;
			$place2="dato";
			$valor2="pd";

			$respuesta = Formulario::medicion($tabla,$place,$place2,$valor,$valor2,$control);

			return $respuesta;
		}

		static public function hertz($user, $control){

			$tabla="metricas";						
			$place="idpacientes";
			$valor=$user;
			$place2="dato";
			$valor2="hz";

			$respuesta = Formulario::medicion($tabla,$place,$place2,$valor,$valor2,$control);

			return $respuesta;
		}
		
		static public function busqueda($nombre){

			$tabla="pacientes";
			$place="nombre";
			$place2="apellido";
			$valor=$nombre;

			$respuesta = Formulario::search($tabla,$place,$place2,$valor);

			return $respuesta;
		}

		static public function favAdd($idprof,$idpac){

			$tabla="favoritos";
			$place="idprofesionales";
			$place2="idpacientes";
			$valor1=$idprof;
			$valor2=$idpac;

			$respuesta = Formulario::addFav($tabla,$place,$place2,$valor1,$valor2);

			return $respuesta;
		}

		static public function traerIdFavoritos($idprof){

			$tabla="favoritos";
			$place="idprofesionales";
			$valor1=$idprof;

			$respuesta = Formulario::traeridFavoritos($tabla,$place,$valor1);

			return $respuesta;
		}

		static public function traerFavoritos($idpac){

			$tabla="pacientes";
			$place="idpacientes";
			$valor1=$idpac;

			$respuesta = Formulario::traerFavoritos($tabla,$place,$valor1);

			return $respuesta;
		}
		
}