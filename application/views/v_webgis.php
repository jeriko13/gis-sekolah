<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"> Pemetaan Lokasi Sekolah</div>
            <div class="panel-body"></div>
            <div id="mapid" style="height: 500px;"></div>
        </div>
    </div>
</div>

<script>
    var mymap = L.map('mapid').setView([-7.698506, 109.024137

    ], 14);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {

        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',

    }).addTo(mymap);

    var icon_sekolah = L.icon({
        iconUrl: '<?= base_url('icon/sekolah.png') ?>',
        iconSize: [33, 38], // size of the icon
    });

    <?php foreach ($sekolah as $key => $value) { ?>
        L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
                icon: icon_sekolah
            }).addTo(mymap)
            .bindPopup("<img src='<?= base_url('gambar/' . $value->gambar) ?>'width='100%'>" +
                " <b> Nama Sekolah : <?= $value->nama_sekolah ?></b><br/>" +
                "Alamat     : <?= $value->alamat ?></b><br/>" +
                "Status     : <?= $value->status_sekolah ?></b><br/>" +
                "Keterangan : <?= $value->keterangan ?></b><br/>" +
                "<a href='<?= base_url('webgis/detail/' . $value->id_sekolah) ?>' class='btn btn-sm btn-default'>Detail</a>");
    <?php } ?>
</script>