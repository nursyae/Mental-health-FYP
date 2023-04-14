<footer class="main-footer">

    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>

    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>



<script src="<?= base_url('assets/plugins') ?>/jquery/jquery.min.js"></script>

<script src="<?= base_url('assets/plugins') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/plugins') ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/plugins') ?>/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/dist') ?>/js/adminlte.min.js?v=3.2.0"></script>
<!-- select2 -->
<script src="<?= base_url('assets/plugins') ?>/select2/js/select2.full.min.js"></script>

<script>
    $(function() {

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $("#table_default1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#table_default1_wrapper .col-md-6:eq(0)');
        $('.table_default2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>