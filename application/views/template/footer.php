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
<!-- Bootstrap Switch -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
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

    $('input[name="status_shop"]').on("change", function () {
        
        var val = $(this).val();
        console.log(val);
        var apply = $(this).is(':checked') ? 1 : 0;
        console.log(apply);
        $.ajax({
            type: "POST",
            url: "<?= base_url('partner/update-status-shop'); ?>",
            data: {val: val, apply: apply}
        });
    });

    $('#search-print-shop').on('change', function (){
        var id_provinsi = $('.provinsi').val();
        var id_kabupaten = $(this).val();
        var url = "<?= base_url('customer/print-shop/'); ?>"
        var url_image = "<?= base_url('assets/dist/img/print_shop/'); ?>";
        var status_shop;
        var color;

        console.log(id_provinsi + ' ' + id_kabupaten);
        

        $.ajax({
            url: "<?= base_url('customer/search-print-shop-by-location'); ?>",
            type: "post",
            data: { id_provinsi: id_provinsi, id_kabupaten: id_kabupaten },
            dataType: "json",
            success: function (res) {
                $('#show-print-shop').empty();
                if (res.length >= 1) {
                    for (var i = 0; i < res.length; i++) {
                        if (res[i]['status_shop'] == 0) {
                            status_shop = "Close"
                            color = "text-danger"
                        } else {
                            status_shop = "Open"
                            color = "text-success"
                        } 
                        $('#show-print-shop').append(`
                            <div class="card" style="width: 18rem;">
                                <img src="` + url_image + res[i]['image'] + `" class="card-img-top" alt="...">
                                <div class="card-body p-3">
                                    <h4 class="text-orange text-bold">`+ res[i]['shop_name'] +`</h4>
                                    <p class="card-text">` + res[i]['address'] + `</p>
                                    <p class="text-right `+ color +` text-bold">` + status_shop + `</p>
                                    <a href="` + url + res[i]['id_partners'] + `" class="btn btn-app float-right">
                                        <i class="fas fa-print"></i> Print Shop
                                    </a>
                                    <a href="`+ res[i]['link_g_map'] +`" target="_blank" class="btn btn-app float-right">
                                        <i class="fas fa-map-marked-alt"></i> Maps
                                    </a>
                                </div>
                            </div>
                        `);
                    }
                } else {
                    $('#show-print-shop').append(
                        '<h4 class="text-center">Belum Ada Print Shop di Daerah Ini.</h4>'
                    );
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