<?php
include_once('../cnx/conexion.php');
session_start();
$email = null;
$pwd = null;
if(isset($_POST['btn'])){
if(isset($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['email']) && !
empty($_POST['pwd'])){
echo 'Recibio del POST', '<br />';
$email = $_POST['email'];
$pwd = md5($_POST['pwd']);
echo $email, '<br />';
echo $pwd, '<br />';
$QUERYLog = "Select * From usuarios Where correo='$email' And password='$pwd'";
$rsQUERYLog = mysqli_query($con, $QUERYLog) or die('Error: ' . mysqli_error($con));
$fileQUERYLog = mysqli_fetch_array($rsQUERYLog);
$NofileQUERYLog = mysqli_num_rows($rsQUERYLog);
echo $QUERYLog;
if($NofileQUERYLog > 0){

$_SESSION['usuarioID'] = $fileQUERYLog['usuarioID'];
$_SESSION['fullName'] = $fileQUERYLog['nombre'] . ' ' .$fileQUERYLog['apellido'];
                if(!empty($fileQUERYLog['foto'])){
                $_SESSION['fotoUsuario'] = 'fotos/' . $fileQUERYLog['foto'];
                }else{
                $_SESSION['fotoUsuario'] = 'fotos/silueta.jpg';
                }
echo '<br />';
echo 'UsuarioID session:', $_SESSION['usuarioID'],'<br >';
echo 'fullName session:', $_SESSION['fullName'],'<br >';
echo 'fotoUsuario session:', $_SESSION['fotoUsuario'],'<br >';
header('Location: ../menu.php');
}
else
{
session_destroy();
header('Location: ../index.php');

}
}else{
session_destroy();
header('Location: ../index.php'); 
}
}else{
session_destroy();
header('Location: ../index.php');

}
mysqli_close($con);
?>