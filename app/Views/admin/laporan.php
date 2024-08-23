<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Cetak Laporan Periode</h1>
                                </div>

                                <form id="formViewLaporan" class="user" method="post">
                                    <?= csrf_field() ?>
                                    <div class="row item-center">
                                        <div class="col-md-8">
                                            <!-- Sekolah Dropdown -->
                                            <div class="form-group">
                                                <label for="id_sekolah">Sekolah</label>
                                                <select name="id_sekolah" id="id_sekolah" class="form-control" autocomplete="off">
                                                    <option value="" disabled selected hidden>Pilih Sekolah</option>
                                                    <?php foreach ($schools as $school) : ?>
                                                        <?php if ($school['status'] == 'aktif') : ?>
                                                            <option value="<?= $school['id'] ?>"><?= $school['nama'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                
                                            </div>
                                            <!-- Tanggal Awal Input -->
                                            <div class="form-group">
                                                <label for="tgl_awal">Tanggal Awal</label>
                                                <input type="date" name="tgl_awal" id="tgl_awal" class="form-control form-control-user" required>
                                            </div>
                                            <!-- Tanggal Akhir Input -->
                                            <div class="form-group">
                                                <label for="tgl_akhir">Tanggal Akhir</label>
                                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control form-control-user" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tombol Preview dan Cetak -->
                                    <span>
                                        <button id="viewLaporan" class="btn btn-user btn-info"><i class="fa fa-file"></i> Preview Laporan</button>
                                        <button id="cetakLaporan" class="btn btn-user btn-primary"><i class="fa fa-print"></i> Cetak Laporan</button>
                                    </span>
                                </form>
                                <!-- Hasil Laporan Tabel -->
                                <div id="laporanResult" class="mt-4 table-responsive"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Memproses Input dan Menampilkan Laporan -->
<script>
    document.getElementById('viewLaporan').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah submit form default
        const form = document.getElementById('formViewLaporan');
        const formData = new FormData(form);

        // Ambil nilai id_sekolah, tgl_awal, dan tgl_akhir dari form
        const selectedSchool = document.getElementById('id_sekolah').value;
        const startDate = document.getElementById('tgl_awal').value;
        const endDate = document.getElementById('tgl_akhir').value;

        // Tambahkan nilai id_sekolah, tgl_awal, dan tgl_akhir ke dalam FormData
        formData.append('id_sekolah', selectedSchool);
        formData.append('tgl_awal', startDate);
        formData.append('tgl_akhir', endDate);

        fetch('<?= base_url('pengaduan/by-date'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const baseUrl = '<?= base_url('/img/pengaduan/'); ?>';
                const schools = <?= json_encode($schools); ?>;
                let table = '<table class="table table-bordered">';
                table += '<thead><tr><th>No</th><th>NISN</th><th>Nama</th><th>Sekolah</th><th>Jenis</th><th>Tanggal Kejadian</th><th>Lokasi</th><th>Isi Laporan</th><th>Foto</th><th>Status</th><th>Tanggapan</th><th>Penyelesaian</th></tr></thead><tbody>';
                let i = 1;
                data.forEach(pengaduan => {
                    // Filter berdasarkan id_sekolah jika ada pilihan sekolah
                    const schoolName = schools.find(school => school.id === pengaduan.id_sekolah)?.nama || 'Tidak Diketahui';
                    if (!selectedSchool || pengaduan.id_sekolah == selectedSchool) {
                        let fotoHtml = 'Tidak ada foto';
                        if (pengaduan.foto) {
                            const images = pengaduan.foto.split(',');
                            if (images.length > 0) {
                                fotoHtml = `<img src="${baseUrl}${images[0]}" alt="Foto Pengaduan" style="width: 100px; height: auto;">`;
                            }
                        }
                        const tglKejadian = pengaduan.tgl_kejadian ? pengaduan.tgl_kejadian : '';
                        table += `<tr>
                            <td>${i++}</td>
                            <td>${pengaduan.nisn}</td>
                            <td>${pengaduan.fullname}</td>
                            <td>${schoolName}</td>
                            <td>${pengaduan.jenis}</td>
                            <td>${tglKejadian}</td>
                            <td>${pengaduan.lokasi}</td>
                            <td>${pengaduan.isi_laporan}</td>
                            <td>${fotoHtml}</td>
                            <td>${pengaduan.status}</td>
                            <td>${pengaduan.tanggapan}</td>
                            <td>${pengaduan.penyelesaian}</td>
                        </tr>`;
                    }
                });
                table += '</tbody></table>';
                document.getElementById('laporanResult').innerHTML = table;
            })
            .catch(error => console.error('Error:', error));
    });

    // Mencegah form submission saat tombol Preview Laporan diklik
    document.getElementById('formViewLaporan').addEventListener('submit', function(event) {
        if (event.submitter && event.submitter.id === 'viewLaporan') {
            event.preventDefault();
        }
    });

    // Fungsi untuk mencetak laporan
    document.getElementById('cetakLaporan').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah default action dari tombol cetak

        // Dapatkan isi HTML dari laporanResult
        const laporanResult = document.getElementById('laporanResult').innerHTML;

        // Buka jendela baru dan tambahkan isi HTML laporan untuk mencetak
        const printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Cetak Laporan</title>');
        printWindow.document.write('<style>@media print { table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #ddd; padding: 8px; } th { background-color: #f2f2f2; }}</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h1>Laporan Pengaduan</h1>');
        printWindow.document.write(laporanResult);
        printWindow.document.write('</body></html>');

        // Munculkan jendela baru untuk menampilkan Print Dialog Box
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        // Jika ingin menutup jendela setelah mencetak, hapus komentar di baris berikut
        // printWindow.close();
    });
</script>


<?= $this->endSection(); ?>
