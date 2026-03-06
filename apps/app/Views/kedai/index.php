<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 text-dark fw-bold">Profil Kedai</h4>
        <p class="text-muted mb-0 small">Kelola informasi identitas kedai Anda</p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <form id="formKedai">
                    <div class="mb-4">
                        <label for="nama_kedai" class="form-label fw-medium text-dark">Nama Kedai</label>
                        <input type="text" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="nama_kedai" name="nama_kedai" value="Kedai Kopi Minimal" required>
                    </div>

                    <div class="mb-4">
                        <label for="kategori_kedai" class="form-label fw-medium text-dark">Kategori Kedai</label>
                        <select class="form-select bg-light border-0 py-2 px-3 rounded-3" id="kategori_kedai" name="kategori_kedai" required>
                            <option value="" disabled>Pilih Kategori...</option>
                            <option value="Coffee Shop" selected>Coffee Shop</option>
                            <option value="Restoran">Restoran</option>
                            <option value="Warung">Warung</option>
                            <option value="Retail">Retail / Toko</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
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
    $(document).ready(function() {
        $('#formKedai').on('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Berhasil!',
                text: 'Profil kedai telah diperbarui.',
                icon: 'success',
                confirmButtonColor: '#56a7fe',
                customClass: {
                    confirmButton: 'rounded-pill px-4'
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>