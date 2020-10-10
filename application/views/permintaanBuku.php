<div class="containerHeader pb-4">
    <div class="textHeader1">Permintaan Buku</div>
    <div class="textHeader2">Buku yang kamu cari tidak ada di koleksi Perpustakaan Ungaran?
        <br>Yuk isi formulir permintaan buku ini, biar koleksi Perpustakaan Ungaran semakin lengkap!
    </div>
</div>
<div class="containerIsi">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 textIsi1">Formulir Permintaan Buku</h1>
        </div>
        <form class="formPermintaanBuku" id="formPermintaanBuku" style="position: relative">
            <div id="mdb-preloader" class="flex-center" style="display: none">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="nama">Nama *</label>
                    <input type="text" class="textInput" id="nama" name="nama">
                </div>
                <div class="col-sm-6">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="textInput" id="pekerjaan" name="pekerjaan" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="judulBuku">Judul Buku</label>
                    <input type="text" class="textInput" id="judulBuku" name="judulBuku" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="textInput" id="penerbit" name="penerbit" required>
                </div>
                <div class="col-sm-6">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="textInput" id="pengarang" name="pengarang" required>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="custom-file">
                        <label for="image">Gambar Sampul Buku</label>
                        <input type="file" class="custom-file-input" id="image" name="image" style="visibility:hidden" />
                        <label class="custom-file-label textInput" for="image">Pilih Gambar</label>
                    </div>
                </div> -->

            </div>
            <div class="file-upload-wrapper">
                <label for="pengarang">Gambar Sampul Buku</label>
                <input type="file" id="image" name="image" class="file-upload" data-max-file-size="2M" />
            </div>
            <div class="form-group">
                <label for="komentarBuku">Komentar Buku</label>
                <textarea id="komentarBuku" name="komentarBuku" form="formPermintaanBuku" class="textInputArea" required></textarea>
            </div>
            <div class="tempatError"></div>
            <div class="submit-button">
                <button type="button" id="permintaanBuku" onclick="kirimPermintaanBuku()">Kirim</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                    <p>permintaan buku anda sudah kami terima</p>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>