<?php
require_once 'conexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

    <title>Articulo</title>
</head>

<body>

    <div class="container">
        <input type="hidden" id="usuarioCliente" value="<?php echo $_SESSION['id']; ?>">
        <?php
        $dato = mysqli_query($db, "select * from productos");
        while ($row = mysqli_fetch_array($dato)) {
        ?>
            <div class="card" style="width:280px">
                <img class="card-img-top" src="../gestion_web/<?php echo $row['img'] ?>" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $row['descripcion'] ?></h4>
                    <p class="card-text"><?php echo $row['resena'] ?></p>
                    <p class="card-text text-center" style="font-size: 25px;">
                        <?php echo number_format($row['precio'], 0, ',', '.') ?>
                    </p>

                    <input type="hidden" id="codart<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
                    <input type="hidden" id="precioart<?php echo $row['id'] ?>" value="<?php echo $row['precio'] ?>">
                    <input type="number" value="1" id="cantidad<?php echo $row['id'] ?>" class="form-control text-center">
                    <a href="#" class="btn btn-success btn-block" onclick="cargarcarrito(<?php echo $row['id'] ?>)" id="addart">
                        <i class="fa fa-shopping-cart" style="color:white"></i>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</body>

<script>
    var i = 1;
    $("#addart").click(function() {
        $("#Qcart").html(i);
        i++;
    });

    function cargarcarrito(a) {
        e = "INSERCION";
        c = $("#precioart" + a).val();
        b = $("#cantidad" + a).val();
        d = $("#usuarioCliente").val();
        /*alert(a);
        alert(c);
        alert(b);

        e es el tipo de consulta
        a es el codigo del art, 
        b es la cantidad, 
        c es el precio 
        d es el codigo del cliente
        */
        $.get("https://proyectofinalwebphp.000webhostapp.com/carrito_app/php/carrito.php", {
            tipo: e,
            codart: a,
            cant: b,
            precio: c,
            usu: d,
        }, function(retorno) {
            // console.log(retorno);
            if (retorno == 1) {
                alert('Agregado al carrito');
            } else {
                alert('Problemas');
            }
        });
    }
</script>

</html>