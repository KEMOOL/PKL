<div class="fixed-sn">
    <main class="pt-3 wow fadeIn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-md-12">

                    <div class="row mt-2 mb-5 pb-3 mx-2">
                        <div class="card card-body mb-5">

                            <div class="post-data">
                                <p class="font-small grey-text">
                                    <i class="far fa-clock-o"></i><?= $arsip['tanggal'] ?></p>
                            </div>
                            <h2 class="font-weight-bold">
                                <strong><?= $arsip['judul'] ?></strong>
                            </h2>
                            <hr class="red title-hr">
                            <img src="<?= base_url() . 'assets/img/arsip/' . $arsip['gambar'] ?>" class="img-fluid z-depth-1 rounded">
                            <div class="row mx-md-4 px-4 mt-3">
                                <div class="dark-grey-text article"><?= $arsip['isi'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 widget-column mt-0">
                    <section class="section widget-content">
                        <h4 class="font-weight-bold pt-2">
                            <strong>Arsip Terbaru</strong>
                        </h4>
                        <hr class="red title-hr mb-4">

                        <!--/ Card -->
                        <div class="card card-body pb-0">
                            <div class="magazine-section">
                                <?php
                                foreach ($listArsip as $listArsip) {
                                    echo '<div class="single-news">';
                                    echo '<div class="row">';
                                    echo '<div class="col-4">';
                                    echo '<div class="view overlay">';
                                    echo '<img src="' . base_url() . 'assets/img/arsip/' . $listArsip['gambar'] . '" class="img-fluid z-depth-1 rounded-0"';
                                    echo '<a><div class="mask rgba-white-slight"></div></a>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-8">';
                                    echo '<h6 class="mt-0 mb-3">';
                                    echo '<a href="' . base_url() . 'arsip/detail/' . $listArsip['id'] . '"class="text-dark"><strong>' . $listArsip['judul'] . '</strong></a>';
                                    echo '</h6>';
                                    echo '<div class="post-data">';
                                    echo '<p class="font-small grey-text mb-0">';
                                    echo '<i class="far fa-clock-o"></i>' . $listArsip['tanggal'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</div>