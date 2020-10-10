<main>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-white">Permintaan Buku</h5>
            </div>
            <div class="card-body">
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
                <div class="table-responsive" id="permintaanBuku">
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modalDetailBukuPopuler" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" value="temp" readonly>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline md-form mt-0">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" value="temp" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline md-form mt-0">
                                        <label for="pengarang">Pengarang</label>
                                        <input type="text" class="form-control" id="pengarang" value="temp" readonly>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-inline md-form mt-0">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" class="form-control" id="penerbit" value="temp" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="md-form">
                                        <label for="komentar">Komentar buku</label>
                                        <textarea id="komentar" class="md-textarea form-control p-2" rows="3" readonly>aaa</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <p>Apakah anda yakin?</p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-danger" id="konfirmasiHapusBukuPopuler">Hapus</i></a>
                <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Kembali</a>
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
                    <p>Permintaan buku berhasil dihapus</p>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>