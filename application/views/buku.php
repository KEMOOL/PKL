<div class="containerIsiBuku">
	<div class="p-5">
		<div class="containerBuku">
			<div class="row">
				<div class="col-sm-6">
					<?php
					$filename = './assets/img/cover/' . $buku['ID'] . '.jpg';
					if (get_file_info($filename)) { ?>
						<img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/cover/<?= filter_var($buku['ID'], FILTER_DEFAULT) ?>.jpg" class="coverBuku p-5">
					<?php } else { ?>
						<img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/cover/tdkada.gif" class="coverBuku p-5">
					<?php } ?>
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
					<h2 class="textJudul"><?= filter_var($judul[0], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></h2>
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<p class="labelDetailBuku">ISBN</p>
							<p class="detailBuku"><?= filter_var($isbn, FILTER_DEFAULT) ?></p>
						</div>
						<div class="col-sm-6">
							<p class="labelDetailBuku">Pengarang</p>
							<p class="detailBuku"><?= filter_var($buku['Author'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></p>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<p class="labelDetailBuku">Tahun Terbit</p>
							<p class="detailBuku"><?= filter_var($buku['PublishYear'], FILTER_DEFAULT) ?></p>
						</div>
						<div class="col-sm-6">
							<p class="labelDetailBuku">Penerbit</p>
							<p class="detailBuku"><?= filter_var($buku['Publisher'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="containerSinopsis">
				<p class="labelDetailBuku">Sinopsis</p>
				<p class="detailBuku p-3">Maaf untuk saat ini sinopsis buku ini tidak tersedia.</p>
				<p class="detailBuku p-3">Sinopsis dibawah ini merupakan contoh sinopsis berformat .txt</p>

				<p class="detailBuku p-3">
					<?php
					$myfile = fopen(filter_var(base_url(), FILTER_DEFAULT) . "assets/sinopsis/contoh.txt", "r") or die("Unable to open file!");
					while (!feof($myfile)) { ?>
						<?= filter_var(fgets($myfile), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?><br>
					<?php  }
					fclose($myfile);
					?>
				</p>
			</div>
			<div class="containerEbook">
				<p class="labelebook">Baca Dalam PDF</p>
				<div class="ebook">
					<p class="">Maaf untuk saat ini ebook tidak tersedia.</p>
					<p class="">E-book dibawah ini merupakan contoh e-book berformat .pdf</p>
					<embed src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/e-book/contoh.pdf#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />

				</div>
			</div>
		</div>
	</div>
</div>
</div>
