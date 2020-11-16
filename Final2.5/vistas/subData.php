<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mini Form</title>
</head>
<body>
	

	<div align="center">

		<h1><i>Ingrese los valores para la Base de Datos</i></h1>

		<form action="../driver/subDataDrive.php" method="POST">
			
			<p><input name="UsuarioLogin" type="text" placeholder="Usuario" required></p>

			<p><input name="ContraLogin" type="password" placeholder="Contraseña" required></p>

			<p><input name="dato" type="text" placeholder="Dato" required></p>

			<p><input name="metrica" type="text" placeholder="Inserte un valor numérico" required></p>

			<p><input name="idpaciente" type="password" placeholder="Id Paciente" required></p>

			<p><input type="submit"></p>

		</form>

	</div>

</body>
</html>