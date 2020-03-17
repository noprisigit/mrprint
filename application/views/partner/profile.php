<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col">
                <div class="card card-orange card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs navbar-orange navbar-dark" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">PROFILE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">PRINT SHOP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">CHANGE PASSWORD</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Username</label>
                                                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Print Shop</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Telphone</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Provinsi</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kabupaten</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Link G-Map</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                        <div class="form-group">
                                            <label for="customFile">Select Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="<?= base_url('assets/dist/img/print-shop/default.jpg'); ?>" class="img-fluid" alt="Print Shop Image">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                <form action="<?= base_url('partner/change-password'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">CHANGE PASSWORD</button>
                                        </div>
                                    </div>
                                </form>
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