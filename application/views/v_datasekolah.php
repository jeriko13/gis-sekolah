<div class="col-sm-12">
    <?php
    //Notifikasi pesan data berhasil diedit
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
                <th> Nama Sekolah </th>
                <th> Alamat </th>
                <th> Status Sekolah </th>
                <th> Kepala Sekolah </th>
                <th> Keterangan </th>
                <th> Gambar </th>
                <?php if ($this->session->userdata('username') <> "") { ?>
                    <th> Action </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($sekolah as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $value->nama_sekolah ?></td>
                    <td><?= $value->alamat ?></td>
                    <td><?= $value->status_sekolah ?></td>
                    <td><?= $value->kepala_sekolah ?></td>
                    <td><?= $value->keterangan ?></td>
                    <td><img src="<?= base_url('gambar/' . $value->gambar) ?>" width="120px"></td>
                    <?php if ($this->session->userdata('username') <> "") { ?>
                        <td>
                            <a href="<?= base_url('sekolah/input/' . $value->id_sekolah) ?>" class="btn btn-sm btn-success">Create</a>
                            <a href="<?= base_url('sekolah/edit/' . $value->id_sekolah) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('sekolah/hapus/' . $value->id_sekolah) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Yakin Data Ingin Dihapus?')">Delete</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>