<div class="listBuku">
    <div class="row mt-5">
        <div class="col-xl-8 col-lg-8 col-md-12">
            <div class="row">
                <?php foreach ($arsip as $arsip) {
                    echo '<div class="col-md-12 mb-4">';
                    echo '<div class="card  mb-3 text-center hoverable">';
                    echo '<div class="card-body">';
                    echo '<div class="row">';
                    echo '<div class="col-md-5 mx-3 my-3">';
                    echo '<div class="view overlay rgba-white-slight">';
                    echo '<img src="' . base_url() . 'assets/img/arsip/' . $arsip['gambar'] . '"class="img-fluid rounded-bottom">';
                    echo '<a><div class="mask"></div></a>';
                    echo '</div></div>';
                    echo '<div class="col-md-6 text-left ml-xl-3 ml-lg-0 ml-md-3 mt-3">';
                    echo '<h4 class="mb-4">';
                    echo '<strong>' . $arsip['judul'] . '</strong>';
                    echo '</h4>';
                    $isiArsipTemp = explode(' ', strip_tags($arsip['isi']));
                    $isiArsip = '';
                    if (count($isiArsipTemp) > 10) {
                        for ($i = 0; $i <= 10; $i++) {
                            $isiArsip .= $isiArsipTemp[$i] . ' ';
                        }
                        $isiArsip .=  '...';
                    } else {
                        $isiArsip .= strip_tags($arsip['isi']);
                    }

                    echo '<p class="dark-grey-text">' . $isiArsip . '</p>';
                    echo '<p><strong>' . $arsip['tanggal'] . '</strong></p>';
                    echo '<a href="' . base_url() . 'arsip/detail/' . $arsip['id'] . '" class="btn btn-indigo btn-sm">Baca selengkapnya</a>';
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
                <strong>Arsip Terbaru</strong>
            </h5>
            <hr>
            <div class="magazine-section">
                <?php foreach ($arsipTerbaru as $arsipTerbaru) {
                    echo '<div class="single-news">';
                    echo '<div class="row">';
                    echo '<div class="col-4">';
                    echo '<div class="view overlay rgba-white-slight z-depth-1">';
                    echo '<img src="' . base_url() . 'assets/img/arsip/' . $arsipTerbaru['gambar'] . '"class="img-fluid">';
                    echo '<a><div class="mask waves-light"></div></a>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-8">';
                    echo '<h6 class="mt-0 mb-3">';
                    echo '<a href="' . base_url() . 'arsip/detail/' . $arsipTerbaru['id'] . '"class="text-dark"><strong>' . $arsipTerbaru['judul'] . '</strong></a>';
                    echo '</h6>';
                    // $isiBerita = explode(' ', $arsip['isi']);
                    echo '<div class="post-data">';
                    echo '<p class="font-small grey-text mb-0">';
                    echo '<i class="far fa-clock-o"></i>' . $arsip['tanggal'] . '</p>';
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