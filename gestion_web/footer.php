</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; CARRITO S.A. <?php echo date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Esta seguro?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Si selecciona salir debera de volver a iniciar sesión.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="logout">Salir</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

<script src="js/sweetalert.js"></script>

<script>
    $(document).ready(function() {
        $("#updatepass").click(function() {
            var a = $("#pass1").val();
            var b = $("#pass2").val();
            if (a == b) {
                $.get("ajax/pass.php", {
                    pass: a
                }, function(respuesta) {
                    const myArray = JSON.parse(respuesta);
                    if (myArray[1] != 1) {
                        $("#mensajepass").html(myArray[0]);
                        $("#mensajepass").fadeOut(5000, function() {
                            $("#mensajepass").html("");
                        });
                        $("#mensajepass").fadeIn();
                    } else {
                        $("#mensajepass").html(myArray[0]);
                        $("#mensajepass").fadeOut(5000, function() {
                            $("#mensajepass").html("");
                            location.href = 'logout';
                        });
                        $("#mensajepass").fadeIn();
                    }
                })
            } else {
                $("#mensajepass").html("<div class='alert alert-danger' role='alert'>Las contraseñas no coinciden</div>");
                $("#mensajepass").fadeOut(5000, function() {
                    $("#mensajepass").html("");
                });
                $("#mensajepass").fadeIn();
            }
        })
    })
</script>
</body>

</html>