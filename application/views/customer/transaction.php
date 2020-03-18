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
                                        <div class="btn-group">
                                            <!-- <a href="<?= base_url('owner/edit-print-shop/') . $item['id_partners']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Bayar dengan Transfer"><i class="far fa-credit-card"></i></a> -->
                                            <span data-toggle="modal" data-target="#modal-detail">
                                                <button type="button" class="btn btn-info btn-detail-transaction" data-toggle="tooltip" data-placement="top" title="Bayar dengan Transfer" data-id_transaction="<?= $item['id_transaction']; ?>" data-invoice="<?= $item['invoice']; ?>"><i class="far fa-credit-card"></i></button>
                                            </span>
                                            <a href="<?= base_url('customer/cancel-transaction/') . $item['invoice'] ?>" onclick="return confirm('Anda yakin ingin membatalkan transaksi ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel Printing"><i class="fas fa-window-close"></i></a>
                                        </div>
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
                <?= form_open_multipart('customer/upload-bukti-bayar'); ?>
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