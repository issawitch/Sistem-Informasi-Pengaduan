// Ambil elemen canvas dari HTML menggunakan ID
const ctx = document.getElementById('myPieChart').getContext('2d');

// Data yang akan ditampilkan di dalam chart
const data = {
    labels: ['Sains', 'Seni', 'Bahasa', 'Matematika'], // Label untuk setiap bagian pie
    datasets: [{
        label: 'Persentase Mata Pelajaran', // Label dataset (opsional)
        data: [30, 20, 25, 25], // Data persentase untuk setiap bagian pie
        backgroundColor: [
            'rgba(255, 99, 132, 0.8)',   // Warna untuk bagian pertama
            'rgba(54, 162, 235, 0.8)',   // Warna untuk bagian kedua
            'rgba(255, 205, 86, 0.8)',   // Warna untuk bagian ketiga
            'rgba(75, 192, 192, 0.8)'    // Warna untuk bagian keempat
        ],
        borderWidth: 1 // Lebar border (opsional)
    }]
};

// Konfigurasi chart pie
const config = {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top', // Posisi legenda (top, bottom, left, right)
            }
        }
    },
};

// Buat dan tampilkan chart pie menggunakan Chart.js
const myPieChart = new Chart(ctx, config);
