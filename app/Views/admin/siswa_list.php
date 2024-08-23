<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Data Siswa</h2>

            <?php
            // Load SekolahModel sekali saja
            $sekolahModel = new \App\Models\SekolahModel();
            // Ambil semua data sekolah
            $allSekolahData = $sekolahModel->findAll();

            // Index data sekolah berdasarkan id
            $indexedSekolahData = [];
            foreach ($allSekolahData as $sekolah) {
                $indexedSekolahData[$sekolah['id']] = $sekolah;
            }

            // Remove duplicates from siswaList
            $uniqueSiswaList = array_map("unserialize", array_unique(array_map("serialize", $siswaList)));
            ?>

            <?php if (!empty($uniqueSiswaList)) : ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th>#</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telp</th>
                                        <th>Asal Sekolah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center; background-color: bg-;">
                                    <?php
                                    $i = 1;
                                    foreach ($uniqueSiswaList as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td style="text-align: start;"><?= $item['nisn']; ?></td>
                                            <td style="text-align: start;"><?= $item['fullname']; ?></td>
                                            <td style="text-align: start;"><?= $item['email']; ?></td>
                                            <td style="text-align: start;"><?= $item['no_telp']; ?></td>
                                            <td>
                                                <?php
                                                // Check if school data is found
                                                if (isset($indexedSekolahData[$item['id_sekolah']])) {
                                                    // Display the school name
                                                    echo $indexedSekolahData[$item['id_sekolah']]['nama'];
                                                } else {
                                                    // Handle if school data is not found
                                                    echo "Data Sekolah Tidak Ditemukan";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <select name="status" class="form-control status-select" data-id="<?= $item['id']; ?>" data-initial-status="<?= $item['status']; ?>">
                                                    <option value="aktif" <?= ($item['status'] === 'aktif') ? 'selected disabled' : ''; ?>>Aktif</option>
                                                    <option value="nonaktif" <?= ($item['status'] === 'nonaktif') ? 'selected disabled' : ''; ?>>Nonaktif</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <p>Tidak ada data yang ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Activeness Modal -->
<div class="modal fade" id="aktifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status Siswa</h5>
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
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Script untuk menangani modal dan form submission
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelects = document.querySelectorAll('.status-select');
        let initialStatus = {};

        statusSelects.forEach(select => {
            select.addEventListener('change', function() {
                const selectedId = this.getAttribute('data-id');
                const selectedStatus = this.value;

                // Store initial status
                initialStatus[selectedId] = this.getAttribute('data-initial-status');

                // Update input hidden di dalam modal
                document.getElementById('user_id').value = selectedId;
                document.getElementById('modal_status').value = selectedStatus;
                document.getElementById('modal-body-text').textContent = `Apakah Anda yakin ingin mengubah status siswa ini menjadi ${selectedStatus}?`;

                // Tampilkan modal
                $('#aktifModal').modal('show');
            });
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

        // Handle form submission dari modal
        document.getElementById('updateStatusForm').addEventListener('submit', function(event) {
            // Form will automatically submit according to the action defined
            // You can add Ajax handling here if needed
        });
    });
</script>

<?= $this->endSection(); ?>
