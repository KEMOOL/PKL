<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/gif">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/styleAdmin.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap-select/dist//css/bootstrap-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome-free/css/all.css">
</head>
<!-- <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico" type="image/x-icon"> -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Berita -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/berita') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Berita</span></a>
            </li>
            <!-- Buku -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Buku</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin/koleksiBuku') ?>">Koleksi Buku</a>
                        <a class="collapse-item" href="<?= base_url('admin/bukuPopuler') ?>">Buku Populer</a>
                        <a class="collapse-item" href="<?= base_url('admin/permintaanBuku') ?>">Permintaan Buku</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Saran -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/kotakSaran') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Kotak Saran</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Kegiatan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Kegiatan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php foreach ($listKegiatan as $listKegiatan) { ?>
                            <a class="collapse-item" href="<?= base_url() . 'admin/kegiatan/' . $listKegiatan['id'] ?>"><?= $listKegiatan['nama'] ?></a>
                        <?php } ?>
                        <a class="collapse-item bg-gradient-warning" href="<?= base_url() . 'admin/tambahKegiatan' ?>">Tambah Kegiatan</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class=" text-center d-none d-md-inline mt-5">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow f-right">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                                <img class="img-profile rounded-circle" src="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kegiatan</h1>
                    </div>
                    <form class="formKegiatan" id="formKegiatan">
                        <div class="form-group fotoketerangan">
                            <label for="fotoBagian1">Foto Bagian 1</label>
                            <div class="card p-3">
                                <img id="fotoBagian1" src="<?= base_url() ?>assets/img/kegiatan/<?= $kegiatan['gambar1'] ?>" class="img-thumbnail">
                            </div>
                            <label for="fotoBagian1">Foto Baru</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image1" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="1">Isi Bagian 1</label>
                            <textarea name="editor1" class="ckeditor">
                                <?= $kegiatan['isi1'] ?>
                            </textarea>
                        </div>
                        <div class="form-group fotoketerangan">
                            <label for="fotoBagian1">Foto Bagian 2</label>
                            <div class="card p-3">
                                <img id="fotoBagian1" src="<?= base_url() ?>assets/img/kegiatan/<?= $kegiatan['gambar2'] ?>" class="img-thumbnail">
                            </div>
                            <label for="fotoBagian1">Foto Baru</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image2" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="isiBagian2">Isi Bagian 2</label>
                            <textarea name="editor2" class="ckeditor"><?= $kegiatan['isi2'] ?></textarea>
                        </div>

                        <div class="submit-button">
                            <button type="submit" id="simpanKegiatan" onclick="simpanKegiatan(<?= $kegiatan['id'] ?>)">Kirim</button>
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2020</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <div id="chart"></div>
    <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.js"></script>
    <script src="<?= base_url(); ?>assets/js/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?= base_url(); ?>assets/js/admin.js"></script>
    <script src="<?= base_url(); ?>assets/js/1e8c01e17b.js"></script>
    <!-- <script src="https://kit.fontawesome.com/1e8c01e17b.js" crossorigin="anonymous"></script> -->
</body>

</html>