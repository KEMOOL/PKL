<div class="fixed-sn">
    <main class="pt-3 wow fadeIn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-md-12">

                    <div class="row mt-2 mb-5 pb-3 mx-2">
                        <div class="card card-body mb-5">

                            <div class="post-data">
                                <p class="font-small grey-text">
                                    <i class="far fa-clock-o"></i><?= filter_var($arsip['tanggal'], FILTER_DEFAULT) ?>
                                </p>
                            </div>
                            <h2 class="font-weight-bold">
                                <strong><?= filter_var($arsip['judul'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></strong>
                            </h2>
                            <hr class="red title-hr">
                            <img src="<?= filter_var(base_url(), FILTER_DEFAULT) . 'assets/img/arsip/' . filter_var($arsip['gambar'], FILTER_DEFAULT) ?>" class="img-fluid z-depth-1 rounded">
                            <div class="row mx-md-4 px-4 mt-3">
                                <div class="dark-grey-text article">
                                    <?= filter_var($arsip['isi'], FILTER_DEFAULT) ?>
                                </div>
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

                        <div class="card card-body pb-0">
                            <div class="magazine-section">
                                <?php
                                foreach ($listArsip as $listArsip) : ?>
                                    <div class="single-news">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="view overlay">
                                                    <img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/arsip/<?= filter_var($listArsip['gambar'], FILTER_DEFAULT) ?>" class="img-fluid z-depth-1 rounded-0">
                                                    <a>
                                                        <div class="mask rgba-white-slight">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h6 class="mt-0 mb-3">
                                                    <a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>arsip/detail/<?= filter_var($listArsip['id'], FILTER_DEFAULT) ?>" class="text-dark">
                                                        <strong><?= filter_var($listArsip['judul'], FILTER_DEFAULT) ?></strong>
                                                    </a>
                                                </h6>
                                                <div class="post-data">
                                                    <p class="font-small grey-text mb-0">
                                                        <i class="far fa-clock-o"></i><?= filter_var($listArsip['tanggal'], FILTER_DEFAULT) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</div>