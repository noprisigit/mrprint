<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <input type="checkbox" name="status_shop" id="status_shop" value="<?= $status_toko['id_partners']; ?>" <?php if($status_toko['status_shop'] == 1) echo 'checked' ?> data-toggle="toggle" data-on="Open" data-off="Close">        
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
                                        <!-- <?php foreach($print_shop as $item) : ?>
                                        <tr>
                                            <td class="text-center"><?= $item['id_user']; ?></td>
                                            <td><?= $item['full_name']; ?></td>
                                            <td><?= $item['shop_name']; ?></td>
                                            <td></td>
                                            <td class="text-center"><?= $item['date_created'] ?></td>
                                            <?php if($item['status_account'] == 0) : ?>
                                                <td class="text-center text-danger">Not Active</td>
                                            <?php else : ?>
                                                <td class="text-center text-success">Active</td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <span data-toggle="modal" data-target="#modal-detail">
                                                        <button type="button" class="btn btn-info btn-detail-user" data-toggle="tooltip" data-placement="top" title="Detail" data-nama="<?= $item['full_name']; ?>" data-username="<?= $item['username']; ?>" data-email="<?= $item['email']; ?>" data-akses="<?= $item['status_access']; ?>" data-akun="<?= $item['status_account']; ?>" data-provinsi="<?= $item['nama_provinsi']; ?>" data-kabupaten="<?= $item['nama_kabupaten']; ?>" data-address="<?= $item['address']; ?>" data-link="<?= $item['link_g_map']; ?>" data-telphone="<?= $item['telphone']; ?>"><i class="fas fa-info-circle"></i></button>
                                                    </span>
                                                    <a href="<?= base_url('owner/edit-print-shop/') . $item['id_partners']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></a>
                                                    <?php if($item['status_account'] == 0) : ?>
                                                        <a href="<?= base_url('owner/unblock-user/'). $item['id_user']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Unblock"><i class="fas fa-check-circle"></i></a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('owner/block-user/'). $item['id_user']; ?>" onclick="return confirm('Anda yakin ingin memblokir akun ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Block"><i class="fas fa-ban"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?> -->
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
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php foreach($print_shop as $item) : ?>
                                        <tr>
                                            <td class="text-center"><?= $item['id_user']; ?></td>
                                            <td><?= $item['full_name']; ?></td>
                                            <td><?= $item['shop_name']; ?></td>
                                            <td></td>
                                            <td class="text-center"><?= $item['date_created'] ?></td>
                                            <?php if($item['status_account'] == 0) : ?>
                                                <td class="text-center text-danger">Not Active</td>
                                            <?php else : ?>
                                                <td class="text-center text-success">Active</td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <span data-toggle="modal" data-target="#modal-detail">
                                                        <button type="button" class="btn btn-info btn-detail-user" data-toggle="tooltip" data-placement="top" title="Detail" data-nama="<?= $item['full_name']; ?>" data-username="<?= $item['username']; ?>" data-email="<?= $item['email']; ?>" data-akses="<?= $item['status_access']; ?>" data-akun="<?= $item['status_account']; ?>" data-provinsi="<?= $item['nama_provinsi']; ?>" data-kabupaten="<?= $item['nama_kabupaten']; ?>" data-address="<?= $item['address']; ?>" data-link="<?= $item['link_g_map']; ?>" data-telphone="<?= $item['telphone']; ?>"><i class="fas fa-info-circle"></i></button>
                                                    </span>
                                                    <a href="<?= base_url('owner/edit-print-shop/') . $item['id_partners']; ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-pen-square"></i></a>
                                                    <?php if($item['status_account'] == 0) : ?>
                                                        <a href="<?= base_url('owner/unblock-user/'). $item['id_user']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Unblock"><i class="fas fa-check-circle"></i></a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('owner/block-user/'). $item['id_user']; ?>" onclick="return confirm('Anda yakin ingin memblokir akun ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Block"><i class="fas fa-ban"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?> -->
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