<!-- slider -->
<style>
	/*jssor slider loading skin double-tail-spin css*/
	.jssorl-004-double-tail-spin img {
		animation-name: jssorl-004-double-tail-spin;
		animation-duration: 1.6s;
		animation-iteration-count: infinite;
		animation-timing-function: linear;
	}

	@keyframes jssorl-004-double-tail-spin {
		from {
			transform: rotate(0deg);
		}

		to {
			transform: rotate(360deg);
		}
	}

	/*jssor slider bullet skin 031 css*/
	.jssorb031 {
		position: absolute;
	}

	.jssorb031 .i {
		position: absolute;
		cursor: pointer;
	}

	.jssorb031 .i .b {
		fill: #000;
		fill-opacity: 0.6;
		stroke: #fff;
		stroke-width: 1600;
		stroke-miterlimit: 10;
		stroke-opacity: 0.8;
	}

	.jssorb031 .i:hover .b {
		fill: #fff;
		fill-opacity: 1;
		stroke: #000;
		stroke-opacity: 1;
	}

	.jssorb031 .iav .b {
		fill: #fff;
		stroke: #000;
		stroke-width: 1600;
		fill-opacity: .6;
	}

	.jssorb031 .i.idn {
		opacity: .3;
	}

	/*jssor slider arrow skin 051 css*/
	.jssora051 {
		display: block;
		position: absolute;
		cursor: pointer;
	}

	.jssora051 .a {
		fill: none;
		stroke: #fff;
		stroke-width: 360;
		stroke-miterlimit: 10;
	}

	.jssora051:hover {
		opacity: .8;
	}

	.jssora051.jssora051dn {
		opacity: .5;
	}

	.jssora051.jssora051ds {
		opacity: .3;
		pointer-events: none;
	}
</style>
<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:300px;overflow:hidden;visibility:hidden;">
	<!-- Loading Screen -->
	<div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
		<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="assets/img/double-tail-spin.svg" />
	</div>
	<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:300px;overflow:hidden;">
		<div>
			<img data-u="image" src="assets/img/perpus2.jpg" />
			<div style="left:24px;top:15px;width:607px;height:40px;position:absolute;color:#000000;font-size:32px;line-height:1.2;text-align:center;">
				<h1 class="h4 text-gray-900 mb-4 headerLogin" style="box-sizing: border-box; margin-top: 0px; line-height: 1.2; font-size: 30px; font-family: poppins-extralight, poppins, sans-serif; text-align: center; background-color: rgba(148, 155, 156, 0.5); margin-bottom: 1.5rem !important; color: rgb(58, 59, 69) !important;">Dinas Kearsipan dan Perpustakaan Kabupaten Semarang</h1>
			</div>
		</div>
		<!--<div>-->
		<!--    <img data-u="image" src="assets/img/carousel2.jpg" />-->
		<!--</div>-->
		<div>
			<img data-u="image" src="assets/img/carousel3.jpg" />
		</div>
		<div>
			<img data-u="image" src="assets/img/carousel4.jpg" />
		</div>
	</div><a data-scale="0" href="" style="display:none;position:absolute;"></a>
	<!-- Bullet Navigator -->
	<div data-u="navigator" class="jssorb031" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
		<div data-u="prototype" class="i" style="width:13px;height:13px;">
			<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
				<circle class="b" cx="8000" cy="8000" r="5800"></circle>
			</svg>
		</div>
	</div>
	<!-- Arrow Navigator -->
	<div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
		<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
			<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
		</svg>
	</div>
	<div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
		<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
			<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
		</svg>
	</div>
</div>
<!-- akhir slider -->
<!-- berita -->
<div class="containerBerita">
	<div class="headerKomentar">
		<h1>Berita</h1>
	</div>
	<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
		<div class="carousel-inner v-2" role="listbox" id="tempatBerita">
		</div>
		<div class="controls-top">
			<a class="btn-floating waves-effect waves-light" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
			<a class="btn-floating waves-effect waves-light" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
		</div>
	</div>
</div>
<!-- akhir berita -->
<!-- Buku Populer -->
<div class="bukuPopuler">
	<div class="containerHeader mb-3">
		<div class="textHeader1">Buku Populer</div>
	</div>
	<div class="row listBuku">
		<?php foreach ($bukuPopuler as $bukuPopuler) :
			$judul = '';
			$judul = explode("/", $bukuPopuler['Title']);
		?>
			<div class="col-sm">
				<a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>buku/<?= filter_var($bukuPopuler['ID'], FILTER_DEFAULT) ?>/<?= filter_var($judul[0], FILTER_DEFAULT) ?>">
					<div class="card cardBuku">
						<div class="card-header">
							<?php
							$filename = './assets/img/cover/' . $bukuPopuler['ID'] . '.jpg';
							if (get_file_info($filename)) { ?>
								<img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/cover/<?= filter_var($bukuPopuler['ID'], FILTER_DEFAULT) ?>.jpg" class="imgKoleksiBuku">
							<?php } else { ?>
								<img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/cover/tdkada.gif" class="imgKoleksiBuku">
							<?php } ?>
						</div>
						<div class="card-body" style="color:black;">
							<?= filter_var($judul[0], FILTER_DEFAULT) ?>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- akhir buku Populer -->
<!-- Kegiatan -->
<div class="containerSliderKegiatan">
	<h1>Kegiatan</h1>
	<style>
		/*jssor slider loading skin double-tail-spin css*/
		.jssorl-004-double-tail-spin img {
			animation-name: jssorl-004-double-tail-spin;
			animation-duration: 1.6s;
			animation-iteration-count: infinite;
			animation-timing-function: linear;
		}

		@keyframes jssorl-004-double-tail-spin {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(360deg);
			}
		}

		/*jssor slider arrow skin 081 css*/
		.jssora081 {
			display: block;
			position: absolute;
			cursor: pointer;
		}

		.jssora081 .c {
			fill: #000;
			fill-opacity: .5;
			stroke: #fff;
			stroke-width: 120;
			stroke-miterlimit: 10;
			stroke-opacity: 0.5;
		}

		.jssora081 .a {
			fill: #fff;
			opacity: .8;
		}

		.jssora081:hover .c {
			fill-opacity: .3;
		}

		.jssora081:hover .a {
			opacity: 1;
		}

		.jssora081.jssora081dn {
			opacity: .5;
		}

		.jssora081.jssora081ds {
			opacity: .3;
			pointer-events: none;
		}
	</style>
	<div class="kegiatan">
		<div id="jssor_2" style="position:relative;margin:0 auto;top:0px;left:0px;width:500px;height:400px;overflow:hidden;visibility:hidden;">
			<!-- Loading Screen -->
			<div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
				<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/double-tail-spin.svg" />
			</div>
			<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:500px;height:400px;overflow:hidden;">
				<?php foreach ($listKegiatan as $listKegiatan) : ?>
					<div>
						<img style="left:50px;top:60px;width:400px;height:300px;position:absolute;max-width:400px;" src="assets/img/kegiatan/<?= filter_var($listKegiatan['gambar1'], FILTER_DEFAULT) ?>" />
						<a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>kegiatan/<?= filter_var($listKegiatan['id'], FILTER_DEFAULT) ?>">
							<!-- ganti tombol lain -->
							<div class="buttonPencarian">
								<button type="button" id="buttonPencarian" style="left:161px;top:368px;width:178px;height:31px;position:absolute;max-width:178px;font-size:12px;">Baca Selengkapnya</button>
							</div>
						</a>
						<div style="left:0px;top:20px;width:500px;height:27px;position:absolute;color:#000000;font-size:16px;font-weight:400;line-height:1.2;text-align:center;"><?= filter_var($listKegiatan['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?></div>
					</div>
				<?php endforeach; ?>
			</div>
			<a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">web design</a>
			<!-- Arrow Navigator -->
			<div data-u="arrowleft" class="jssora081" style="width:30px;height:40px;top:0px;left:0px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
				<svg viewbox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					<path class="c" d="M4800,14080h6400c528,0,960-432,960-960V2880c0-528-432-960-960-960H4800c-528,0-960,432-960,960 v10240C3840,13648,4272,14080,4800,14080z"></path>
					<path class="a" d="M6860.8,8102.7l1693.9,1693.9c28.9,28.9,63.2,43.4,102.7,43.4s73.8-14.5,102.7-43.4l379-379 c28.9-28.9,43.4-63.2,43.4-102.7c0-39.6-14.5-73.8-43.4-102.7L7926.9,8000l1212.2-1212.2c28.9-28.9,43.4-63.2,43.4-102.7 c0-39.6-14.5-73.8-43.4-102.7l-379-379c-28.9-28.9-63.2-43.4-102.7-43.4s-73.8,14.5-102.7,43.4L6860.8,7897.3 c-28.9,28.9-43.4,63.2-43.4,102.7S6831.9,8073.8,6860.8,8102.7L6860.8,8102.7z"></path>
				</svg>
			</div>
			<div data-u="arrowright" class="jssora081" style="width:30px;height:40px;top:0px;right:0px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
				<svg viewbox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
					<path class="c" d="M11200,14080H4800c-528,0-960-432-960-960V2880c0-528,432-960,960-960h6400 c528,0,960,432,960,960v10240C12160,13648,11728,14080,11200,14080z"></path>
					<path class="a" d="M9139.2,8102.7L7445.3,9796.6c-28.9,28.9-63.2,43.4-102.7,43.4c-39.6,0-73.8-14.5-102.7-43.4 l-379-379c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7L8073.1,8000L6860.8,6787.8 c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7l379-379c28.9-28.9,63.2-43.4,102.7-43.4 c39.6,0,73.8,14.5,102.7,43.4l1693.9,1693.9c28.9,28.9,43.4,63.2,43.4,102.7S9168.1,8073.8,9139.2,8102.7L9139.2,8102.7z"></path>
				</svg>
			</div>
		</div>
	</div>
</div>
<!-- akhir kegiatan -->
<!-- Komentar/Saran -->
<div class="containerSaran">
	<div class="headerKomentar">
		<h1>Komentar Pengunjung</h1>
	</div>
	<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
		<div class="carousel-inner" role="listbox" id="tempatKomentar">
			<?php
			$total = count($komentar);
			if (($total % 3) == 1) {
				for ($i = 0; $i < $total - 1; $i++) {
					if (($i % 3) == 0) {
						if ($i == 0) { ?>
							<div class="carousel-item active">
							<?php  } else { ?>
								<div class="carousel-item">
							<?php }
					} ?>
							<div class="col-md-4">
								<div class="card mb-2 cardSaran">
									<img class="card-img-top quote" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/quote.png" alt="">
									<div class="card-body">
										<p class="card-text">
											<?= filter_var($komentar[$i]['isi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
										</p>
									</div>
									<div class="card-footer footerQuote">
										<p>
											<?= filter_var($komentar[$i]['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
										</p>
									</div>
								</div>
							</div>
							<?php
							if (($i % 3) == 2) { ?>
								</div>
								<?php }
						}
					} else if (($total % 3) == 2) {
						for ($i = 0; $i < $total - 2; $i++) {
							if (($i % 3) == 0) {
								if ($i == 0) { ?>
									<div class="carousel-item active">
									<?php } else { ?>
										<div class="carousel-item">
									<?php }
							} ?>
									<div class="col-md-4">
										<div class="card mb-2 cardSaran">
											<img class="card-img-top quote" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/quote.png" alt="">
											<div class="card-body">
												<p class="card-text">
													<?= filter_var($komentar[$i]['isi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
												</p>
											</div>
											<div class="card-footer footerQuote">
												<p>
													<?= filter_var($komentar[$i]['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
												</p>
											</div>
										</div>
									</div>
									<?php
									if (($i % 3) == 2) { ?>
										</div>
										<?php }
								}
							} else {
								foreach ($komentar as $key => $komentar) :
									if (($key % 3) == 0) {
										if ($key == 0) { ?>
											<div class="carousel-item active">
											<?php  } else { ?>
												<div class="carousel-item">
											<?php }
									} ?>
											<div class="col-md-4">
												<div class="card mb-2 cardSaran">
													<img class="card-img-top quote" src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/quote.png" alt="">
													<div class="card-body">
														<p class="card-text">
															<?= filter_var($komentar['isi'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
														</p>
													</div>
													<div class="card-footer footerQuote">
														<p>
															<?= filter_var($komentar['nama'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>
														</p>
													</div>
												</div>
											</div>
											<?php
											if (($key % 3) == 2) { ?>
												</div>
									<?php }
										endforeach;
									}
									?>
											</div>
									</div>
							</div>
							<!-- akhir saran -->
