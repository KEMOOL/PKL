<!-- Main layout -->
<main>
    <div class="container-fluid">
        <div class="card shadow mb-4" id="tambahBeritaForm">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-white">Tambah Berita</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col col-12">
                        <form class="formTambahBerita" id="formTambahBerita">
                            <div class="card mb-4 post-title-panel">
                                <div class="card-body pb-2">
                                    <div class="md-form mt-1 mb-0">
                                        <input type="text" id="judulBerita" class="form-control">
                                        <label class="form-check-label" for="judulBerita" class="">Judul Berita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="file-upload-wrapper mb-4">
                                <label for="image">Pilih Gambar</label>
                                <input type="file" id="image" name="image" class="file-upload" data-max-file-size="2M" />
                            </div>
                            <div class="card mb-4">
                                <textarea name="editor1"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-12 tempatError"></div>
                                <div class="col-auto mr-auto submit-button">
                                    <button type="submit" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" id="simpanBerita">Simpan Berita</button>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-warning btn-sm btn-rounded waves-effect waves-light" id="batalTambahBerita">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-white">Daftar Berita</h5>
            </div>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card-body">
                <?php if ($this->session->userdata('level') == 'admin') { ?>
                    <div class="row">
                        <div class="col-auto mr-auto">
                            <button class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" id="tambahBerita" onclick="tambahBerita()">Tambah Berita</button>
                        </div>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="m-auto" id="loading">
                        <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue-only">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" id="tabelBerita">
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <div class="modal-content text-center">
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Apakah Anda yakin?</p>
            </div>
            <div class="modal-body">
                <i class="fas fa-times fa-4x animated rotateIn"></i>
            </div>
            <div class="modal-footer flex-center">
                <a class="btn  btn-outline-danger" id="konfirmasiHapusBerita" onclick="">Yes</a>
                <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>
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
                    <p class="teksSukses"></p>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>