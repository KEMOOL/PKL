<main>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-white">Koleksi Buku</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="koleksiBukuServer">
                    <table class="table table-bordered" id="dataTableServer" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>N0</th>
                                <th>Judul</th>
                                <th width="150">ISBN</th>
                                <th width="250">Pengarang</th>
                                <th width="250">Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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