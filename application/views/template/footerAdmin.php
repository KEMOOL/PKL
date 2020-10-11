<footer class="page-footer pt-0 mt-5 rgba-stylish-light">
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © Dinas Kearsipan dan Perpustakaan Kabupaten Semarang
            <a href="" target="_blank">
            </a>
        </div>
    </div>
</footer>

<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/popper.min.js"></script>
<script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/mdb.min.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/datatables/jquery.dataTables.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/datatables/datatables-select.min.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/file-upload.js"></script>
<script type="text/javascript" src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/admin.js"></script>

<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    Ps.initialize(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.file-upload').file_upload();
    <?php if ($this->session->flashdata('pesan')) { ?>
        $('#centralModalSuccess').modal('show');
    <?php } ?>
</script>

<script>
    $(function() {
        $('#dark-mode').on('click', function(e) {

            e.preventDefault();

            $('footer, .card').toggleClass('dark-card-admin');
            $('body, .navbar').toggleClass('white-skin navy-blue-skin');
            $(this).toggleClass('white text-dark btn-outline-black');
            $('body').toggleClass('dark-bg-admin');
            $('button').toggleClass('btn-outline-dark');
            $('button').toggleClass('btn-outline-white');
            $('i').toggleClass('text-dark');
            $('h6, .card, p, td, th, i, li a, h4, input, label').not('#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
            $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
            $('.gradient-card-header').toggleClass('white black lighten-4');
            $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

        });
    });
</script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#dataTableServer').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?= filter_var(base_url('admin/get_data_user'), FILTER_DEFAULT) ?>",
                "type": "POST"
            },

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
                processing: '<div class="row"><div class="m-auto" id="loading"><div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></div></div>'
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
                "searchable": false,
            }, ],

        });
        table.on("order.dt search.dt", function() {
            table.column(0, {
                    search: "applied",
                    order: "applied"
                })
                .nodes()
                .each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
        }).draw();

    });
</script>
</body>

</html>