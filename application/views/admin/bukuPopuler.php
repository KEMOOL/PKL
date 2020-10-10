<main>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-white">Buku Populer</h5>
            </div>
            <div class="card-body">
                <?php if ($this->session->userdata('level') == 'admin') { ?>
                    <div class="form-inline md-form mt-0">
                        <label for="isbn">Tambah Buku Populer (ISBN)</label>
                        <input type="text" class="form-control" id="isbn" minlength="13" maxlength=17 style="width: 202px">
                        <button class="btn btn-sm btn-primary ml-2 waves-effect waves-light" id="detailBuku" onclick="getDetailBuku()">tambahkan</button>
                    </div>
                <?php } ?>

                <div class="table-responsive" id="daftarBukuPopuler">
                </div>
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
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modalDetailBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5" id="coverBuku">
                    </div>
                    <div class="col-lg-7 pl-0">
                        <h2 class="h2-responsive product-name" id="judulBuku"></h2>
                        <div class="card-body pl-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-inline md-form mt-0">
                                        <label for="detailIsbn">ISBN</label>
                                        <input type="text" class="form-control" id="detailIsbn" value="temp" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6 pl-0">
                                    <div class="form-inline md-form mt-0">
                                        <label for="detailPengarang">Pengarang</label>
                                        <input type="text" class="form-control" id="detailPengarang" value="temp" disabled style="width: 200px">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline md-form mt-0">
                                        <label for="detailIsbn">Tahun Terbit</label>
                                        <input type="text" class="form-control" id="detailTahunTerbit" value="temp" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6 pl-0">
                                    <div class="form-inline md-form mt-0">
                                        <label for="detailPenerbit">Penerbit</label>
                                        <input type="text" class="form-control" id="detailPenerbit" value="temp" disabled style="width: 200px">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary" id="simpanBukuPopuler" onclick="">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                <a class="btn  btn-outline-danger" id="konfirmasiHapusBukuPopuler" onclick="">Yes</a>
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
<div class="modal fade" id="centralModalWarning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-warning" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Gagal</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-times fa-4x mb-3 animated rotateIn"></i>
                    <p>Buku ini sudah ditambahkan pada hari ini</p>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>