$(document).ready(function () {
    $("#add").click(function () {
        $("#tipo").val("INSERCION");
    });
    $("#boton").click(function () {
        bn = document.getElementById('formPr');

        $.ajax({
            url: "ajax/productos.php",
            method: "POST",
            data: new FormData(bn),
            cache: false,
            processData: false,
            contentType: false,
            dataType: "text"
        }).then(
            function (retorno) {
                $("#mensaje").html(retorno)
            }
        );


    });
})

function relleno(a, b, c, d, e) {
    // alert(a)
    /*a = pk
      b = fk
      c = descr 
      d = prec
      e = rese
      
      */
    $("#tipo").val("ACTUALIZACION");
    $("#pk").val(a);
    $("#categoria").val(b);
    $("#descripcion").val(c);
    $("#precio").val(d);
    $("#resena").val(e);
}

// function eliminar(a) {
//     swal({
//         title: "Seguro?",
//         text: "Eliminara por completo el registro!",
//         type: "warning",
//         showCancelButton: true,
//         confirmButtonClass: "btn-danger",
//         confirmButtonText: "Si, Eliminar esto!",
//         cancelButtonText: "No, Cancelar PorFa!",
//         closeOnConfirm: false,
//         closeOnCancel: false
//     },
//         function (isConfirm) {
//             if (isConfirm) {

//                 $.get("ajax/productos.php", { tipo: "ELIMNAR", id: a }, function (valores) {
//                     if (valores == 1) {
//                         swal("Borrado!", "El registro se ha borrado correctamente.", "success");
//                         setTimeout(location.href = 'producto', 5000);
//                     }
//                 })
//             } else {
//                 swal("Cancelado", "La accion fue cancelada :)", "error");
//             }
//         });
// }

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

                $.get("ajax/productos.php", { tipo: "ELIMNAR", id: a }, function (valores) {
                    if (valores == 1) {
                        swal("Borrado!", "El registro se ha borrado correctamente.", "success");
                        setTimeout(location.href='producto', 5000);
                    }
                })
            } else {
                swal("Cancelado", "La accion fue cancelada :)", "error");
            }
        });
}