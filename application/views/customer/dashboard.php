<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">                               
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
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kabupaten</label>
                                    <select name="kabupaten" class="form-control select2bs4 kabupaten" id="search-print-shop" style="width: 100%;">
                                        <option selected disabled>- Kabupaten/Kota -</option>
                                    </select>
                                    <?= form_error('kabupaten', '<small class="text-danger">', '</small>'); ?>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body" id="show-print-shop">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->