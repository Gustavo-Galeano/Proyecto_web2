<?php
require_once 'conexion.php';
session_start();
$query = mysqli_query($db, "select * from carrito c, productos p where c.idproducto=p.id and estado='Pendiente' and idcliente=$_SESSION[id]");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  <title>carrito</title>
</head>

<body>

  <table class="table table-striped w-auto">
    <thead>
      <tr>
        <th>#</th>
        <th>Artículo</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Accion</th>
      </tr>
    </thead>
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
              <i class='bx bx-trash'></i>
            </button>
          </td>
        </tr>
      <?php
        $i++;
      }
      ?>
    </tbody>
  </table>

  <hr>

  <button type="submit" class="btn btn-danger" onclick="cancelar()"> Cancelar</button>
  <button type="submit" class="btn btn-success" onclick="confirmar()"> Confirmar</button>


  <script>
    function anular(a) {
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
              tipo: "ANULAR",
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

    function cancelar(b) {
      // alert(b)
      swal({
          title: "Seguro?",
          text: "El registro sera cancelado!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Si, Cancelar esto!",
          cancelButtonText: "No, Cancelar!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            $.get("php/carrito.php", {
              tipo: "CANCELAR",
              id: b
            }, function(valores) {
              console.log(valores);
              if (valores == 1) {
                swal("Cancelado!", "Articulos cancelados.", "success");
                setTimeout(location.href = '?', 3000);
              }
            })
          } else {
            swal("Cancelado", "Accion cancelada", "error");
          }
        });
    }

    function confirmar(c) {
    swal({
        title: "Seguro?",
        text: "El registro de anulara por completo!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Si, Confirmar pedido!",
        cancelButtonText: "No, Cancelar!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.get("php/carrito.php", {
            tipo: "CONFIRMAR",
            id: c
          }, function(valores) {
            console.log(valores);
            if (valores == 1) {
              swal("Confirmado!", "Productos confirmados.", "success");
              setTimeout(location.href = '?', 3000);
            }
          })
        } else {
          swal("Cancelado", "Accion cancelada", "error");
        }
      });
  }
  </script>

</body>

</html>