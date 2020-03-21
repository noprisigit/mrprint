<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a href="<?= base_url('owner/add-print-shop'); ?>" class="btn btn-primary mb-3">Registration Print Shop</a>
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Owner</th>
                                    <th class="text-center">Name Shop</th>
                                    <th class="text-center">Rate Average</th>
                                    <th class="text-center">Renewal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1; 
                                    foreach($print_shop as $item) : 
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $item['full_name']; ?></td>
                                    <td><?= $item['shop_name']; ?></td>
                                    <td></td>
                                    <?php $date = date_create($item['date_created']); ?>
                                    <td class="text-center"><?= date_format($date, 'd-m-Y H:i:s'); ?></td>
                                    <?php if($item['status_account'] == 0) : ?>
                                        <td class="text-center text-danger">Not Active</td>
                                    <?php else : ?>
                                        <td class="text-center text-success">Active</td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <span data-toggle="modal" data-target="#modal-detail">
                                                <button type="button" class="btn btn-info btn-detail-user" data-toggle="tooltip" data-placement="top" title="Detail" data-nama="<?= $item['full_name']; ?>" data-print_shop="<?= $item['shop_name']; ?>" data-username="<?= $item['username']; ?>" data-email="<?= $item['email']; ?>" data-akses="<?= $item['status_access']; ?>" data-akun="<?= $item['status_account']; ?>" data-provinsi="<?= $item['nama_provinsi']; ?>" data-kabupaten="<?= $item['nama_kabupaten']; ?>" data-address="<?= $item['address']; ?>" data-link="<?= $item['link_g_map']; ?>" data-telphone="<?= $item['telphone']; ?>"><i class="fas fa-info-circle"></i></button>
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

<div class="modal fade" id="modal-detail" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Print Shop</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <td>Nama Pemilik</td>
                                <td class="detail-nama"></td>
                            </tr>
                            <tr>
                                <td>Nama Print Shop</td>
                                <td class="detail-shop"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="detail-email"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td class="detail-username"></td>
                            </tr>
                            <tr>
                                <td>Status Akses</td>
                                <td class="detail-akses"></td>
                            </tr>
                            <tr>
                                <td>Status Akun</td>
                                <td class="detail-akun"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <td>Provinsi</td>
                                <td class="detail-provinsi"></td>
                            </tr>
                            <tr>
                                <td>Kabupaten</td>
                                <td class="detail-kabupaten"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td class="detail-address"></td>
                            </tr>
                            <tr>
                                <td>Link G-Map</td>
                                <td class="detail-link"></td>
                            </tr>
                            <tr>
                                <td>Telphone</td>
                                <td class="detail-telphone"></td>
                            </tr>
                            <!-- <tr>
                                <td>Status Akun</td>
                                <td class="detail-akun"></td>
                            </tr> -->
                        </table>
                        <!-- <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" class="form-control detail-provinsi" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten</label>
                            <input type="text" class="form-control detail-kabupaten"readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control detail-address" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Link G-Map</label>
                            <input type="text" class="form-control detail-link" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Telphone</label>
                            <input type="text" class="form-control detail-telphone" readonly>
                        </div> -->
                    </div>
                </div>
                    
               
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>