<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>favicon.ico" type="image/gif">
    <title><?= filter_var($title, FILTER_DEFAULT) ?></title>
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/responsiveslides.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/nonAdmin/mdb.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/mdb-plugins-gathered.min.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/timeline.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/fontawesome-free/css/all.css">
</head>
<link rel="shortcut icon" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/img/favicon.ico" type="image/x-icon">

<body>
    <div class="siteHeader">
        <img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/kop.png" alt="" class="mx-auto d-block pl-3 pr-3" style="width: 100%;max-width:1385px;">
        <br>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">Profil</a>
                    <ul class="dropdown-menu p-0">
                        <li><a href="<?= filter_var(base_url('profil/sejarah'), FILTER_DEFAULT) ?>">Sejarah</a></li>
                        <li><a href="<?= filter_var(base_url('profil/visiMisi'), FILTER_DEFAULT) ?>">Visi Misi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= filter_var(base_url('arsip'), FILTER_DEFAULT) ?>">Arsip</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">buku</a>
                    <ul class="dropdown-menu p-0">
                        <li><a href="<?= filter_var(base_url('koleksiBuku'), FILTER_DEFAULT) ?>">Koleksi Buku</a></li>
                        <li><a href="<?= filter_var(base_url('bukuPopuler'), FILTER_DEFAULT) ?>">Buku Populer</a></li>
                        <li><a href="<?= filter_var(base_url('permintaanBuku'), FILTER_DEFAULT) ?>">Permintaan Buku</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= filter_var(base_url('berita'), FILTER_DEFAULT) ?>">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">Kegiatan</a>
                    <ul class="dropdown-menu p-0">
                        <?php foreach ($listKegiatan as $listKegiatan) : ?>
                            <li><a href="<?= filter_var(base_url() . 'kegiatan/' . $listKegiatan['id'], FILTER_DEFAULT) ?>"><?= filter_var($listKegiatan['nama'], FILTER_DEFAULT) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " data-toggle="dropdown" href="#">Panduan</a>
                    <ul class="dropdown-menu p-0">
                        <li><a href="<?= filter_var(base_url('menjadiAnggota'), FILTER_DEFAULT) ?>">Menjadi Anggota Perpustakaan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= filter_var(base_url('kotakSaran'), FILTER_DEFAULT) ?>">Saran</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="imageMasuk" href="<?= filter_var(base_url('admin/masuk'), FILTER_DEFAULT) ?>" style="text-decoration: none;">
                        <img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/masuk1.png">&nbsp; Masuk Staf
                    </a>
                </li>
            </ul>
        </div>
    </nav>