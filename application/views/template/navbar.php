<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/gif">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsiveslides.css">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/sb-admin-2.css"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/nonAdmin/mdb.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/mdb-plugins-gathered.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/timeline.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome-free/css/all.css">
</head>
<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico" type="image/x-icon">

<body>
    <div class="siteHeader">
        <!-- <div class="row"> -->
        <!-- <div class="col-sm-1" class="m-auto"> -->
        <!-- <img src="./assets/img/LOGO_KABUPATEN_SEMARANG.png" alt="" class="m-auto" style="width: 90px;"> -->
        <!-- </div> -->
        <!-- <div class="col-sm-11"> -->
        <!--<h2><a href="<?= base_url() ?>">Dinas Kearsipan Dan Perpustakaan</a></h2>-->
        <!--<h5>Kabupaten Semarang</h5>-->
        <!-- </div> -->
        <!-- </div> -->
        <img src="<?= base_url() ?>assets/img/kop.png" alt="" class="mx-auto d-block pl-3 pr-3" style="width: 100%;max-width:1385px;">
        <br>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">Profil</a>
                    <ul class="dropdown-menu p-0">
                        <li><a href="<?= base_url('profil/sejarah') ?>">Sejarah</a></li>
                        <li><a href="<?= base_url('profil/visiMisi') ?>">Visi Misi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('arsip') ?>">Arsip</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">buku</a>
                    <ul class="dropdown-menu p-0">
                        <li><a href="<?= base_url('koleksiBuku') ?>">Koleksi Buku</a></li>
                        <li><a href="<?= base_url('bukuPopuler') ?>">Buku Populer</a></li>
                        <li><a href="<?= base_url('permintaanBuku') ?>">Permintaan Buku</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('berita') ?>">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">Kegiatan</a>
                    <ul class="dropdown-menu p-0">
                        <?php foreach ($listKegiatan as $listKegiatan) : ?>
                            <li><a href="<?= base_url() . 'kegiatan/' . $listKegiatan['id'] ?>"><?= $listKegiatan['nama'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">Panduan</a>
                    <ul class="dropdown-menu p-0">
                        <li><a href="<?= base_url('menjadiAnggota') ?>">Menjadi Anggota Perpustakaan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kotakSaran') ?>">Saran</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="imageMasuk" href="<?= base_url('admin/masuk') ?>" style="text-decoration: none;">
                        <img src="<?= base_url() ?>assets/img/masuk1.png">&nbsp; Masuk Staf
                    </a>
                </li>
            </ul>
        </div>
    </nav>