<?php
require_once 'header.php';
require_once 'conexion.php';
?>

<a href="listaFacturado" class="btn btn-primary mb-2 ml-2">Ver productos facturados</a>


<table class="table table-striped ml-1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Estado</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
    /*select * from carrito c, productos p where c.idproducto=p.id and estado='Pendiente' and idcliente=$_SESSION[id] */
    //$sql = mysqli_query($db, "select * from carrito where estado='Confirmado' ");
    $sql = mysqli_query($db, "select * from carrito c, productos p where c.idproducto=p.id and estado='Confirmado'");
    $i = 1;
    while ($row = mysqli_fetch_array($sql)) {
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['descripcion'] ?></td>
        <td><?php echo $row['precio']; ?></td>
        <td><?php echo $row['estado']; ?></td>
        <td>
          <button type="submit" class="btn btn-success" id="botonFacturar" onclick="facturar(<?php echo $row['idcarrito']; ?>)">
            Facturar
          </button>
        </td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </tbody>
</table>


<script>
  function facturar(a) {
    alert("ok");
    swal({
        title: "Seguro?",
        text: "Cambiar el estado de la factura",
        type: "success",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Si, Cambiar estado!",
        cancelButtonText: "No, Cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.get("ajax/factura.php", {
            tipo: "FACTURAR",
            id: a
          }, function(valores) {
            console.log(valores);
            if (valores == 1) {
              swal("Borrado!", "El registro ha sido facturas", "success");
              setTimeout(location.href = '?', 5000);
            }
          })
        } else {
          swal("Cancelado", "Accion canselada", "error");
        }
      });
  }
</script>

<?php
require_once 'footer.php';
?>