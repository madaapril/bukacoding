<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<style>
    /* Styling List Kategori */
    .btn-tambah-kategori {
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
    #modalTambahKategori .modal-content {
        border: none;
        border-radius: 18px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.13);
    }

    #modalTambahKategori .modal-header {
        border-bottom: none;
        padding: 1.4rem 1.5rem 0.5rem;
    }

    #modalTambahKategori .modal-footer {
        border-top: 1px solid rgba(0, 0, 0, 0.06);
        padding: 0.85rem 1.5rem 1.2rem;
    }

    .form-label-sm {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--color-gray-700, #374151);
        margin-bottom: 0.3rem;
    }

    .form-control {
        border-radius: 9px;
        font-size: 0.88rem;
        border: 1.5px solid #e2e8f0;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #56a7fe;
        box-shadow: 0 0 0 3px rgba(86, 167, 254, 0.12);
    }
</style>

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0 fw-bold text-dark">Daftar Kategori</h5>
        <small class="text-muted">Kelola semua kategori kelas yang tersedia</small>
    </div>
    <button class="btn btn-primary btn-tambah-kategori" id="btnTambahKategori" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
        <i class="fa-solid fa-plus me-1"></i> Tambah Kategori
    </button>
</div>

<!-- Table Kategori -->
<div class="card border-0 shadow-soft rounded-3 bg-white mb-4">
    <div class="card-body p-0">
        <?php if (!empty($kategori)) : ?>
            <div class="table-responsive">
                <table class="table table-list-style w-100" id="tableKategori">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Nama Kategori</th>
                            <th width="20%">Dibuat Pada</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $kat) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="fw-medium"><?= esc($kat->nama) ?></td>
                                <td><?= date('d M Y, H:i', strtotime($kat->created_at)) ?></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-outline-secondary btn-ubah btn-sm btn-action edit-btn"
                                            data-id="<?= $kat->id ?>"
                                            data-nama="<?= esc($kat->nama) ?>"
                                            title="Ubah">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-hapus btn-sm btn-action delete-btn"
                                            data-id="<?= $kat->id ?>"
                                            data-nama="<?= esc($kat->nama) ?>"
                                            title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="empty-state">
                <i class="fa-solid fa-tags d-block"></i>
                <p class="fw-semibold mb-1">Belum ada kategori</p>
                <small>Klik tombol <strong>Tambah Kategori</strong> untuk mulai menambahkan.</small>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- ========================= -->
<!-- Modal Tambah / Edit Kategori -->
<!-- ========================= -->
<div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="formKategori" method="post" action="<?= base_url('admin/kategori/simpan') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="kategoriId">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-dark" id="modalKategoriLabel">
                        <i class="fa-solid fa-tags me-2 text-primary"></i> Tambah Kategori
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <div class="row g-3">
                        <!-- Nama -->
                        <div class="col-12">
                            <label class="form-label-sm" for="inputNama">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Misal: Web Development" required>
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

<!-- DataTables CSS & JS (Pastikan diload sesuai template jika sudah ada di head/bottom) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        if ($('#tableKategori').length) {
            $('#tableKategori').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                "dom": '<"row align-items-center mb-3 px-3 pt-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row px-3 pb-3 mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            });
        }

        // ── Reset modal ke mode Tambah saat dibuka via tombol Tambah ────
        $('#btnTambahKategori').on('click', function() {
            resetModal();
        });

        function resetModal() {
            $('#modalKategoriLabel').html('<i class="fa-solid fa-tags me-2 text-primary"></i> Tambah Kategori');
            $('#kategoriId').val('');
            $('#inputNama').val('');
        }

        // ── Tombol Ubah ─────────────────────────────────────────────────
        $(document).on('click', '.btn-ubah', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            $('#modalKategoriLabel').html('<i class="fa-solid fa-pen me-2 text-warning"></i> Ubah Kategori');
            $('#kategoriId').val(id);
            $('#inputNama').val(nama);

            const modal = new bootstrap.Modal(document.getElementById('modalTambahKategori'));
            modal.show();
        });

        // ── Tombol Hapus ────────────────────────────────────────────────
        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            Swal.fire({
                title: 'Hapus Kategori?',
                html: `Kategori <strong>"${nama}"</strong> akan dihapus secara permanen. <br> <small class="text-danger">Aksi ini mungkin berpengaruh pada kelas yang menggunakan kategori ini.</small>`,
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
                    // Kirim request hapus via POST form submission spoofing DEL/DELETE di backend
                    const form = $('<form method="post" style="display:none;">');
                    form.attr('action', '<?= base_url('admin/kategori/hapus') ?>');
                    form.append('<?= csrf_field() ?>');
                    form.append('<input type="hidden" name="_method" value="DELETE">'); // spoof DELETE method jika config routes restrict POST/DEL
                    form.append('<input type="hidden" name="id" value="' + id + '">');
                    $('body').append(form);
                    form.trigger('submit');
                }
            });
        });


    });
</script>

<?= $this->endSection() ?>