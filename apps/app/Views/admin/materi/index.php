<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<style>
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

    .form-switch .form-check-label {
        font-weight: 600;
        padding-top: 0.15em;
        margin-left: 0.4em;
        cursor: pointer;
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
</style>

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0 fw-bold text-dark">Daftar Materi</h5>
        <h6 class="text-muted mt-1 mb-0">Kelas: <?= esc($kelas->nama ?? '') ?></h6>
    </div>
    <div>
        <a href="<?= base_url('admin/kelas') ?>" class="btn btn-outline-secondary me-2 rounded-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
        <button class="btn btn-primary btn-tambah rounded-3" id="btnTambah" data-bs-toggle="modal" data-bs-target="#modalTambahMateri">
            <i class="fa-solid fa-plus me-1"></i> Tambah Materi
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable" id="tableMateri">
                <thead class="table-light">
                    <tr>
                        <th width="8%" class="text-center">Urutan</th>
                        <th>Judul</th>
                        <th>Type</th>
                        <th>Detail</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($materi)) : ?>
                        <?php foreach ($materi as $m) : ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= esc($m->urutan) ?></td>
                                <td class="fw-semibold text-dark"><?= esc($m->judul) ?></td>
                                <td>
                                    <?php if ($m->type === 'quiz') : ?>
                                        <span class="badge bg-warning text-dark"><i class="fa-solid fa-clipboard-question me-1"></i> Quiz</span>
                                    <?php else : ?>
                                        <span class="badge bg-info"><i class="fa-solid fa-video me-1"></i> Materi</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($m->type === 'quiz') : ?>
                                        <small class="d-block text-muted"><i class="fa-solid fa-star me-1 text-warning"></i> Min Score: <span class="fw-bold"><?= esc($m->min_pass_score) ?></span></small>
                                        <small class="d-block <?= $m->is_final_quiz ? 'text-success fw-bold' : 'text-muted' ?>">
                                            <i class="fa-solid fa-flag-checkered me-1"></i> Final Quiz: <?= $m->is_final_quiz ? 'Ya' : 'Tidak' ?>
                                        </small>
                                    <?php else : ?>
                                        <small class="d-block text-muted"><i class="fa-brands fa-youtube me-1 text-danger"></i> Video ID: <span class="fw-bold"><?= esc($m->video_id) ?></span></small>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($m->type === 'quiz') : ?>
                                        <a href="<?= base_url('admin/kelas/' . $kelas_id . '/materi/' . $m->id . '/quiz') ?>" class="btn btn-sm btn-outline-success rounded-3" title="Buka Quiz">
                                            <i class="fa-solid fa-up-right-from-square"></i>
                                        </a>
                                    <?php endif; ?>
                                    <button class="btn btn-sm btn-outline-secondary btn-ubah rounded-3"
                                        data-id="<?= $m->id ?>"
                                        data-urutan="<?= esc($m->urutan) ?>"
                                        data-judul="<?= esc($m->judul) ?>"
                                        data-type="<?= esc($m->type) ?>"
                                        data-videoid="<?= esc($m->video_id) ?>"
                                        data-minscore="<?= esc($m->min_pass_score) ?>"
                                        data-finalquiz="<?= esc($m->is_final_quiz) ?>"
                                        title="Ubah">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger btn-hapus rounded-3"
                                        data-id="<?= $m->id ?>"
                                        data-judul="<?= esc($m->judul) ?>"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahMateri" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 18px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.13);">
            <form id="formMateri" method="post" action="<?= base_url('admin/kelas/' . $kelas_id . '/materi/simpan') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <input type="hidden" name="id" id="inputId">
                <input type="hidden" name="kelas_id" value="<?= $kelas_id ?>">

                <div class="modal-header border-0 px-4 pt-4 pb-2">
                    <h5 class="modal-title fw-bold text-dark" id="modalLabel">
                        <i class="fa-solid fa-book-open me-2 text-primary"></i> Tambah Materi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <div class="row g-3">
                        <div class="col-12 col-sm-8">
                            <label class="form-label-sm">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="judul" id="inputJudul" placeholder="Contoh: Pengenalan HTML" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label class="form-label-sm">Urutan</label>
                            <input type="number" class="form-control" name="urutan" id="inputUrutan" placeholder="1">
                        </div>

                        <div class="col-12">
                            <label class="form-label-sm">Type <span class="text-danger">*</span></label>
                            <select name="type" id="inputType" class="form-select" required>
                                <option value="materi">Materi</option>
                                <option value="quiz">Quiz</option>
                            </select>
                        </div>

                        <!-- Panel Materi -->
                        <div class="col-12" id="panelMateri">
                            <label class="form-label-sm">YouTube Video ID</label>
                            <input type="text" class="form-control" name="video_id" id="inputVideoId" placeholder="Contoh: dQw4w9WgXcQ">
                            <small class="text-muted d-block mt-1">Hanya ID videonya saja dari link YouTube.</small>
                        </div>

                        <!-- Panel Quiz -->
                        <div class="col-12" id="panelQuiz" style="display:none;">
                            <div class="p-3 border rounded-3 border-warning bg-warning bg-opacity-10">
                                <div class="mb-3">
                                    <label class="form-label-sm">Min. Pass Score <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="min_pass_score" id="inputMinScore" placeholder="Contoh: 70">
                                </div>
                                <div>
                                    <label class="form-label-sm d-block mb-1">Status Final Quiz</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" role="switch" id="inputFinalSwitch">
                                        <label class="form-check-label" for="inputFinalSwitch" id="labelFinalSwitch">Tidak</label>
                                    </div>
                                    <input type="hidden" name="is_final_quiz" id="inputFinalHidden" value="0">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-0 px-4 pb-4 pt-2">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-3 px-4">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tableMateri').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });

        // Toggle form panels
        $('#inputType').on('change', function() {
            if ($(this).val() === 'quiz') {
                $('#panelMateri').hide();
                $('#panelQuiz').show();

                $('#inputMinScore').prop('required', true);
            } else {
                $('#panelQuiz').hide();
                $('#panelMateri').show();

                $('#inputMinScore').prop('required', false);
            }
        });

        // Toggle Switch Final Quiz
        $('#inputFinalSwitch').on('change', function() {
            if ($(this).is(':checked')) {
                $('#labelFinalSwitch').text('Ya');
                $('#inputFinalHidden').val('1');
            } else {
                $('#labelFinalSwitch').text('Tidak');
                $('#inputFinalHidden').val('0');
            }
        });

        // Tambah BTN
        $('#btnTambah').on('click', function() {
            $('#modalLabel').html('<i class="fa-solid fa-book-open me-2 text-primary"></i> Tambah Materi');
            $('#formMethod').val('POST');
            $('#inputId').val('');

            $('#inputJudul').val('');
            $('#inputUrutan').val('');
            $('#inputType').val('materi').trigger('change');
            $('#inputVideoId').val('');
            $('#inputMinScore').val('');

            $('#inputFinalSwitch').prop('checked', false);
            $('#labelFinalSwitch').text('Tidak');
            $('#inputFinalHidden').val('0');
        });

        // Ubah BTN
        $(document).on('click', '.btn-ubah', function() {
            const id = $(this).data('id');
            const judul = $(this).data('judul');
            const urutan = $(this).data('urutan');
            const type = $(this).data('type') || 'materi';
            const video_id = $(this).data('videoid');
            const min_pass_score = $(this).data('minscore');
            const is_final = $(this).data('finalquiz');

            $('#modalLabel').html('<i class="fa-solid fa-pen me-2 text-warning"></i> Ubah Materi');
            $('#formMethod').val('PUT');

            $('#inputId').val(id);
            $('#inputJudul').val(judul);
            $('#inputUrutan').val(urutan);
            $('#inputType').val(type).trigger('change');
            $('#inputVideoId').val(video_id);
            $('#inputMinScore').val(min_pass_score);

            const isFinal = (is_final == 1);
            $('#inputFinalSwitch').prop('checked', isFinal);
            $('#labelFinalSwitch').text(isFinal ? 'Ya' : 'Tidak');
            $('#inputFinalHidden').val(isFinal ? '1' : '0');

            const modal = new bootstrap.Modal(document.getElementById('modalTambahMateri'));
            modal.show();
        });

        // Hapus BTN
        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id');
            const judul = $(this).data('judul');

            Swal.fire({
                title: 'Hapus Materi?',
                html: `Materi <strong>"${judul}"</strong> akan dihapus secara permanen.`,
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
                    const formStr = `
                        <form id="formHapus" action="<?= base_url('admin/kelas/' . $kelas_id . '/materi/hapus') ?>" method="POST" style="display:none;">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="${id}">
                        </form>
                    `;
                    $('body').append(formStr);
                    $('#formHapus').submit();
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>