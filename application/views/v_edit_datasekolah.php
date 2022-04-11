<div class="col-sm-7">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Lokasi Sekolah
        </div>
        <div class="panel-body">
            <div id="mapid" style="height: 500px;"></div>
        </div>
    </div>
</div>


<div class="col-sm-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Data
        </div>
        <div class="panel-body">
            <?php
            // Notifikasi Gagal Edit gambar
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $error_upload . '</div>';
            }
            //Validasi data tidak boleh kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
            //Notifikasi pesan data berhasil disimpan
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            echo form_open_multipart('sekolah/edit/' . $sekolah->id_sekolah);
            ?>

            <div class="form-group">
                <label>Nama Sekolah</label>
                <input name="nama_sekolah" placeholder="Nama Sekolah" value="<?= $sekolah->nama_sekolah ?>" class=" form-control" />
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" placeholder="Alamat" value="<?= $sekolah->alamat ?>" class=" form-control" />
            </div>

            <div class="form-group">
                <label>Status Sekolah</label>
                <select name="status_sekolah" class=" form-control">
                    <option value="<?= $sekolah->status_sekolah ?>"> <?= $sekolah->status_sekolah ?></option>
                    <option value="Negeri">Negeri</option>
                    <option value="Swasta">Swasta</option>
                </select>
            </div>

            <div class="form-group">
                <label>Kepala Sekolah</label>
                <input name="kepala_sekolah" placeholder="Kepala Sekolah" value="<?= $sekolah->kepala_sekolah ?>" class=" form-control" />
            </div>

            <div class="form-group">
                <label>Latitude</label>
                <input id="Latitude" name="latitude" placeholder="Latitude" value="<?= $sekolah->latitude ?>" class=" form-control" readonly />
            </div>

            <div class="form-group">
                <label>Longitude</label>
                <input id="Longitude" name="longitude" placeholder="Longitude" value="<?= $sekolah->longitude ?>" class=" form-control" readonly />
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" placeholder="Keterangan" value="<?= $sekolah->keterangan ?>" class=" form-control" />
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class=" form-control" />
            </div>
            <img src="<?= base_url('gambar/' . $sekolah->gambar) ?>" width="120px">


            <label></label>
            <button class="btn btn-sm btn-primary">Simpan</button>
            <button class="btn btn-sm btn-danger">Reset</button>

        </div>

        <?php echo form_close(); ?>
    </div>

</div>
</div>








<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>

        ];
    }

    var mymap = L.map('mapid').setView([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>

    ], 14);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    mymap.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });

    $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        mymap.panTo(position);
    });
    mymap.addLayer(marker);
</script>