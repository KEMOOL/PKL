<div class="listBuku">
    <div class="row mt-5">
        <div class="col-xl-8 col-lg-8 col-md-12">
            <div class="row">
                <?php foreach ($berita as $berita) : ?>
                    <div class="col-md-12 mb-4">
                        <div class="card  mb-3 text-center hoverable">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 mx-3 my-3">
                                        <div class="view overlay rgba-white-slight">
                                            <img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/berita/<?= filter_var($berita['gambar'], FILTER_DEFAULT) ?>" class="img-fluid rounded-bottom">
                                            <a>
                                                <div class="mask"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-left ml-xl-3 ml-lg-0 ml-md-3 mt-3">
                                        <h4 class="mb-4">
                                            <strong><?= filter_var($berita['judul'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></strong>
                                        </h4>
                                        <?php
                                        $isiBeritaTemp = explode(' ', strip_tags($berita['isi']));
                                        $isiBerita = '';
                                        if (count($isiBeritaTemp) > 10) {
                                            for ($i = 0; $i <= 10; $i++) {
                                                $isiBerita .= $isiBeritaTemp[$i] . ' ';
                                            }
                                            $isiBerita .=  '...';
                                        } else {
                                            $isiBerita .= strip_tags($berita['isi']);
                                        }
                                        ?>
                                        <p class="dark-grey-text">
                                            <?= filter_var($isiBerita, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
                                        </p>
                                        <p><strong><?= filter_var($berita['tanggal'], FILTER_DEFAULT) ?></strong></p>
                                        <a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>berita/detail/<?= filter_var($berita['id'], FILTER_DEFAULT) ?>" class="btn btn-indigo btn-sm">Baca selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                ?>
            </div>
            <?= filter_var($this->pagination->create_links(), FILTER_DEFAULT) ?>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 mt-0">
            <h5 class="dark-grey-text font-weight-bold">
                <strong>Berita Terbaru</strong>
            </h5>
            <hr>
            <div class="magazine-section">
                <?php foreach ($beritaTerbaru as $beritaTerbaru) : ?>
                    <div class="single-news">
                        <div class="row">
                            <div class="col-4">
                                <div class="view overlay rgba-white-slight z-depth-1">
                                    <img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/berita/<?= filter_var($beritaTerbaru['gambar'], FILTER_DEFAULT) ?> " class="img-fluid">
                                    <a>
                                        <div class="mask waves-light"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-8">
                                <h6 class="mt-0 mb-3">
                                    <a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>berita/detail/<?= filter_var($berita['id'], FILTER_DEFAULT) ?> " class="text-dark">
                                        <strong><?= filter_var($beritaTerbaru['judul'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></strong>
                                    </a>
                                </h6>
                                <div class="post-data">
                                    <p class="font-small grey-text mb-0">
                                        <i class="far fa-clock-o"></i><?= filter_var($berita['tanggal'], FILTER_DEFAULT) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>