<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->fullname; ?></span>

                <img class="img-profile rounded-circle" style="object-fit: cover; border-radius: 50%;" src="<?= base_url('img/profil/' . user()->user_image)?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" data-toggle="modal" data-target="#passwordModal">
                    <i class="fas fa-key"></i> Ubah Password
                </a>
                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt fa-chart-area"></i> Logout
                </a>
            </div>
        </li>

        <!-- Logout Modal-->
        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= url_to('reset-password') ?>" method="post"  class="user">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <!-- <label for="password"></label> -->
                                <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" 
                                    name="password" placeholder="<?= lang('Auth.newPassword') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <label for="pass_confirm"  class="user"></label> -->
                                <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" 
                                    name="pass_confirm" placeholder="<?= lang('Auth.newPasswordRepeat') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.pass_confirm') ?>
                                </div>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary btn-user btn-block"><?= lang('Auth.resetPassword') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </ul>
</nav>
<!-- End of Topbar -->