<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registration Print Shop</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('owner/add-print-shop'); ?>" method="post" role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pemilik</label>
                                        <input type="text" class="form-control" name="owner_name" value="<?= set_value('owner_name'); ?>" placeholder="Enter Owner Name">
                                        <?= form_error('owner_name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?= set_value('username'); ?>" placeholder="Enter Username">
                                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Email">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Print Shop</label>
                                        <input type="text" class="form-control" name="shop_name" value="<?= set_value('shop_name'); ?>" placeholder="Enter Print Shop Name">
                                        <?= form_error('shop_name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Provinsi</label>
                                        <select name="provinsi" class="form-control select2bs4 provinsi" style="width: 100%;">
                                            <option selected disabled>- Provinsi -</option>
                                            <?php foreach($provinsi as $item) : ?>
                                                <option value="<?= $item['id_provinsi'] ?>"><?= $item['nama_provinsi'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kabupaten</label>
                                        <select name="kabupaten" class="form-control select2bs4 kabupaten" style="width: 100%;">
                                            <option selected disabled>- Kabupaten/Kota -</option>
                                        </select>
                                        <?= form_error('kabupaten', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat Print Shop</label>
                                        <input type="text" class="form-control" name="address" value="<?= set_value('address'); ?>" placeholder="Enter Address">
                                        <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Link G-Map Print Shop</label>
                                        <input type="text" class="form-control" name="link_g_map" value="<?= set_value('link_g_map'); ?>" placeholder="Enter Link G-Map">
                                        <?= form_error('link_g_map', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telphone Print Shop</label>
                                        <input type="text" class="form-control" name="telphone" value="<?= set_value('telphone'); ?>" placeholder="Enter Telphone">
                                        <?= form_error('telphone', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <input type="text" class="form-control" name="description" value="<?= set_value('description'); ?>" placeholder="Enter Description">
                                        <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Biaya Per Halaman</label>
                                        <input type="number" class="form-control" name="price" value="<?= set_value('price'); ?>" placeholder="Enter Price">
                                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                            </div>                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Konfirmasi Password</label>
                                                <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                                                <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                                            </div>                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->