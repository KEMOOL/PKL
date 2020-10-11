<footer>
    <div class="container">
        <div class="row ">
            <div class="col text-white my-4 text-center text-md-left ">
                <p class="text-warning my-2"><a href="" target="_self" class="footer1">Dinas Kearsipan dan Perpustakaan Kabupaten Semarang<br>
                        Jl. Pemuda No. 07 Ungaran, 50511<br>
                        Telephone: 024 - 6921128</a></p>
            </div>

            <div class="col text-white my-4 text-center">
                <p class="text-warning my-2 ">
                    <p class="footer2"> Hubungi Kami Melalui</p>
                </p>
                <div class="py-2">
                    <a href="#"><i class="fab fa-facebook fa-2x text-primary mx-3"></i></a>
                    <a href="#"><i class="fab fa-twitter fa-2x text-info mx-3"></i></a>
                    <a href="#"><i class="fab fa-instagram fa-2x text-primary mx-3"></i></a>
                </div>
            </div>
        </div>
        <hr color="#288bc4">
        <div class="footer-copyright">
            <span>© Dinas Kearsipan dan Perpustakaan Kabupaten Semarang</span>
        </div>
    </div>
</footer>

<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/jquery-3.4.1.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/bootstrap.bundle.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/bootstrap.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/jssor.slider-28.0.0.min.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/mdb.min.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/mdb-plugins-gathered.min.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/global.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/1e8c01e17b.js"></script>
<script src="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/js/file-upload.js"></script>

<script type="text/javascript" src="http://malsup.github.com/jquery.media.js"></script>

<?php if ($this->session->flashdata('pesan')) { ?>
    <script>
        $('#centralModalSuccess').modal('show');
    </script>
<?php } ?>

<script>
    new WOW().init();
    $('.file-upload').file_upload();
    $('.media').media({
        width: 868
    });
</script>
</body>

</html>