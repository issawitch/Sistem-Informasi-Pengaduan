<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Data Sekolah</h2>

            <!-- Button Tambah -->
            <div class="mb-3 d-flex justify-content-start align-items-center">
                <button type="button" id="submitBtn" class="btn btn-primary ms-5" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i>&nbsp; Tambah
                </button>
            </div>
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($sekolah)) : ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Sekolah</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center; background-color: bg-;">
                                    <?php $i = 1; ?>
                                    <?php foreach ($sekolah as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td style="text-align: start;"><?= $item['id']; ?></td>
                                            <td style="text-align: start;"><?= $item['nama']; ?></td>
                                            <td style="text-align: start;"><?= $item['alamat']; ?></td>
                                            <td style="text-align: start;"><?= $item['email']; ?></td>
                                            <td>
                                                <?php
                                                $status = $item['status'];
                                                $badgeClass = '';
                                                $badgeText = '';
                                                $badgeIcon = '';

                                                // Tentukan kelas badge, teks, dan ikon berdasarkan status
                                                if ($status == 'nonaktif') {
                                                    $badgeClass = 'badge-danger';
                                                    $badgeText = 'Nonaktif';
                                                } elseif ($status == 'aktif') {
                                                    $badgeClass = 'badge-success';
                                                    $badgeText = 'Aktif';
                                                }
                                                ?>

                                                <span class="badge badge-pill <?= $badgeClass; ?>">
                                                    <?= $badgeIcon; ?> <?= $badgeText; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-primary ms-2" data-toggle="modal" data-target="#editModal<?= $item['id'] ?>"><i class="fa fa-pen"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal-->
                                        <div class="modal fade" id="editModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Sekolah</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="admin/update_sekolah" method="post" class="user" enctype="multipart/form-data">
                                                            <?= csrf_field() ?>
                                                            <div class="form-group">
                                                                <input type="text" name="id" id="id<?= $item['id'] ?>" class="form-control form-control-user" placeholder="ID Sekolah" readonly value="<?= $item['id'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="nama" id="nama<?= $item['id'] ?>" class="form-control form-control-user" placeholder="Nama Sekolah" value="<?= $item['nama'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="alamat" id="alamat<?= $item['id'] ?>" class="form-control form-control-user" placeholder="Alamat Sekolah" value="<?= $item['alamat'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" name="email" id="email<?= $item['id'] ?>" class="form-control form-control-user" placeholder="Email Sekolah" value="<?= $item['email'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status">Status Sekolah</label>
                                                                <select class="form-control" id="status" name="status">
                                                                    <option value="aktif" <?= ($item['status'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                                                                    <option value="nonaktif" <?= ($item['status'] == 'nonaktif') ? 'selected' : ''; ?>>Nonaktif</option>
                                                                </select>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sekolah</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="admin/add_sekolah" method="post" class="user" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group">
                                    <input type="text" name="id" id="id" class="form-control form-control-user" placeholder="ID Sekolah" required uniqid>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama" id="nama" class="form-control form-control-user" placeholder="Nama Sekolah" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="alamat" id="alamat" class="form-control form-control-user" placeholder="Alamat Sekolah" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control form-control-user" placeholder="Email Sekolah" required>
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

        </div>
    </div>
</div>

<?= $this->endSection(); ?>