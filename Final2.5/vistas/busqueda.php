<?php 

	require_once '../driver/consulta_driver.php';
	include_once '../db/form.php';

	$a=$_POST['hola'];

	if(empty($a)){
		echo "<div><p>Por favor, ingrese un nombre o apellido.</p></div>";
	}else{
		$search=Controlador::busqueda($a);


		if(empty($search)){
		
			echo "<p>No se encontraron resultados</p>";

		}else{

				foreach ($search as $key => $value) {
					
					echo "<p></p>";
					echo "<div class='w3-card-4'>";
					echo "<header class='w3-container w3-light-grey'>";
					echo "<h3>";
					echo $value["nombre"]." ".$value["apellido"];
					echo "</h3>";
					echo "</header>";
					echo "<div class='w3-container'>";
					echo "<p>Edad: ".$value["edad"]."</p>";
					echo "<p>DNI: ".$value["dni"]."</p>";
					echo "<p>Teléfono: ".$value["tel"]."</p>";
					echo "<p>Sexo: ".$value["sexo"]."</p>";
					echo "<p>Contacto: ".$value["mail"]."</p>";
					echo "<hr>";
					echo "<p>Observaciones: ".$value["obs"]."</p>";
					echo "</div>"; 
					?>

					<button class='w3-button w3-block w3-dark-grey' onclick="add('<?php echo $value['idpacientes'];?>');">Agregar a favoritos</button>

					<?php echo "</div>";
					echo "<p></p>";
			}
		}
	}
?>