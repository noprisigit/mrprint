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
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 0; 
                                    foreach($users as $item) : 
                                ?>
                                    <?php if($item['status_access'] != "owner") : ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td><?= $item['full_name']; ?></td>
                                        <td><?= $item['email']; ?></td>
                                        <?php if($item['status_account'] == 0) : ?>
                                            <td class="text-center text-danger">Not Active</td>
                                        <?php else : ?>
                                            <td class="text-center text-success">Active</td>
                                        <?php endif; ?>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <span data-toggle="modal" data-target="#modal-detail">
                                                    <button type="button" class="btn btn-info btn-detail-user" data-toggle="tooltip" data-placement="top" title="Detail" data-nama="<?= $item['full_name']; ?>" data-username="<?= $item['username']; ?>" data-email="<?= $item['email']; ?>" data-akses="<?= $item['status_access']; ?>" data-akun="<?= $item['status_account']; ?>"><i class="fas fa-info-circle"></i></button>
                                                </span>
                                                <?php if($item['status_account'] == 0) : ?>
                                                    <a href="<?= base_url('owner/unblock-user/'). $item['id_user']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Unblock"><i class="fas fa-check-circle"></i></a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('owner/block-user/'). $item['id_user']; ?>" onclick="return confirm('Anda yakin ingin memblokir akun ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Block"><i class="fas fa-ban"></i></a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('owner/delete-user/') . $item['id_user']; ?>" onclick="return confirm('Anda yakin ingin menghapus ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endif;?>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td class="detail-nama"></td>
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
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>