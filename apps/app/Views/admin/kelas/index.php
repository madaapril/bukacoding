<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .kelas-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
    }

    .kelas-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 28px rgba(86, 167, 254, 0.18);
    }

    .kelas-card .card-img-wrapper {
        position: relative;
        height: 170px;
        overflow: hidden;
        background: #f0f4fa;
    }

    .kelas-card .card-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .kelas-card:hover .card-img-wrapper img {
        transform: scale(1.05);
    }

    .kelas-card .status-badge {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .kelas-card .card-body {
        padding: 1rem 1.1rem 0.85rem;
    }

    .kelas-card .card-title {
        font-size: 0.97rem;
        font-weight: 700;
        color: var(--color-gray-800, #1e293b);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 0.3rem;
    }

    .kelas-card .card-kategori {
        font-size: 0.76rem;
        color: var(--color-gray-500, #64748b);
        margin-bottom: 0.85rem;
    }

    .kelas-card .btn-materi {
        font-size: 0.8rem;
        padding: 0.35rem 0.9rem;
        border-radius: 8px;
    }

    .kelas-card .action-btns .btn {
        font-size: 0.8rem;
        padding: 0.35rem 0.75rem;
        border-radius: 8px;
    }

    .btn-tambah-kelas {
        border-radius: 10px;
        font-weight: 600;
        padding: 0.5rem 1.2rem;
        font-size: 0.88rem;
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
        color: var(--color-gray-500, #94a3b8);
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.35;
    }

    /* Modal styling */
    #modalTambahKelas .modal-content {
        border: none;
        border-radius: 18px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.13);
    }

    #modalTambahKelas .modal-header {
        border-bottom: none;
        padding: 1.4rem 1.5rem 0.5rem;
    }

    #modalTambahKelas .modal-footer {
        border-top: 1px solid rgba(0, 0, 0, 0.06);
        padding: 0.85rem 1.5rem 1.2rem;
    }

    .form-label-sm {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--color-gray-700, #374151);
        margin-bottom: 0.3rem;
    }

    .form-control,
    .form-select {
        border-radius: 9px;
        font-size: 0.88rem;
        border: 1.5px solid #e2e8f0;
        transition: border-color 0.2s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #56a7fe;
        box-shadow: 0 0 0 3px rgba(86, 167, 254, 0.12);
    }

    .img-preview-box {
        width: 100%;
        height: 130px;
        border-radius: 10px;
        border: 2px dashed #cbd5e1;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #f8fafc;
        cursor: pointer;
        transition: border-color 0.2s;
    }

    .img-preview-box:hover {
        border-color: #56a7fe;
    }

    .img-preview-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .img-preview-placeholder {
        text-align: center;
        color: #94a3b8;
    }

    .img-preview-placeholder i {
        font-size: 1.8rem;
        margin-bottom: 0.3rem;
    }

    /* Custom Switch Styling */
    .form-switch .form-check-input {
        width: 2.8em;
        height: 1.4em;
        margin-top: 0.1em;
        cursor: pointer;
    }

    .form-switch .form-check-input:checked {
        background-color: var(--primary, #7c3aed);
        border-color: var(--primary, #7c3aed);
    }

    .form-switch .form-check-input:focus {
        box-shadow: 0 0 0 0.25rem rgba(124, 58, 237, 0.25);
        border-color: var(--primary-light, #a78bfa);
    }

    .form-switch .form-check-label {
        font-weight: 600;
        padding-top: 0.15em;
        margin-left: 0.4em;
        cursor: pointer;
    }
</style>

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0 fw-bold text-dark">Daftar Kelas</h5>
        <small class="text-muted">Kelola semua kelas yang tersedia</small>
    </div>
    <button class="btn btn-primary btn-tambah-kelas" id="btnTambahKelas" data-bs-toggle="modal" data-bs-target="#modalTambahKelas">
        <i class="fa-solid fa-plus me-1"></i> Tambah Kelas
    </button>
</div>

<!-- Grid Kelas -->
<?php if (!empty($kelas)) : ?>
    <div class="row g-3" id="kelasGrid">
        <?php foreach ($kelas as $k) : ?>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="card kelas-card bg-white h-100">
                    <div class="card-img-wrapper">
                        <?php if (!empty($k->gambar)) : ?>
                            <img src="<?= base_url('uploads/kelas/' . $k->gambar) ?>" alt="<?= esc($k->nama) ?>">
                        <?php else : ?>
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($k->nama) ?>&background=56a7fe&color=fff&size=300" alt="<?= esc($k->nama) ?>">
                        <?php endif; ?>
                        <span class="status-badge badge <?= ($k->aktif ?? '1') === '1' ? 'bg-success' : 'bg-secondary' ?>">
                            <?= ($k->aktif ?? '1') === '1' ? 'Aktif' : 'Nonaktif' ?>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title" title="<?= esc($k->nama) ?>"><?= esc($k->nama) ?></h6>
                        <p class="card-kategori mb-0">
                            <i class="fa-solid fa-tag fa-xs me-1"></i>
                            <?= esc($k->kategori_nama ?? 'Tanpa Kategori') ?>
                        </p>
                        <p class="mb-0 mt-1 fw-bold text-primary" style="font-size: 0.9rem;">
                            <?= isset($k->harga) && $k->harga > 0 ? 'Rp ' . number_format($k->harga, 0, ',', '.') : 'Gratis' ?>
                        </p>
                        <div class="d-flex gap-2 mt-auto pt-2 action-btns">
                            <a href="<?= base_url('admin/kelas/' . $k->id . '/materi') ?>" class="btn btn-primary btn-materi flex-grow-1">
                                <i class="fa-solid fa-book me-1"></i> Materi
                            </a>
                            <button class="btn btn-outline-secondary btn-ubah"
                                data-id="<?= $k->id ?>"
                                data-nama="<?= esc($k->nama) ?>"
                                data-deskripsi="<?= esc($k->deskripsi ?? '') ?>"
                                data-harga="<?= esc($k->harga ?? 0) ?>"
                                data-kategori="<?= $k->kategori_id ?? '' ?>"
                                data-aktif="<?= $k->aktif ?? '1' ?>"
                                title="Ubah">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="btn btn-outline-danger btn-hapus"
                                data-id="<?= $k->id ?>"
                                data-nama="<?= esc($k->nama) ?>"
                                title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="card border-0 shadow-soft rounded-3 bg-white">
        <div class="empty-state">
            <i class="fa-solid fa-chalkboard-user d-block"></i>
            <p class="fw-semibold mb-1">Belum ada kelas</p>
            <small>Klik tombol <strong>Tambah Kelas</strong> untuk mulai menambahkan.</small>
        </div>
    </div>
<?php endif; ?>


<!-- ========================= -->
<!-- Modal Tambah / Edit Kelas -->
<!-- ========================= -->
<div class="modal fade" id="modalTambahKelas" tabindex="-1" aria-labelledby="modalKelasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="formKelas" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <input type="hidden" name="id" id="kelasId">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-dark" id="modalKelasLabel">
                        <i class="fa-solid fa-chalkboard-user me-2 text-primary"></i> Tambah Kelas
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <div class="row g-3">
                        <!-- Status -->
                        <div class="col-12 col-sm-6">
                            <label class="form-label-sm d-block mb-1">Status Kelas</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" role="switch" id="inputAktifSwitch" checked>
                                <label class="form-check-label" for="inputAktifSwitch" id="labelAktifSwitch">Aktif</label>
                            </div>
                            <!-- Input hidden untuk dikirim via form submit -->
                            <input type="hidden" name="aktif" id="inputAktifHidden" value="1">
                        </div>

                        <!-- Gambar -->
                        <div class="col-12">
                            <label class="form-label-sm">Gambar Kelas</label>
                            <div class="img-preview-box" id="imgPreviewBox" onclick="document.getElementById('inputGambar').click()">
                                <div class="img-preview-placeholder" id="imgPlaceholder">
                                    <i class="fa-solid fa-image d-block"></i>
                                    <small>Klik untuk pilih gambar</small>
                                </div>
                                <img src="" id="imgPreview" style="display:none;">
                            </div>
                            <input type="file" name="gambar" id="inputGambar" accept="image/*" class="d-none">
                        </div>

                        <!-- Nama -->
                        <div class="col-12">
                            <label class="form-label-sm" for="inputNama">Nama Kelas <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukkan nama kelas" required>
                        </div>

                        <!-- Harga -->
                        <div class="col-12">
                            <label class="form-label-sm" for="inputHarga">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light" style="border-radius: 9px 0 0 9px; font-weight:600; border: 1.5px solid #e2e8f0; border-right: none;">Rp</span>
                                <input type="number" class="form-control" id="inputHarga" name="harga" placeholder="0" min="0" required style="border-radius: 0 9px 9px 0;">
                            </div>
                            <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">Isi 0 jika kelas gratis</small>
                        </div>

                        <!-- Deskripsi -->
                        <div class="col-12">
                            <label class="form-label-sm" for="inputDeskripsi">Deskripsi</label>
                            <textarea class="form-control" id="inputDeskripsi" name="deskripsi" rows="3" placeholder="Deskripsi singkat kelas..."></textarea>
                        </div>

                        <!-- Kategori -->
                        <div class="col-12">
                            <label class="form-label-sm" for="inputKategori">Kategori</label>
                            <select class="form-select" id="inputKategori" name="kategori_id">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat->id ?>"><?= esc($kat->nama) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-3 px-4" id="btnSimpan">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

        // ── Toggle Switch Status ────────────────────────────────────────
        $('#inputAktifSwitch').on('change', function() {
            if ($(this).is(':checked')) {
                $('#labelAktifSwitch').text('Aktif');
                $('#inputAktifHidden').val('1');
            } else {
                $('#labelAktifSwitch').text('Nonaktif');
                $('#inputAktifHidden').val('0');
            }
        });

        // ── Preview gambar ──────────────────────────────────────────────
        $('#inputGambar').on('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgPreview').attr('src', e.target.result).show();
                    $('#imgPlaceholder').hide();
                };
                reader.readAsDataURL(file);
            }
        });

        // ── Reset modal ke mode Tambah saat dibuka via tombol Tambah ────
        $('#btnTambahKelas').on('click', function() {
            resetModal();
        });

        function resetModal() {
            $('#modalKelasLabel').html('<i class="fa-solid fa-chalkboard-user me-2 text-primary"></i> Tambah Kelas');
            $('#formKelas').attr('action', '<?= base_url('admin/kelas/simpan') ?>');
            $('#formMethod').val('POST');
            $('#kelasId').val('');
            $('#inputNama').val('');
            $('#inputHarga').val('');
            $('#inputDeskripsi').val('');
            $('#inputKategori').val('');
            $('#inputAktifSwitch').prop('checked', true);
            $('#labelAktifSwitch').text('Aktif');
            $('#inputAktifHidden').val('1');
            // Reset preview gambar
            $('#imgPreview').attr('src', '').hide();
            $('#imgPlaceholder').show();
            $('#inputGambar').val('');
        }

        // ── Tombol Ubah ─────────────────────────────────────────────────
        $(document).on('click', '.btn-ubah', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const deskripsi = $(this).data('deskripsi');
            const harga = $(this).data('harga');
            const kategori = $(this).data('kategori');
            const aktif = $(this).data('aktif');

            $('#modalKelasLabel').html('<i class="fa-solid fa-pen me-2 text-warning"></i> Ubah Kelas');
            $('#formKelas').attr('action', '<?= base_url('admin/kelas/simpan') ?>');
            $('#formMethod').val('PUT');
            $('#kelasId').val(id);
            $('#inputNama').val(nama);
            $('#inputHarga').val(harga);
            $('#inputDeskripsi').val(deskripsi);
            $('#inputKategori').val(kategori);

            // `aktif` bisa terbaca sebagai tipe Number oleh jQuery
            const isAktif = (aktif == 1);
            $('#inputAktifSwitch').prop('checked', isAktif);
            $('#labelAktifSwitch').text(isAktif ? 'Aktif' : 'Nonaktif');
            $('#inputAktifHidden').val(isAktif ? '1' : '0');

            // Reset preview gambar (biarkan kosong, user bisa ganti jika mau)
            $('#imgPreview').attr('src', '').hide();
            $('#imgPlaceholder').show();
            $('#inputGambar').val('');

            const modal = new bootstrap.Modal(document.getElementById('modalTambahKelas'));
            modal.show();
        });

        // ── Tombol Hapus ────────────────────────────────────────────────
        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            Swal.fire({
                title: 'Hapus Kelas?',
                html: `Kelas <strong>"${nama}"</strong> akan dihapus secara permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#94a3b8',
                confirmButtonText: '<i class="fa-solid fa-trash me-1"></i> Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'rounded-3',
                    cancelButton: 'rounded-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim request hapus via form dengan method POST yang disamarkan jadi DELETE
                    const formHTML = `
                        <form id="formHapusKelas" action="<?= base_url('admin/kelas/hapus') ?>" method="POST" style="display:none;">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="${id}">
                        </form>
                    `;
                    $('body').append(formHTML);
                    $('#formHapusKelas').submit();
                }
            });
        });

    });
</script>

<?= $this->endSection() ?>