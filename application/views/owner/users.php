<!-- Main content -->
<section class="content">

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $item) : ?>
                    <tr>
                        <td><?= $item['id_user']; ?></td>
                        <td><?= $item['full_name']; ?></td>
                        <td><?= $item['email']; ?></td>
                        <td><?= $item['status_account']; ?></td>
                        <td></td>
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