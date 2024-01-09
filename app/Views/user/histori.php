<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Histori Pengaduan</h2>

            <!-- Form Pencarian -->
            <form action="<?= base_url('pengaduan/show') ?>" method="get" class="mb-3">
                <div class="mb-3 d-flex justify-content-start align-items-center">
                    <input type="text" name="keyword" class="form-control ml-auto" placeholder="Cari berdasarkan isi laporan..." style="max-width: 350px;">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary ms-2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

            <?php if (!empty($pengaduan)) : ?>
                <table id="pengaduan-table" class="table table-bordered" style="background-color: white;">
                    <thead style="text-align: center;">
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center; background-color: bg-;">
                    <?php $i = 1 + (5 * ($curpage - 1)); ?>
                        <?php foreach ($pengaduan as $item) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $item['tgl']; ?></td>
                                <td style="text-align: start;"><?= $item['isi_laporan']; ?></td>
                                <td>
                                    <?php if (!empty($item['foto'])) : ?>
                                        <img src="/img/pengaduan/<?= $item['foto']; ?>" width="50px">
                                    <?php else : ?>
                                        No Photo
                                    <?php endif; ?>
                                </td>
                                <td><?= $item['status']; ?></td>
                                <td class="justify-content-center">
                                <a class="btn btn-outline-primary" href="<?= base_url('pengaduan/detail/' . $item['id']) ?>">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <form class="form-inline">
					<?= $pager->links('histori', 'pagination') ?>
				</form>
            <?php endif; ?>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>