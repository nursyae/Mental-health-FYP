<footer class="main-footer">

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
<script src="<?= base_url('assets/plugins/apexcharts/apexcharts.min.js') ?>"></script>

<script src="<?= base_url('assets/dist/js/apexcharts.js') ?>"></script>
<script>
    $(function() {
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
<?php if ($title == "Dashboard" || $title == "Result" ) : ?>
    <script>
        var fontFamily = "'Roboto', Helvetica, sans-serif"

        var options = {
            series: [<?= $score['depression'] ?>, <?= $score['anxiety'] ?>, <?= $score['stress'] ?>],
            chart: {
                width: 480,
                type: 'pie',
            },
            labels: ['Depression', 'Anxiety', 'Stress'],
            colors: ['#7393B3', '#E5AA70', '#A52A2A'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 400
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#piechart"), options);
        chart.render();

        var options2 = {
            series: [{
                name: 'Depression',
                data: [<?= $score['depression'] ?>]
            }, {
                name: 'Anxiety',
                data: [<?= $score['anxiety'] ?>]
            }, {
                name: 'Stress',
                data: [<?= $score['stress'] ?>]
            }],
            colors: ['#7393B3', '#E5AA70', '#A52A2A'],
            chart: {
                type: 'bar',
                height: 350

            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: [''],
            },
            yaxis: {
                title: {
                    text: ''
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        var chart2 = new ApexCharts(document.querySelector("#apexchart"), options2);
        chart2.render();
    </script>
<?php endif; ?>
</body>

</html>