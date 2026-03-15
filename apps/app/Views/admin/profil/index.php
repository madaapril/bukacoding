<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 text-dark fw-bold">Profil Akun</h4>
        <p class="text-muted mb-0 small">Kelola informasi pribadi dan kata sandi Anda</p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form action="<?= base_url('admin/profil/simpan'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <!-- Avatar section -->
                    <!-- <div class="d-flex align-items-center mb-4 pb-2">
                        <img src="https://ui-avatars.com/api/?name=User&background=56a7fe&color=fff&size=80" alt="Profile" class="rounded-circle shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="ms-4">
                            <h5 class="fw-bold mb-1 text-dark">Foto Profil</h5>
                            <p class="text-muted small mb-0">Foto profil saat ini dihasilkan otomatis dari inisial nama.</p>
                        </div>
                    </div> -->

                    <!-- <hr class="text-muted mb-4 opacity-25"> -->

                    <h5 class="fw-bold mb-4 text-dark fs-6 text-uppercase" style="letter-spacing: 0.05em; color: var(--color-gray-500) !important;">Informasi Dasar</h5>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-medium text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="name" name="name" value="<?= session()->get('name'); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label for="hp" class="form-label fw-medium text-dark">Nomor HP</label>
                        <input type="text" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="hp" name="hp" value="<?= session()->get('hp'); ?>" required>
                    </div>

                    <div class="mb-5">
                        <label for="email" class="form-label fw-medium text-dark">Alamat Email</label>
                        <p><?= session()->get('email'); ?></p>
                        <!-- <input type="email" class="form-control border-0 py-2 px-3 rounded-3 text-muted" id="email" name="email" value="<?= session()->get('email'); ?>" readonly style="cursor: not-allowed; background-color: #e9ecef !important;"> -->
                    </div>

                    <hr class="text-muted mb-4 opacity-25">

                    <h5 class="fw-bold mb-4 text-dark fs-6 text-uppercase" style="letter-spacing: 0.05em; color: var(--color-gray-500) !important;">Keamanan</h5>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-medium text-dark">Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control bg-light border-0 py-2 px-3 rounded-start-3" id="password" name="password" placeholder="">
                            <button class="btn btn-light border-0 text-muted rounded-end-3 pe-3" type="button" id="togglePassword" style="background-color: #f8f9fa;">
                                <i class="ri-eye-off-line"></i>
                            </button>
                        </div>
                        <div class="small mt-2">Biarkan kosong jika tidak ada perubahan password.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-5 pt-2">
                        <button type="submit" class="btn btn-primary-custom btn-sm text-white rounded-pill px-3 py-2 fw-medium shadow-sm d-flex align-items-center gap-2">
                            <i class="ri-save-3-line"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.getElementById('togglePassword').addEventListener('click', function(e) {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('ri-eye-off-line');
            icon.classList.add('ri-eye-line');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('ri-eye-line');
            icon.classList.add('ri-eye-off-line');
        }
    });
</script>
<?= $this->endSection() ?>