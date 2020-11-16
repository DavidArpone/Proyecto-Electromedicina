<?php 

	require_once 'driver/consulta_driver.php';
	require_once 'db/form.php';
	require_once 'driver/driver_session.php';
	require_once 'driver/plantilla_driver.php';
	require_once 'driver/user.php';

	$userSession=new UserSession();
	$user=new User();

	if(isset($_SESSION['user'])){

		
		
		$user->setUser($userSession->getCurrentUser());

		include 'vistas/home.php';
		


	}else if(isset($_POST['UsuarioLogin']) && isset($_POST['ContraLogin'])){
		
		$login=Controlador::ingresar();
		

		if($login=="ok"){

			
			$userSession->setCurrentUser($_POST['UsuarioLogin']);
			$user->setUser($_POST['UsuarioLogin']);
			
			include 'vistas/home.php';
			

		}else if($login=="no"){

			echo "Error al ingresar";

			echo "<script>
				if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);						
				}
			</script>";

			$plantilla=new Driver();
			$plantilla->traerLogin();
			

		}else{
			echo "Error al ingresar";
			
			echo "<script>
				if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);						
				}
			</script>";

			$plantilla=new Driver();
			$plantilla->traerLogin();
		}
        
        


        
	}else{
			
			$plantilla=new Driver();
			$plantilla->traerLogin();			

	}

	echo "<script>
				if(window.history.replaceState){
				window.history.replaceState(null,null,window.location.href);						
				}
			</script>";
	

?>

