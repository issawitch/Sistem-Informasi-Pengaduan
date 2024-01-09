<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Buat Pengaduan</h1>
                                </div>

                                <!-- Form untuk pengaduan -->
                                <form action="pengaduan/create" method="post" class="user" enctype="multipart/form-data" action="<?= base_url('pengaduan/savePengaduan'); ?>">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <input type="text" name="isi" id="isi" class="form-control form-control-user" placeholder="Jelaskan keluhan" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="nisn" value="<?= user()->nisn; ?>">
                                        <input type="hidden" name="fullname" value="<?= user()->fullname; ?>">
                                        <input type="hidden" name="asal_sekolah" value="<?= user()->asal_sekolah; ?>">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto" accept=".jpg, .jpeg, .png" onchange="previewFile()" multiple>
                                        <label class="custom-file-label" for="customFile" id="customFileLabel">Pilih file foto (Opsional)</label>
                                    </div>
                                    <img src="" alt="Preview" class="img-thumbnail mt-2" id="img-preview" style="display:none; max-width: 200px;">
                                    <hr>
                                    <button type="submit" name="save" class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                </form>
                                <!-- Akhir form pengaduan -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile() {
        const fileInput = document.getElementById('customFile');
        const fileLabel = document.getElementById('customFileLabel');
        const imgPreview = document.getElementById('img-preview');
        const fileName = fileInput.files[0].name;

        fileLabel.innerText = fileName;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block';
            }

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>

<?= $this->endSection(); ?>
