<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Data Pengaduan</h2>


            <?php if (!empty($pengaduan)) : ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                       <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Asal Sekolah</th>
                                        <th>Isi Laporan</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center; background-color: bg-;">
                                    <?php $i = 1; ?>
                                    <?php foreach ($pengaduan as $item) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $item['tgl']; ?></td>
                                            <td><?= $item['nisn']; ?></td>
                                            <td><?= $item['fullname']; ?></td>
                                            <td>
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
                                                ?>
                                            </td>

                                            <td style="text-align: start;">
                                                <p>
                                                    <?= substr(strip_tags($item['isi_laporan']), 0, 30); ?>
                                                    <?php if (strlen($item['isi_laporan']) > 30) : ?>
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
                                            <td>
                                                <?php
                                                $status = $item['status'];
                                                $badgeClass = '';
                                                $badgeText = '';
                                                $badgeIcon = '';

                                                // Tentukan kelas badge, teks, dan ikon berdasarkan status
                                                if ($status == 'proses') {
                                                    $badgeClass = 'badge-danger';
                                                    $badgeText = 'Proses';
                                                    $badgeIcon = '<i class="fas fa-hourglass-half"></i>';
                                                } elseif ($status == 'ditanggapi') {
                                                    $badgeClass = 'badge-warning';
                                                    $badgeText = 'Ditanggapi';
                                                    $badgeIcon = '<i class="fas fa-exclamation-circle"></i>';
                                                } elseif ($status == 'selesai') {
                                                    $badgeClass = 'badge-success';
                                                    $badgeText = 'Selesai';
                                                    $badgeIcon = '<i class="fas fa-check-circle"></i>';
                                                } else {
                                                    $badgeClass = 'badge-secondary';
                                                    $badgeText = 'Status Tidak Valid';
                                                    $badgeIcon = '<i class="fas fa-question-circle"></i>';
                                                }
                                                ?>

                                                <span class="badge badge-pill <?= $badgeClass; ?>">
                                                    <?= $badgeIcon; ?> <?= $badgeText; ?>
                                                </span>
                                            </td>
                                            <td class="justify-content-center">
                                                <a class="btn btn-outline-primary" href="<?= base_url('pengaduan/detail/' . $item['id']) ?>">Detail</a>
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

<?= $this->endSection(); ?>
