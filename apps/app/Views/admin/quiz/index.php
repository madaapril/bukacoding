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
    .form-select,
    .form-control:focus,
    .form-select:focus {
        border-radius: 9px;
        font-size: 0.88rem;
    }
</style>

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-0 fw-bold text-dark">Kelola Pertanyaan Quiz</h5>
        <h6 class="text-muted mt-1 mb-0">Materi: <?= esc($materi->judul ?? '') ?></h6>
    </div>
    <div>
        <a href="<?= base_url('admin/kelas/' . $kelas_id . '/materi') ?>" class="btn btn-outline-secondary me-2 rounded-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
        <button class="btn btn-primary btn-tambah rounded-3" id="btnTambah" data-bs-toggle="modal" data-bs-target="#modalTambahSoal">
            <i class="fa-solid fa-plus me-1"></i> Tambah Soal
        </button>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable" id="tableQuiz">
                <thead class="table-light">
                    <tr>
                        <th width="8%" class="text-center">Urutan</th>
                        <th width="35%">Pertanyaan</th>
                        <th>Pilihan Jawaban</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($quiz_question)) : ?>
                        <?php foreach ($quiz_question as $q) : ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= esc($q->urutan) ?></td>
                                <td>
                                    <div class="fw-semibold text-dark text-wrap" style="max-height: 150px; overflow-y: auto;">
                                        <?= nl2br((string) esc($q->pertanyaan)) ?>
                                    </div>
                                </td>
                                <td>
                                    <ul class="mb-0 ps-3 list-unstyled">
                                        <?php if (!empty($q->options)): ?>
                                            <?php foreach ($q->options as $opt) : ?>
                                                <li class="mb-1 <?= $opt->is_correct ? 'text-success fw-bold' : 'text-muted' ?>">
                                                    <?php if ($opt->is_correct): ?>
                                                        <i class="fa-solid fa-circle-check me-1"></i>
                                                    <?php else: ?>
                                                        <i class="fa-regular fa-circle me-1"></i>
                                                    <?php endif; ?>
                                                    <?= esc($opt->text) ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li class="text-danger small fst-italic">Belum ada pilihan</li>
                                        <?php endif; ?>
                                    </ul>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-secondary btn-ubah rounded-3 mb-1"
                                        data-id="<?= $q->id ?>"
                                        data-urutan="<?= esc($q->urutan) ?>"
                                        data-pertanyaan="<?= htmlspecialchars($q->pertanyaan) ?>"
                                        data-options="<?= htmlspecialchars(json_encode($q->options)) ?>"
                                        title="Ubah">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger btn-hapus rounded-3 mb-1"
                                        data-id="<?= $q->id ?>"
                                        data-urutan="<?= esc($q->urutan) ?>"
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
<div class="modal fade" id="modalTambahSoal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0" style="border-radius: 18px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.13);">
            <form id="formSoal" method="post" action="<?= base_url('admin/kelas/' . $kelas_id . '/materi/' . $materi_id . '/quiz/simpan') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <input type="hidden" name="id" id="inputId">
                <input type="hidden" name="materi_id" value="<?= $materi_id ?>">

                <div class="modal-header border-0 px-4 pt-4 pb-2">
                    <h5 class="modal-title fw-bold text-dark" id="modalLabel">
                        <i class="fa-solid fa-clipboard-question me-2 text-primary"></i> Tambah Soal
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <div class="row g-3">
                        <div class="col-12 col-md-2">
                            <label class="form-label-sm">Urutan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="urutan" id="inputUrutan" placeholder="1" required>
                        </div>
                        <div class="col-12 col-md-10">
                            <label class="form-label-sm">Pertanyaan <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="pertanyaan" id="inputPertanyaan" rows="3" placeholder="Tulis pertanyaan di sini..." required></textarea>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label-sm mb-0">Pilihan Jawaban (Options)</label>
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-3" id="btnAddOption">
                                    <i class="fa-solid fa-plus me-1"></i> Tambah
                                </button>
                            </div>

                            <!-- Container Options -->
                            <div id="optionsContainer">
                                <!-- Options will be appended here -->
                            </div>
                            <small class="text-muted d-block mt-2"><i class="fa-solid fa-info-circle me-1"></i> Centang toggle switch untuk menandai jawaban yang benar.</small>
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

<!-- Template for option row (hidden) -->
<template id="optionRowTemplate">
    <div class="option-item row mb-2 align-items-center bg-light p-2 rounded-3 mx-0 border border-light" data-index="{index}">
        <input type="hidden" name="options[{index}][id]" class="option-id" value="">
        <div class="col px-1">
            <input type="text" name="options[{index}][text]" class="form-control option-text" placeholder="Teks Pilihan" required>
        </div>
        <div class="col-auto text-center px-1" style="width: 80px;">
            <div class="form-check form-switch d-inline-block m-0 p-0" style="padding-left: 2.5em !important;">
                <input class="form-check-input option-correct-cb" type="checkbox" role="switch" title="Tandai Benar">
                <input type="hidden" name="options[{index}][is_correct]" class="option-correct-hidden" value="0">
            </div>
        </div>
        <div class="col-auto px-1">
            <button type="button" class="btn btn-outline-danger btn-sm btn-remove-option" title="Hapus Pilihan"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
</template>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tableQuiz').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });

        let optionIndex = 0;

        function addOptionRow(id = '', text = '', is_correct = 0) {
            let template = $('#optionRowTemplate').html();
            template = template.replace(/{index}/g, optionIndex);

            const $row = $(template);
            $row.find('.option-id').val(id);
            $row.find('.option-text').val(text);

            if (is_correct == 1) {
                $row.find('.option-correct-cb').prop('checked', true);
                $row.find('.option-correct-hidden').val('1');
                $row.removeClass('bg-light border-light').addClass('bg-success bg-opacity-10 border-success');
            }

            $('#optionsContainer').append($row);
            optionIndex++;
        }

        $('#btnAddOption').on('click', function() {
            addOptionRow();
        });

        // Handle switch change for correctness
        $(document).on('change', '.option-correct-cb', function() {
            const $row = $(this).closest('.option-item');
            if ($(this).is(':checked')) {
                // Uncheck all other options
                $('.option-correct-cb').not(this).prop('checked', false);
                $('.option-correct-hidden').val('0');
                $('.option-item').removeClass('bg-success bg-opacity-10 border-success').addClass('bg-light border-light');

                // Check this one
                $row.find('.option-correct-hidden').val('1');
                $row.removeClass('bg-light border-light').addClass('bg-success bg-opacity-10 border-success');
            } else {
                $row.find('.option-correct-hidden').val('0');
                $row.removeClass('bg-success bg-opacity-10 border-success').addClass('bg-light border-light');
            }
        });

        // Handle remove option
        $(document).on('click', '.btn-remove-option', function() {
            $(this).closest('.option-item').remove();
        });

        // Tambah BTN
        $('#btnTambah').on('click', function() {
            $('#modalLabel').html('<i class="fa-solid fa-clipboard-question me-2 text-primary"></i> Tambah Soal');
            $('#formMethod').val('POST');
            $('#formSoal').attr('action', '<?= base_url('admin/kelas/' . $kelas_id . '/materi/' . $materi_id . '/quiz/simpan') ?>');
            $('#inputId').val('');

            $('#inputUrutan').val('');
            $('#inputPertanyaan').val('');

            $('#optionsContainer').empty();
            optionIndex = 0;
            // Add minimum 2 options by default
            addOptionRow();
            addOptionRow();
        });

        // Ubah BTN
        $(document).on('click', '.btn-ubah', function() {
            const id = $(this).data('id');
            const urutan = $(this).data('urutan');
            const pertanyaan = $(this).data('pertanyaan');
            const options = $(this).data('options'); // Assuming data-options is correctly parsed as JSON

            $('#modalLabel').html('<i class="fa-solid fa-pen me-2 text-warning"></i> Ubah Soal');
            $('#formMethod').val('PUT');
            $('#formSoal').attr('action', '<?= base_url('admin/kelas/' . $kelas_id . '/materi/' . $materi_id . '/quiz/simpan') ?>');

            $('#inputId').val(id);
            $('#inputUrutan').val(urutan);
            $('#inputPertanyaan').val(pertanyaan);

            $('#optionsContainer').empty();
            optionIndex = 0;

            if (options && options.length > 0) {
                options.forEach(opt => {
                    addOptionRow(opt.id, opt.text, opt.is_correct);
                });
            } else {
                addOptionRow(); // at least one row
            }

            const modal = new bootstrap.Modal(document.getElementById('modalTambahSoal'));
            modal.show();
        });

        // Hapus BTN
        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id');
            const urutan = $(this).data('urutan');

            Swal.fire({
                title: 'Hapus Soal?',
                html: `Soal urutan ke-<strong>${urutan}</strong> beserta pilihan jawabannya akan dihapus secara permanen.`,
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
                        <form id="formHapus" action="<?= base_url('admin/kelas/' . $kelas_id . '/materi/' . $materi_id . '/quiz/hapus') ?>" method="POST" style="display:none;">
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