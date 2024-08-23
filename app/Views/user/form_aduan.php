<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div>
        <h1 class="h4 text-gray-900 mb-4">Buat Pengaduan</h1>
    </div>
    <p class="mb-4">Penting untuk memahami ragam kekerasan yang termasuk dalam tiga dosa besar pendidikan, yaitu kekerasan seksual, perundungan, 
        dan intoleransi. Klik di sini untuk mempelajari lebih lanjut tentang 
         <a href="<?= base_url('info')?>">jenis-jenis kekerasan.</a></p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-1">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Form Aduan</h1>
                                </div>
                                <!-- Form untuk pengaduan -->
                                <form action="<?= base_url('pengaduan/create') ?>" method="post" class="user" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="form-group">
                                        <label for="tgl_kejadian">Tanggal Kejadian (Opsional)</label>
                                        <input type="date" name="tgl_kejadian" id="tgl_kejadian" class="form-control form-control-user" placeholder="Tanggal Kejadian"></inpu>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="jenis" name="jenis" required>
                                            <option value="" disabled selected hidden>Jenis Kekerasan</option>
                                            <option value="kekerasan seksual">Kekerasan Seksual</option>
                                            <option value="perundungan">Perundungan/Bullying</option>
                                            <option value="intoleransi">Intoleransi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lokasi" id="lokasi" class="form-control form-control-user" placeholder="Lokasi Kejadian" required></input>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="isi" id="isi" class="form-control form-control-user" style="opacity: 100;"></textarea>
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <input type="text" name="nisn" value="<?= user()->nisn; ?>">
                                        <input type="text" name="fullname" value="<?= user()->fullname; ?>">
                                        <input type="text" name="asal_sekolah" value="<?= user()->asal_sekolah; ?>">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto[]" accept=".jpg, .jpeg, .png" onchange="previewFile()" multiple>
                                        <label class="custom-file-label" for="customFile" id="customFileLabel">Pilih file foto (Opsional)</label>
                                    </div>
                                    <div id="img-preview-container" class="mt-2"></div>
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
        const imgPreviewContainer = document.getElementById('img-preview-container');
        const files = fileInput.files;

        // Menampilkan nama file pertama di label
        if (files.length > 0) {
            fileLabel.innerText = files[0].name;
        } else {
            fileLabel.innerText = 'Pilih file foto (Opsional)';
        }

        // Membuat pratinjau untuk setiap file yang dipilih
        imgPreviewContainer.innerHTML = ''; // Menghapus pratinjau sebelumnya

        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview';
                img.classList.add('img-thumbnail');
                img.style.maxWidth = '200px';
                imgPreviewContainer.appendChild(img);
            }

            reader.readAsDataURL(files[i]);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Jalankan previewFile() saat halaman dimuat
        previewFile();
    });

    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#isi'))
            .then(editor => {
                console.log("CKEditor berhasil diinisialisasi:", editor);
            })
            .catch(error => {
                console.error("Ada kesalahan saat menginisialisasi CKEditor:", error);
            });
    });
</script>

<?= $this->endSection(); ?>