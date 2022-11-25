<?php

require_once 'conexion.php';

if ($_GET['tipo'] == "FACTURAR") {

    $dato = mysqli_query($db, "update carrito set estado='Facturado' where idcarrito=$_GET[id]");
    if ($dato) {
        echo 1;
    }
}