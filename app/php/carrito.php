<?php
require_once 'conexion.php';

$dato = mysqli_query($db, 
"insert into carrito (idcliente,idproducto,cantidad,precio,fecha,estado)
values('$_GET[usu]','$_GET[codart]','$_GET[cant]','$_GET[precio]',now(),'Pendiente')");
if ($dato) {
    echo 1;
} else {
    echo 0;
}



/*
if ($_GET['tipo'] == "INSERCION") {

    $dato = mysqli_query($db, "insert into categorias(descripcion)values('$_GET[descripcion]')");
    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Datos insertados con exitos! </div>";
        $var[] = 1;
        echo $Json = json_encode($var);
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Problemas en insertar los datos </div>";
        $var[] = 0;
        echo $Json = json_encode($var);
    }
}*/


// if ($_GET['tipo'] == "ELIMNAR") {

//     $sql = mysqli_query($db, "delete from carrito where id=$_GET[id]");
//     if ($sql) {
//         echo 1;
//     }
// }
