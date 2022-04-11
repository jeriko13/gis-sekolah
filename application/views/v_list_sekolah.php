<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"> List Sekolah</div>
            <div class="panel-body"></div>

            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Nama Sekolah </th>
                        <th> Alamat </th>
                        <th> Status Sekolah </th>
                        <th> Kepala Sekolah </th>
                        <th> Keterangan </th>

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

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>