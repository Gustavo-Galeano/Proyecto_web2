<?php
require_once 'conexion.php';

$a = $_GET['nombre'];
$b = $_GET['apellido'];
$c = $_GET['usuario'];
$d = $_GET['pass'];

/*echo $a.' '.$b.' '.$c.' '.$d;*/

$datos = mysqli_query($db,"insert into datos(nombre,apellido,usuario,pass)values('$a','$b','$c','$d')");

if($datos){
echo "<i style='color:green'>Registro satisfactorio<i>";
}else{
echo "<i style='color:red'>Problemas al registrarnos<i>";
}
