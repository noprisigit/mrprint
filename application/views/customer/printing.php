<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('customer/add-transaction-printing', 'name="transaction_printing"') ?>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id_partners" value="<?= $this->uri->segment(3); ?>">    
                                    <div class="form-group">
                                        <label for="">Select File</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Pengambilan</label>
                                        <input type="date" name="tgl_pengambilan" class="form-control" placeholder="Tanggal Pengambilan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Comment</label>
                                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                                    </div>
                                </div>
                                <div class="col">    
                                    <div class="form-group">
                                        <label for="">Jumlah Halaman</label>
                                        <input type="number" name="jmlh_halaman" class="form-control" placeholder="Jumlah Halaman">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Pengambilan</label>
                                        <input type="time" name="jam_pengambilan" class="form-control" placeholder="Jam Pengambilan">
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <button type="submit" class="btn btn-primary btn-block">Print</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Transactions</th>
                                    <th class="text-center">Printing</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transactions as $item) : ?>
                                <tr>
                                    <td><?= $item['invoice']; ?></td>
                                    <td class="text-center"><?= $item['jumlah_bayar']; ?></td>
                                    <?php if ($item['status_pembayaran'] == 0) : ?>
                                        <td class="text-center text-danger">Waiting for Payment</td>
                                    <?php elseif ($item['status_pembayaran'] == 1) : ?>
                                        <td class="text-center text-warning">Waiting for Verification</td>
                                    <?php else: ?>
                                        <td class="text-center text-success">Payment Accepted</td>
                                    <?php endif; ?>
                                
                                    <?php if($item['status_pembayaran'] == 0) : ?>
                                        <td class="text-center text-danger">Waiting for Payment</td>
                                    <?php elseif ($item['status_pembayaran'] == 1) : ?>
                                        <td class="text-center text-warning">Waiting for Verification</td>
                                    <?php elseif ($item['status_pembayaran'] == 2 && $item['status_printing'] == 0) : ?>
                                        <td class="text-center text-warning">Waiting for Printing</td>
                                    <?php elseif ($item['status_pembayaran'] == 2 && $item['status_printing'] == 1) : ?>
                                        <td class="text-center text-success">Printing Done</td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <!-- <span data-toggle="modal" data-target="#modal-detail">
                                                <button type="button" class="btn btn-info btn-detail-user" data-toggle="tooltip" data-placement="top" title="Detail" data-nama="<?= $item['full_name']; ?>" data-username="<?= $item['username']; ?>" data-email="<?= $item['email']; ?>" data-akses="<?= $item['status_access']; ?>" data-akun="<?= $item['status_account']; ?>" data-provinsi="<?= $item['nama_provinsi']; ?>" data-kabupaten="<?= $item['nama_kabupaten']; ?>" data-address="<?= $item['address']; ?>" data-link="<?= $item['link_g_map']; ?>" data-telphone="<?= $item['telphone']; ?>"><i class="fas fa-info-circle"></i></button>
                                            </span> -->
                                            <a href="<?= base_url('owner/edit-print-shop/') . $item['id_partners']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></a>
                                            <a href="<?= base_url('customer/cancel-transaction/') . $item['invoice'] ?>" onclick="return confirm('Anda yakin ingin membatalkan transaksi ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel Printing"><i class="fas fa-window-close"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" >
                    <img src="<?= base_url('assets/dist/img/print_shop/') . $print_shop['image']; ?>" class="card-img-top" alt="Print Shop Image">
                    <div class="card-body p-3 pt-0">
                        <h4 class="text-orange text-bold"><?= $print_shop['shop_name'] ?></h4>
                        <p class="text-uppercase"><?= $print_shop['nama_kabupaten']; ?></p>
                        <p class="mb-0">Telp : <?= $print_shop['telphone']; ?></p>
                        <p class="mb-0">Description : <?= $print_shop['description']; ?></p>
                        <p class="mb-0">Alamat : <?= $print_shop['address']; ?></p>
                        <?php if($print_shop['status_shop'] == 0) : ?>
                        <p class="text-right text-danger text-bold">Close</p>
                        <?php else : ?>
                        <p class="text-right text-success text-bold">Close</p>
                        <?php endif; ?>
                        <a href="<?= $print_shop['link_g_map'] ?>" target="_blank" class="btn btn-app float-right">
                            <i class="fas fa-map-marked-alt"></i> Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->