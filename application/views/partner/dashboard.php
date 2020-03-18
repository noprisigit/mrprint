<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <input type="checkbox" name="status_shop" id="status_shop" value="<?= $status_toko['id_partners']; ?>" <?php if($status_toko['status_shop'] == 1) echo 'checked' ?> data-toggle="toggle" data-on="Open" data-off="Close">        
        <?= $this->session->flashdata('message'); ?>
        <div class="row mt-3">
            <div class="col">
                <div class="card card-orange card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs navbar-orange navbar-dark" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">PRINTING NOW</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">WAIT FOR PAYMENT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">WAIT FOR PICKUP</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Pick Up</th>
                                            <th class="text-center">Pages</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($wait_printing as $item) : ?>
                                        <tr>
                                            <td><?= $item['full_name']; ?></td>
                                            <td class="text-center"><?= $item['tgl_pengambilan']; ?> <?= $item['jam_pengambilan']; ?></td>
                                            <td class="text-center"><?= $item['jumlah_halaman']; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <span data-toggle="modal" data-target="#modal-download">
                                                        <button type="button" class="btn btn-info btn-download-file" data-toggle="tooltip" data-placement="top" title="Download" data-keterangan="<?= $item['komentar']; ?>" data-nama_file="<?= $item['nama_file']; ?>"><i class="fas fa-cloud-download-alt"></i></button>
                                                    </span>
                                                    <a href="<?= base_url('partner/update-status-printing/').$item['invoice']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Printing Selesai"><i class="fas fa-check-circle"></i></a>
                                                    <button type="button" class="btn btn-info"><i class="fas fa-align-right"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Pick Up</th>
                                            <th class="text-center">Pages</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($wait_payment as $item) : ?>
                                        <tr>
                                            <td><?= $item['full_name']; ?></td>
                                            <td class="text-center"><?= $item['tgl_pengambilan']; ?> <?= $item['jam_pengambilan']; ?></td>
                                            <td class="text-center"><?= $item['jumlah_halaman']; ?></td>
                                            <?php if($item['status_pembayaran'] == 0) : ?>
                                                <td class="text-center text-danger">Waiting for Payment</td>
                                            <?php elseif($item['status_pembayaran'] == 1) : ?>
                                                <td class="text-center text-warning">Waiting for Verification</td>
                                            <?php else : ?>
                                                <td class="text-center text-success">Payment Accepted</td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Customer</th>
                                            <th class="text-center">Pick Up</th>
                                            <th class="text-center">Pages</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($wait_pickup as $item) : ?>
                                        <tr>
                                            <td><?= $item['full_name']; ?></td>
                                            <td class="text-center"><?= $item['tgl_pengambilan']; ?> <?= $item['jam_pengambilan']; ?></td>
                                            <td class="text-center"><?= $item['jumlah_halaman']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<div class="modal fade show" id="modal-download" aria-modal="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Download File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Comment :</p>
                <p class="comment"></p>
            </div>
            <div class="modal-footer justify-content-between">
                <a  class="btn btn-primary link-download">Download</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>