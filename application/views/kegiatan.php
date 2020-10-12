<div class="containerHeader">
    <div class="textHeader1"><?= filter_var($kegiatan['nama'], FILTER_DEFAULT) ?></div>
</div>
<div class="containerKegiatan">
    <div class="Kegiatan">
        <div class="containerIsibagian1">
            <div class="p-5">
                <p><img class="gambarBagian1" style="float: right;" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/kegiatan/<?= filter_var($kegiatan['gambar1'], FILTER_DEFAULT) ?>" alt=""><?= filter_var($kegiatan['isi1'], FILTER_DEFAULT) ?></p>
            </div>
        </div>
        <div class="containerIsibagian2 p-4"><?= filter_var($kegiatan['isi2'], FILTER_DEFAULT) ?></div>
        <img class="gambarBagian2" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/kegiatan/<?= filter_var($kegiatan['gambar2'], FILTER_DEFAULT) ?>">
    </div>
</div>