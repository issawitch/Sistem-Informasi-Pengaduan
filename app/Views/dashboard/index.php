<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<!-- Dashboard Admin -->
<?php if (in_groups('admin')) : ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <!-- Content Row -->
        <div class="row">
            <?php
            // Membuat instance dari model PengaduanModel
            $pengaduanModel = new \App\Models\PengaduanModel();

            // Mengambil jumlah pengaduan selesai
            $jumlah_selesai = $pengaduanModel->where('status', 'selesai')->countAllResults();

            // Mengambil jumlah pengaduan yang belum selesai
            $jumlah_belum_selesai = $pengaduanModel->where('status', 'proses')->orWhere('status', 'ditanggapi')->countAllResults();

            // Mengambil data pengaduan berdasarkan sekolah untuk tahun ini
            $currentYear = date('Y');
            $db = \Config\Database::connect();
            $builder = $db->table('tb_pengaduan'); // Menggunakan tabel yang benar
            $builder->select('tb_sekolah.nama as sekolah, COUNT(tb_pengaduan.id) as jumlah');
            $builder->join('tb_sekolah', 'tb_sekolah.id = tb_pengaduan.id_sekolah'); // Menggunakan kolom yang benar untuk join
            $builder->where('YEAR(tb_pengaduan.tgl)', $currentYear); // Menambahkan kondisi untuk tahun ini
            $builder->groupBy('tb_sekolah.nama');
            $pengaduan_per_sekolah = $builder->get()->getResultArray();

            // Mengambil data pengaduan per bulan untuk tahun ini
            $builder->select('MONTH(tgl) as bulan, COUNT(id) as jumlah');
            $builder->where('YEAR(tgl)', $currentYear);
            $builder->groupBy('MONTH(tgl)');
            $pengaduan_per_bulan = $builder->get()->getResultArray();

            // Menyiapkan data untuk chart
            $labels = [];
            $data = [];
            foreach ($pengaduan_per_sekolah as $pengaduan) {
                $labels[] = $pengaduan['sekolah'];
                $data[] = $pengaduan['jumlah'];
            }

            // Menyiapkan data untuk chart area
            $bulan = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            $data_bulan = array_fill(0, 12, 0);
            foreach ($pengaduan_per_bulan as $pengaduan) {
                $data_bulan[$pengaduan['bulan'] - 1] = $pengaduan['jumlah'];
            }

            // Mengambil data pengaduan berdasarkan jenis dan tahun
            $currentYear = date('Y');  // Mendapatkan tahun saat ini
            $builder->select('jenis, COUNT(id) as jumlah');
            $builder->where('YEAR(tgl)', $currentYear); // Menambahkan filter untuk tahun
            $builder->groupBy('jenis');
            $pengaduan_per_jenis = $builder->get()->getResultArray();

            // Menyiapkan data untuk chart bar
            $jenis_labels = [];
            $jenis_data = [];

            // Mengisi data untuk chart bar
            foreach ($pengaduan_per_jenis as $pengaduan) {
                $jenis_labels[] = $pengaduan['jenis'];  // Menyimpan nama jenis pengaduan
                $jenis_data[] = $pengaduan['jumlah'];   // Menyimpan jumlah pengaduan per jenis
            }

            // Jika tidak ada data pengaduan, pastikan $jenis_labels dan $jenis_data memiliki setidaknya satu elemen kosong
            if (empty($jenis_labels)) {
                $jenis_labels = ['Tidak Ada Data'];
                $jenis_data = [0];
            }


            ?>
            <!-- Jumlah Pengaduan -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Pengaduan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_selesai + $jumlah_belum_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-copy fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Selesai -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-success shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pengaduan Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-check fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Belum Selesai -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-danger shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Pengaduan Belum Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_belum_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-half fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Donut chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengaduan Per Sekolah</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <hr>
                        Ukuran setiap segmen menunjukkan jumlah pengaduan dari sekolah tersebut di tahun <?= date('Y'); ?>.
                    </div>
                </div>
            </div>
            <script>
                var labels = <?php echo json_encode($labels); ?>;
                var data = <?php echo json_encode($data); ?>;
            </script>

            <!-- Bar chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengaduan Berdasarkan Jenis</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <hr>
                        Data pengaduan berdasarkan jenis di tahun <?= date('Y'); ?>.
                    </div>
                </div>
            </div>
            <script>
                var jenisLabels = <?php echo json_encode($jenis_labels); ?>;
                var jenisData = <?php echo json_encode($jenis_data); ?>;
            </script>
        </div>

        <!-- Area chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Bulanan Data Aduan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                    Data pengaduan tahun <?= date('Y'); ?>.
                </div>
            </div>
        </div>
        <script>
            var dataBulan = <?php echo json_encode($data_bulan); ?>;
        </script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-bar-demo.js"></script>
    </div>
<?php endif; ?>


<!-- Dashboard User -->
<?php if (in_groups('user')) : ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <!-- Content Row -->
        <div class="row">
            <?php
            // Mendapatkan nisn user yang sedang login
            $nisn = user()->nisn;

            // Membuat instance dari model PengaduanModel
            $pengaduanModel = new \App\Models\PengaduanModel();

            // Mengambil jumlah pengaduan selesai sesuai dengan nisn user yang sedang login
            $jumlah_selesai = $pengaduanModel->where('status', 'selesai')->where('nisn', $nisn)->countAllResults();

            // Mengambil jumlah pengaduan yang belum selesai sesuai dengan nisn user yang sedang login
            $jumlah_belum_selesai = $pengaduanModel->whereIn('status', ['proses', 'ditanggapi'])->where('nisn', $nisn)->countAllResults();
            ?>
            <!-- Jumlah Pengaduan -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Pengaduan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_selesai + $jumlah_belum_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-copy fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Selesai -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-success shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pengaduan Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-check fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Belum Selesai -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-danger shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Pengaduan Belum Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_belum_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-half fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- Dashboard Guru -->
<?php if (in_groups('guru')) : ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <!-- Content Row -->
        <div class="row">
            <?php
            // Mendapatkan id_sekolah user yang sedang login
            $id_sekolah = user()->id_sekolah;

            // Membuat instance dari model PengaduanModel
            $pengaduanModel = new \App\Models\PengaduanModel();

            // Mengambil jumlah pengaduan selesai sesuai dengan id_sekolah user yang sedang login
            $jumlah_selesai = $pengaduanModel->where('status', 'selesai')->where('id_sekolah', $id_sekolah)->countAllResults();

            // Mengambil jumlah pengaduan yang belum selesai sesuai dengan id_sekolah user yang sedang login
            $jumlah_belum_selesai = $pengaduanModel->whereIn('status', ['proses', 'ditanggapi'])->where('id_sekolah', $id_sekolah)->countAllResults();
            ?>
            <!-- Jumlah Pengaduan -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Pengaduan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_selesai + $jumlah_belum_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-copy fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Selesai -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-success shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pengaduan Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-check fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan Belum Selesai -->
            <div class="col-md-4 mb-3">
                <div class="card border-left-danger shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Pengaduan Belum Selesai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $jumlah_belum_selesai; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-half fa-3x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- News Section -->
<?php
// Membuat instance dari model NewsModel
$newsModel = new \App\Models\NewsModel();

// Mengambil data berita dari model
$news = $newsModel->findAll();
?>

<div class="container" style="margin-top: 20px;">
    <?php
    // Pastikan array berita tidak kosong
    if ($news) :
        // Urutkan array berita berdasarkan tanggal secara terbalik
        usort($news, function ($a, $b) {
            return strtotime($b['tgl']) - strtotime($a['tgl']);
        });
    ?>

        <h3 class="h3 mb-4 text-gray-800">News</h3>
        <div class="row">
            <?php $count = 0; ?>
            <?php foreach ($news as $item) : ?>
                <?php if ($count % 2 == 0) : ?>
        </div>
        <div class="row no-gutters align-items-center">
        <?php endif; ?>
        <div class="col-md-6 mb-3" style="padding: 0px 20px 0px 20px;">
            <div class="card shadow-sm">
                <div class="card-body">
                    <!-- Menampilkan judul -->
                    <h5 class="card-title" style="font-weight: 600; font-size: 20px;"><?= $item['title'] ?></h5>
                    <!-- Menampilkan tanggal dalam format dd-mm-yyyy h:m -->
                    <p class="card-text" style="font-size: 12px;"><?= date('d-m-Y H:i', strtotime($item['tgl'])) ?></p>
                    <!-- Menampilkan cuplikan isi berita (50 karakter) -->
                    <p class="card-text" style="font-size: 15px;"><?= substr($item['body'], 0, 50) . '...' ?></p>
                    <!-- Link to the detail page -->
                    <a href="<?= base_url('news/detail/' . $item['id']) ?>">Load More</a>
                </div>
            </div>
        </div>
        <?php
                // Tingkatkan hitungan
                $count++;
                // Berhenti loop jika sudah mencapai 10 data
                if ($count >= 10) break;
        ?>
    <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Tidak ada berita yang ditemukan.</p>
    <?php endif; ?>
</div>








<?= $this->endSection(); ?>