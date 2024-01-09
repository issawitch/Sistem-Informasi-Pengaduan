<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epika+Serif:wght@600&display=swap">

    <style>
        body {
            font-family: 'Epika Serif', serif;
        }

        .navbar {
            background-color: #f9fafc;
        }

        /* 
        .container {
            font-family: 'Libre Baskerville', sans-serif;
        } */

        h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <!-- E-Lapor -->
            <img src="/img/disdik-no-bg.png" style="width: 40%; margin-left: 5%;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto" style="padding-right: 15%; font-weight: 500;">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#info">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#regist">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-dark" href="<?= base_url('login') ?>"><i class="fas fa-user"></i>&nbsp; Login</a>
                </li>
            </ul>
            <style>
                .nav-item {
                    transition: transform 0.3s ease-in-out;
                }

                .nav-item:hover {
                    transform: scale(1.1);
                }
            </style>
        </div>
    </nav>

    <style>
        .scroll-navbar {
            transition: background-color 0.3s ease-in-out;
            /* Efek transisi */
        }

        /* Properti untuk navbar normal */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9);
            /* Warna background */
        }

        /* Properti untuk navbar saat di-scroll */
        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.7);
            /* Warna background saat di-scroll */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('.scroll-navbar').addClass('navbar-scrolled');
                } else {
                    $('.scroll-navbar').removeClass('navbar-scrolled');
                }
            });
        });
    </script>



    <!-- Content Section pertama -->
    <div class="content" style="background-color: #f9fafc;">
        <div class="container">
            <div class="row" style="padding: 5%; margin-top: 10%;">
                <!-- Kolom pertama (elemen pertama) -->
                <div class="col-lg-6" style="padding-top: 3%;">
                    <!-- Konten elemen pertama -->
                    <h1 style="font-size: 70px;">Halo!</h1>
                    <h4 style="line-height: 1.5;">Selamat datang di
                        <span style="color: #fff;">Sistem Informasi Pengaduan Terhadap Kekerasan, Perundungan, dan Intoleransi</span>
                        untuk Siswa SMP di Kabupaten Batang
                    </h4>
                    <style>
                        h4 span {
                            background-color: #f39c12;
                        }
                    </style>
                </div>
                <!-- Kolom kedua (gambar dan elemen SVG) -->
                <div class="col-lg-6">
                    <!-- Gambar -->
                    <img src="/img/studs.svg" style="width: 100%; height: auto; position: relative; padding-bottom: 8%; padding-left: 0%;">
                </div>
            </div>
        </div>
    </div>

    <!-- content section informasi -->
    <div class="content" style="background-color: #0d6efd; color: #fff;" id="info">
        <div class="container">
            <div class="row" style="padding: 5%;">
                <div class="col-lg-6">
                    <img src="/img/globe.svg" style="width: 100%; height: auto; position: relative; padding-bottom: 8%; padding-right: 5%;">
                </div>
                <div class="col-lg-6 align-content-lg-end" style="padding-top: 2%; padding-left: 10%;">
                    <h1 style="font-size: 43px; margin-bottom: 7%; text-align: center;">Tahukah kamu?</h1>
                    <center>
                        <h1 style="background-color: #f39c12; margin-left: 30%; margin-right: 30%; border-radius: 5%; padding-top: 3%; padding-bottom: 3%;">
                            21.241</h1>
                    </center>
                    <p style="font-size: 18px; margin-top: 5%;">Anak menjadi korban kekerasan di Indonesia pada tahun 2022 (Kementerian Pemberdayaan Perempuan dan Perlindungan Anak).</p>

                    <!-- <div class="row">
                        <div class="col-lg-4">
                            <center>
                        <h1 style="margin-top: 35%; background-color: #f39c12; border-radius: 5%;
                        ">21.241</h1>
                            </center>
                        </div>
                        <div class="col-lg-7">
                            <a style="font-size: 20px;">Anak menjadi korban kekerasan di Indonesia pada tahun 2022 (Kementerian Pemberdayaan Perempuan dan Perlindungan Anak).</a>
                        </div>
                    </div> -->
                    <h5 style="margin-top: 2%;">Berbagai kekerasan tersebut tak hanya dialami secara <span>fisik</span>,
                        tapi juga <span>psikis</span>, dan <span>seksual.</span></h5>
                    <style>
                        h5 span {
                            background-color: #f39c12;
                            color: #fff;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>

    <!-- content section informasi-->
    <div class="content" style="background-color: #f9fafc;">
        <div class="container">
            <div class="row" style="padding: 2%;">
                <!-- Kolom pertama (elemen pertama) -->
                <div class="col-lg-5" style="padding-top: 2%;">
                    <!-- Konten elemen pertama -->
                    <h1 style="font-size: 30px; padding-top: 12%;">Bagaimana jika kamu mengalami hal tersebut?</h1><br>
                    <h2 style="font-size: 18px; margin-right: 5%; text-align: justify; line-height: 1.5;">Segera lapor pada pihak sekolah (Guru BK) adalah salah satu solusinya. <br><br>Kamu juga bisa
                        melaporkan tindak kekerasan yang kamu alami di sini jika kamu merasa kurang nyaman membicarakannya secara
                        langsung karena kami akan menjaga privasimu.</h2>
                    </h2>
                </div>
                <!-- Kolom kedua (gambar dan elemen SVG) -->
                <div class="col-lg-7">
                    <!-- Gambar -->
                    <img src="/img/convo.svg" style="width: 100%; height: auto; position: relative; padding-left: 5%;">
                </div>
            </div>
        </div>
    </div>

    <!--Section -->
    <div class="content" style="color: #fff; background-color: #0d6efd; padding-top: 5%; padding-bottom: 5%;">
        <div class="container">
            <center>
                <div class="row">
                    <div class="col-lg-3">
                        <img src="/img/satu.svg" style="width: 40%;">
                        <h1>Step 1</h1>
                        <p>Buat akun dengan cara registrasi atau mendaftarkan diri kamu di sistem.</p>
                    </div>
                    <div class="col-lg-3">
                        <img src="/img/dua.svg" style="width: 40%;">
                        <h1>Step 2</h1>
                        <p>Login atau masuk ke sistem informasi pengaduan setelah berhasil mendaftar.</p>
                    </div>
                    <div class="col-lg-3">
                        <img src="/img/tiga.svg" style="width: 40%;">
                        <h1>Step 3</h1>
                        <p>Laporkan pengalaman tidak menyenangkanmu di sekolah melalui fitur pengaduan.</p>
                    </div>
                    <div class="col-lg-3">
                        <img src="/img/empat.svg" style="width: 40%;">
                        <h1>Step 4</h1>
                        <p>Laporanmu akan ditinjau dan ditanggapi untuk mencapai penyelesaian.</p>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <!-- content section registrasi -->
    <div class="content" id="regist" style="background-color: #f9fafc;">
        <div class="container">
            <div class="row" style="margin-top: 5%;">
                <div class="col-lg-6" style="margin-left: 5%;">
                    <img src="/img/birds.svg" style="width: 90%; height: auto; position: relative; padding-bottom: 8%;">
                </div>
                <div class="col-lg-4" style="padding-left: 10%; padding-top: 5%;">
                    <h1 style="margin-bottom: 5%;">Yuk, Daftar Sekarang!</h1><br>
                    <p style="font-size: 17px;">Jangan biarkan tindak kekerasan membayangimu karena kamu tidak sendirian.</p>
                    <a class="btn btn-primary btn-user btn-block" style="margin-top: 15%;" href="<?= base_url('register') ?>">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>