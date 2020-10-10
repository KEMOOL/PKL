<main>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kegiatan</h1>
        </div>
        <form class="formTambahKegiatan" id="formTambahKegiatan" style="position: relative">
            <div id="mdb-preloader" class="flex-center" style="display: none; position: absolute">
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
            <div class="card mb-4 post-title-panel">
                <div class="card-body pb-2">
                    <div class="md-form mt-1 mb-0">
                        <input type="text" id="nama" class="form-control"><label class="form-check-label" for="nama">Nama Kegiatan</label>
                    </div>
                </div>
            </div>
            <div class="form-group fotoketerangan">
                <div class="file-upload-wrapper mb-4">
                    <label for="image">Foto Bagian 1</label>
                    <input type="file" id="image1" name="image1" class="file-upload" data-max-file-size="2M" />
                </div>
            </div>
            <div class="form-group">
                <label for="1">Isi Bagian 1</label>
                <textarea name="editor1" class="ckeditor"></textarea>
            </div>
            <div class="form-group fotoketerangan">
                <div class="file-upload-wrapper mb-4">
                    <label for="image">Foto Bagian 2</label>
                    <input type="file" id="image2" name="image2" class="file-upload" data-max-file-size="2M" />
                </div>
            </div>
            <div class="form-group">
                <label for="isiBagian2">Isi Bagian 2</label>
                <textarea name="editor2" class="ckeditor"></textarea>
            </div>
            <div class="tempatError"></div>
            <div class="submit-button">
                <button type="submit" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" id="saveKegiatan">Simpan Kegiatan</button>
            </div>
        </form>
    </div>
</main>