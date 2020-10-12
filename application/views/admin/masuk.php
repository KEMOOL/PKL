<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>favicon.ico" type="image/gif">
    <title>Masuk Petugas</title>
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/mdb.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/fontawesome-free/css/all.css">
    <style>
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (min-width: 560px) and (max-width: 740px) {

            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }
    </style>
</head>
<link rel="shortcut icon" href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/favicon.ico" type="image/x-icon">

<body class="login-page">
    <section class="view intro-2">
        <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="gambarHeaderLogin" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/LOGO_KABUPATEN_SEMARANG.png" alt="">
                                    <h1 class="h4 text-gray-900 mb-4 headerLogin">Dinas Kearsipan dan Perpustakaan Kabupaten Semarang</h1>
                                </div>
                                <hr>
                                <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="scroll" direction="left" style="color: white;">Selamat Datang di Aplikasi Dinas Kearsipan dan Perpustakaan Kabupaten Semarang Bagian Admin</marquee>

                                <form class="user formLogin">
                                    <div class="md-form">
                                        <i class="fas fa-user prefix white-text"></i>
                                        <input type="text" id="username" class="form-control">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-lock prefix white-text"></i>
                                        <input type="password" id="password" class="form-control">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="submit-button" class="btn blue-gradient btn-lg">Masuk</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/js/admin.js"></script>
    <script src="https://kit.fontawesome.com/1e8c01e17b.js" crossorigin="anonymous"></script>
</body>

</html>