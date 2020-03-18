<!-- Main content -->
<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="partner-transaction">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Nama Customer</th>
                                    <th class="text-center">Pick Up</th>
                                    <th class="text-center">Pages</th>
                                    <th class="text-center">Total Amount</th>
                                    <th class="text-center">Transactions</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($transactions as $item) : 
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $item['invoice']; ?></td>
                                    <td><?= $item['full_name']; ?></td>
                                    <td class="text-center"><?= $item['tgl_pengambilan']; ?> <?= $item['jam_pengambilan']; ?></td>
                                    <td class="text-center"><?= $item['jumlah_halaman']; ?></td>
                                    <?php
                                        $hasil_rupiah = "Rp " . number_format($item['jumlah_bayar'],2,',','.');
                                    ?>
                                    <td class="text-center"><?= $hasil_rupiah; ?></td>
                                    <?php if ($item['status_pembayaran'] == 0) : ?>
                                        <td class="text-center text-danger">Waiting for Payment</td>
                                    <?php elseif ($item['status_pembayaran'] == 1) : ?>
                                        <td class="text-center text-warning">Waiting for Verification</td>
                                    <?php else: ?>
                                        <td class="text-center text-success">Payment Accepted</td>
                                    <?php endif; ?>
                                    <td class="text-center"><?= $item['type']; ?></td>
                                    
                                    <?php if ($item['status_pembayaran'] == 0) : ?>
                                        <td class="text-center text-danger">Waiting for Payment</td>
                                    <?php elseif ($item['status_pembayaran'] == 1) : ?>
                                        <td class="text-center text-warning">Waiting for Verification</td>
                                    <?php elseif ($item['status_pembayaran'] == 2 && $item['status_printing'] == 0): ?>
                                        <td class="text-center text-warning">Waiting for Printing</td>
                                    <?php elseif ($item['status_pembayaran'] == 2 && $item['status_printing'] == 1): ?>
                                        <td class="text-center text-success">Printing Done</td>
                                    <?php endif; ?>
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