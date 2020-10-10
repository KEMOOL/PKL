<div class="containerHeader">
    <div class="textHeader1 pb-4">Kotak Saran</div>
    <div class="textHeader2 pb-2">Yuk beri saran untuk Perpustakaan dan Kearsipan Kabupaten Ungaran,
        <br>supaya kami bisa menjadi lebih baik lagi dalam melayani masyrakat!</div>
</div>
<div class="containerIsi">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 textIsi1">Formulir Kesan dan Pesan</h1>
        </div>
        <form class="formKotakSaran" id="formKotakSaran" style="position: relative">
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
                    <input type="text" class="textInput" id="pekerjaan" name="pekerjaan">
                </div>
            </div>
            <div class="form-group mb-0">
                <label for="radioButtonSaran">Jenis Kelamin : </label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="materialInline1" name="radioButtonSaran" value="1">
                    <label class="form-check-label" for="materialInline1">Laki-laki</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="materialInline2" name="radioButtonSaran" value="2">
                    <label class="form-check-label" for="materialInline2">Perempuan</label>
                </div>
            </div>


            <div class="form-group">
                <label for="tujuanSaran">Saran Ditujukan Untuk:</label>
                <select class="textInput" name="tujuanSaran" id="tujuanSaran">
                    <!-- <option value="0">Semua</option> -->
                    <option value="layanan">Layanan</option>
                    <option value="kebersihan">kebersihan</option>
                    <option value="keamanan">keamanan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="isiSaran">Saran Untuk Perpustakaan Ungaran</label>
                <textarea id="isiSaran" name="isiSaran" form="formKotakSaran" class="textInputArea"></textarea>
            </div>
            <div class="tempatError"></div>
            <div class="submit-button">
                <button type="button" id="submit-button" onclick="kirimSaran()">Kirim</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalSukses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <div class="modal-content text-center">
            <div class="modal-body">
                <i class="fas fa-check fa-4x animated rotateIn"></i>
                <p class="text-sm">Terimakasih telah Memberikan kesan dan pesan Anda, semoga kami bisa menjadi lebih baik lagi dalam melayani masyrakat!</p>
            </div>
            <div class="modal-footer flex-center">
                <a type="button" class="btn  btn-success waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>