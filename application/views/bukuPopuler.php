<div class="containerHeader">
	<div class="textHeader1">Buku Populer</div>
</div>
<div class="bukuPopuler">
	<div class="row listBuku" id="listBuku">
		<?php
		foreach ($buku as $buku) :
			$judul = '';
			$judul = explode("/", $buku['Title']);
		?>
			<div class="col-sm">
				<a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>buku/<?= filter_var($buku['ID'], FILTER_DEFAULT) ?>">
					<div class="card cardBuku">
						<div class="card-header">
							<?= filter_var($buku['tanggal'], FILTER_DEFAULT) ?>
							<?php
							$filename = './assets/img/cover/' . $buku['ID'] . '.jpg';
							if (get_file_info($filename)) { ?>
								<img src="<?= filter_var(base_url(), FILTER_DEFAULT) ?>assets/img/cover/<?= filter_var($buku['ID'], FILTER_DEFAULT) ?>.jpg" class="imgKoleksiBuku">
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
	<div class="paginationn">
		<?= filter_var($this->pagination->create_links(), FILTER_DEFAULT) ?>
	</div>
</div>
