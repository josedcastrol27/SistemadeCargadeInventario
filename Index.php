<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>PHP + MySQL</title>
</head>
<body>
<form name="form1" action="./process/proceLogin.php" method="post">
<h1>PHP + MySQL</h1>
<hr>
<h2>Inicio de Sesion</h2>
<label>Email address:</label><br />
<input type="email" name="email"><br />
<label>Password:</label><br />
<input type="password" name="pwd"><br />
<br />
<button type="submit" name="btn" class="btn btn-default">Entrar</button>
<a href="./PaginaAgregarUsuarios.php">
<button type="submit" name="btn" class="btn btn-default" >Registrarse</button>
</a>
</form>
</body>
</html>