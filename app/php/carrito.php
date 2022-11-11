<?php
require_once 'conexion.php';

if ($_GET['tipo'] == "INSERCION") {
    $dato = mysqli_query($db, "insert into carrito (idcliente,idproducto,cantidad,precio,fecha,estado)
     values('$_GET[usu]','$_GET[codart]','$_GET[cant]','$_GET[precio]',now(),'Pendiente')");
    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Datos insertados </div>";
        $var[] = 1;
        echo 1;
        // echo $Json = json_encode($var);
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Problemas en insertar los datos </div>";
        $var[] = 0;
        echo 0;
        // echo $Json = json_encode($var);
    }
}

if ($_GET['tipo'] == "CONFIRMAR") {
    $dato = mysqli_query($db, " update carrito set estado = 'Confirmado' where idcarrito=$_GET[id]");
    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Datos actualizados </div>";
        $var[] = 1;
        echo 1;
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Problemas al actualizar los datos </div>";
        $var[] = 0;
        echo 0;
    }
}

/* Updating the status of the cart to Canceled. */
if ($_GET['tipo'] == "CANCELAR") {
    $dato = mysqli_query($db, " update carrito set estado='Cancelado' where idcarrito=$_GET[id]");
    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Datos actualizados </div>";
        $var[] = 1;
        echo 1;
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Problemas al actualizar los datos </div>";
        $var[] = 0;
        echo 0;
    }
}


if ($_GET['tipo'] == "ANULAR") {
    $dato = mysqli_query($db, " update carrito set estado='Anulado'  where idcarrito=$_GET[id]");
    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Datos actualizados </div>";
        $var[] = 1;
        echo 1;
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Problemas al actualizar los datos </div>";
        $var[] = 0;
        echo 0;
    }
}

// if ($_GET['tipo'] == "ELIMNAR") {
//     $sql = mysqli_query($db, "delete from carrito where idcarrito=$_GET[id]");
//     if ($sql) {
//         echo 1;
//     }
// }
