<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow-lg">
                <div class="card-body" style="padding: 0px 40px 10px 40px;">
                    <?php foreach ($pengaduan as $item) : ?>

                        <h2 class="my-4 text-center">Detail Aduan</h2>
                        <?php if (in_groups('admin', 'guru')) : ?>
                            <p><strong>NISN :</strong> <?= $item['nisn']; ?></p>
                            <p><strong>Nama :</strong> <?= $item['fullname']; ?></p>
                        <?php endif; ?>
                        <?php if (in_groups('admin')) : ?>
                            <p><strong>Sekolah :</strong>
                                <?php
                                // Load SekolahModel
                                $sekolahModel = new \App\Models\SekolahModel();

                                // Retrieve school data based on the school ID
                                $sekolahData = $sekolahModel->find($item['id_sekolah']);

                                // Check if school data is found
                                if ($sekolahData) {
                                    // Display the school name
                                    echo $sekolahData['nama'];
                                } else {
                                    // Handle if school data is not found
                                    echo "Data Sekolah Tidak Ditemukan";
                                }
                                ?></p>
                        <?php endif; ?>
                        <p><strong>Jenis Aduan :</strong> <?= $item['jenis']; ?></p>
                        <p><strong>Tanggal Kejadian :</strong>
                            <?php if (!empty($item['tgl_kejadian'])) : ?>
                                <?= date('d-m-Y', strtotime($item['tgl_kejadian'])); ?>
                            <?php else : ?>
                                -
                            <?php endif; ?>
                        </p>

                        <p><strong>Lokasi:</strong> <?= $item['lokasi']; ?></p>
                        <p><strong>Isi Laporan:</strong></p>
                        <p><?= $item['isi_laporan']; ?></p>
                        <p><strong>Foto:</strong></p>
                        <?php if (!empty($item['foto'])) : ?>
                            <?php $fotos = explode(',', $item['foto']); ?>
                            <?php if (count($fotos) > 1) : ?>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($fotos as $index => $foto) : ?>
                                            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                                <img src="/img/pengaduan/<?= $foto; ?>" class="d-block mx-auto img-fluid" style="max-width: 600px; max-height: 400px; object-fit: cover;">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <?php foreach ($fotos as $index => $foto) : ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index; ?>" <?= $index === 0 ? 'class="active"' : ''; ?>></li>
                                        <?php endforeach; ?>
                                    </ol>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="background-color: rgba(0, 0, 0, 0.1);">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="background-color: rgba(0, 0, 0, 0.1);">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php else : ?>
                                <img src="/img/pengaduan/<?= $fotos[0]; ?>" class="img-fluid" style="max-width: 600px; max-height: 400px; object-fit: cover; padding-bottom: 5%;">
                            <?php endif; ?>
                        <?php else : ?>
                            <p>No Photo</p>
                        <?php endif; ?>
                        <p><strong>Tanggapan:</strong></p>
                        <?php if (!empty($item['tanggapan'])) : ?>
                            <p><?= $item['tanggapan']; ?></p>
                        <?php else : ?>
                            <p>Belum ada tanggapan</p>
                        <?php endif; ?>
                        <p><strong>Laporan Penyelesaian:</strong></p>
                        <?php if (!empty($item['penyelesaian'])) : ?>
                            <p><?= $item['penyelesaian']; ?></p>
                        <?php else : ?>
                            <p>Aduan belum diselesaikan</p>
                        <?php endif; ?>
                        <?php if (!empty($item['img_selesai'])) : ?>
                            <?php $fotos = explode(',', $item['img_selesai']); ?>
                            <?php if (count($fotos) > 1) : ?>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($fotos as $index => $foto) : ?>
                                            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                                <img src="/img/penyelesaian/<?= $foto; ?>" class="d-block mx-auto img-fluid" style="max-width: 400px; max-height: 200px; object-fit: cover;">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <?php foreach ($fotos as $index => $foto) : ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index; ?>" <?= $index === 0 ? 'class="active"' : ''; ?>></li>
                                        <?php endforeach; ?>
                                    </ol>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="background-color: rgba(0, 0, 0, 0.1);">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="background-color: rgba(0, 0, 0, 0.1);">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php else : ?>
                                <img src="/img/penyelesaian/<?= $fotos[0]; ?>" class="img-fluid" style="max-width: 400px; max-height: 200px; object-fit: cover; padding-bottom: 5%;">
                            <?php endif; ?>
                        <?php else : ?>
                            <p></p>
                        <?php endif; ?>
                        <?php if (in_groups('guru')) : ?>
                            <div class="d-flex justify-content-center">
                                <?php if ($item['status'] == 'proses') : ?>
                                    <a class="btn btn-primary shadow-lg" data-toggle="modal" data-target="#tanggapiModal<?= $item['id'] ?>">Tanggapi</a>
                                <?php elseif ($item['status'] == 'ditanggapi') : ?>
                                    <a class="btn btn-primary shadow-lg" data-toggle="modal" data-target="#selesaikanModal<?= $item['id'] ?>">Selesaikan</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>


                        <!-- Tanggapi Modal -->
                        <div class="modal fade" id="tanggapiModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tanggapi Aduan</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('pengaduan/updateTanggapan') ?>" method="post" class="user" enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <div class="form-group">
                                                <select id="tanggapanSelect<?= $item['id'] ?>" class="form-control" onchange="updateTextarea(<?= $item['id'] ?>)">
                                                    <option value="" selected disabled>Pilih Tanggapan</option>
                                                    <option value="Terima kasih sudah menghubungi kami. Kami minta maaf atas ketidaknyamanan yang kamu alami. Kami akan segera menindaklanjuti dan memastikan hal ini tidak terjadi lagi.">
                                                        Terima kasih sudah menghubungi kami. Kami minta maaf atas ...
                                                    </option>
                                                    <option value="Maaf banget atas masalah yang terjadi. Kami sedang bekerja keras untuk menyelesaikan ini secepatnya. Terima kasih sudah memberi tahu kami.">
                                                        Maaf banget atas masalah yang terjadi. Kami sedang ...
                                                    </option>
                                                    <option value="Kami benar-benar menyesal mendengar ini. Izinkan kami untuk memperbaikinya dan kami akan menghubungi kamu kembali dengan solusinya sesegera mungkin.">
                                                        Kami benar-benar menyesal mendengar ini. Izinkan kami ...
                                                    </option>
                                                    <option value="custom">Custom</option>
                                                </select>
                                                <textarea name="tanggapan" id="tanggapan<?= $item['id'] ?>" class="form-control" placeholder="Tulis Tanggapan" style="margin-top: 10px;"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="save" class="btn btn-primary btn-user">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Selesaikan Modal-->
                        <div class="modal fade" id="selesaikanModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Laporan Penyelesaian</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('pengaduan/updatePenyelesaian') ?>" method="post" class="user" enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <div class="form-group">
                                                <textarea name="penyelesaian" id="penyelesaian<?= $item['id'] ?>" class="form-control form-control-user" style="opacity: 100;"></textarea>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="img_selesai[]" accept=".jpg, .jpeg, .png" onchange="previewFile(event)" multiple>
                                                <label class="custom-file-label" for="customFile" id="customFileLabel">Pilih file gambar (Opsional)</label>
                                            </div>
                                            <div id="img-preview-container" class="mt-2"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="save" class="btn btn-primary btn-user">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#penyelesaian<?= $item['id'] ?>'))
            .then(editor => {
                console.log("CKEditor berhasil diinisialisasi:", editor);
            })
            .catch(error => {
                console.error("Ada kesalahan saat menginisialisasi CKEditor:", error);
            });
    });

    function updateTextarea(id) {
        var select = document.getElementById('tanggapanSelect' + id);
        var textarea = document.getElementById('tanggapan' + id);
        if (select.value === "custom") {
            textarea.value = "";
            textarea.readOnly = false;
        } else {
            textarea.value = select.value;
            textarea.readOnly = true;
        }
    }

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
</script>

<?= $this->endSection(); ?>