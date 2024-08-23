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
                                                    <input type="text" class="form-control form-control-user <?php if (session('errors.nisn')) : ?>is-invalid<?php endif ?>" name="nisn" placeholder="Nomor Induk Siswa Nasional" value="<?= old('nisn') ?>" required>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="Nama Lengkap" value="<?= old('fullname') ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="form-text text-muted">Tanggal Lahir</small>
                                                <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ?>" required>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="number" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Nomor Telepon" value="<?= old('no_telp') ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <select name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" class="form-control" autocomplete="off" required>
                                                    <option value="" disabled selected hidden></option>
                                                    <?php foreach ($schools as $school) : ?>
                                                        <?php if ($school['status'] == 'aktif') : ?>
                                                            <option value="<?= $school['id'] ?>"><?= $school['nama'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
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