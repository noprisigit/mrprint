</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <!-- <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.2
    </div> -->
    <strong>Copyright &copy; 2020 mr.perint.</strong> All rights
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
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
                            <div class="col-md-4">
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

    $('.btn-download-file').on('click', function () {
        var url = "<?= base_url('partner/download-file?file=') ?>"
        $('.comment').html($(this).data('keterangan'));
        $('.link-download').attr('href', url + $(this).data('nama_file'));
    });

    $('.btn-show-bukti').on('click', function () {
        $('.modal-body img').attr('src', "<?= base_url('assets/dist/img/bukti_bayar/'); ?>" + $(this).data('bukti'));
    });

    $('#table-verify').DataTable({
        scrollY:        true,
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        columnDefs: [
            { width: '5px', targets: 0 },
            { width: '150px', targets: [1,2] },
            { width: '130px', targets: 3 },
            { width: '120px', targets: 4 },
            { width: '70px', targets: [5,6] },
            { width: '100px', targets: [7,8] },

        ],
        fixedColumns: true
    });

    $('#partner-transaction').DataTable({
        scrollY:        true,
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        columnDefs: [
            { width: '5px', targets: 0 },
            { width: '150px', targets: [1,2] },
            { width: '130px', targets: 3 },
            { width: '50px', targets: 4 },
            { width: '100px', targets: 5 },
            { width: '130px', targets: 6 },
            { width: '70px', targets: 7 },
            { width: '130px', targets: 8 },

        ],
        fixedColumns: true
    });

    $(document).on('click', '#btn-edit-kabupaten', function () {
        let id_kabupaten = $(this).data('id_kabupaten');
        let nama_kabupaten = $(this).data('nama_kabupaten');

        $('.modal-body #ed_id_kabupaten').empty();
        $('.modal-body #ed_nama_kabupaten').empty();

        $('.modal-body #ed_id_kabupaten').attr('value', id_kabupaten);
        $('.modal-body #ed_nama_kabupaten').attr('value', nama_kabupaten);

    });

    $(document).on('click', '.btn-detail-provinsi', function () {
        var id_provinsi = $(this).data('id_provinsi');
        var url = "<?= base_url('owner/delete-kabupaten/'); ?>"

        $('#daftar-kabupaten').empty();
        $.ajax({
            url: "<?= base_url('owner/get_kabupaten'); ?>",
            type: "post",
            data: { id_provinsi: id_provinsi },
            dataType: "json",
            success: function (res) {
                
                for (var i = 0; i < res.length; i++) {
                    $('#daftar-kabupaten').append(`
                        <tr>
                            <td class="text-center">` + (i+1) + `</td>
                            <td>` + res[i]['nama_kabupaten'] + `</td>
                            <td class="text-center">
                                <span data-toggle="modal" data-target="#edit-kabupaten">
                                    <button type="button" id="btn-edit-kabupaten" class="btn btn-info btn-edit-kabupaten" data-id_kabupaten="`+ res[i]['id_kabupaten'] +`" data-nama_kabupaten="`+ res[i]['nama_kabupaten'] +`" data-toggle="tooltip" data-placement="top" title="Hapus Kabupaten"><i class="fas fa-edit"></i></button>
                                </span>
                                <a href="`+ url + res[i]['id_kabupaten'] +`" onclick="return confirm('Anda yakin ingin menghapus ini?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Kabupaten"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    `);
                }
            },
            error: function (err) {
                console.log(err)
            }
        });
    });

    $(document).on('click', '.btn-edit-provinsi', function () {
        let id_provinsi = $(this).data('id_provinsi');
        let nama_provinsi = $(this).data('nama_provinsi');

        $('#ed_id_provinsi').empty();
        $('#ed_nama_provinsi').empty();

        $('#ed_id_provinsi').attr('value', id_provinsi);
        $('#ed_nama_provinsi').attr('value', nama_provinsi);
    });
</script>
</body>

</html>