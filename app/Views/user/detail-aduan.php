<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="my-4">Detail Aduan</h2>
                </div>
                <div class="card-body">
                    <?php foreach ($pengaduan as $item) : ?>
                        <div class="mb-4">
                            <p><strong>Tanggal:</strong> <?= $item['tgl']; ?></p>
                            <p><strong>Isi Laporan:</strong></p>
                            <p><?= $item['isi_laporan']; ?></p>
                            <p><strong>Foto:</strong></p>
                            <?php if (!empty($item['foto'])) : ?>
                                <img src="/img/pengaduan/<?= $item['foto']; ?>" class="img-fluid" style="width: 80%; padding-bottom: 5%;">
                            <?php else : ?>
                                <p>No Photo</p>
                            <?php endif; ?>
                            <p><strong>Tanggapan:</strong></p>
                            <?php if (!empty($item['foto'])) : ?>
                                <p><?= $item['isi_laporan']; ?></p> 
                            <?php else : ?>
                                <p>Belum ada tanggapan</p>
                            <?php endif; ?>
                            <p><strong>Status:</strong> <?= $item['status']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>