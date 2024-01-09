<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">My Profile</h1>

                                    <!-- User Image -->
                                    <img src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" class="img-fluid rounded-circle mb-4" style="width: 50%;">

                                    <!-- User Information -->
                                    <div class="row text-left text-gray-900">
                                        <div class="col-md-6">
                                            <form>
                                                <div class="form-group">
                                                    <label for="fullName">Nama Lengkap:</label>
                                                    <input type="text" class="form-control" id="fullName" value="<?= user()->fullname; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email" value="<?= user()->email; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Username:</label>
                                                    <input type="text" class="form-control" id="username" value="<?= user()->username; ?>" readonly>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form>
                                                <div class="form-group">
                                                    <label for="nisn">NISN:</label>
                                                    <input type="text" class="form-control" id="nisn" value="<?= user()->nisn; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="school">Asal Sekolah:</label>
                                                    <input type="text" class="form-control" id="school" value="<?= user()->asal_sekolah; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">No. Telepon:</label>
                                                    <input type="text" class="form-control" id="phone" value="<?= user()->no_telp; ?>" readonly>
                                                </div>
                                            </form><hr>
                                        </div>
                                        <button type="button" id="submitBtn" class="btn btn-primary btn-user btn-block">
                                        Update Profil
                                    </button>
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
<?= $this->endSection(); ?>