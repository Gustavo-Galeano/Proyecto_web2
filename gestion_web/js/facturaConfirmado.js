// function facturar(a) {
//     console.log("ok");
//         swal({
//             title: "Seguro?",
//             text: "Cambiar el estado de la factura",
//             type: "success",
//             showCancelButton: true,
//             confirmButtonClass: "btn-success",
//             confirmButtonText: "Si, Cambiar estado!",
//             cancelButtonText: "No, Cancelar",
//             closeOnConfirm: false,
//             closeOnCancel: false
//         },
//             function (isConfirm) {
//                 if (isConfirm) {

//                     $.get("ajax/factura.php", { tipo: "FACTURAR", id: a }, function (valores) {
//                         if (valores == 1) {
//                             swal("Borrado!", "El registro ha sido facturas", "success");
//                             setTimeout(location.href = 'categoria', 5000);
//                         }
//                     })
//                 } else {
//                     swal("Cancelado", "Accion canselada", "error");
//                 }
//             });
//     }
