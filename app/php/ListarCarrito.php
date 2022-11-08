<?php
require_once 'conexion.php';
session_start();
// $sql = mysqli_query($db, "select * from carrito c, productos p where c.idproducto=p.idcarrito and estado='Pendiente' and idcliente=$_SESSION[id]");


$query = mysqli_query($db, "select * from carrito c, productos p where c.idproducto=p.id and estado='Pendiente' and idcliente=$_SESSION[id]");

// $query = mysqli_query($db,"select p.descripcion as descripcion, c.precio as precio, c.cantidad as cant 
//                            from carrito c inner join productos p on c.id = p.id; nd idcliente=$_SESSION[id]");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
</head>

<body>
    <table class="table table-striped w-auto">

        <!--Table head-->
        <thead>
            <tr>
                <th>#</th>
                <th>Artículo</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Accion</th>
            </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr class="table-info">
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['descripcion'] ?></td>
                    <td><?php echo $row['cantidad'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="anular(<?php echo $row['idcarrito']; ?>)">
                            Anular
                        </button>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
        <!--Table body-->

    </table>
    <button type="button" class="btn btn-danger">
        Canelar
    </button>
    <!-- <button type="button" class="btn btn-success" onclick="confirmar(<?php echo $row['idcarrito']; ?>)">
        Confirmar
    </button> -->

    <button type="button" onclick="confirmar()">
        Confirmar
    </button>


    <script>
        function anular(a) {
            alert(a)
            swal({
                    title: "Seguro?",
                    text: "El registro de anulara por completo!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Si, Anular esto!",
                    cancelButtonText: "No, Cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {

                        $.get("php/carrito.php", {
                            tipo: "ELIMNAR",
                            id: a
                        }, function(valores) {
                            if (valores == 1) {
                                swal("Anulado!", "Registro Anulado.", "success");
                                setTimeout(location.href = '?', 3000);
                            }
                        })
                    } else {
                        swal("Cancelado", "Accion cancelada", "error");
                    }
                });
        }

        function confirmar(c) {
            
        }
    </script>
</body>

</html>