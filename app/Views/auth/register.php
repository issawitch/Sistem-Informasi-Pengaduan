<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="content bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
                                    </div>

                                    <?= view('Myth\Auth\Views\_message_block') ?>

                                    <form action="<?= url_to('register') ?>" method="post" class="user">
                                        <?= csrf_field() ?>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="number" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Nomor Telepon" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" class="form-control" autocomplete="off" required>
                                                <option value="" disabled selected hidden></option>
                                                <!-- KECAMATAN BATANG -->
                                                <option value="SMP Negeri 1 Batang">SMP Negeri 1 Batang</option>
                                                <option value="SMP Negeri 2 Batang">SMP Negeri 2 Batang</option>
                                                <option value="SMP Negeri 3 Batang">SMP Negeri 3 Batang</option>
                                                <option value="SMP Negeri 4 Batang">SMP Negeri 4 Batang</option>
                                                <option value="SMP Negeri 5 Batang">SMP Negeri 5 Batang</option>
                                                <option value="SMP Negeri 6 Batang">SMP Negeri 6 Batang</option>
                                                <option value="SMP Negeri 7 Batang">SMP Negeri 7 Batang</option>
                                                <option value="SMP Negeri 8 Batang">SMP Negeri 8 Batang</option>
                                                <option value="SMP Negeri 9 Batang">SMP Negeri 9 Batang</option>
                                                <option value="SMP Cokroaminoto Batang">SMP Cokroaminoto Batang</option>
                                                <option value="SMP Islam Batang">SMP Islam Batang</option>
                                                <option value="SMP IT Ar Roudloh Batang">SMP IT Ar Roudloh Batang</option>
                                                <option value="SMP Miftahul Ulum Batang">SMP Miftahul Ulum Batang</option>
                                                <!-- KECAMATAN SUBAH -->
                                                <option value="SMP Negeri 1 Subah">SMP Negeri 1 Subah</option>
                                                <option value="SMP Negeri 2 Subah">SMP Negeri 2 Subah</option>
                                                <option value="SMP Negeri 3 Subah">SMP Negeri 3 Subah</option>
                                                <option value="SMP Darma Catur">SMP Darma Catur</option>
                                                <option value="SMP Islam Subhanah">SMP Islam Subhanah</option>
                                                <option value="SMP Pondok Modern Selamat Batang">SMP Pondok Modern Selamat Batang</option>
                                                <option value="SMP Takhassus Al-Qur'an Al-Huda">SMP Takhassus Al-Qur'an Al-Huda</option>
                                                <!-- KECAMATAN BAWANG -->
                                                <option value="SMP Negeri 1 Bawang">SMP Negeri 1 Bawang</option>
                                                <option value="SMP Negeri 2 Bawang">SMP Negeri 2 Bawang</option>
                                                <option value="SMP Negeri 3 Bawang">SMP Negeri 3 Bawang</option>
                                                <option value="SMP Negeri 4 Bawang">SMP Negeri 4 Bawang</option>
                                                <option value="SMP NU 1 Bawang">SMP NU 1 Bawang</option>
                                                <!-- KECAMATAN BANDAR -->
                                                <option value="SMP Negeri 1 Bandar">SMP Negeri 1 Bandar</option>
                                                <option value="SMP Negeri 2 Bandar">SMP Negeri 2 Bandar</option>
                                                <option value="SMP Negeri 3 Bandar">SMP Negeri 3 Bandar</option>
                                                <option value="SMP Negeri 4 Bandar">SMP Negeri 4 Bandar</option>
                                                <!-- KECAMATAN GRINGSING -->
                                                <option value="SMP Negeri 1 Gringsing">SMP Negeri 1 Gringsing</option>
                                                <option value="SMP Negeri 2 Gringsing">SMP Negeri 2 Gringsing</option>
                                                <option value="SMP Negeri 3 Gringsing">SMP Negeri 3 Gringsing</option>
                                                <option value="SMP Negeri 4 Gringsing">SMP Negeri 4 Gringsing</option>
                                                <option value="SMP Al Munawir Gringsing">SMP Al Munawir Gringsing</option>
                                                <option value="SMP PGRI Gringsing">SMP PGRI Gringsing</option>
                                                <option value="SMP Pondok Modern Baitul Ihsan Gringsing">SMP Pondok Modern Baitul Ihsan Gringsing</option>
                                                <option value="SMP Pondok Modern Selamat 3 Batang">SMP Pondok Modern Selamat 3 Batang</option>
                                                <!-- KECAMATAN TERSONO -->
                                                <option value="SMP Negeri 1 Tersono">SMP Negeri 1 Tersono</option>
                                                <option value="SMP Negeri 2 Tersono">SMP Negeri 2 Tersono</option>
                                                <option value="SMP Negeri 3 Tersono">SMP Negeri 3 Tersono</option>
                                                <option value="SMP Muhammadiyah Tersono">SMP Muhammadiyah Tersono</option>
                                                <option value="SMP Takhasus Al Quran Rafirna">SMP Takhasus Al Quran Rafirna</option>
                                                <!-- KECAMATAN LIMPUNG -->
                                                <option value="SMP Negeri 1 Limpung">SMP Negeri 1 Limpung</option>
                                                <option value="SMP Negeri 2 Limpung">SMP Negeri 2 Limpung</option>
                                                <option value="SMP Negeri 3 Limpung">SMP Negeri 3 Limpung</option>
                                                <option value="SMP Muhammadiyah Boarding School">SMP Muhammadiyah Boarding School</option>
                                                <option value="SMP NU 01 Limpung">SMP NU 01 Limpung</option>
                                                <option value="SMP Takhassus Al Miftah Limpung">SMP Takhassus Al Miftah Limpung</option>
                                                <!-- KECAMATAN BLADO -->
                                                <option value="SMP Negeri 1 Blado">SMP Negeri 1 Blado</option>
                                                <option value="SMP Negeri 2 Blado">SMP Negeri 2 Blado</option>
                                                <option value="SMP Negeri 3 Blado">SMP Negeri 3 Blado</option>
                                                <option value="SMP Negeri 4 Blado">SMP Negeri 4 Blado</option>
                                                <option value="SMP Islam An Nur Blado">SMP Islam An Nur Blado</option>
                                                <!-- KECAMATAN REBAN -->
                                                <option value="SMP Negeri 1 Reban">SMP Negeri 1 Reban</option>
                                                <option value="SMP Negeri 2 Reban">SMP Negeri 2 Reban</option>
                                                <option value="SMP Negeri 3 Reban">SMP Negeri 3 Reban</option>
                                                <option value="SMP Negeri 4 Reban Satap">SMP Negeri 4 Reban Satap</option>
                                                <!-- KECAMATAN KANDEMAN -->
                                                <option value="SMP Negeri 1 Kandeman">SMP Negeri 1 Kandeman</option>
                                                <option value="SMP Negeri 2 Kandeman">SMP Negeri 2 Kandeman</option>
                                                <option value="SMP Negeri 3 Kandeman">SMP Negeri 3 Kandeman</option>
                                                <option value="SMP Al Ikhlas Kandeman">SMP Al Ikhlas Kandeman</option>
                                                <option value="SMP El-Husna Kandeman">SMP El-Husna Kandeman</option>
                                                <!-- KECAMATAN TULIS -->
                                                <option value="SMP Negeri 1 Tulis">SMP Negeri 1 Tulis</option>
                                                <option value="SMP Negeri 2 Tulis">SMP Negeri 2 Tulis</option>
                                                <!-- KECAMATAN WONOTUNGGAL -->
                                                <option value="SMP Negeri 1 Wonotunggal">SMP Negeri 1 Wonotunggal</option>
                                                <option value="SMP Negeri 2 Wonotunggal">SMP Negeri 2 Wonotunggal</option>
                                                <option value="SMP Negeri 3 Wonotunggal Satap">SMP Negeri 3 Wonotunggal Satap</option>
                                                <!-- KECAMATAN WARUNGASEM -->
                                                <option value="SMP Negeri 1 Warungasem">SMP Negeri 1 Warungasem</option>
                                                <option value="SMP Negeri 2 Warungasem">SMP Negeri 2 Warungasem</option>
                                                <option value="SMP Negeri 1 Warungasem">SMP Negeri 1 Warungasem</option>
                                                <option value="SMP Darul Ilmi">SMP Darul Ilmi</option>
                                                <!-- KECAMATAN BANYUPUTIH -->
                                                <option value="SMP Negeri 1 Banyuputih">SMP Negeri 1 Banyuputih</option>
                                                <option value="SMP Darul Ma Arif Banyuputih">SMP Darul Ma Arif Banyuputih</option>
                                                <option value="SMP Ma Arif NU Banyuputih">SMP Ma Arif NU Banyuputih</option>
                                                <!-- KECAMATAN PECALUNGAN -->
                                                <option value="SMP Negeri 1 Pecalungan">SMP Negeri 1 Pecalungan</option>
                                            </select>
                                            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

                                            <script>
                                                $(document).ready(function() {
                                                    $('#asal_sekolah').selectize({
                                                        sortField: 'text'
                                                    });
                                                });
                                            </script>

                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?= lang('Auth.register') ?>
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= url_to('login') ?>"> <?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>