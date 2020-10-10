<div class="containerHeader">
    <div class="textHeader1"><?= $kegiatan['nama'] ?></div>
</div>
<div class="containerKegiatan">
    <div class="Kegiatan">
        <div class="containerIsibagian1">
            <div class="p-5">
                <p><img class="gambarBagian1" style="float: right;" src="<?= base_url() ?>assets/img/kegiatan/<?= $kegiatan['gambar1'] ?>" alt=""><?= $kegiatan['isi1'] ?></p>
            </div>
        </div>
        <div class="containerIsibagian2 p-4"><?= $kegiatan['isi2'] ?></div>
        <img class="gambarBagian2" src="<?= base_url() ?>assets/img/kegiatan/<?= $kegiatan['gambar2'] ?>">
    </div>
</div>