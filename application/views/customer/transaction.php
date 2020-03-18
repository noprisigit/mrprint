<!-- Main content -->
<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-wallet"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Dompet Ku :</span>
                                        <?php
                                            $hasil_rupiah = "Rp " . number_format($wallet,2,',','.');
                                        ?>
                                        <span class="info-box-number"><?= $hasil_rupiah; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col-md-4">
                                <form action="<?= base_url('customer/isi-dompet') ?>" method="post">
                                    <div class="form-group">
                                        <label for="">Isi Dompet</label>
                                        <input type="number" name="wallet" id="wallet" placeholder="Jumlah" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block" id="btn-isi-dompet" disabled>Isi Dompet</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Total Amount</th>
                                    <th class="text-center">Transactions</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transactions as $item) : ?>
                                <tr>
                                    <td><?= $item['invoice']; ?></td>
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
                                    <td class="text-center">
                                        <?php if($item['status_pembayaran'] == 2 && $item['type'] == 'printing') : ?>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Bayar dengan dompet"><i class="fas fa-wallet"></i></a>                                                
                                                <button type="button" disabled class="btn btn-info disabled btn-detail-transaction" data-toggle="tooltip" data-placement="top" title="Bayar dengan Transfer" data-id_transaction="<?= $item['id_transaction']; ?>" data-invoice="<?= $item['invoice']; ?>"><i class="far fa-credit-card"></i></button>                                            
                                                <a href="<?= base_url('customer/cancel-transaction/') . $item['invoice'] ?>" onclick="return confirm('Anda yakin ingin membatalkan transaksi ini ?')" class="btn btn-danger disabled" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="fas fa-window-close"></i></a>
                                            </div>
                                        <?php elseif($item['status_pembayaran'] == 2 && $item['type'] == 'top-up') : ?>
                                            <div class="btn-group">
                                                <button type="button" disabled class="btn btn-info disabled btn-detail-transaction" data-toggle="tooltip" data-placement="top" title="Bayar dengan Transfer" data-id_transaction="<?= $item['id_transaction']; ?>" data-invoice="<?= $item['invoice']; ?>"><i class="far fa-credit-card"></i></button>                                            
                                                <a href="<?= base_url('customer/cancel-transaction/') . $item['invoice'] ?>" onclick="return confirm('Anda yakin ingin membatalkan transaksi ini ?')" class="btn btn-danger disabled" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="fas fa-window-close"></i></a>
                                            </div>
                                        <?php else :  ?>
                                            <div class="btn-group">
                                                <?php if($item['type'] == 'printing') : ?>
                                                    <?php if($item['wallet'] != 0) : ?>
                                                        <a href="<?= base_url('owner/edit-print-shop/') . $item['id_partners']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Bayar dengan dompet"><i class="fas fa-wallet"></i></a>
                                                    <?php else : ?>
                                                        <a href="#" class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Bayar dengan dompet"><i class="fas fa-wallet"></i></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <span data-toggle="modal" data-target="#modal-detail">
                                                    <button type="button" class="btn btn-info btn-detail-transaction" data-toggle="tooltip" data-placement="top" title="Bayar dengan Transfer" data-id_transaction="<?= $item['id_transaction']; ?>" data-invoice="<?= $item['invoice']; ?>"><i class="far fa-credit-card"></i></button>
                                                </span>
                                                <a href="<?= base_url('customer/cancel-transaction/') . $item['invoice'] ?>" onclick="return confirm('Anda yakin ingin membatalkan transaksi ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="fas fa-window-close"></i></a>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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

<div class="modal fade" id="modal-detail" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lakukan pembayaran ke nomor rekening berikut : </p>
                <p class="text-bold">BNI : 08023490932</p>
                <p>
                    Apabila sudah melakukan pembayaran dan belum terverifikasi oleh sistem, 
                    anda dapat mengirim bukti pembayaran dibawah dengan menyertakan (Invoice).
                </p>
                <?= form_open_multipart('customer/bayar'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id_transaction">
                        <div class="form-group">
                            <label for="">Select File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="bukti_bayar" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Invoice Number</label>
                            <input type="text" name="invoice_number" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>