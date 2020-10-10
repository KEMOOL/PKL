<main>
    <div class="container-fluid">
        <section class="mt-md-4 pt-md-2 mb-5 pb-4" id="ringkasanTotal">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div class="card card-cascade cascading-admin-card">
                        <div class="admin-up">
                            <i class="fas fa-book light-blue lighten-1 mr-3 z-depth-2"></i>
                            <div class="data">
                                <p class="text-uppercase">Koleksi Buku</p>
                                <h4 class="font-weight-bold dark-grey-text" id="totalKoleksiBuku"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div class="card card-cascade cascading-admin-card">
                        <div class="admin-up">
                            <i class="fas fa-users light-blue lighten-1 mr-3 z-depth-2"></i>
                            <div class="data">
                                <p class="text-uppercase">Pengunjung</p>
                                <h4 class="font-weight-bold dark-grey-text" id="totalPengunjung"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-md-0 mb-4">
                    <div class="card card-cascade cascading-admin-card">
                        <div class="admin-up">
                            <i class="fas fa-user-friends light-blue lighten-1 mr-3 z-depth-2"></i>
                            <div class="data">
                                <p class="text-uppercase">Anggota</p>
                                <h4 class="font-weight-bold dark-grey-text" id="totalAnggota"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-0">
                    <div class="card card-cascade cascading-admin-card">
                        <div class="admin-up">
                            <i class="far fa-comments light-blue lighten-1 mr-3 z-depth-2"></i>
                            <div class="data">
                                <p class="text-uppercase">Komentar</p>
                                <h4 class="font-weight-bold dark-grey-text" id="totalKomentar"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="card card-cascade narrower">
                <section>
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 mr-0 pb-2">
                            <div class="view view-cascade gradient-card-header light-blue lighten-1">
                                <h3 class="h3-responsive mb-0 font-weight-500">Pengunjung Perpustakaan</h3>
                            </div>

                            <div class="card-body card-body-cascade pb-0">
                                <div class="row py-3 pl-4">
                                    <div class="col-md-6">
                                        <p class="lead">
                                            <span class="badge info-color p-2">Data range</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-center pl-xl-2 my-md-0 my-3">
                                        <select class="mdb-select colorful-select dropdown-info" id="selectTampilStatistik" onchange="getSelectTampilStatistikPengunjung()">
                                            <option value="0" disabled selected>Pilih Rentang Waktu</option>
                                            <option value="4">Last month</option>
                                            <option value="5">Last year</option>
                                            <option value="6">all</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="grafik2">
                                    <canvas id="pieChart" height="100"></canvas>
                                </div>
                                <br><br>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 mb-4 pb-2">
                            <div class="view view-cascade gradient-card-header blue-gradient" id="grafik1">
                                <canvas id="lineChart" height="200"></canvas>
                                <p>
                                    Total Pengunjung: <strong id="totalPengunjungWaktu"></strong>
                                </p>
                                <p>
                                    Rata-rata Pengunjung: <strong id="rata2PengunjungWaktu"></strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <section class="mb-5">
            <div class="card card-cascade narrower">
                <section>
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 mr-0 pb-2">
                            <div class="view view-cascade gradient-card-header light-blue lighten-1">
                                <h3 class="h3-responsive mb-0 font-weight-500">Anggota Perpustakaan</h3>
                            </div>
                            <div class="card-body card-body-cascade pb-0">
                                <div id="grafik3">
                                    <canvas id="pieChart2" height="100"></canvas>
                                </div>
                                <br><br>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 mb-4 pb-2">
                            <div class="view view-cascade gradient-card-header blue-gradient" id="grafik4">
                                <canvas id="lineChart2" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
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
                    <p>Kegiatan berhasil dihapus</p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>