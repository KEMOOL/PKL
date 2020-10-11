<div class="fixed-sn">
    <main class="pt-3 wow fadeIn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-md-12">

                    <div class="row mt-2 mb-5 pb-3 mx-2">
                        <div class="card card-body mb-5">

                            <div class="post-data">
                                <p class="font-small grey-text">
                                    <i class="far fa-clock-o"></i><?= filter_var($berita['tanggal'], FILTER_DEFAULT) ?></p>
                            </div>
                            <h2 class="font-weight-bold">
                                <strong><?= filter_var($berita['judul'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></strong>
                            </h2>
                            <hr class="red title-hr">
                            <img src="<?= filter_var(base_url(), FILTER_DEFAULT) . 'assets/img/berita/' . filter_var($berita['gambar'], FILTER_DEFAULT) ?>" class="img-fluid z-depth-1 rounded">
                            <div class="row mx-md-4 mt-3">
                                <div class="dark-grey-text article text-justify"><?= filter_var($berita['isi'], FILTER_DEFAULT) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 widget-column mt-0">
                    <section class="section widget-content">
                        <h4 class="font-weight-bold pt-2">
                            <strong>Berita Terbaru</strong>
                        </h4>
                        <hr class="red title-hr mb-4">

                        <div class="card card-body pb-0">
                            <div class="magazine-section">
                                <?php
                                foreach ($listBerita as $listBerita) : ?>
                                    <div class="single-news">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="view overlay">
                                                    <img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/berita/<?= filter_var($listBerita['gambar'], FILTER_DEFAULT) ?>" class="img-fluid z-depth-1 rounded-0">
                                                    <a>
                                                        <div class="mask rgba-white-slight"></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h6 class="mt-0 mb-3">
                                                    <a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>berita/detail/<?= filter_var($listBerita['id'], FILTER_DEFAULT) ?>" class="text-dark">
                                                        <strong><?= filter_var($listBerita['judul'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></strong>
                                                    </a>
                                                </h6>
                                                <div class="post-data">
                                                    <p class="font-small grey-text mb-0">
                                                        <i class="far fa-clock-o"></i><?= filter_var($listBerita['tanggal'], FILTER_DEFAULT) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                                ?>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</div>