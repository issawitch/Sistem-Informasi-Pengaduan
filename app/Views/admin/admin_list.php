<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Data Admin</h2>

            <!-- Button Tambah -->
            <div class="mb-3 d-flex justify-content-start align-items-center">
                <a type="button" class="btn btn-primary ms-5" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i>&nbsp; Tambah
                </a>
            </div>
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>

            <?php
            // Remove duplicates from List
            $uniqueAdminList = array_map("unserialize", array_unique(array_map("serialize", $adminList)));

            ?>

            <?php if (!empty($uniqueAdminList)) : ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>#</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telp</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center; background-color: bg-;">
                                    <?php $i = 1; ?>
                                    <?php foreach ($uniqueAdminList as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td style="text-align: start;"><?= $item['nip']; ?></td>
                                            <td style="text-align: start;"><?= $item['fullname']; ?></td>
                                            <td style="text-align: start;"><?= $item['email']; ?></td>
                                            <td style="text-align: start;"><?= $item['no_telp']; ?></td>
                                            <td>
                                                <select name="status" class="form-control status-select" data-id="<?= $item['id']; ?>">
                                                    <option value="aktif" <?= ($item['status'] === 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                                                    <option value="nonaktif" <?= ($item['status'] === 'nonaktif') ? 'selected' : ''; ?>>Nonaktif</option>
                                                </select>
                                            </td>
                                        </tr>


                                        <!-- Activeness Modal -->
                                        <div class="modal fade" id="aktifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Admin</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form id="updateStatusForm" action="<?= base_url('/admin/updateStatus'); ?>" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="user_id" id="user_id">
                                                            <input type="hidden" name="status" id="modal_status">
                                                            <div id="modal-body-text"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" type="submit" id="confirmButton">Simpan</button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?= view('Myth\Auth\Views\_message_block') ?>
                            <form action="<?= url_to('register') ?>" method="post" class="user">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user <?php if (session('errors.nip')) : ?>is-invalid<?php endif ?>" name="nip" placeholder="NIP" value="<?= old('nip') ?>" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="Nama Lengkap" value="<?= old('fullname') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user <?php if (session('errors.no_telp')) : ?>is-invalid<?php endif ?>" id="no_telp" name="no_telp" placeholder="Nomor Telepon" value="<?= old('no_telp') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Script untuk menangani modal dan form submission
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelects = document.querySelectorAll('.status-select');
        let initialStatus = {};

        statusSelects.forEach(select => {
            // Simpan status awal saat halaman dimuat
            initialStatus[select.getAttribute('data-id')] = select.value;

            select.addEventListener('change', function() {
                const selectedId = this.getAttribute('data-id');
                const selectedStatus = this.value;

                // Periksa apakah opsi yang dipilih saat ini sama dengan status awal
                if (selectedStatus !== initialStatus[selectedId]) {
                    // Update input hidden di dalam modal
                    document.getElementById('user_id').value = selectedId;
                    document.getElementById('modal_status').value = selectedStatus;
                    document.getElementById('modal-body-text').textContent = `Apakah Anda yakin ingin mengubah status pengguna ini menjadi ${selectedStatus}?`;

                    // Tampilkan modal
                    $('#aktifModal').modal('show');
                }
            });
        });

        // Handle form submission dari modal
        document.getElementById('confirmButton').addEventListener('click', function() {
            // Form akan secara otomatis submit sesuai dengan action yang telah ditentukan
            // Anda bisa tambahkan handling Ajax di sini jika diperlukan
            document.getElementById('updateStatusForm').submit();
        });

        $('#aktifModal').on('hide.bs.modal', function () {
            // Get the hidden input values
            const userId = document.getElementById('user_id').value;

            if (userId && initialStatus[userId]) {
                const statusSelect = document.querySelector(`.status-select[data-id="${userId}"]`);
                if (statusSelect) {
                    // Revert to initial status
                    statusSelect.value = initialStatus[userId];
                }
            }
        });
    });
</script>


<?= $this->endSection(); ?>