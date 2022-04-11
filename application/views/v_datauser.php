<div class="col-sm-12">
    <?php
    //Notifikasi pesan data berhasil disimpan/edit
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th> No </th>
                <th> Nama User </th>
                <th> Username </th>
                <th> Password </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($user as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $value->nama_user ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->password ?></td>

                    <td>
                        <a href="<?= base_url('user/input/' . $value->id_user) ?>" class="btn btn-sm btn-success">Create</a>
                        <a href="<?= base_url('user/edit/' . $value->id_user) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('user/hapus/' . $value->id_user) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Yakin Data Ingin Dihapus?')">Delete</a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


</div>