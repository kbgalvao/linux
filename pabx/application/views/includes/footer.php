</div> 
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © Landell 2017</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.slim.min.js"></script>

<script src="<?php echo base_url() ?>assets/vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sb-admin-charts.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/button_fila.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datables/dataTables.bootstrap4"></script>
<script src="<?php echo base_url() ?>assets/vendor/datables/jquery.dataTables"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script> 
<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

<script>
    $('.btn').on('click', function () {
        var $this = $(this);
        $this.button('loading');
        setTimeout(function () {
            $this.button('reset');
        }, 8000);
    });
</script>
<script>
    $("#ta").keyup(function (e) {
        autoheight(this);
    });

    function autoheight(a) {
        if (!$(a).prop('scrollTop')) {
            do {
                var b = $(a).prop('scrollHeight');
                var h = $(a).height();
                $(a).height(h - 5);
            } while (b && (b != $(a).prop('scrollHeight')));
        }
        ;
        $(a).height($(a).prop('scrollHeight') + 20);
    }

    autoheight($("#ta"));
</script>

<script>
    $.extend(true, $.fn.dataTable.defaults, {
        "searching": true,
        "ordering": false,
        "bLengthChange": true,
        "showNEntries": false,
        "bInfo": true,
        "paging": true,
        "lengthMenu": [[1, 5, 10, 25, 50, -1], [1, 5, 10, 25, 50, "All"]]
    });
</script>
<script>
    $('#dataTable').DataTable({
        language: {
            "sInfo": "<span class='badge badge-secondary'>Mostrando de _START_ até _END_ de _TOTAL_ registros</span>",
            "sInfoEmpty": "<span class='badge badge-secondary'>Mostrando 0 até 0 de 0 registros</span>",
            "sInfoFiltered": "<span class='badge badge-secondary'>Filtrados de _MAX_ registros</span>",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ <span class='btn btn-primary btn-sm'>resultados por página</span>",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "<div class='alert alert-danger' role='alert'>Nenhum registro encontrado<div>",
            "sSearch": "<i class='btn btn-primary btn-sm'>Pesquisar</i>",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        }
    });

</script>
<script type="text/javascript">
    $('#exemplo1').datepicker({
        format: "yyyy/mm/dd ",
        language: "pt-BR",
        //startDate: '+0d',
    });
</script>
<script type="text/javascript">
   $('#exemplo2').datepicker({
        format: "yyyy/mm/dd ",
        language: "pt-BR",
        //startDate: '+0d',
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>


</div>
</body>

</html>
