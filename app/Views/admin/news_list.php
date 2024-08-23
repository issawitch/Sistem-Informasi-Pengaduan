<?php
$this->extend('templates/index');

$this->section('page-content');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Data News</h2>

            <!-- Form Tambah -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <button type="button" id="submitBtn" class="btn btn-primary ms-5 shadow-sm" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>

            <!-- Tabel News-->
            <?php if (!empty($news)) : ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Author</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php $i = 1; ?>
                                    <?php foreach ($news as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td style="text-align: start;"><?= date('d-m-Y', strtotime($item['tgl'])); ?></td>
                                            <td><?= $item['author']; ?></td>
                                            <td style="text-align: start;"><?= $item['title']; ?></td>
                                            <td style="text-align: start;">
                                                <p>
                                                    <?= substr(strip_tags($item['body']), 0, 50); ?>
                                                    <?php if (strlen($item['body']) > 50) : ?>
                                                        ...
                                                    <?php endif; ?>
                                                </p>
                                            </td>
                                            <td>
                                                <?php if (!empty($item['img'])) : ?>
                                                    <?php $images = explode(',', $item['img']); ?>
                                                    <img src="/img/news/<?= $images[0]; ?>" width="50px">
                                                <?php else : ?>
                                                    No Photo
                                                <?php endif; ?>
                                            </td>
                                            <td class="col-sm-2">
                                                <a class="btn btn-outline-primary ms-2" data-toggle="modal" data-target="#editModal<?= $item['id'] ?>"><i class="fa fa-pen"></i></a>
                                                <a class="btn btn-outline-danger ms-2" data-toggle="modal" data-target="#hapusModal<?= $item['id'] ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit News</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="news/update_news" method="post" class="user" enctype="multipart/form-data">
                                                        <?= csrf_field() ?>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                                            <div class="form-group">
                                                                <input type="text" name="title" id="title<?= $item['id'] ?>" class="form-control form-control-user" placeholder="Judul News" required value="<?= $item['title'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea name="body" id="body<?= $item['id'] ?>" class="form-control form-control-user" placeholder="Konten News"><?= $item['body'] ?></textarea>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile" name="img[]" accept=".jpg, .jpeg, .png" onchange="previewFile(event)" multiple>
                                                                <label class="custom-file-label" for="customFile" id="customFileLabel">Pilih file gambar (Opsional)</label>
                                                            </div>
                                                            <div id="img-preview-container" class="mt-2"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hapus Modal-->
                                        <div class="modal fade" id="hapusModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus News</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Apakah Anda yakin ingin menghapus data "<?= $item['title']; ?>"?</div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</a>
                                                        <a class="btn btn-primary" href="news/delete/<?= $item['id'] ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <p>Tidak ada data yang ditemukan.</p>
            <?php endif; ?>

            <!-- Tambah Modal-->
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buat News</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="news/add_news" method="post" class="user" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <input type="hidden" name="author" value="<?= user()->fullname; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="title" id="title" class="form-control form-control-user" placeholder="Judul News" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="body" id="body" class="form-control form-control-user" style="opacity: 100;"></textarea>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="img[]" accept=".jpg, .jpeg, .png" onchange="previewFile(event)" multiple>
                                    <label class="custom-file-label" for="customFile" id="customFileLabel">Pilih file gambar (Opsional)</label>
                                </div>
                                <div id="img-preview-container" class="mt-2"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFile(event, id) {
        var input = event.target;
        var previewContainer = document.getElementById('img-preview-container');
        var fileLabel = document.getElementById('customFileLabel');
        var files = input.files;

        // Menampilkan nama file pertama di label
        if (files.length > 0) {
            fileLabel.textContent = files.length > 1 ? files.length + ' files selected' : files[0].name;
        } else {
            fileLabel.textContent = 'Pilih file gambar (Opsional)';
        }

        // Menghapus pratinjau sebelumnya
        previewContainer.innerHTML = '';

        // Membuat pratinjau untuk setiap file yang dipilih
        for (let i = 0; i < files.length; i++) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Preview';
                img.classList.add('img-thumbnail', 'mt-2');
                img.style.maxWidth = '200px';
                previewContainer.appendChild(img);
            }

            reader.readAsDataURL(files[i]);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        let tambahEditorInitialized = false;
        let editEditors = {};

        // Event listener untuk tombol hapus
        $('a[data-target^="#hapusModal"]').on('click', function() {
            var target = $(this).data('target');
            console.log("Modal hapus dibuka:", target);
            $(target).modal('show');
        });

        $('#tambahModal').on('shown.bs.modal', function() {
            if (!tambahEditorInitialized) {
                ClassicEditor
                    .create(document.querySelector('#body'), {
                        // Konfigurasi tambahan, jika diperlukan
                    })
                    .then(editor => {
                        console.log("CKEditor berhasil diinisialisasi:", editor);
                        tambahEditorInitialized = true;
                    })
                    .catch(error => {
                        console.error("Ada kesalahan saat menginisialisasi CKEditor:", error);
                    });
            }
        });

        <?php foreach ($news as $item) : ?>
            $('#editModal<?= $item['id'] ?>').on('shown.bs.modal', function() {
                if (!editEditors['<?= $item['id'] ?>']) {
                    ClassicEditor
                        .create(document.querySelector('#body<?= $item['id'] ?>'), {
                            // Konfigurasi tambahan, jika diperlukan
                        })
                        .then(editor => {
                            console.log("CKEditor pada modal edit <?= $item['id'] ?> berhasil diinisialisasi:", editor);
                            editEditors['<?= $item['id'] ?>'] = editor;
                        })
                        .catch(error => {
                            console.error("Ada kesalahan saat menginisialisasi CKEditor:", error);
                        });
                }
            });
        <?php endforeach; ?>
    });
</script>

<?= $this->endSection(); ?>