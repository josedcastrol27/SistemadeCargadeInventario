<?php
include_once('cnx/conexion.php');
session_start();
if(isset($_SESSION['usuarioID'])){
$ID = $_SESSION['usuarioID'];
$QUERY = "Select * from usuarios Where usuarioID='$ID'";
$rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
$countQUERY = mysqli_num_rows($rsQUERY);
if($countQUERY<=0){
header('Location: index.php');
}
}else{
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>PHP + MySQL</title>
</head>
<body>
Bienvenido: <br />
<img src="<?php echo $_SESSION['fotoUsuario']; ?>" width="75px" height="75px">
<br />
<?php
echo $_SESSION['fullName'];
?> <br />
<a href="process/proceLogout.php">Cerrar Sesion</a>
<br /><br />
<h2>Menu Opciones</h2>
<ol>
<li><a href="usuarios.php">Usuarios</a></li>
<li><a href="materias.php">Materias</a></li>
</ol>
</body>
</html>