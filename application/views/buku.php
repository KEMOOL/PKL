<div class="containerIsiBuku">
    <div class="p-5">
        <div class="containerBuku">
            <div class="row">
                <div class="col-sm-6">
                    <?php
                    $filename = './assets/img/cover/' . $buku['ID'] . '.jpg';
                    if (file_exists($filename)) {
                        echo '<img src="' . base_url() . 'assets/img/cover/' . $buku['ID'] . '.jpg" class="coverBuku p-5">';
                    } else {
                        echo '<img src="' . base_url() . 'assets/img/cover/tdkada.gif" class="coverBuku p-5">';
                    }
                    ?>
                </div>
                <div class="col-sm-6 p-5">
                    <?php
                    $judul = explode("/", $buku['Title']);
                    $tempIsbn = explode("-", $buku['ISBN']);
                    $tempIsbn = implode("", $tempIsbn);
                    $tempIsbn = str_split($tempIsbn);
                    $isbn = '';
                    for ($i = 0; $i < count($tempIsbn); $i++) {
                        if ($i == 2 || $i == 5 || $i == 9 || $i == 11) {
                            $isbn = $isbn . $tempIsbn[$i] . '-';
                        } else {
                            $isbn = $isbn . $tempIsbn[$i];
                        }
                    }

                    ?>
                    <h2 class="textJudul"><?= $judul[0] ?></h2>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <p class="labelDetailBuku">ISBN</p>
                            <p class="detailBuku"><?= $isbn ?></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="labelDetailBuku">Pengarang</p>
                            <p class="detailBuku"><?= $buku['Author'] ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <p class="labelDetailBuku">Tahun Terbit</p>
                            <p class="detailBuku"><?= $buku['PublishYear'] ?></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="labelDetailBuku">Penerbit</p>
                            <p class="detailBuku"><?= $buku['Publisher'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containerSinopsis">
                <p class="labelDetailBuku">Sinopsis</p>
                <p class="detailBuku p-3">Maaf untuk saat ini sinopsis buku ini tidak tersedia.</p>
                <p class="detailBuku p-3">Sinopsis dibawah ini merupakan contoh sinopsis berformat .txt</p>
                
                <p class="detailBuku p-3"
                <?php
                    $myfile = fopen("http://pkl.ilinkxyz.com/assets/sinopsis/contoh.txt", "r") or die("Unable to open file!");
                    while(!feof($myfile)) {
                      echo fgets($myfile) . "<br>";
                    }
                    fclose($myfile);
                ?>
                </p>
                
            </div>
            <div class="containerEbook">
                <p class="labelebook">Baca Dalam PDF</p>
                <div class="ebook">
                    <p class="">Maaf untuk saat ini ebook tidak tersedia.</p>
                    <p class="">E-book dibawah ini merupakan contoh e-book berformat .pdf</p>
                   
                    <!--<div class="embed-responsive embed-responsive-1by1 p-2">-->
                    <!--    <iframe class="embed-responsive-item" src="<?= base_url() ?>assets/e-book/contoh.pdf"></iframe>-->
                    <!--</div>-->
                    <!--<div class="embed-responsive embed-responsive-1by1 p-2">-->
                    <!--    <iframe class="embed-responsive-item" src="<?= base_url() ?>assets/e-book/contoh.pdf#toolbar=0"></iframe>-->
                    <!--</div>-->
                    <!--<html>-->
                    <!--    <body>-->
                    <!--        <object data="<?= base_url() ?>assets/e-book/contoh.pdf" type="application/pdf">-->
                    <!--            <embed src="<?= base_url() ?>assets/e-book/contoh.pdf" type="application/pdf" />-->
                    <!--        </object>-->
                    <!--    </body>-->
                    <!--</html>-->
                    <!--<a class="media" href="<?= base_url() ?>assets/e-book/contoh.pdf"></a>-->
                    <embed src="<?= base_url() ?>assets/e-book/contoh.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
        
                </div>
            </div>
        </div>
    </div>
</div>
</div>