<?php
include_once('cnx/conexion.php');
session_start();
include_once('process/validaTiempoSession.php');
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
if(isset($_GET['ID'])){
$usuarioID = $_GET['ID'];
}else{
header('Location: usuarios.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>PHP + MySQL</title>
</head>
<body>
<h2>Modificar Usuario</h2>
<form method="post" action="process/usuarios.php" name="form1" enctype="multipart/form-data">
<?php
$QUERYmod = "Select * From usuarios Where usuarioID='$usuarioID'";
$rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));

$fileQUERYmod = mysqli_fetch_array($rsQUERYmod);
$rutaFoto = 'fotos/'.$fileQUERYmod['foto'];
?>

<table border="0">
<tr>
<th>Foto</th>
<td><img src="<?php echo $rutaFoto; ?>" width="75px" height="75px"></td>
</tr>
<tr>
<input type="hidden" name="usuarioID" value="<?php echo $usuarioID; ?>">
<th>Nombre</th>
<td><input type="text" name="nombre" value="<?php echo $fileQUERYmod['nombre']; ?>"></td>
</tr>
<tr>
<th>Apellido</th>
<td><input type="text" name="apellido" value="<?php echo $fileQUERYmod['apellido']; ?>"></td>
</tr>
<tr>
<th>Direccion</th>
<td><textarea type="text" name="direccion"><?php echo $fileQUERYmod['direccion'];
?></textarea></td>
</tr>
<th>telefono HAb.</th>
<td><input type="text" name="telefonoHab" value="<?php echo $fileQUERYmod['telefonoHab']; ?
>"></td>
</tr>
<tr>
<th>telefonoMovil</th>
<td><input type="text" name="telefonoMovil" value="<?php echo
$fileQUERYmod['telefonoMovil']; ?>"></td>
</tr>
</tr>
<th>Correo</th>
<td><input type="mail" name="correo" value="<?php echo $fileQUERYmod['correo']; ?>"></td>
</tr>
<th>Password</th>
<td><input type="password" name="password" value="<?php echo $fileQUERYmod['password']; ?
>"></td>
</tr>
<tr>
<th>Foto</th>
<td><input type="file" name="fichero_usuario"></td>
</tr>
</table>
<br />
<input type="submit" name="modificar" value="GUARDAR">
</form>

<br />

<a href="usuarios.php" title="Regresar"><i class="material-icons" style="font-
size:26px">arrow_back</i></a>

<?php
mysqli_close($con);
?>
</body>
</html>