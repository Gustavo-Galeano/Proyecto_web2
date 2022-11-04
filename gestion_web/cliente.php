<?php
require_once 'header.php';
require_once 'conexion.php';
?>

<!-- <h4>Panel de ABM de clientes</h4> -->


<h2>Panel de clientes</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Usuario</th>
            <th scope="col">Password</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($db, "select * from datos");
        $i = 1;
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $row['nombre']; ?> </td>
                <td> <?php echo $row['apellido']; ?> </td>
                <td> <?php echo $row['usuario']; ?> </td>
                <td> <?php echo md5($row['pass']); ?> </td>
                <td>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#clienteModal" onclick="relleno(
                        '<?php echo $row['id']; ?>',
                        '<?php echo $row['nombre']; ?>',
                        '<?php echo $row['apellido']; ?>',
                        '<?php echo $row['usuario']; ?>',
                        '<?php echo $row['pass']; ?>')">
                        Editar
                    </button>

                    <button type="submit" class="btn btn-danger" onclick="eliminar(<?php echo $row['id']; ?>)">
                        Eliminar
                    </button>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="tipo">
                        <input type="hidden" class="form-control" id="pk">

                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Ingrese el Nombre">
                        <div id="mensajeNombre"></div>

                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Ingrese el Apellido">
                        <div id="mensajeApellido"></div>

                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="usuario_cliente" name="usuario_cliente" placeholder="Ingrese el Usuario">
                        <div id="mensajeUsuario"></div>

                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password_cliente" name="password_cliente" placeholder="Ingrese el Password">
                        <div id="mensajePassword"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="boton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script src="js/clientes.js"></script>

<?php
require_once 'footer.php'
?>