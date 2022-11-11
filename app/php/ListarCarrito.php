<?php
require_once 'conexion.php';
session_start();
$query = mysqli_query($db, "select * from carrito c, productos p where c.idproducto=p.id and estado='Pendiente' and idcliente=$_SESSION[id]");
?>
