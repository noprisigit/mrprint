<!-- Main content -->
<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Verify Transaction Printing</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="table-verify">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Nama Customer</th>
                                    <th class="text-center">Nama Print Shop</th>
                                    <th class="text-center">Pick Up</th>
                                    <th class="text-center">Pages</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Bukti Bayar</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($verify_transaction as $item) : 
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $item['invoice']; ?></td>
                                    <td><?= $item['full_name']; ?></td>
                                    <td><?= $item['shop_name']; ?></td>
                                    <td class="text-center"><?= $item['tgl_pengambilan']; ?> <?= $item['jam_pengambilan']; ?></td>
                                    <td class="text-center"><?= $item['jumlah_halaman']; ?></td>
                                    <?php
                                        $hasil_rupiah = "Rp " . number_format($item['jumlah_bayar'],2,',','.');
                                    ?>
                                    <td class="text-center"><?= $hasil_rupiah; ?></td>
                                    <?php if($item['bukti_bayar'] != NULL) : ?>
                                        <td class="text-center"><a href="#" class="btn-show-bukti" data-toggle="modal" data-target="#modal-image" data-bukti="<?= $item['bukti_bayar']; ?>">Lihat Bukti Bayar</a></td>
                                    <?php else : ?>
                                        <td class="text-center text-danger">Belum Ada Bukti Bayar</td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('owner/verify/').$item['invoice']; ?>" class="btn btn-primary">Verifikasi</a>
                                    </td>
                                    
                                </tr>
                                <?php 
                                    $no++;
                                    endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Verify Transaction Top Up</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Nama Customer</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Bukti Bayar</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($verify_wallet as $item) : 
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $item['invoice']; ?></td>
                                    <td><?= $item['full_name']; ?></td>
                                    <?php
                                        $hasil_rupiah = "Rp " . number_format($item['jumlah_bayar'],2,',','.');
                                    ?>
                                    <td class="text-center"><?= $hasil_rupiah; ?></td>
                                    <?php if($item['bukti_bayar'] != NULL) : ?>
                                        <td class="text-center"><a href="#" class="btn-show-bukti" data-toggle="modal" data-target="#modal-image" data-bukti="<?= $item['bukti_bayar']; ?>">Lihat Bukti Bayar</a></td>
                                    <?php else : ?>
                                        <td class="text-center text-danger">Belum Ada Bukti Bayar</td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('owner/verify-wallet/').$item['invoice']; ?>" class="btn btn-primary">Verifikasi</a>
                                    </td>
                                    
                                </tr>
                                <?php 
                                    $no++;
                                    endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

<div class="modal fade" id="modal-image" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img  alt="Bukti Bayar">
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>