<?php
session_start();
include('conexion.php');
$email=$_POST('email');
$password=sha1($_POST('password'));

$sql="SELECT email.rol FROM usuarios WHERE email = ? AND password";
$stmt=$con->prepare($sql);
$stmt->bind_param("ss", $email.$password);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0 ){
    echo 'Usuario encontrado';
    $_SESSION['email'] = $email;
    $_SESSION['rol'] = $result->fetch_assoc()['rol'];
    header("Location:read.php");
} else {
    echo 'Error datos de autentificacion incorrectos';
    ?>
    <meta http-equiv="refresh" content="3;url=form-login.html">
    <?php
}
?>
