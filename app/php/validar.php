<?php
require_once 'conexion.php';
$user = $_GET['caja1'];
$pass = $_GET['caja2'];

$datos = mysqli_query($db, "select * from datos where usuario='$user' and pass='$pass'");
$row = mysqli_num_rows($datos);

if ($row > 0) {
    $arrayUser = mysqli_fetch_array($datos);
    // $var[] = "<div class='alert alert-success' role='alert'> Redireccionando</div>";
    // $var[] = 1;
    // echo $myJSON = json_encode($var);

/* Creating a session for the user. */
    session_start();
    $_SESSION['nombre'] = $arrayUser['nombre'];
    $_SESSION['apellido'] = $arrayUser['apellido'];
    $_SESSION['id'] = $arrayUser['id'];
    $_SESSION['usuario'] = $arrayUser['usuario'];
    echo $myJSON = array('msg' => "Redireccionando", 'params' => 1);
} else {
    // $var[] = "<div class='alert alert-danger' role='alert'> Fallo inesperado</div>";
    // $var[] = 0;
    // echo    $myJSON = json_encode($var);
    echo $myJSON = array('msg' => "Fallo inesperado", 'params' => 0);
}
