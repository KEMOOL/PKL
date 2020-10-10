<main>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Saran Pengunjung</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <select class="mdb-select colorful-select dropdown-primary mx-0 md-form mt-0 mb-0 md-dropdown" name="bagian" id="bagian" onchange="getDataSaran()" style="max-width:203px">
                            <option value="" disabled selected>Silahkan Pilih Bagian</option>
                            <option value="0">Semua</option>
                            <option value="layanan">Layanan</option>
                            <option value="kebersihan">kebersihan</option>
                            <option value="keamanan">Keamanan</option>
                        </select>
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
                <div class="table-responsive" id="saran">
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
                <a class="btn  btn-outline-danger" id="konfirmasiHapusBukuPopuler" onclick="">Yes</a>
                <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConfirmDeleteTampilkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-warning" role="document">
        <div class="modal-content text-center">
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Apakah Anda yakin?</p>
            </div>
            <div class="modal-body">
                <i class="fas fa-times fa-4x animated rotateIn"></i>
            </div>
            <div class="modal-footer flex-center">
                <a class="btn  btn-outline-warning" id="konfirmasiHapusTampilkanKomentar" onclick="">Yes</a>
                <a type="button" class="btn  btn-warning waves-effect" data-dismiss="modal">No</a>
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
                    <p>Komentar berhasil di tampilkan</p>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>