<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="mb-3">
            <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#modal-provinsi">+ Tambah Provinsi</button>
            <button type="button" class="btn btn-info">+ Tambah Kabupaten</button>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Provinsi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1; 
                                    foreach($provinsi as $item) : 
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $item['nama_provinsi']; ?></td>
                                    <td class="text-center">
                                        <span data-toggle="modal" data-target="#list-kabupaten">
                                            <button type="button" class="btn btn-info btn-detail-provinsi" data-id_provinsi="<?= $item['id_provinsi']; ?>" data-toggle="tooltip" data-placement="top" title="Daftar Kabupaten"><i class="fas fa-info-circle"></i></button>
                                        </span>
                                        <a href="<?= base_url('owner/delete-provinsi/') . $item['id_provinsi']; ?>" onclick="return confirm('Anda yakin ingin menghapus ini?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Provinsi"><i class="fas fa-trash"></i></a>
                                    </td>
                                <?php 
                                    $no++;
                                    endforeach; 
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<div class="modal fade" id="modal-provinsi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Provinsi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('owner/tambah-provinsi'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="nama_provinsi" class="form-control" placeholder="Nama Provinsi" required>
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
<!-- /.modal -->

<div class="modal fade" id="list-kabupaten">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Daftar Kabupaten</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kabupaten</th>
                        </tr>
                    </thead>
                    <tbody id="daftar-kabupaten">
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->