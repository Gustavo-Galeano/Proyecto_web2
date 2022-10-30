<?php
session_start();
require_once 'conexion.php';
$contr = $_GET['pass'];
$id = $_SESSION['id'];
$query = mysqli_query($db,"update usuarios set password = '$contr' where id= $id ");
if($query ){
    $var[] = "<div class='alert alert-success' role='alert'>Datos modificados correctamente</div>";
    $var[] = 1;
    echo    $myJSON = json_encode($var);
}else{
    $var[] = "<div class='alert alert-danger' role='alert'>Error en procesar los datos</div>";
    $var[] = 0;
    echo    $myJSON = json_encode($var);
}
?>