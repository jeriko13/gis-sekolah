<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"> Data Sekolah</div>
            <div class="panel-body"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="200px">Nama Sekolah</th>
                        <th width="50px">:</th>
                        <th><?= $sekolah->nama_sekolah ?></th>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <th><?= $sekolah->alamat ?></th>
                    </tr>
                    <tr>
                        <th>Status Sekolah</th>
                        <th>:</th>
                        <th><?= $sekolah->status_sekolah ?></th>
                    </tr>
                    <tr>
                        <th>Kepala Sekolah</th>
                        <th>:</th>
                        <th><?= $sekolah->kepala_sekolah ?></th>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <th>:</th>
                        <th><?= $sekolah->latitude ?></th>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <th>:</th>
                        <th><?= $sekolah->longitude ?></th>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <th>:</th>
                        <th><?= $sekolah->keterangan ?></th>
                    </tr>

                </thead>
            </table>


        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading"> Lokasi Sekolah</div>
            <div class="panel-body"></div>
            <div id="mapid" di style="height: 500px;"></div>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading"> Gambar Sekolah</div>
            <div class="panel-body"></div>
            <img src="<?= base_url('gambar/' . $sekolah->gambar) ?>" width="100%" height="500px">
        </div>
    </div>
</div>

<script>
    var mymap = L.map('mapid').setView([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>], 20);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {

        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',

    }).addTo(mymap);
    var icon_sekolah = L.icon({
        iconUrl: '<?= base_url('icon/sekolah.png') ?>',
        iconSize: [33, 38], // size of the icon
    });
    L.marker([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>], {
            icon: icon_sekolah
        }).addTo(mymap)
        .bindPopup("<img src='<?= base_url('gambar/' . $sekolah->gambar) ?>'width='100%'>" +
            " <b> Nama Sekolah : <?= $sekolah->nama_sekolah ?></b><br/>" +
            "Alamat            : <?= $sekolah->alamat ?></b><br/>" +
            "Status            : <?= $sekolah->status_sekolah ?></b><br/>" +
            "Keterangan        : <?= $sekolah->keterangan ?></b><br/>").openPopup();;
</script>