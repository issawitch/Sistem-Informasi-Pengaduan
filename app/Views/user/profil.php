<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">My Profile</h1>

                                    <!-- User Image -->
                                    <img src="<?= base_url('img/profil/' . user()->user_image); ?>" class="img-fluid rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;">

                                    <!-- User Information -->
                                    <div class="row text-left text-gray-900">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fullName">Nama Lengkap:</label>
                                                <input type="text" class="form-control" id="fullName" value="<?= user()->fullname; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" value="<?= user()->email; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">No. Telepon:</label>
                                                <input type="text" class="form-control" id="phone" value="<?= user()->no_telp; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php if (in_groups('user')) : ?>
                                                <div class="form-group">
                                                    <label for="nisn">NISN:</label>
                                                    <input type="text" class="form-control" id="nisn" value="<?= user()->nisn; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="school">Asal Sekolah:</label>
                                                    <?php
                                                    $sekolahModel = new \App\Models\SekolahModel();
                                                    $sekolahData = $sekolahModel->find(user()->id_sekolah);
                                                    if ($sekolahData) {
                                                        echo '<input type="text" class="form-control" id="school" value="' . $sekolahData['nama'] . '" readonly>';
                                                    } else {
                                                        echo '<input type="text" class="form-control" id="school" value="Data Sekolah Tidak Ditemukan" readonly>';
                                                    }
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (in_groups('admin')) : ?>
                                                <div class="form-group">
                                                    <label for="nip">NIP:</label>
                                                    <input type="text" class="form-control" id="nip" value="<?= user()->nip; ?>" readonly>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (in_groups('guru')) : ?>
                                                <div class="form-group">
                                                    <label for="nip">NIP:</label>
                                                    <input type="text" class="form-control" id="nip" value="<?= user()->nip; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="school">Asal Sekolah:</label>
                                                    <?php
                                                    $sekolahModel = new \App\Models\SekolahModel();
                                                    $sekolahData = $sekolahModel->find(user()->id_sekolah);
                                                    if ($sekolahData) {
                                                        echo '<input type="text" class="form-control" id="school" value="' . $sekolahData['nama'] . '" readonly>';
                                                    } else {
                                                        echo '<input type="text" class="form-control" id="school" value="Data Sekolah Tidak Ditemukan" readonly>';
                                                    }
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-primary btn-user btn-block">
                                        Update Profil
                                    </button>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Profil</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('user/editProfil/' . user()->id) ?>" method="post" enctype="multipart/form-data">
                                                        <?= csrf_field() ?>
                                                        <?php if (in_groups('guru') || in_groups('admin')) : ?>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="nip" value="<?= user()->nip; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (in_groups('user')) :?>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="nisn" value="<?= user()->nisn; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-group">
                                                            <input type="text" name="email" id="email" class="form-control form-control-user" value="<?= user()->email; ?>" readonly>
                                                        </div>
                                                        <?php if (in_groups('guru') || in_groups('user')) : ?>
                                                            <div class="form-group">
                                                                <?php
                                                                $sekolahModel = new \App\Models\SekolahModel();
                                                                $sekolahData = $sekolahModel->find(user()->id_sekolah);
                                                                if ($sekolahData) {
                                                                    echo '<input type="text" class="form-control" id="school" value="' . $sekolahData['nama'] . '" readonly>';
                                                                } else {
                                                                    echo '<input type="text" class="form-control" id="school" value="Data Sekolah Tidak Ditemukan" readonly>';
                                                                }
                                                                ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-group">
                                                            <input type="text" name="fullname" id="fullname" class="form-control form-control-user" placeholder="Nama Lengkap" value="<?= user()->fullname; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="no_telp" id="no_telp" class="form-control form-control-user" placeholder="No. Telepon" value="<?= user()->no_telp; ?>">
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile" name="user_image" accept=".jpg, .jpeg, .png" onchange="previewFile()">
                                                            <label class="custom-file-label" for="customFile" id="customFileLabel">Pilih foto profil</label>
                                                        </div>
                                                        <div id="img-preview-container" class="mt-2"></div>
                                                        <!-- Tambahkan input tersembunyi untuk mengirimkan ID pengguna -->
                                                        <input type="hidden" name="id" value="<?= user()->id ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="save" class="btn btn-primary btn-user">Simpan</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
            fileLabel.innerText = 'Pilih foto profil';
        }

        // Menghapus pratinjau sebelumnya
        imgPreviewContainer.innerHTML = '';

        // Membuat pratinjau untuk setiap file yang dipilih
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
</script>
<?= $this->endSection(); ?>