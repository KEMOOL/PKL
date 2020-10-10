<div class="listBuku">
    <div class="row mt-5">
        <div class="col-xl-8 col-lg-8 col-md-12">
            <div class="row">
                <?php foreach ($berita as $berita) {
                    echo '<div class="col-md-12 mb-4">';
                    echo '<div class="card  mb-3 text-center hoverable">';
                    echo '<div class="card-body">';
                    echo '<div class="row">';
                    echo '<div class="col-md-5 mx-3 my-3">';
                    echo '<div class="view overlay rgba-white-slight">';
                    echo '<img src="' . base_url() . 'assets/img/berita/' . $berita['gambar'] . '"class="img-fluid rounded-bottom">';
                    echo '<a><div class="mask"></div></a>';
                    echo '</div></div>';
                    echo '<div class="col-md-6 text-left ml-xl-3 ml-lg-0 ml-md-3 mt-3">';
                    echo '<h4 class="mb-4">';
                    echo '<strong>' . $berita['judul'] . '</strong>';
                    echo '</h4>';
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

                    echo '<p class="dark-grey-text">' . $isiBerita . '</p>';
                    echo '<p><strong>' . $berita['tanggal'] . '</strong></p>';
                    echo '<a href="' . base_url() . 'berita/detail/' . $berita['id'] . '" class="btn btn-indigo btn-sm">Baca selengkapnya</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <?= $this->pagination->create_links(); ?>
        </div>
        <!-- Sidebar -->
        <div class="col-xl-4 col-lg-4 col-md-12 mt-0">
            <h5 class="dark-grey-text font-weight-bold">
                <strong>Berita Terbaru</strong>
            </h5>
            <hr>
            <div class="magazine-section">
                <?php foreach ($beritaTerbaru as $beritaTerbaru) {
                    echo '<div class="single-news">';
                    echo '<div class="row">';
                    echo '<div class="col-4">';
                    echo '<div class="view overlay rgba-white-slight z-depth-1">';
                    echo '<img src="' . base_url() . 'assets/img/berita/' . $beritaTerbaru['gambar'] . '"class="img-fluid">';
                    echo '<a><div class="mask waves-light"></div></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-8">';
                    echo '<h6 class="mt-0 mb-3">';
                    echo '<a href="' . base_url() . 'berita/detail/' . $berita['id'] . '"class="text-dark"><strong>' . $beritaTerbaru['judul'] . '</strong></a>';
                    echo '</h6>';
                    // $isiBerita = explode(' ', $berita['isi']);
                    echo '<div class="post-data">';
                    echo '<p class="font-small grey-text mb-0">';
                    echo '<i class="far fa-clock-o"></i>' . $berita['tanggal'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>