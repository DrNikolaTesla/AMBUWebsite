

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Recursos/imagenesLogin/favicon2.png" sizes="32x32">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login</title>
</head>
<body>
	<div class="container">
		<form action="validarLogin.php"  class="login-email"method="post">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Ingresar</p>
			<div class="input-group">
				<input type="email" placeholder="ingrese Email" name="user" id="user" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" id="password" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Iniciar sesión</button>
			</div>
		</form>
	</div>
</body>
</html>