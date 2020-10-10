var url = "http://localhost/siyap/";

$("document").ready(function (e) {
	$(".custom-file-input").on("change", function () {
		var file = this.files[0];
		var fileType = file.type;
		var fileSize = file.size;
		var match = ["image/jpeg", "image/png", "image/jpg"];
		if (
			!(fileType == match[0] || fileType == match[1] || fileType == match[2])
		) {
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

	jssor_1_slider_init();

	$("#myCarousel").on("slide.bs.carousel", function (e) {
		var $e = $(e.relatedTarget);
		var idx = $e.index();
		var itemsPerSlide = 3;
		var totalItems = $(".carousel-item").length;

		if (idx >= totalItems - (itemsPerSlide - 1)) {
			var it = itemsPerSlide - (totalItems - idx);
			for (var i = 0; i < it; i++) {
				// append slides to end
				if (e.direction == "left") {
					$(".carousel-item").eq(i).appendTo(".carousel-inner");
				} else {
					$(".carousel-item").eq(0).appendTo($(this).find(".carousel-inner"));
				}
			}
		}
	});

	var tempatBerita = document.getElementById("tempatBerita");
	if (tempatBerita) {
		tampilBerita();
	}

	// slider
	var element = document.getElementById("jssor_1");
	if (element) {
		var jssor_1_options = {
			$AutoPlay: 1,
			$PauseOnHover: 3,
			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$,
			},
			$BulletNavigatorOptions: {
				$Class: $JssorBulletNavigator$,
				$SpacingX: 16,
				$SpacingY: 16,
			},
		};

		var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

		/*#region responsive code begin*/

		var MAX_WIDTH = 30000;

		function ScaleSlider() {
			var containerElement = jssor_1_slider.$Elmt.parentNode;
			var containerWidth = containerElement.clientWidth;

			if (containerWidth) {
				var expectedWidth = Math.min(
					MAX_WIDTH || containerWidth,
					containerWidth
				);

				jssor_1_slider.$ScaleWidth(expectedWidth);
			} else {
				window.setTimeout(ScaleSlider, 30);
			}
		}

		ScaleSlider();

		$(window).bind("load", ScaleSlider);
		$(window).bind("resize", ScaleSlider);
		$(window).bind("orientationchange", ScaleSlider);
	}
	/*#endregion responsive code end*/
});

window.jssor_1_slider_init = function () {
	var jssor_1_options = {
		$ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$,
		},
	};

	var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_1_options);

	/*#region responsive code begin*/

	var MAX_WIDTH = 3000;

	function ScaleSlider() {
		var containerElement = jssor_2_slider.$Elmt.parentNode;
		var containerWidth = containerElement.clientWidth;

		if (containerWidth) {
			var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

			jssor_2_slider.$ScaleWidth(expectedWidth);
		} else {
			window.setTimeout(ScaleSlider, 30);
		}
	}

	ScaleSlider();

	$Jssor$.$AddEvent(window, "load", ScaleSlider);
	$Jssor$.$AddEvent(window, "resize", ScaleSlider);
	$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
	/*#endregion responsive code end*/
};

$(".carousel.carousel-multi-item.v-2 .carousel-item").each(function () {
	var next = $(this).next();
	if (!next.length) {
		next = $(this).siblings(":first");
	}
	next.children(":first-child").clone().appendTo($(this));

	for (var i = 0; i < 4; i++) {
		next = next.next();
		if (!next.length) {
			next = $(this).siblings(":first");
		}
		next.children(":first-child").clone().appendTo($(this));
	}
});

function kirimSaran() {
	var nama = $("#nama").val();
	var pekerjaan = $("#pekerjaan").val();
	var kelamin = $('input[name="radioButtonSaran"]:checked').val();
	var ditujukan = $("#tujuanSaran").val();
	var isi = $("#isiSaran").val();

	if (nama == "") {
		nama = "Pengunjung";
	}
	if (isi == "" || pekerjaan == "" || typeof kelamin == "undefined") {
		if ($(".tempatError").children().hasClass("alert") != true) {
			$(".tempatError").prepend(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		} else {
			$(".tempatError>.alert").replaceWith(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		}
	} else {
		$.ajax({
			url: url + "kotakSaran/simpanSaran",
			type: "POST",
			dataType: "JSON",
			data: {
				nama: nama,
				pekerjaan: pekerjaan,
				jenisKelamin: kelamin,
				ditujukan: ditujukan,
				isi: isi,
			},
			beforeSend: function () {
				$("#mdb-preloader").show();
			},
			success: function (data) {
				$("#mdb-preloader").hide();
				$(".tempatError").html("");
				$("#formKotakSaran").trigger("reset");
				$("#modalSukses").modal("show");
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.responseText);
			},
		});
	}
}

function kirimPermintaanBuku() {
	var nama = $("#nama").val();
	var pekerjaan = $("#pekerjaan").val();
	var judul = $("#judulBuku").val();
	var pengarang = $("#pengarang").val();
	var penerbit = $("#penerbit").val();
	var gambar = $("#image").val();
	var komentar = $("#komentarBuku").val();

	if (
		pekerjaan == "" ||
		judul == "" ||
		pengarang == "" ||
		penerbit == "" ||
		gambar == "" ||
		komentar == ""
	) {
		if ($(".tempatError").children().hasClass("alert") != true) {
			$(".tempatError").prepend(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		} else {
			$(".tempatError>.alert").replaceWith(
				'<div class="alert alert-danger">Mohon Lengkapi Form Diatas</div>'
			);
		}
	} else {
		$(".tempatError>.alert").remove();
		$.ajax({
			url: url + "permintaanBuku/simpanPermintaan",
			type: "POST",
			dataType: "JSON",
			data: new FormData($("#formPermintaanBuku")[0]),
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {
				$("#mdb-preloader").show();
			},
			success: function () {
				$("#mdb-preloader").hide();
				$("#centralModalSuccess").modal("show");
				$("#formPermintaanBuku").trigger("reset");
				$("#hapusFile").click();
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseText);
			},
		});
	}
}

function tampilBerita() {
	var isi = "";

	$.ajax({
		url: url + "berita/getListBerita",
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			var isiBerita;
			var total = Object.keys(data).length;

			if (total % 3 == 1) {
				for (var i = 0; i < total - 1; i++) {
					if (i == 0) {
						isi += '<div class="carousel-item active">';
					} else {
						isi += '<div class="carousel-item">';
					}
					for (var j = i; j < total - 1; j++) {
						isi += '<div class="col-12 col-md-4">';
						isi += '<div class="card mb-2">';
						isi +=
							'<img class="card-img-top" src="' +
							url +
							"assets/img/berita/" +
							data[j]["gambar"] +
							'">';
						isi += '<div class="card-body">';
						isi += '<h4 class="card-title font-weight-bold">';
						isi += data[j]["judul"];
						isi += "</h4>";
						isi += '<div class="card-text">';
						isiBerita = data[j]["isi"]
							.replace(/(<([^>]+)>)/gi, "")
							.split(" ")
							.join(", ")
							.split(",");
						var berita = "";
						if (isiBerita.length >= 20) {
							for (var l = 0; l < 20; l++) {
								berita += isiBerita[l];
							}
							berita += "...";
						} else {
							for (var l = 0; l < isiBerita.length; l++) {
								berita += isiBerita[l];
							}
						}
						isi += berita;
						isi += "</div>";
						isi +=
							'<a class="btn btn-primary btn-md btn-rounded waves-effect waves-light" href="' +
							url +
							"berita/detail/" +
							data[j]["id"] +
							'">Baca Selengkapnya</a>';
						isi += "</div>";
						isi += "</div>";
						isi += "</div>";
						if (j == total - 2) {
							for (var k = 0; k <= i; k++) {
								isi += '<div class="col-12 col-md-4">';
								isi += '<div class="card mb-2">';
								isi +=
									'<img class="card-img-top" src="' +
									url +
									"assets/img/berita/" +
									data[k]["gambar"] +
									'">';
								isi += '<div class="card-body">';
								isi += '<h4 class="card-title font-weight-bold">';
								isi += data[k]["judul"];
								isi += "</h4>";
								isi += '<div class="card-text">';
								isiBerita = data[k]["isi"]
									.replace(/(<([^>]+)>)/gi, "")
									.split(" ")
									.join(", ")
									.split(",");
								var berita = "";
								if (isiBerita.length >= 20) {
									for (var l = 0; l < 20; l++) {
										berita += isiBerita[l];
									}
									berita += "...";
								} else {
									for (var l = 0; l < isiBerita.length; l++) {
										berita += isiBerita[l];
									}
								}
								isi += berita;
								isi += "</div>";
								isi +=
									'<a class="btn btn-primary btn-md btn-rounded waves-effect waves-light" href="' +
									url +
									"berita/detail/" +
									data[k]["id"] +
									'">Baca Selengkapnya</a>';
								isi += "</div>";
								isi += "</div>";
								isi += "</div>";
							}
						}
					}
					isi += "</div>";
				}
			} else if (total % 3 == 2) {
				for (var i = 0; i < total - 2; i++) {
					if (i == 0) {
						isi += '<div class="carousel-item active">';
					} else {
						isi += '<div class="carousel-item">';
					}
					for (var j = i; j < total - 2; j++) {
						isi += '<div class="col-12 col-md-4">';
						isi += '<div class="card mb-2">';
						isi +=
							'<img class="card-img-top" src="' +
							url +
							"assets/img/berita/" +
							data[j]["gambar"] +
							'">';
						isi += '<div class="card-body">';
						isi += '<h4 class="card-title font-weight-bold">';
						isi += data[j]["judul"];
						isi += "</h4>";
						isi += '<div class="card-text">';
						isiBerita = data[j]["isi"]
							.replace(/(<([^>]+)>)/gi, "")
							.split(" ")
							.join(", ")
							.split(",");
						var berita = "";
						if (isiBerita.length >= 20) {
							for (var l = 0; l < 20; l++) {
								berita += isiBerita[l];
							}
							berita += "...";
						} else {
							for (var l = 0; l < isiBerita.length; l++) {
								berita += isiBerita[j];
							}
						}
						isi += berita;
						isi += "</div>";
						isi +=
							'<a class="btn btn-primary btn-md btn-rounded waves-effect waves-light" href="' +
							url +
							"berita/detail/" +
							data[j]["id"] +
							'">Baca Selengkapnya</a>';
						isi += "</div>";
						isi += "</div>";
						isi += "</div>";
						if (j == total - 3) {
							for (var k = 0; k <= i; k++) {
								isi += '<div class="col-12 col-md-4">';
								isi += '<div class="card mb-2">';
								isi +=
									'<img class="card-img-top" src="' +
									url +
									"assets/img/berita/" +
									data[k]["gambar"] +
									'">';
								isi += '<div class="card-body">';
								isi += '<h4 class="card-title font-weight-bold">';
								isi += data[k]["judul"];
								isi += "</h4>";
								isi += '<div class="card-text">';
								isiBerita = data[k]["isi"]
									.replace(/(<([^>]+)>)/gi, "")
									.split(" ")
									.join(", ")
									.split(",");
								var berita = "";
								if (isiBerita.length >= 20) {
									for (var l = 0; l < 20; l++) {
										berita += isiBerita[l];
									}
									berita += "...";
								} else {
									for (var l = 0; l < isiBerita.length; l++) {
										berita += isiBerita[j];
									}
								}
								isi += berita;
								isi += "</div>";
								isi +=
									'<a class="btn btn-primary btn-md btn-rounded waves-effect waves-light" href="' +
									url +
									"berita/detail/" +
									data[k]["id"] +
									'">Baca Selengkapnya</a>';
								isi += "</div>";
								isi += "</div>";
								isi += "</div>";
							}
						}
					}
					isi += "</div>";
				}
			} else {
				for (var i = 0; i < total; i++) {
					if (i == 0) {
						isi += '<div class="carousel-item active">';
					} else {
						isi += '<div class="carousel-item">';
					}
					for (var j = i; j < total; j++) {
						isi += '<div class="col-12 col-md-4">';
						isi += '<div class="card mb-2">';
						isi +=
							'<img class="card-img-top" src="' +
							url +
							"assets/img/berita/" +
							data[j]["gambar"] +
							'">';
						isi += '<div class="card-body">';
						isi += '<h4 class="card-title font-weight-bold">';
						isi += data[j]["judul"];
						isi += "</h4>";
						isi += '<div class="card-text">';
						isiBerita = data[j]["isi"]
							.replace(/(<([^>]+)>)/gi, "")
							.split(" ")
							.join(", ")
							.split(",");
						var berita = "";
						if (isiBerita.length >= 20) {
							for (var l = 0; l < 20; l++) {
								berita += isiBerita[l];
							}
							berita += "...";
						} else {
							for (var l = 0; l < isiBerita.length; l++) {
								berita += isiBerita[l];
							}
						}
						isi += berita;
						isi += "</div>";
						isi +=
							'<a class="btn btn-primary btn-md btn-rounded waves-effect waves-light" href="' +
							url +
							"berita/detail/" +
							data[j]["id"] +
							'">Baca Selengkapnya</a>';
						isi += "</div>";
						isi += "</div>";
						isi += "</div>";
						if (j == total - 1) {
							for (var k = 0; k <= i; k++) {
								isi += '<div class="col-12 col-md-4">';
								isi += '<div class="card mb-2">';
								isi +=
									'<img class="card-img-top" src="' +
									url +
									"assets/img/berita/" +
									data[k]["gambar"] +
									'">';
								isi += '<div class="card-body">';
								isi += '<h4 class="card-title font-weight-bold">';
								isi += data[k]["judul"];
								isi += "</h4>";
								isi += '<div class="card-text">';
								isiBerita = data[k]["isi"]
									.replace(/(<([^>]+)>)/gi, "")
									.split(" ")
									.join(", ")
									.split(",");
								var berita = "";
								if (isiBerita.length >= 20) {
									for (var l = 0; l < 20; l++) {
										berita += isiBerita[l];
									}
									berita += "...";
								} else {
									for (var l = 0; l < isiBerita.length; l++) {
										berita += isiBerita[l];
									}
								}
								isi += berita;
								isi += "</div>";
								isi +=
									'<a class="btn btn-primary btn-md btn-rounded waves-effect waves-light" href="' +
									url +
									"berita/detail/" +
									data[k]["id"] +
									'">Baca Selengkapnya</a>';
								isi += "</div>";
								isi += "</div>";
								isi += "</div>";
							}
						}
					}
					isi += "</div>";
				}
			}
			$("#tempatBerita").html(isi);
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert(jqXHR.responseText);
		},
	});
}

$(".formPencarian").submit(function (event) {
	event.preventDefault();

	cari = $("#pencarian").val();

	if (cari == "") {
		return false;
	} else {
		$.ajax({
			url: url + "koleksiBuku/cari",
			type: "POST",
			dataType: "JSON",
			data: {
				cari: cari,
			},
			processData: true,
			beforeSend: function () {
				$("#listBuku").html(
					'<div class="col"><div class="d-flex justify-content-center"><div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></div></div>'
				);
			},
			success: function (data) {
				var isi = "";
				$("#takAda").remove();
				console.log(Object.keys(data).length);
				if (Object.keys(data).length > 0) {
					for (var i = 0; i < Object.keys(data).length; i++) {
						var judul = data[i]["Title"];

						isi += '<div class="col-sm">';
						isi += '<a href="' + url + "buku/" + data[i]["ID"] + '">';
						isi += '<div class="card cardBuku">';
						isi += '<div class="card-header">';
						// 		gambar = data[i]["ID"];
						// 		var image = new Image();
						// 		var url_image = url + "assets/img/cover/" + gambar + ".jpg";
						// 		image.src = url_image;
						// 		if (image.width == 0) {
						// 			isi +=
						// 				"<img src='" +
						// 				url +
						// 				"assets/img/cover/tdkada.gif' class='imgKoleksiBuku'>";
						// 		} else {
						// 			isi +=
						// 				"<img src='" +
						// 				url +
						// 				"assets/img/cover/" +
						// 				data[i]["ID"] +
						// 				".jpg' class='imgKoleksiBuku'>";
						// 		}
						isi +=
							'<img src="' +
							url +
							"/assets/img/cover/" +
							data[i]["ID"] +
							'.jpg" class="imgKoleksiBuku" id="coverBuku' +
							i +
							'" onerror="imgError(' +
							i +
							')">';
						isi += "</div>";
						isi += '<div class="card-body" style="color:black;">';
						judul = data[i]["Title"].split("/");
						isi += judul[0];
						isi += "</div>";
						isi += "</div>";
						isi += "</a>";
						isi += "</div>";
					}
					$("#listBuku").html(isi);
					$(".paginationn").html("");
				} else {
					$(".bukuPopuler").prepend(
						"<div class='text-center' id='takAda'><h3 class='text-center'>Maaf Buku Yang Anda Cari Tidak Tersedia</h3></div>"
					);
					$(".paginationn").html("");
					$("#listBuku").html("");
				}

				// $("#listBuku").html("");
				// $("#takAda").remove();
				// console.log(Object.keys(data).length);
				// if (Object.keys(data).length > 0) {
				// 	for (var i = Object.keys(data).length - 1; i >= 0; i--) {
				// 		var isi = "";
				// 		var judul = data[i]["Title"];

				// 		isi += '<div class="col-sm">';
				// 		isi += '<a href="' + url + "buku/" + data[i]["ID"] + '">';
				// 		isi += '<div class="card cardBuku">';
				// 		isi += '<div class="card-header">';
				// 		gambar = data[i]["ID"];
				// 		var image = new Image();
				// 		var url_image = url + "assets/img/cover/" + gambar + ".jpg";
				// 		image.src = url_image;
				// 		if (image.width == 0) {
				// 			isi +=
				// 				"<img src='" +
				// 				url +
				// 				"assets/img/cover/tdkada.gif' class='imgKoleksiBuku'>";
				// 		} else {
				// 			isi +=
				// 				"<img src='" +
				// 				url +
				// 				"assets/img/cover/" +
				// 				data[i]["ID"] +
				// 				".jpg' class='imgKoleksiBuku'>";
				// 		}
				// 		isi += "</div>";
				// 		isi += '<div class="card-body" style="color:black;">';
				// 		judul = data[i]["Title"].split("/");
				// 		isi += judul[0];
				// 		isi += "</div>";
				// 		isi += "</div>";
				// 		isi += "</a>";
				// 		isi += "</div>";
				// 		$("#listBuku").prepend(isi);
				// 	}

				// 	$(".paginationn").html("");
				// } else {
				// 	$(".bukuPopuler").prepend(
				// 		"<div class='text-center' id='takAda'><h3 class='text-center'>Maaf Buku Yang Anda Cari Tidak Tersedia</h3></div>"
				// 	);
				// 	$(".paginationn").html("");
				// 	$("#listBuku").html("");
				// }
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.responseText);
			},
		});
	}
});

function imgError(i) {
	$("#coverBuku" + i).attr("src", url + "assets/img/cover/tdkada.gif");
}
