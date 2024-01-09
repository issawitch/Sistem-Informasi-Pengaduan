<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Data Pengaduan</h2>

            <!-- Form Pencarian -->
            <form action="<?= base_url('pengaduan/search') ?>" method="get" class="mb-3">
                <!-- Form pencarian -->
            </form>

            <!-- Tabel data -->
            <?php if (!empty($pengaduan)) : ?>
                <!-- Tabel data pengaduan -->
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
