<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Scripts de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Scripts para utilizar gráficos con la librería Chart.Js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <?= script_tag(['src' => 'assets/admin/js/chart.js']); ?>
        <!-- Scripts para las tablas con paginación -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#tablaPaginacion').DataTable();
                $('#tablaPaginacion2').DataTable();
            });
        </script>
        <!-- Script para darle funcionalidad al template del dashboard del admin -->
        <?= script_tag(['src' => site_url('assets/admin/js/scripts.js')]); ?>
    </body>
</html>