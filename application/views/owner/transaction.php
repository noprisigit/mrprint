<!-- Main content -->
<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Nama Customer</th>
                                    <!-- <th class="text-center">Nama Print Shop</th> -->
                                    <th class="text-center">Status Pembayaran</th>
                                    <th class="text-center">Type</th>
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
                                    <!-- <td><?= $item['shop_name']; ?></td> -->
                                    <?php if($item['status_pembayaran'] == 0) : ?>
                                        <td class="text-danger text-center">Waiting for Payment</td>
                                    <?php elseif($item['status_pembayaran'] == 1) : ?>
                                        <td class="text-danger text-center">Waiting for Verification</td>
                                    <?php else : ?>
                                        <td class="text-success text-center">Payment Accepted</td>
                                    <?php endif; ?>
                                    <td class="text-center"><?= $item['type']; ?></td>
                                    <!-- <?php if($item['status_pembayaran'] == 0) : ?>
                                        <td class="text-danger text-center">Waiting for Payment</td>
                                    <?php elseif($item['status_pembayaran'] == 1) : ?>
                                        <td class="text-danger text-center">Waiting for Verification</td>
                                    <?php elseif($item['status_pembayaran'] == 2 && $item['status_printing'] == 0) : ?>
                                        <td class="text-warning text-center">Waiting for Printing</td>
                                    <?php elseif($item['status_pembayaran'] == 2 && $item['status_printing'] == 1) : ?>
                                        <td class="text-warning text-center">Printing Done</td>
                                    <?php endif; ?> -->
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