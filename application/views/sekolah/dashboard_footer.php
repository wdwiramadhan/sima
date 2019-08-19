</div>
</div>


<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>
<script src="<?= base_url() ?>assets/js/style.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo base_url('master/sekolah/get_data_sekolah') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0, 2],
                "orderable": false,
            }, ],

        });

    });
</script>

</body>

</html>