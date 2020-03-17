<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('customer/add_transaction_printing') ?>
                            <div class="row">
                                <div class="col">    
                                    <div class="form-group">
                                        <label for="">Select File</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Pengambilan</label>
                                        <input type="date" name="" id="" class="form-control" placeholder="Tanggal Pengambilan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Comment</label>
                                        <input type="date" name="" id="" class="form-control" placeholder="Tanggal Pengambilan">
                                    </div>
                                </div>
                                <div class="col">    
                                    <div class="form-group">
                                        <label for="">Jumlah Halaman</label>
                                        <input type="number" name="" id="" class="form-control" placeholder="Tanggal Pengambilan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Pengambilan</label>
                                        <input type="time" name="" id="" class="form-control" placeholder="Tanggal Pengambilan">
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <button type="submit" class="btn btn-primary btn-block">Print</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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