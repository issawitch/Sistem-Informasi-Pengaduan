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
                                            <div class="form-group">
                                                <label for="tgl_awal">Tanggal Awal</label>
                                                <input type="date" name="tgl_awal" id="tgl_awal" class="form-control form-control-user" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_akhir">Tanggal Akhir</label>
                                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control form-control-user" required>
                                            </div>
                                        </div>
                                    </div>
                                    <span>
                                        <button id="viewLaporan" class="btn btn-user btn-info"><i class="fa fa-file"></i> Preview Laporan</button>
                                        <button id="cetakLaporan" class="btn btn-user btn-primary"><i class="fa fa-print"></i> Cetak Laporan</button>
                                    </span>
                                </form>
                                <div id="laporanResult" class="mt-4 table-responsive"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('viewLaporan').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah submit form default
        const form = document.getElementById('formViewLaporan');
        const formData = new FormData(form);

        // Dapatkan id sekolah guru
        const idSekolahGuru = '<?= user()->id_sekolah; ?>'; // Ganti dengan cara Anda untuk mendapatkan id sekolah guru
        
        // Tambahkan id sekolah guru ke dalam formData
        formData.append('id_sekolah', idSekolahGuru);

        fetch('<?= base_url('pengaduan/by-date'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const baseUrl = '<?= base_url('/img/pengaduan/'); ?>';
                let table = '<table class="table table-bordered">';
                table += '<thead><tr><th>No</th><th>NISN</th><th>Nama</th><th>Jenis</th><th>Tanggal Kejadian</th><th>Lokasi</th><th>Isi Laporan</th><th>Foto</th><th>Status</th><th>Tanggapan</th><th>Penyelesaian</th></tr></thead><tbody>';
                let i = 1;
                data.forEach(pengaduan => {
                    if (pengaduan.id_sekolah == idSekolahGuru) {
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

    // Prevent form submission when View Laporan button is clicked
    document.getElementById('formViewLaporan').addEventListener('submit', function(event) {
        if (event.submitter && event.submitter.id === 'viewLaporan') {
            event.preventDefault();
        }
    });

    document.getElementById('cetakLaporan').addEventListener('click', function(event) {
    // Mencegah default action dari tombol cetak
    event.preventDefault();

    // Dapatkan isi HTML dari laporanResult
    const laporanResult = document.getElementById('laporanResult').innerHTML;

    // Dapatkan nilai tanggal awal dan tanggal akhir
    const tglAwal = document.getElementById('tgl_awal').value;
    const tglAkhir = document.getElementById('tgl_akhir').value;

    // Fungsi untuk memformat tanggal
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }

    // Format tanggal
    const formattedTglAwal = formatDate(tglAwal);
    const formattedTglAkhir = formatDate(tglAkhir);

    // Buka jendela baru dan tambahkan isi HTML laporan
    const printWindow = window.open('', '_blank');

    // Tambahkan CSS untuk mencetak
    printWindow.document.write('<html><head><title>Cetak Laporan</title>');
    printWindow.document.write('<style>@media print { table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #ddd; padding: 8px; } th { background-color: #f2f2f2; }}</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write(`<h1>Laporan Pengaduan ${formattedTglAwal} s.d. ${formattedTglAkhir}</h1>`);
    printWindow.document.write(laporanResult);
    printWindow.document.write('</body></html>');

    // Munculkan dialog cetak
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    // Jangan tutup jendela setelah mencetak
    // printWindow.close();
});

</script>

<?= $this->endSection(); ?>
