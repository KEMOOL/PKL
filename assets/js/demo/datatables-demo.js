// Call the dataTables jQuery plugin
$(document).ready(function() {
	$("#dataTable").DataTable({
		pagingType: "full_numbers",
		language: {
			paginate: {
				previous: "<",
				next: ">",
				first: "<<",
				last: ">>"
			},
			lengthMenu: "Display _MENU_ records per page",
			zeroRecords: "Nothing found - sorry",
			info: "Menampilkan halaman _PAGE_ dari _PAGES_",
			infoEmpty: "No records available",
			infoFiltered: "(filtered from _MAX_ total records)",
			search: "cari"
		}
	});
});
