<main>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= filter_var($kegiatan['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></h1>
        </div>
        <form class="formKegiatan" id="formKegiatan">
            <div class="form-group fotoketerangan">
                <label for="fotoBagian1">Foto Bagian 1</label>
                <div class="card p-3 mb-3">
                    <img id="fotoBagian1" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/kegiatan/<?= filter_var($kegiatan['gambar1'], FILTER_DEFAULT) ?>" class="img-thumbnail">
                </div>
                <div class="file-upload-wrapper mb-4">
                    <label for="image">Foto Baru</label>
                    <input type="file" id="image1" name="image1" class="file-upload" data-max-file-size="2M" />
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="1">Isi Bagian 1</label>
                <textarea name="editor1" class="ckeditor"><?= filter_var($kegiatan['isi1'], FILTER_DEFAULT) ?></textarea>
            </div>
            <div class="form-group fotoketerangan">
                <label for="fotoBagian1">Foto Bagian 2</label>
                <div class="card p-3 mb-3">
                    <img id="fotoBagian1" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/kegiatan/<?= filter_var($kegiatan['gambar2'], FILTER_DEFAULT) ?>" class="img-thumbnail">
                </div>
                <div class="file-upload-wrapper mb-4">
                    <label for="image">Foto Baru</label>
                    <input type="file" id="image2" name="image2" class="file-upload" data-max-file-size="2M" />
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="isiBagian2">Isi Bagian 2</label>
                <textarea name="editor2" class="ckeditor"><?= filter_var($kegiatan['isi2'], FILTER_DEFAULT) ?></textarea>
            </div>
            <?php if ($this->session->userdata('level') == 'admin') { ?>
                <div class="row">
                    <div class="col-auto mr-auto">
                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" id="simpanKegiatan" onclick="simpanKegiatanLama(<?= filter_var($kegiatan['id'], FILTER_DEFAULT) ?>)">Perbarui</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" id="hapusKegiatan" onclick="hapusKegiatanId(<?= filter_var($kegiatan['id'], FILTER_DEFAULT) ?>)">Hapus</button>
                    </div>
                </div>
            <?php } ?>
        </form>
        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-danger" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="heading lead">Hapus Kegiatan</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fas fa-times fa-4x mb-3 animated rotateIn"></i>
                            <p>Apakah anda yakin akan menghapus kegiatan "<?= filter_var($kegiatan['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a type="button" class="btn btn-danger" id="konfirmasiHapusKegiatan">Hapus</i></a>
                        <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Berhasil</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                    <p>Kegiatan berhasil diperbarui</p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>