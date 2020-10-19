var url = "http://localhost/siyap/admin/";
var url2 = "http://localhost/siyap/";

$("document").ready(function () {
	$("#tambahBeritaForm").hide();
	$("#tambahArsipForm").hide();

	var ringkasanTotal = document.getElementById("ringkasanTotal");
	if (ringkasanTotal) {
		getTotalKoleksiBuku();
		getTotalPengunjung();
		getTotalAnggota();
		getTotalKomentar();
		getSelectTampilStatistikPengunjung();
		getSelectTampilStatistikAnggota();
	}

	var bagian = document.getElementById("bagian");
	if (bagian) {
		getDataSaran();
	}

	var permintaanBuku = document.getElementById("permintaanBuku");
	if (permintaanBuku) {
		getDataPermintaanBuku();
	}

	var berita = document.getElementById("tabelBerita");
	if (berita) {
		getDataBerita();
	}

	var arsip = document.getElementById("tabelArsip");
	if (arsip) {
		getDataArsip();
	}

	var koleksiBuku = document.getElementById("koleksiBuku");
	if (koleksiBuku) {
		getListBukuAll();
	}

	var daftarBukuPopuler = document.getElementById("daftarBukuPopuler");
	if (daftarBukuPopuler) {
		getListBukuPopuler();
	}
});

// DASHBOARD
function getTotalKoleksiBuku() {
	$.ajax({
		url: url + "getTotalKoleksiBuku",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			$("#totalKoleksiBuku").html(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function getTotalPengunjung() {
	$.ajax({
		url: url + "getTotalPengunjung",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			$("#totalPengunjung").html(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function getTotalAnggota() {
	$.ajax({
		url: url + "getTotalAnggota",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			$("#totalAnggota").html(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function getTotalKomentar() {
	$.ajax({
		url: url + "getTotalKomentar",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			$("#totalKomentar").html(data);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function getSelectTampilStatistikPengunjung() {
	var waktu = $("#selectTampilStatistik").val();
	var tempTotal = 0;
	var label = [];
	var pengunjung = [];
	var arrTotal = [];
	var rata2 = 0;
	var totalJenisKelamin = [];

	if (!waktu) {
		$.ajax({
			url: url + "getSelectTampilStatistik/6",
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				var i;
				for (i = 0; i < Object.keys(data["data"]).length; i++) {
					tempTotal = tempTotal + parseInt(data["data"][i]["total"],10);
					arrTotal[i] = tempTotal;
					label[i] = data["data"][i]["tahun"];
					pengunjung[i] = parseInt(data["data"][i]["total"],10);
				}
				$("#totalPengunjungWaktu").html(tempTotal);
				rata2 = Math.floor(tempTotal / Object.keys(data["data"]).length);
				$("#rata2PengunjungWaktu").html(rata2);

				totalJenisKelamin[0] = data["jenisKelaminNull"];
				for (i = 1; i < Object.keys(data["jenisKelamin"]).length; i++) {
					totalJenisKelamin[
						data["jenisKelamin"][i]["JenisKelamin_id"]
					] = parseInt(data["jenisKelamin"][i]["total"],10);
				}

				buatGrafikGarisPengunjung(label, arrTotal, pengunjung);
				buatGrafikPiePengunjung(totalJenisKelamin);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			},
		});
	} else {
		$.ajax({
			url: url + "getSelectTampilStatistik/" + waktu,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				for (var i = 0; i < Object.keys(data["data"]).length; i++) {
					tempTotal = tempTotal + parseInt(data["data"][i]["total"],10);
					arrTotal[i] = tempTotal;
					label[i] = data["data"][i]["tahun"];
					pengunjung[i] = parseInt(data["data"][i]["total"],10);
				}
				$("#totalPengunjungWaktu").html(tempTotal);
				rata2 = Math.floor(tempTotal / Object.keys(data["data"]).length);
				$("#rata2PengunjungWaktu").html(rata2);

				if (data["jenisKelaminNull"] !== 0) {
					totalJenisKelamin[0] = data["jenisKelaminNull"];
				}
				for (var i = 0; i < Object.keys(data["jenisKelamin"]).length; i++) {
					totalJenisKelamin[
						data["jenisKelamin"][i]["JenisKelamin_id"]
					] = parseInt(data["jenisKelamin"][i]["total"],10);
				}

				buatGrafikGarisPengunjung(label, arrTotal, pengunjung);
				buatGrafikPiePengunjung(totalJenisKelamin);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			},
		});
	}
}
function getSelectTampilStatistikAnggota() {
	var tempTotal = 0;
	var label = [];
	var pengunjung = [];
	var arrTotal = [];
	var totalJenisAnggota = [];
	$.ajax({
		url: url + "getSelectTampilStatistikAnggota",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			for (var i = 0; i < Object.keys(data["line"]).length; i++) {
				tempTotal = tempTotal + parseInt(data["line"][i]["total"],10);
				arrTotal[i] = tempTotal;
				label[i] = data["line"][i]["tahun"];
				pengunjung[i] = parseInt(data["line"][i]["total"],10);
			}

			totalJenisAnggota[0] = parseInt(data["pie"]["null"],10);
			for (var i = 0; i < Object.keys(data["pie"]["noNull"]).length; i++) {
				totalJenisAnggota[i + 1] = parseInt(data["pie"]["noNull"][i]["total"],10);
			}
			console.log(totalJenisAnggota);
			var ctxL = document.getElementById("lineChart2").getContext("2d");
			var myLineChart = new Chart(ctxL, {
				type: "line",
				data: {
					labels: label,
					datasets: [
						{
							label: "Total Anggota",
							fillColor: "#fff",
							backgroundColor: "rgba(255, 255, 255, .3)",
							borderColor: "rgba(255, 255, 255)",
							data: arrTotal,
						},
						{
							label: "Anggota",
							fillColor: "#fff",
							backgroundColor: "rgba(255, 255, 0, .3)",
							borderColor: "rgba(255, 255, 255)",
							data: pengunjung,
						},
					],
				},
				options: {
					legend: {
						labels: {
							fontColor: "#fff",
							fontSize: 17,
						},
					},
					scales: {
						xAxes: [
							{
								gridLines: {
									display: true,
									color: "rgba(255,255,255,.25)",
								},
								ticks: {
									fontColor: "#fff",
									fontSize: 17,
								},
							},
						],
						yAxes: [
							{
								display: true,
								gridLines: {
									display: true,
									color: "rgba(255,255,255,.25)",
								},
								ticks: {
									fontColor: "#fff",
									fontSize: 17,
								},
							},
						],
					},
				},
			});

			$("#pieChart2").remove();
			$("#grafik3").append('<canvas id="pieChart2" height="200px"></canvas>');

			var ctxP = document.getElementById("pieChart2").getContext("2d");
			var myPieChart = new Chart(ctxP, {
				type: "pie",
				data: {
					labels: [
						"Dirahasiakan",
						"Umum",
						"Mahasiswa",
						"Pelajar",
						"Istimewa",
						"PNS",
					],
					datasets: [
						{
							data: totalJenisAnggota,
							backgroundColor: [
								"#F7464A",
								"#46BFBD",
								"#FDB45C",
								"#949FB1",
								"#4D5360",
							],
							hoverBackgroundColor: [
								"#FF5A5E",
								"#5AD3D1",
								"#FFC870",
								"#A8B3C5",
								"#616774",
							],
						},
					],
				},
				options: {
					responsive: true,
					legend: {
						labels: {
							fontSize: 16,
						},
					},
				},
			});
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function buatGrafikGarisPengunjung(label, arrTotal, pengunjung) {
	$("#lineChart").remove();
	$("#grafik1").append('<canvas id="lineChart" height="175"></canvas>');

	var ctxL = document.getElementById("lineChart").getContext("2d");
	var myLineChart = new Chart(ctxL, {
		type: "line",
		data: {
			labels: label,
			datasets: [
				{
					label: "Total Pengunjung",
					fillColor: "#fff",
					backgroundColor: "rgba(255, 255, 255, .3)",
					borderColor: "rgba(255, 255, 255)",
					data: arrTotal,
				},
				{
					label: "Pengunjung",
					fillColor: "#fff",
					backgroundColor: "rgba(255, 255, 0, .3)",
					borderColor: "rgba(255, 255, 255)",
					data: pengunjung,
				},
			],
		},
		options: {
			legend: {
				labels: {
					fontColor: "#fff",
					fontSize: 17,
				},
			},
			scales: {
				xAxes: [
					{
						gridLines: {
							display: true,
							color: "rgba(255,255,255,.25)",
						},
						ticks: {
							fontColor: "#fff",
							fontSize: 17,
						},
					},
				],
				yAxes: [
					{
						display: true,
						gridLines: {
							display: true,
							color: "rgba(255,255,255,.25)",
						},
						ticks: {
							fontColor: "#fff",
							fontSize: 17,
						},
					},
				],
			},
		},
	});
}
function buatGrafikPiePengunjung(totalJenisKelamin) {
	$("#pieChart").remove();
	$("#grafik2").append('<canvas id="pieChart" height="200px"></canvas>');

	var ctxP = document.getElementById("pieChart").getContext("2d");
	var myPieChart = new Chart(ctxP, {
		type: "pie",
		data: {
			labels: ["Dirahasiakan", "Laki-laki", "Perempuan"],
			datasets: [
				{
					data: totalJenisKelamin,
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						"#949FB1",
						"#4D5360",
					],
					hoverBackgroundColor: [
						"#FF5A5E",
						"#5AD3D1",
						"#FFC870",
						"#A8B3C5",
						"#616774",
					],
				},
			],
		},
		options: {
			responsive: true,
			legend: {
				labels: {
					fontSize: 17,
				},
			},
		},
	});
}
// AKHIR DASHBOARD

// BERITA
function getDataBerita() {
	var isi = "";
	isi +=
		'<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"><thead bgcolor="#44c2f7"><tr><th>N0</th><th>Judul</th><th>Isi</th><th width= "140">Tanggal</th><th>Aksi</th></tr></thead><tbody>';
	$.ajax({
		url: url + "getLIstBerita",
		type: "GET",
		dataType: "JSON",
		beforeSend: function () {
			$("#dataTable_wrapper").remove();
			$("#loading").show();
		},
		success: function (data) {
			$("#loading").hide();
			if (data["berita"]) {
				for (var i = 0; i < Object.keys(data["berita"]).length; i++) {
					var isiBerita = data["berita"][i]["isi"]
						.replace(/(<([^>]+)>)/gi, "")
						.split(" ")
						.join(", ")
						.split(",");
					var berita = "";
					if (isiBerita.length >= 50) {
						for (j = 0; j < 50; j++) {
							berita += isiBerita[j];
						}
						berita += "...";
					} else {
						for (j = 0; j < isiBerita.length; j++) {
							berita += isiBerita[j];
						}
					}
					isi += "<tr><td></td>";
					isi += "<td>" + data["berita"][i]["judul"] + "</td>";
					isi += "<td>" + berita + "</td>";
					isi += "<td>" + data["berita"][i]["tanggal"] + "</td>";
					isi +=
						"<td><a href='" +
						url2 +
						"/berita/detail/" +
						data["berita"][i]["id"] +
						"' target='_blank'><button type='button'class='btn btn-outline-info btn-rounded btn-sm'>Detail</button></a>";
					if (data["session"] == "admin") {
						isi +=
							"<button type='button' class='btn btn-outline-danger btn-rounded btn-sm' onclick='hapusBerita(" +
							data["berita"][i]["id"] +
							")'>Hapus</button></td>";
					}
					isi += "</tr>";
				}
			}
			isi += "</tbody></thead></table>";
			strukturTabel("tabelBerita", isi);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function tambahBerita() {
	$("#tambahBeritaForm").show();
	CKEDITOR.replace("editor1");
	$("#tambahBerita").hide();
}
$("#batalTambahBerita").on("click", function () {
	$("#tambahBeritaForm").hide();
	$("#judulBerita").val("");
	$("#hapusFile").click();
	CKEDITOR.instances.editor1.setData("");
	$("#tambahBerita").show();
});
$(".formTambahBerita").submit(function (event) {
	event.preventDefault();

	var judul = $("#judulBerita").val();
	var gambar = $("#image").val();
	var isi = CKEDITOR.instances.editor1.getData();
	var data = new FormData(this);
	data.append("judul", judul);
	data.append("isi", isi);
	console.log(data);

	if (judul == "" || isi == "" || gambar == "") {
		if ($(".tempatError").children().hasClass("alert") !== true) {
			$(".tempatError").prepend(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		} else {
			$(".tempatError>.alert").replaceWith(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		}
	} else {
		console.log(data);
		$.ajax({
			url: url + "simpanBerita",
			type: "POST",
			dataType: "JSON",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {},
			success: function (data) {
				$("#tambahBeritaForm").hide();
				$("#judulBerita").val("");
				CKEDITOR.instances.editor1.setData("");
				$(".teksSukses").html("Berita berhasil ditambahkan");
				$("#centralModalSuccess").modal("show");
				$("#tambahBerita").show();
				$("#hapusFile").click();
				getDataBerita();
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			},
		});
	}
});
function hapusBerita(id) {
	$("#modalConfirmDelete").modal("show");
	$("#konfirmasiHapusBerita").attr(
		"onclick",
		"konfirmasiHapusBerita(" + id + ")"
	);
}
function konfirmasiHapusBerita(id) {
	$.ajax({
		url: url + "hapusBerita",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {
			$("#modalConfirmDelete").modal("hide");
		},
		success: function (data) {
			$(".teksSukses").html("Berita berhasil dihapus");
			$("#centralModalSuccess").modal("show");
			getDataBerita();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
		async: false,
	});
}
// AKHIR BERITA

// ARSIP
function getDataArsip() {
	var isi = "";
	isi +=
		'<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0"><thead bgcolor="#44c2f7"><tr><th>N0</th><th>Judul</th><th>Isi</th><th width= "120">Tanggal</th><th width="50px">Aksi</th></tr></thead><tbody>';
	$.ajax({
		url: url + "getLIstArsip",
		type: "GET",
		dataType: "JSON",
		beforeSend: function () {
			$("#dataTable_wrapper").remove();
			$("#loading").show();
		},
		success: function (data) {
			$("#loading").hide();
			if (data["arsip"]) {
				for (var i = 0; i < Object.keys(data["arsip"]).length; i++) {
					var isiArsip = data["arsip"][i]["isi"]
						.replace(/(<([^>]+)>)/gi, "")
						.split(" ")
						.join(", ")
						.split(",");
					var arsip = "";
					if (isiArsip.length >= 50) {
						for (j = 0; j < 50; j++) {
							arsip += isiArsip[j];
						}
						arsip += "...";
					} else {
						for (j = 0; j < isiArsip.length; j++) {
							arsip += isiArsip[j];
						}
					}
					isi += "<tr><td></td>";
					isi += "<td>" + data["arsip"][i]["judul"] + "</td>";
					isi += "<td>" + arsip + "</td>";
					isi += "<td>" + data["arsip"][i]["tanggal"] + "</td>";
					isi +=
						"<td><a href='" +
						url2 +
						"arsip/detail/" +
						data["arsip"][i]["id"] +
						"'target='_blank'><button type='button'class='btn btn-outline-info btn-rounded btn-sm'>Detail</button></a>";
					if (data["session"] == "admin") {
						isi +=
							"<button type='button' class='btn btn-outline-danger btn-rounded btn-sm' onclick='hapusArsip(" +
							data["arsip"][i]["id"] +
							")'>Hapus</button></td>";
					}
					isi += "</tr>";
				}
			}
			isi += "</tbody></thead></table>";
			strukturTabel("tabelArsip", isi);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function tambahArsip() {
	$("#tambahArsipForm").show();
	CKEDITOR.replace("editor1");
	$("#tambahArsip").hide();
}
$("#batalTambahArsip").on("click", function () {
	$("#tambahArsipForm").hide();
	$("#judulArsip").val("");
	$("#hapusFile").click();
	CKEDITOR.instances.editor1.setData("");
	$("#tambahArsip").show();
});
$(".formTambahArsip").submit(function (event) {
	event.preventDefault();

	var judul = $("#judulArsip").val();
	var gambar = $("#image").val();
	var isi = CKEDITOR.instances.editor1.getData();
	var data = new FormData(this);
	data.append("judul", judul);
	data.append("isi", isi);

	if (judul == "" || isi == "" || gambar == "") {
		if ($(".tempatError").children().hasClass("alert") !== true) {
			$(".tempatError").prepend(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		} else {
			$(".tempatError>.alert").replaceWith(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		}
	} else {
		console.log(data);
		$.ajax({
			url: url + "simpanArsip",
			type: "POST",
			dataType: "JSON",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {},
			success: function (data) {
				$("#tambahArsipForm").hide();
				$("#judulArsip").val("");
				CKEDITOR.instances.editor1.setData("");
				$(".teksSukses").html("Arsip berhasil ditambahkan");
				$("#centralModalSuccess").modal("show");
				$("#tambahArsip").show();
				$("#hapusFile").click();
				getDataArsip();
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.responseText);
			},
		});
	}
});
function hapusArsip(id) {
	$("#modalConfirmDelete").modal("show");
	$("#konfirmasiHapusArsip").attr(
		"onclick",
		"konfirmasiHapusArsip(" + id + ")"
	);
}
function konfirmasiHapusArsip(id) {
	$.ajax({
		url: url + "hapusArsip",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {
			$("#modalConfirmDelete").modal("hide");
		},
		success: function (data) {
			$(".teksSukses").html("Arsip berhasil dihapus");
			$("#centralModalSuccess").modal("show");
			getDataArsip();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
		async: false,
	});
}
// AKHIR ARSIP

// KOLEKSI BUKU
function getListBukuAll() {
	var isi = "";
	isi +=
		'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>N0</th><th>Judul</th><th width= "150">ISBN</th><th width= "250">Pengarang</th><th width= "250">Penerbit</th><th>Aksi</th></tr></thead><tbody>';
	$.ajax({
		url: url + "getLIstBukuAll",
		type: "GET",
		dataType: "JSON",
		beforeSend: function () {
			$("#dataTable_wrapper").remove();
			$("#loading").show();
		},
		success: function (data) {
			$("#loading").hide();
			if (data["buku"]) {
				for (var i = 0; i < Object.keys(data["buku"]).length; i++) {
					var isbn = "";
					if (data["buku"][i]["ISBN"]) {
						var tempIsbn = data["buku"][i]["ISBN"];
						tempIsbn = tempIsbn.split("-").join("").split("");
						for (j = 0; j < tempIsbn.length; j++) {
							if (j === 2 || j === 5 || j === 9 || j === 11) {
								isbn += tempIsbn[j] + "-";
							} else {
								isbn += tempIsbn[j];
							}
						}
					} else {
						isbn = data["buku"][i]["ISBN"];
					}
					var judul = data["buku"][i]["Title"].split("/");

					isi += "<tr><td></td>";
					isi += "<td>" + judul[0] + "</td>";
					isi += "<td>" + isbn + "</td>";
					isi += "<td>" + data["buku"][i]["Author"] + "</td>";
					isi += "<td>" + data["buku"][i]["Publisher"] + "</td>";
					isi +=
						"<td><a href='" +
						url2 +
						"buku/" +
						data["buku"][i]["ID"] +
						"'target='_blank'><button class='btn btn-rounded btn-outline-info btn-sm'>detail</button></a>";
					if (data["session"] == "admin") {
						isi +=
							"<button type='button' class='btn btn-outline-success btn-rounded btn-sm' id='tampilkan' onclick='simpanBukuPopulerKoleksi(" +
							data["buku"][i]["ID"] +
							")'>Tampilkan</button></td>";
					}
					isi += "</tr>";
				}
			}
			isi += "</tbody></table>";
			strukturTabel("koleksiBuku", isi);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
// AKHIR KOLEKSI BUKKU

// BUKU POPULER
function getListBukuPopuler() {
	var isi = "";
	isi +=
		'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead bgcolor="#44c2f7"><tr><th>N0</th><th>Judul</th><th width= "140">ISBN</th><th width= "250">Pengarang</th><th width= "250">Penerbit</th><th>Ditambahkan Pada</th><th>Aksi</th></tr></thead><tbody>';
	$.ajax({
		url: url + "getListBukuPopuler",
		type: "GET",
		dataType: "JSON",
		beforeSend: function () {
			$("#dataTable_wrapper").remove();
			$("#loading").show();
		},
		success: function (data) {
			$("#loading").hide();
			if (data["buku"]) {
				for (var i = 0; i < Object.keys(data["buku"]).length; i++) {
					var isbn = "";
					if (data["buku"][i]["ISBN"]) {
						var tempIsbn = data["buku"][i]["ISBN"];
						tempIsbn = tempIsbn.split("-").join("").split("");
						for (j = 0; j < tempIsbn.length; j++) {
							if (j === 2 || j === 5 || j === 9 || j === 11) {
								isbn += tempIsbn[j] + "-";
							} else {
								isbn += tempIsbn[j];
							}
						}
					} else {
						isbn = data["buku"][i]["ISBN"];
					}
					var judul = data["buku"][i]["Title"].split("/");
					var tanggal = data["buku"][i]["tanggal"];
					tanggal = '"' + tanggal + '"';

					isi += "<tr><td></td>";
					isi += "<td>" + judul[0] + "</td>";
					isi += "<td>" + isbn + "</td>";
					isi += "<td>" + data["buku"][i]["Author"] + "</td>";

					var lokasi = data["buku"][i]["PublishLocation"];
					if (lokasi) {
						lokasi = lokasi.split(":");
						lokasi = lokasi[0].split(" ");
						for (var j = 0, x = lokasi.length; j < x; j++) {
							if (lokasi[j] != "") {
								lokasi[j] =
									lokasi[j][0].toUpperCase() + lokasi[j].slice(1).toLowerCase();
							}
						}
						lokasi = lokasi.join(" ");
					} else {
						lokasi = "Tidak Diketahui";
					}

					var penerbit = data["buku"][i]["Publisher"];
					if (penerbit) {
						penerbit = penerbit.split(",");
						penerbit = penerbit[0].split(" ");
						for (var j = 0, x = penerbit.length; j < x; j++) {
							if (penerbit[j] != "PT") {
								penerbit[j] =
									penerbit[j][0].toUpperCase() +
									penerbit[j].slice(1).toLowerCase();
							}
						}
						penerbit = penerbit.join(" ");
					}

					isi += "<td>" + lokasi + " : " + penerbit + "</td>";
					isi += "<td>" + data["buku"][i]["tanggal"] + "</td>";
					isi +=
						"<td><a href='" +
						url2 +
						"buku/" +
						data["buku"][i]["ID"] +
						"'target='_blank'><button class='btn btn-rounded btn-outline-info btn-sm'>detail</button></a>";
					if (data["session"] == "admin") {
						isi +=
							"<button type='button' class='btn btn-rounded btn-outline-danger btn-sm' id='hapus' onclick='hapusBukuPopuler(" +
							data["buku"][i]["ID"] +
							"," +
							tanggal +
							")'>Hapus</button></td>";
					}
					isi += "</tr>";
				}
			}
			isi += "</tbody></table>";
			strukturTabel("daftarBukuPopuler", isi);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function getDetailBuku() {
	if ($("#isbn").val().length < 13) {
		alert("ISBN kurang");
	} else {
		var isbn = "";

		var tempIsbn = $("#isbn").val().split("-").join("").split("");
		var format = /[!@#$^&*()_+\=\[\]{};':"\\|,.<>\/?]+/;
		for (j = 0; j < tempIsbn.length; j++) {
			if (format.test(tempIsbn[j])) {
				alert("format salah");
				return false;
			}
			isbn += tempIsbn[j] + "%";
		}

		$.ajax({
			url: url + "getDetailBuku",
			type: "POST",
			dataType: "JSON",
			data: {
				isbn: isbn,
			},
			success: function (data) {
				if (data) {
					var tempIsbn = data["ISBN"];
					var isbn = "";
					var lokasi = "";
					var penerbit = "";
					var judul = "";
					tempIsbn = tempIsbn.split("-").join("").split("");
					for (j = 0; j < tempIsbn.length; j++) {
						if (j === 2 || j === 5 || j === 9 || j === 11) {
							isbn += tempIsbn[j] + "-";
						} else {
							isbn += tempIsbn[j];
						}
					}
					lokasi = data["PublishLocation"];
					if (lokasi) {
						lokasi = data["PublishLocation"].split(":");
						lokasi = lokasi[0].split(" ");
						for (var i = 0, x = lokasi.length; i < x; i++) {
							if (lokasi[i] != "") {
								lokasi[i] =
									lokasi[i][0].toUpperCase() + lokasi[i].slice(1).toLowerCase();
							}
						}
						lokasi = lokasi.join(" ");
					} else {
						lokasi = "Tidak Diketahui";
					}

					penerbit = data["Publisher"].split(",");
					penerbit = penerbit[0].split(" ");
					for (var i = 0, x = penerbit.length; i < x; i++) {
						if (penerbit[i] != "PT") {
							penerbit[i] =
								penerbit[i][0].toUpperCase() +
								penerbit[i].slice(1).toLowerCase();
						}
					}
					penerbit = penerbit.join(" ");
					judul = data["Title"].split("/");

					$("#judulBuku").html("<strong>" + judul[0] + "</strong>");
					$("#coverBuku").html(
						"<img class='d-block w-100' src='../assets/img/cover/" +
							data["ID"] +
							".jpg' onerror='imgError()'>"
					);
					$("#detailIsbn").val(isbn);
					$("#detailPengarang").val(data["Author"]);
					$("#detailTahunTerbit").val(data["PublishYear"]);
					$("#detailPenerbit").val(lokasi + " : " + penerbit);
					$("#modalDetailBuku").modal("show");

					$("#simpanBukuPopuler").attr(
						"onclick",
						"simpanBukuPopuler(" + data["ID"] + ")"
					);
				} else {
					alert("buku tak ada");
					$("#isbn").val("");
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.responseText);
			},
		});
	}
}
function imgError() {
	$("#coverBuku").html(
		"<img class='d-block w-100' src='../assets/img/cover/tdkada.gif'>"
	);
}
function simpanBukuPopulerKoleksi(id) {
	$.ajax({
		url: url + "simpanBukuPopuler",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {},
		success: function (data) {
			if (data == "sukses") {
				$("#centralModalSuccess").modal("show");
			} else {
				$("#centralModalWarning").modal("show");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText);
		},
	});
}
function simpanBukuPopuler(id) {
	$.ajax({
		url: url + "simpanBukuPopuler",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {
			$("#modalDetailBuku").modal("hide");
		},
		success: function (data) {
			$("#isbn").val("");
			if (data == "sukses") {
				$(".teksSukses").html("Buku berhasil ditambahkan");
				$("#centralModalSuccess").modal("show");
				getListBukuPopuler();
			} else {
				$("#centralModalWarning").modal("show");
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText);
		},
	});
}
function hapusBukuPopuler(id, tanggal) {
	$("#modalConfirmDelete").modal("show");
	$("#konfirmasiHapusBukuPopuler").attr(
		"onclick",
		"konfirmasiHapusBukuPopuler(" + id + ",'" + tanggal + "')"
	);
}
function konfirmasiHapusBukuPopuler(id, tanggal) {
	$.ajax({
		url: url + "hapusBukuPopuler",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
			tanggal: tanggal,
		},
		beforeSend: function () {
			$("#modalConfirmDelete").modal("hide");
		},
		success: function (data) {
			$(".teksSukses").html("Buku populer berhasil dihapus");
			$("#centralModalSuccess").modal("show");
			getListBukuPopuler();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
$("#isbn").on("keydown", function (e) {
	//character, not with ctrl, alt key
	if (e.keyCode >= 65 && e.keyCode <= 90 && !e.ctrlKey && !e.altKey) {
		return false;
	}

	// number with shift
	if (e.keyCode >= 48 && e.keyCode <= 57 && !!e.shiftKey) {
		return false;
	}

	// ` ~ - _ = + \ | [ { ] } ' " ; : / ? , < . >
	var otherKeys = [186, 187, 188, 189, 190, 191, 192, 219, 220, 221, 222];
	if (otherKeys.indexOf(e.keyCode) !== -1) {
		// allow minus sign
		if (e.keyCode === 189 && !e.shiftKey) {
			return true;
		}
		return false;
	}

	// if you want to block "ctrl + v"(paste), comment the below code out
	//if(e.keyCode === 86 && !!e.ctrlKey) {
	//	return false;
	//}

	return true;
});
// AKHIR BUKU POPULER

// PERMINTAAN BUKU
function getDataPermintaanBuku() {
	var isi = "";
	isi +=
		'<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>N0</th><th>Nama</th><th>Pekerjaan</th><th>Judul Buku</th><th>Pengarang</th><th>Tanggal</th><th>Aksi</th></tr></thead><tbody>';
	$.ajax({
		url: url + "getListPermintaanBuku",
		type: "GET",
		dataType: "JSON",
		beforeSend: function () {
			$("#dataTable_wrapper").remove();
			$("#loading").show();
		},
		success: function (data) {
			$("#loading").hide();
			for (var i = 0; i < Object.keys(data["buku"]).length; i++) {
				isi += "<tr><td></td>";
				isi += "<td>" + data["buku"][i]["nama"] + "</td>";
				isi += "<td>" + data["buku"][i]["pekerjaan"] + "</td>";
				isi += "<td>" + data["buku"][i]["judul"] + "</td>";
				isi += "<td>" + data["buku"][i]["pengarang"] + "</td>";
				isi += "<td>" + data["buku"][i]["tanggal"] + "</td>";
				isi +=
					"<td><button class='btn btn-rounded btn-outline-info btn-sm' onclick='getDetailPermintaanBuku(" +
					data["buku"][i]["id"] +
					")'>detail</button>";
				if (data["session"] == "admin") {
					isi +=
						"<button type='button' class='btn btn-rounded btn-outline-danger btn-sm' id='hapus' onclick='hapusPermintaanBuku(" +
						data["buku"][i]["id"] +
						")'>Hapus</button></td>";
				}
			}
			isi += "</tbody></thead></table>";
			strukturTabel("permintaanBuku", isi);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function getDetailPermintaanBuku(id) {
	$.ajax({
		url: url + "getDetailPermintaanBuku",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		success: function (data) {
			var nama = data["nama"];
			var pekerjaan = data["pekerjaan"];
			var judul = data["judul"];
			var pengarang = data["pengarang"];
			var penerbit = data["penerbit"];
			var gambar = data["gambar"];
			var komentar = data["komentar"];
			var tanggal = data["tanggal"];

			$("#judulBuku").html("<strong>" + judul + "</strong>");
			$("#coverBuku").html(
				"<img class='d-block w-100' src='" +
					url2 +
					"assets/img/permintaanBuku/" +
					gambar +
					"'>"
			);
			$("#nama").val(nama);
			$("#pekerjaan").val(pekerjaan);
			$("#pengarang").val(pengarang);
			$("#penerbit").val(penerbit);
			$("#komentar").val(komentar);
			$("#tanggal").val(tanggal);
			$("#modalDetailBukuPopuler").modal("show");
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText);
		},
	});
}
function hapusPermintaanBuku(id) {
	$("#modalHapus").modal("show");
	$("#konfirmasiHapusBukuPopuler").attr(
		"onclick",
		"konfirmasiHapusPermintaanBuku(" + id + ")"
	);
}
function konfirmasiHapusPermintaanBuku(id) {
	$.ajax({
		url: url + "hapusPermintaanBuku/" + id,
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {
			$("#modalHapus").modal("hide");
		},
		success: function (data) {
			$("#modalHapus").modal("hide");
			$("#centralModalSuccess").modal("show");
			getDataPermintaanBuku();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText);
		},
	});
}
// AKHIR PERMINTAAN BUKU

// KOMENTAR PENGUNJUNG
function getDataSaran() {
	var isi = "";
	var bagian = $("#bagian").val();
	if (!bagian) {
		bagian = 0;
	}
	$.ajax({
		url: url + "getListSaran/" + bagian,
		type: "GET",
		dataType: "JSON",
		beforeSend: function () {
			$("#dataTable_wrapper").remove();
			$("#loading").show();
		},
		success: function (data) {
			isi +=
				'<table class="table table-bordered table table-striped" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>N0</th><th>Nama</th><th>Pekerjaan</th><th>Tujuan</th><th>Komentar</th>';
			if (data["session"] == "admin") {
				isi += '<th width="100px">Aksi</th>';
			}
			isi += "</tr></thead><tbody>";
			$("#loading").hide();
			var yangDitampilkan = [];
			$.ajax({
				url: url + "getYangDitampilkan",
				type: "GET",
				dataType: "JSON",
				success: function (data1) {
					for (var i = 0; i < Object.keys(data["komentar"]).length; i++) {
						isi += "<tr><td></td>";
						isi += "<td>" + data["komentar"][i]["nama"] + "</td>";
						isi += "<td>" + data["komentar"][i]["pekerjaan"] + "</td>";
						isi += "<td>" + data["komentar"][i]["ditujukan"] + "</td>";
						isi += "<td>" + data["komentar"][i]["isi"] + "</td></<td>";
						var flag = 0;
						if (data["session"] == "admin") {
							for (var j = 0; j < Object.keys(data1).length; j++) {
								if (
									data["komentar"][i]["idkomentar"] == data1[j]["idkomentar"]
								) {
									flag = 1;
								}
							}
							if (flag === 1) {
								isi +=
									"<td><button type='button' class='btn btn-outline-warning btn-rounded btn-sm' id='hapusTampilkan' onclick='hapusTampilkanKomentar(" +
									data["komentar"][i]["idkomentar"] +
									")'>Batalkan</button><button type='button' class='btn btn-outline-danger btn-rounded btn-sm' id='hapus' onclick='hapusKomentar(" +
									data["komentar"][i]["idkomentar"] +
									")'>Hapus</button></td>";
							} else {
								isi +=
									"<td><button type='button' class='btn btn-outline-info btn-rounded btn-sm' id='tampilkan' onclick='tampilkanKomentar(" +
									data["komentar"][i]["idkomentar"] +
									")'>Tampilkan</button><button type='button' class='btn btn-outline-danger btn-rounded btn-sm' id='hapus' onclick='hapusKomentar(" +
									data["komentar"][i]["idkomentar"] +
									")'>Hapus</button></td>";
							}
						}
					}
					isi += "</tbody></table>";
					strukturTabel("saran", isi);
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseText);
				},
			});
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function tampilkanKomentar(id) {
	konfirmasiTampilkanKomentar(id);
}
function hapusTampilkanKomentar(id) {
	$("#modalConfirmDeleteTampilkan").modal("show");
	$("#konfirmasiHapusTampilkanKomentar").attr(
		"onclick",
		"konfirmasiHapusTampilkanKomentar(" + id + ")"
	);
}
function hapusKomentar(id) {
	$("#modalConfirmDelete").modal("show");
	$("#konfirmasiHapusBukuPopuler").attr(
		"onclick",
		"konfirmasiHapusKomentar(" + id + ")"
	);
}
function konfirmasiHapusTampilkanKomentar(id) {
	$.ajax({
		url: url + "hapusTampilkanKomentar",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {
			$("#modalConfirmDeleteTampilkan").modal("hide");
		},
		success: function (data) {
			getDataSaran();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function konfirmasiTampilkanKomentar(id) {
	$.ajax({
		url: url + "tampilkanKomentar",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		success: function (data) {
			$("#centralModalSuccess").modal("show");
			getDataSaran();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
function konfirmasiHapusKomentar(id) {
	$.ajax({
		url: url + "hapusKomentar",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {
			$("#modalConfirmDelete").modal("hide");
		},
		success: function (data) {
			getDataSaran();
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		},
	});
}
// AKHIR KOMENTAR PENGUNJUNG

// KEGIATAN
function simpanKegiatanLama(id) {
	var nama = $("#nama").val();
	var isi1 = CKEDITOR.instances.editor1.getData();
	var isi2 = CKEDITOR.instances.editor2.getData();
	var gambar1 = $("#image1").val();
	var gambar2 = $("#image2").val();
	var data = new FormData($("#formKegiatan")[0]);
	data.append("isi1", isi1);
	data.append("isi2", isi2);

	if (isi1 != "" && isi2 != "") {
		$.ajax({
			url: url + "simpanKegiatanLama/" + id,
			type: "POST",
			dataType: "JSON",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {},
			success: function (data) {
				if (gambar1 == "" && gambar2 == "") {
					$("#centralModalSuccess").modal("show");
				} else {
					window.location.href = url + "kegiatan/" + id;
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.responseText);
			},
		});
	} else {
		alert("form kosong");
	}
}
function hapusKegiatanId(id) {
	$("#modalHapus").modal("show");
	$("#konfirmasiHapusKegiatan").attr(
		"onclick",
		"konfirmasiHapusKegiatanId(" + id + ")"
	);
}
function konfirmasiHapusKegiatanId(id) {
	$.ajax({
		url: url + "hapusKegiatan",
		type: "POST",
		dataType: "JSON",
		data: {
			id: id,
		},
		beforeSend: function () {
			$("#modalHapus").modal("hide");
		},
		success: function (data) {
			window.location.href = url + "dashboard";
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText);
		},
	});
}
// AKHIR KEGIATAN

// TAMBAH KEGIATAN
$(".formTambahKegiatan").submit(function (event) {
	event.preventDefault();
	var nama = $("#nama").val();
	var isi1 = CKEDITOR.instances.editor1.getData();
	var isi2 = CKEDITOR.instances.editor2.getData();
	var gambar1 = $("#image1").val();
	var gambar2 = $("#image2").val();
	var data = new FormData(this);
	data.append("nama", nama);
	data.append("isi1", isi1);
	data.append("isi2", isi2);

	if (
		nama != "" &&
		isi1 != "" &&
		isi2 != "" &&
		gambar1 != "" &&
		gambar2 != ""
	) {
		$.ajax({
			url: url + "simpanKegiatan",
			type: "POST",
			dataType: "JSON",
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {
				$("#mdb-preloader").show();
			},
			success: function (data) {
				window.location.href = url + "kegiatan/" + data["id"];
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			},
		});
	} else {
		if ($(".tempatError").children().hasClass("alert") !== true) {
			$(".tempatError").prepend(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		} else {
			$(".tempatError>.alert").replaceWith(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		}
	}
});
// AKHIR TAMBAH KEGIATAN

// PEMBUATAN TABEL DATATABLES

function strukturTabel(idTabel, isiTabel) {
	$("#dataTable_wrapper").remove();
	$("#" + idTabel).html(isiTabel);
	var t = $("#dataTable").DataTable({
		bLengthChange: false,
		pagingType: "full_numbers",
		language: {
			paginate: {
				previous: "<",
				next: ">",
				first: "<<",
				last: ">>",
			},
			lengthMenu: "Menampilkan _MENU_ data tiap halaman",
			zeroRecords: "Data yang anda cari tidak terdapat dalam sistem kami",
			info: "Menampilkan halaman _PAGE_ dari _PAGES_",
			infoEmpty: "",
			infoFiltered: "",
			search: "cari",
		},
		columnDefs: [
			{
				searchable: false,
				orderable: false,
				targets: 0,
			},
		],
		order: [[1, "asc"]],
	});
	t.on("order.dt search.dt", function () {
		t.column(0, { search: "applied", order: "applied" })
			.nodes()
			.each(function (cell, i) {
				cell.innerHTML = i + 1;
			});
	}).draw();
}
// AKHIR PEMBUATAN TABEL DATATABLES

// GANTI PASSWORD
function ubahPassword() {
	$("#reset-password-modal").modal("show");
}

function konfirmasiGantiPassword() {
	var passwordLama = $("#passwordLama").val();
	var passwordBaru = $("#passwordBaru").val();
	var konfirmasiPasswordBaru = $("#konfirmasiPasswordBaru").val();
	if (
		passwordLama == "" ||
		passwordBaru == "" ||
		konfirmasiPasswordBaru == ""
	) {
		if ($(".modal-body").children().hasClass("alert") !== true) {
			$(".modal-body").prepend(
				'<div class="alert alert-danger">Form kosong!</div>'
			);
			$("#passwordLama").val("");
			$("#passwordBaru").val("");
			$("#konfirmasiPasswordBaru").val("");
		} else {
			$(".modal-body>.alert").replaceWith(
				'<div class="alert alert-danger">Form kosong!</div>'
			);
			$("#passwordLama").val("");
			$("#passwordBaru").val("");
			$("#konfirmasiPasswordBaru").val("");
		}
	} else if (passwordLama == passwordBaru) {
		if ($(".modal-body").children().hasClass("alert") !== true) {
			$(".modal-body").prepend(
				'<div class="alert alert-danger">Password lama dan baru tidak boleh sama</div>'
			);
			$("#passwordLama").val("");
			$("#passwordBaru").val("");
			$("#konfirmasiPasswordBaru").val("");
		} else {
			$(".modal-body>.alert").replaceWith(
				'<div class="alert alert-danger">Password lama dan baru tidak boleh sama</div>'
			);
			$("#passwordLama").val("");
			$("#passwordBaru").val("");
			$("#konfirmasiPasswordBaru").val("");
		}
	} else if (passwordBaru != konfirmasiPasswordBaru) {
		if ($(".modal-body").children().hasClass("alert") !== true) {
			$(".modal-body").prepend(
				'<div class="alert alert-danger">Password baru dan konfirmasi password baru tidak sama</div>'
			);
			$("#passwordLama").val("");
			$("#passwordBaru").val("");
			$("#konfirmasiPasswordBaru").val("");
		} else {
			$(".modal-body>.alert").replaceWith(
				'<div class="alert alert-danger">Password baru dan konfirmasi password baru tidak sama</div>'
			);
			$("#passwordLama").val("");
			$("#passwordBaru").val("");
			$("#konfirmasiPasswordBaru").val("");
		}
	} else {
		$.ajax({
			url: url + "gantiPassword",
			type: "POST",
			dataType: "JSON",
			data: {
				passwordLama: passwordLama,
				passwordBaru: passwordBaru,
				konfirmasiPasswordBaru: konfirmasiPasswordBaru,
			},
			beforeSend: function () {},
			success: function (data) {
				if (data == "sukses") {
					$("#reset-password-modal").modal("hide");
					$("#centralModalSuccessPassword").modal("show");
					$("#reset-password-modal").find("input").val("");
				} else {
					if ($(".modal-body").children().hasClass("alert") != true) {
						$(".modal-body").prepend(
							'<div class="alert alert-danger">Password lama salah!</div>'
						);
						$("#passwordLama").val("");
						$("#passwordBaru").val("");
						$("#konfirmasiPasswordBaru").val("");
					} else {
						$(".modal-body>.alert").replaceWith(
							'<div class="alert alert-danger">Password lama salah!</div>'
						);
						$("#passwordLama").val("");
						$("#passwordBaru").val("");
						$("#konfirmasiPasswordBaru").val("");
					}
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			},
		});
	}
}
// AKHIR GANTI PASSWORD

// MASUK ADMIN
$(".formLogin").submit(function (event) {
	var username = $("#password").val();
	var password = $("#username").val();
	if (username == "" || password == "") {
		if ($(".formLogin").children().hasClass("alert") !== true) {
			$(".formLogin").prepend(
				'<div class="alert alert-danger">Form kosong!</div>'
			);
			$("#password").val("");
		} else {
			$(".formLogin>.alert").replaceWith(
				'<div class="alert alert-danger">Form kosong!</div>'
			);
			$("#password").val("");
		}
	} else {
		$.ajax({
			url: url + "cekMasuk",
			type: "POST",
			dataType: "JSON",
			data: {
				username: $("#username").val(),
				password: $("#password").val(),
			},
			beforeSend: function () {},
			success: function (respon) {
				if (respon == "sukses") {
					window.location.href = url + "dashboard";
				} else {
					if ($(".formLogin").children().hasClass("alert") !== true) {
						$(".formLogin").prepend(
							'<div class="alert alert-danger">username atau password salah!</div>'
						);
						$("#password").val("");
					} else {
						$(".formLogin>.alert").replaceWith(
							'<div class="alert alert-danger">username atau password salah!</div>'
						);
						$("#password").val("");
					}
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			},
		});
	}
	event.preventDefault();
});
// AKHIR MASUK ADMIN

// CEK INPUT SETIAP GAMBAR
$(".custom-file-input").on("change", function () {
	var file = this.files[0];
	var fileType = file.type;
	var fileSize = file.size;
	var match = ["image/jpeg", "image/png", "image/jpg"];
	if (!(fileType == match[0] || fileType == match[1] || fileType == match[2])) {
		alert("Mohon unggah file JPG, JPEG, & PNG");
		$("#image").val("");
		return false;
	}
	if (fileSize >= 2097152) {
		alert("Mohon unggah file kurang dari 2MB");
		$("#image").val("");
		return false;
	}

	let filename = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(filename);
});
// AKHIR CEK INPUT SETIAP GAMBAR
