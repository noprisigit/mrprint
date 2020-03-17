<!-- Main content -->
<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Owner</th>
                        <th class="text-center">Name Shop</th>
                        <th class="text-center">Rate Average</th>
                        <th class="text-center">Renewal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($print_shop as $item) : ?>
                    <tr>
                        <td class="text-center"><?= $item['id_user']; ?></td>
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
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
                <div class="card-body">
                  
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control detail-nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control detail-email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control detail-username"readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Status Akses</label>
                        <input type="text" class="form-control detail-akses" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Status Akun</label>
                        <input type="text" class="form-control detail-akun" readonly>
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