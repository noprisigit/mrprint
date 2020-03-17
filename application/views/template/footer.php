</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<script src="<?= base_url('assets/'); ?>dist/js/script.js"></script>
<script>
    $(".data-table").DataTable();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    $('.provinsi').on('change', function() {
        var id_provinsi = $(this).val();
       
        $('.kabupaten').empty();
        $.ajax({
            url: "<?= base_url('owner/get_kabupaten'); ?>",
            type: "post",
            data: { id_provinsi : id_provinsi },
            dataType: "json",
            success: function (res) {
                // console.log(res);
                $('.kabupaten').append('<option selected disabled>- Kabupaten/Kota -</option>');
                for (var i=0; i < res.length; i++) {
                    $('.kabupaten').append('<option value="' + res[i]['id_kabupaten'] + '">'+ res[i]['nama_kabupaten'] +'</option>');
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
</body>

</html>