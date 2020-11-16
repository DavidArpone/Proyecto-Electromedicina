<?php 

require_once 'plantilla_driver.php';
require_once 'consulta_driver.php';
require_once '../db/form.php';

$user = $_POST['UsuarioLogin'];
$psw = $_POST['ContraLogin'];
$dat = $_POST['dato'];
$met = $_POST['metrica'];
$id = $_POST['idpaciente'];




if(isset($user) && isset($psw)){
		
		$login=Controlador::ingresar();
		

		if($login=="ok"){

			
			if( isset($dat) && isset($met) && isset($id)) {

				Controlador::subir();

				#echo "<script>alert('Carga de Datos Exitosa');</script>";

				/*echo "<script>
					if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);						
					}
				</script>";*/

				$plantilla=new Driver();
				$plantilla->traerForm();

			}
			

		}else if($login=="no"){

			echo "Error al ingresar";

			echo "<script>
				if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);						
				}
			</script>";

			$plantilla=new Driver();
			$plantilla->traerForm();
			

		}else{
			echo "Error al ingresar";
			
			echo "<script>
				if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);						
				}
			</script>";

			$plantilla=new Driver();
			$plantilla->traerForm();
		}

} else{

	$plantilla=new Driver();
	$plantilla->traerForm();

}
