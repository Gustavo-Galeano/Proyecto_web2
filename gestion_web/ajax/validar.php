<?php
require_once 'conexion.php';

$user = $_GET['a'];
$pass = $_GET['b'];

$datos = mysqli_query($db, "select * from usuarios where usuario='$user' and password='$pass'");
$row = mysqli_num_rows($datos);

if ($row > 0) {
    $arrayUser = mysqli_fetch_array($datos);
    // echo $myJson = array('msg' => "Redireccionando", 'params' =>  1 );

    /* Creating a session for the user. */
    session_start();
    $_SESSION['nombre'] = $arrayUser['nombre'];
    $_SESSION['apellido'] = $arrayUser['apellido'];
    $_SESSION['id'] = $arrayUser['id'];
    $_SESSION['usuario'] = $arrayUser['usuario'];
    $var[] = "<div class='alert alert-success' role='alert'>[200 Ok] Redireccionando</div>";
    $var[] = 1;
    echo $myJson = json_encode($var);
} else {
    // echo $myJson = array('msg' => "Fallo inesperado", 'params' =>  0);
    $var[] = "<div class='alert alert-danger' role='alert'> [400 ERROR] Fallo inesperado </div>";
    $var[] = 0;
    echo $myJson = json_encode($var);
}
