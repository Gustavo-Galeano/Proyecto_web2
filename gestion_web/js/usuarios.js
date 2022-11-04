$(document).ready(function () {
    // insertamos datos
    $("#add").click(function () {
        $("#tipo").val("INSERTAR");
    });
    $("#boton").click(function () {
        var n = $("#nombre_usuario").val();
        var a = $("#apellido_usuario").val();
        var u = $("#usuario_usuario").val();
        var p = $("#password_usuario").val();
        var t = $("#tipo").val();
        var c = $("#pk").val();
        //validaciones de campos
        if (n == "") {
            $("#mensajeNombre").html("<div class='alert alert-danger' role='alert'>El campo nombre no debe estar vacio</div>");
            $("#mensajeNombre").fadeOut(2000, function () {
                $("#mensajeNombre").html("");
            });
            $("#mensaje").fadeIn();
            $("#nombre").focus();
            return false;
        }

        if (a == "") {
            $("#mensajeApellido").html("<div class='alert alert-danger' role='alert'>El campo apellido no debe estar vacio</div>");
            $("#mensajeApellido").fadeOut(2000, function () {
                $("#mensajeApellido").html("");
            });
            $("#mensaje").fadeIn();
            $("#apellido").focus();
            return false;
        }
        if (u == "") {
            $("#mensajeUsuario").html("<div class='alert alert-danger' role='alert'>El campo usuario no debe estar vacio</div>");
            $("#mensajeUsuario").fadeOut(2000, function () {
                $("#mensajeUsuario").html("");
            });
            $("#mensaje").fadeIn();
            $("#usuario").focus();
            return false;
        }
        if (p == "") {
            $("#mensajePassword").html("<div class='alert alert-danger' role='alert'>El campo password no debe estar vacio</div>");
            $("#mensajePassword").fadeOut(2000, function () {
                $("#mensajePassword").html("");
            });
            $("#mensaje").fadeIn();
            $("#password").focus();
            return false;
        }
        //envio de datos mediante ajax
        $.get("ajax/usuarios.php", { tipo: t, id: c, nombre: n, apellido: a, usuario: u, password: p }, function (retorno) {
            console.log(retorno);
            var x = JSON.parse(retorno);
            if (x[1] != 1) {
                $("#mensaje").html(x[0]);
                $("#mensaje").fadeOut(2000, function () {
                    $("#mensaje").html("");

                });
                $("#mensaje").fadeIn();
            } else {
                $("#mensaje").html(x[0]);
                $("#mensaje").fadeOut(2000, function () {
                    $("#mensaje").html("");
                    location.href = 'usuario';
                });
                $("#mensaje").fadeIn();
            }
        });
    });
});


function relleno(a, l, u, p, r) {
    // alert(a)
    $("#pk").val(a);
    $("#tipo").val("ACTUALIZACION");
    // $("#descripcion").val(b);
    
    $("#nombre_usuario").val(l); 
    $("#apellido_usuario").val(r); 
    $("#usuario_usuario").val(u); 
    $("#password_usuario").val(p);

}

function eliminar(a) {
    swal({
        title: "Seguro?",
        text: "Eliminara por completo el registro!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si, Eliminar esto!",
        cancelButtonText: "No, Cancelar PorFa!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
        function (isConfirm) {
            if (isConfirm) {

                $.get("ajax/usuarios.php", { tipo: "ELIMNAR", id: a }, function (valores) {
                    if (valores == 1) {
                        swal("Borrado!", "El registro se ha borrado correctamente.", "success");
                        setTimeout(location.href = 'usuario', 5000);
                    }
                })
            } else {
                swal("Cancelado", "Proceso cancelado", "error");
            }
        });
}