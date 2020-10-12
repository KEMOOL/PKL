<header>
    <div id="slide-out" class="side-nav fixed" style="background-color: gray">
        <ul class="custom-scrollbar">

            <!-- Logo -->
            <li class="logo-sn waves-effect py-4">
                <div class="text-center">
                    <a href="#" class="pl-0"><img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/logo.png" alt="logo KPAD"></a>
                </div>
            </li>

            <li>
                <ul class="collapsible collapsible-accordion" style="color:white">
                    <li>
                        <a href="<?= filter_var(base_url('admin/dashboard'), FILTER_DEFAULT) ?>" class="collapsible-header waves-effect"><i class="w-fa fas fa-tachometer-alt"></i>Dashboards</a>
                    </li>
                    <li>
                        <a href="<?= filter_var(base_url('admin/berita'), FILTER_DEFAULT) ?>" class="collapsible-header waves-effect"><i class="w-fa fas fa-newspaper"></i>Berita</a>
                    </li>
                    <li>
                        <a href="<?= filter_var(base_url('admin/arsip'), FILTER_DEFAULT) ?>" class="collapsible-header waves-effect"><i class="w-fa fas fa-newspaper"></i>Arsip</a>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-book"></i></i>Buku<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="<?= filter_var(base_url('admin/koleksiBuku'), FILTER_DEFAULT) ?>" class="waves-effect">Koleksi Buku</a>
                                </li>
                                <li>
                                    <a href="<?= filter_var(base_url('admin/bukuPopuler'), FILTER_DEFAULT) ?>" class="waves-effect">Buku Populer</a>
                                </li>
                                <li>
                                    <a href="<?= filter_var(base_url('admin/permintaanBuku'), FILTER_DEFAULT) ?>" class="waves-effect">Permintaan Buku</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?= filter_var(base_url('admin/kotakSaran'), FILTER_DEFAULT) ?>" class="collapsible-header waves-effect"><i class="w-fa fas fa-comments"></i></i>Komentar Pengunjung</a>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-snowboarding"></i></i>Kegiatan<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <?php foreach ($listKegiatan as $listKegiatan) { ?>
                                    <li>
                                        <a href="<?= filter_var(base_url(), FILTER_DEFAULT) . 'admin/kegiatan/' . filter_var($listKegiatan['id'], FILTER_DEFAULT) ?>" class="waves-effect"><?= filter_var($listKegiatan['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></a>
                                    </li>
                                <?php }
                                if ($this->session->userdata('level') == 'admin') { ?>

                                    <li>
                                        <a href="<?= filter_var(base_url(), FILTER_DEFAULT) . 'admin/tambahKegiatan' ?>" class="waves-effect warning-color">Tambah Kegiatan</a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>

        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>

    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
        </div>

        <div class="d-flex change-mode">
            <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
                <button class="btn btn-outline-black btn-sm" id="dark-mode">
                    Ubah Mode
                </button>
            </div>

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="clearfix d-none d-sm-inline-block">
                            <?php
                            if (($this->session->userdata('level') == 'admin')) { ?>
                                Admin
                            <?php } else { ?>
                                Tamu
                            <?php } ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" onclick="ubahPassword()">Ganti Password</a>
                        <a class="dropdown-item" href="<?= filter_var(base_url('admin/keluar'), FILTER_DEFAULT) ?>">Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div id="reset-password-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah password</h5>
            </div>
            <div class="modal-body">
                <div class="md-form mt-4 mb-4">
                    <input type="password" id="passwordLama" class="form-control" maxlength='20' value="">
                    <label class="form-check-label" for="nama">Password Lama</label>
                </div>
                <div class="md-form mt-1 mb-4">
                    <input type="password" id="passwordBaru" class="form-control" maxlength='20' value="">
                    <label class="form-check-label" for="nama">Password Baru</label>
                </div>
                <div class="md-form mt-1 mb-4">
                    <input type="password" id="konfirmasiPasswordBaru" class="form-control" maxlength='20' value="">
                    <label class="form-check-label" for="nama">Konfirmasi Password Baru</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save" type="button" class="btn btn-success" onclick="konfirmasiGantiPassword()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="centralModalSuccessPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <p>Password berhasil diperbarui</p>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>