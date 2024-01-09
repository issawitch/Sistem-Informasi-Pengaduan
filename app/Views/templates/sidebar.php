<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard')?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Disdikbud</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Dashboard-->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if (in_groups('admin')) : ?>
        <!-- Nav Item - User List -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>User List</span></a>
        </li>

        <!-- Nav Item - Data Pengaduan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('data_pengaduan')?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Aduan</span></a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - My Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profil'); ?>">
            <i class="fas fa-fw fa-user fa-chart-area"></i>
            <span>My Profile</span></a>
    </li>

    <?php if (in_groups('user')) : ?>
        <!-- Nav Item - Deteksi Dini -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('deteksi'); ?>">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Deteksi Dini</span></a>
        </li>

        <!-- Nav Item - Buat Pengaduan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('form_aduan'); ?>">
                <i class="fas fa-fw fa-plus fa-chart-area"></i>
                <span>Buat Pengaduan</span></a>
        </li>

        <!-- Nav Item - Histori Pengaduan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('histori'); ?>">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Histori Pengaduan</span></a>
        </li>
    <?php endif; ?>

    <?php if (in_groups('guru')) : ?>

        <!-- Nav Item - Data Pengaduan -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('data_aduan'); ?>">
                <i class="fas fa-fw fa-plus fa-chart-area"></i>
                <span>Data Pengaduan</span></a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt fa-chart-area"></i>
            <span>Logout</span></a>
    </li>

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

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    
</ul>
<!-- End of Sidebar -->
