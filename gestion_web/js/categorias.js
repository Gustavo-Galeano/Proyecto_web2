$(document).ready(function () {
    /* INSERCION DE DATOS */
    $("#add").click(function () {
        $("#tipo").val("INSERCION");
    });
    $("#boton").click(function () {
        var a = $("#descripcion").val();
        var b = $("#tipo").val();
        var c = $("#pk").val();
        if (a == "") {
            $("#mensaje").html("<div class='alert alert-danger' role='alert'>Colocar una categoria</div>");
            $("#mensaje").fadeOut(2000, function () {
                $("#mensaje").html("");
            });
            $("#mensaje").fadeIn();
            $("#descripcion").focus();
            return false;
        }
        $.get("ajax/categorias.php", { tipo: b, descripcion: a, id: c }, function (retorno) {
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
                    location.href = 'categoria';
                });
                $("#mensaje").fadeIn();
            }
        })
    });
    /* FIN INSERCION DE DATOS */

    /* ACTUALIZACION DE DATOS */



    /* FIN ACTUALIZACION DE DATOS */
})

function relleno(a, b) {
    // alert(a)
    $("#pk").val(a);
    $("#tipo").val("ACTUALIZACION");
    $("#descripcion").val(b);

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

                $.get("ajax/categorias.php", { tipo: "ELIMNAR", id: a }, function (valores) {
                    if (valores == 1) {
                        swal("Borrado!", "El registro se ha borrado correctamente.", "success");
                        setTimeout(location.href='categoria', 5000);
                    }
                })
            } else {
                swal("Cancelado", "La accion fue cancelada :)", "error");
            }
        });
}