<?= $this->extend('app/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .quiz-container {
        margin-bottom: 2rem;
    }

    .question-card {
        background: var(--surface-card);
        border: 1px solid rgba(124, 58, 237, 0.15);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .question-text {
        font-size: 1.15rem;
        font-weight: 700;
        color: #fff;
        line-height: 1.5;
        margin-bottom: 1.5rem;
    }

    .options-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .option-item {
        position: relative;
    }

    .option-label {
        display: flex;
        align-items: center;
        padding: 1rem 1.25rem;
        background: rgba(124, 58, 237, 0.05);
        border: 1px solid rgba(124, 58, 237, 0.1);
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
        color: #94a3b8;
    }

    .option-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .option-input:checked+.option-label {
        background: rgba(124, 58, 237, 0.15);
        border-color: var(--primary);
        color: #fff;
        box-shadow: 0 0 15px rgba(124, 58, 237, 0.1);
    }

    .option-input:checked+.option-label::before {
        content: "\eb7b";
        /* remixicon checkbox-circle-fill */
        font-family: 'remixicon' !important;
        margin-right: 12px;
        color: var(--primary-light);
        font-size: 1.2rem;
    }

    .option-label::before {
        content: "\eb7a";
        /* remixicon checkbox-blank-circle-line */
        font-family: 'remixicon' !important;
        margin-right: 12px;
        color: rgba(124, 58, 237, 0.3);
        font-size: 1.2rem;
    }

    .btn-submit-quiz {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 1rem 2.5rem;
        border-radius: 16px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-submit-quiz:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
        color: #fff;
    }

    .curriculum-sidebar {
        background: var(--surface-card);
        border-radius: 24px;
        border: 1px solid rgba(124, 58, 237, 0.15);
        overflow: hidden;
        height: fit-content;
        position: sticky;
        top: 100px;
    }

    .curriculum-header {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(124, 58, 237, 0.15);
        background: rgba(124, 58, 237, 0.05);
    }

    .curriculum-list {
        max-height: calc(100vh - 250px);
        overflow-y: auto;
    }

    .curriculum-item {
        display: flex;
        align-items: center;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid rgba(124, 58, 237, 0.08);
        text-decoration: none;
        color: #94a3b8;
        transition: all 0.2s ease;
    }

    .curriculum-item:hover {
        background: rgba(124, 58, 237, 0.05);
        color: var(--primary-light);
    }

    .curriculum-item.active {
        background: rgba(124, 58, 237, 0.12);
        color: #fff;
        border-left: 4px solid var(--primary);
    }

    .lesson-number {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(124, 58, 237, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 700;
        margin-right: 12px;
        flex-shrink: 0;
        border: 1px solid rgba(124, 58, 237, 0.15);
    }

    .curriculum-item.active .lesson-number {
        background: var(--primary);
        color: white;
    }

    .lesson-title {
        font-size: 0.9rem;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .quiz-info-header {
        margin-bottom: 2.5rem;
    }

    .score-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 12px;
        background: rgba(249, 115, 22, 0.1);
        color: var(--accent-light);
        font-weight: 700;
        font-size: 0.85rem;
        border: 1px solid rgba(249, 115, 22, 0.2);
    }
</style>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('app/kelas') ?>" class="text-primary-custom text-decoration-none">Daftar Kelas</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('app/kelas/' . $kelas->id . '/detail') ?>" class="text-primary-custom text-decoration-none"><?= esc($kelas->nama) ?></a></li>
        <li class="breadcrumb-item active text-secondary" aria-current="page">Quiz</li>
    </ol>
</nav>

<div class="row g-4">
    <!-- Quiz Content -->
    <div class="col-lg-8">
        <div class="quiz-info-header">
            <h1 class="material-title mb-3"><?= esc($materi_detail->judul) ?></h1>
            <div class="d-flex gap-3 align-items-center">
                <div class="score-badge">
                    <i class="ri-medal-fill"></i> SKOR MINIMUM: <?= $materi_detail->min_pass_score ?>%
                </div>
                <div class="text-secondary small">
                    <i class="ri-question-fill me-1"></i> <?= count($question) ?> Pertanyaan
                </div>
            </div>
        </div>

        <div id="quizIntroContainer">
            <?php if (!empty($question)) : ?>
                <div class="mb-4">
                    <button type="button" id="btnStartQuiz" class="btn-submit-quiz" style="width: auto; display: inline-flex;">
                        <i class="ri-play-fill me-2 fs-5"></i> Kerjakan Quiz
                    </button>
                </div>
            <?php endif; ?>

            <?php if (!empty($quiz_result)) : ?>
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px; background: var(--surface-card); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2) !important;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4 text-white"><i class="ri-history-line text-primary-light me-2"></i> Riwayat Quiz Terakhir</h5>
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-secondary" style="width: 130px;">Waktu Selesai</div>
                            <div class="text-white">: <?= date('d M Y H:i', strtotime($quiz_result->end_at)) ?></div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-secondary" style="width: 130px;">Skor</div>
                            <div class="text-white">: <span class="fw-bold fs-5 text-primary-light"><?= $quiz_result->score ?></span></div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-secondary" style="width: 130px;">Status</div>
                            <div class="text-white">:
                                <?php if ($quiz_result->is_passed) : ?>
                                    <span class="badge bg-success px-3 py-2 rounded-pill">Lulus</span>
                                <?php else : ?>
                                    <span class="badge bg-danger px-3 py-2 rounded-pill">Tidak Lulus</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (empty($question) && empty($quiz_result)) : ?>
                <div class="alert alert-info" style="border-radius: 16px; background: rgba(124, 58, 237, 0.1); border: 1px solid rgba(124, 58, 237, 0.2); color: #fff;">
                    <i class="ri-information-line me-2 text-primary-light"></i> Pertanyaan quiz belum tersedia untuk materi ini.
                </div>
            <?php endif; ?>
            <?php if (empty($question) && !empty($quiz_result)) : ?>
                <div class="alert alert-info" style="border-radius: 16px; background: rgba(124, 58, 237, 0.1); border: 1px solid rgba(124, 58, 237, 0.2); color: #fff;">
                    <i class="ri-information-line me-2 text-primary-light"></i> Pertanyaan quiz belum tersedia atau ditutup.
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($question)) : ?>
            <form action="<?= base_url('app/kelas/' . $kelas->id . '/materi/' . $materi_detail->id . '/submit-quiz') ?>" method="post" id="quizForm" style="display: none;">
                <?= csrf_field() ?>
                <div class="quiz-container">
                    <?php foreach ($question as $index => $q) : ?>
                        <div class="question-card">
                            <div class="question-text">
                                <span class="text-primary-light me-2"><?= $index + 1 ?>.</span>
                                <?= esc($q->pertanyaan) ?>
                            </div>
                            <div class="options-list">
                                <?php foreach ($q->options as $opt) : ?>
                                    <div class="option-item">
                                        <input type="radio"
                                            name="question_<?= $q->id ?>"
                                            id="opt_<?= $opt->id ?>"
                                            value="<?= $opt->id ?>"
                                            class="option-input"
                                            required>
                                        <label for="opt_<?= $opt->id ?>" class="option-label">
                                            <?= esc($opt->text) ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-4">
                    <button type="button" id="btnConfirmSubmit" class="btn-submit-quiz">
                        <i class="ri-send-plane-fill"></i> Submit Jawaban Quiz
                    </button>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <!-- Sidebar Navigation -->
    <div class="col-lg-4">
        <div class="curriculum-sidebar">
            <div class="curriculum-header">
                <h6 class="fw-bold mb-1">Kurikulum Kelas</h6>
                <small class="text-secondary"><?= count($materi) ?> Materi tersedia</small>
            </div>
            <div class="curriculum-list">
                <?php foreach ($materi as $index => $m) : ?>
                    <a href="<?= base_url('app/kelas/' . $kelas->id . '/materi/' . $m->id) ?>"
                        class="curriculum-item <?= $m->id == $materi_detail->id ? 'active' : '' ?>">
                        <div class="lesson-number"><?= $index + 1 ?></div>
                        <div class="lesson-title"><?= esc($m->judul) ?></div>
                        <div class="lesson-type ms-auto">
                            <i class="ri-<?= $m->type === 'quiz' ? 'questionnaire-line' : 'play-circle-line' ?>"></i>
                        </div>
                        <?php if ($m->completed_at): ?>
                            <i class="ri-checkbox-circle-line text-success ms-2"></i>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnStartQuiz = document.getElementById('btnStartQuiz');
        const quizForm = document.getElementById('quizForm');
        const quizIntroContainer = document.getElementById('quizIntroContainer');
        const btnConfirmSubmit = document.getElementById('btnConfirmSubmit');

        if (btnStartQuiz) {
            btnStartQuiz.addEventListener('click', function() {
                quizIntroContainer.style.display = 'none';
                quizForm.style.display = 'block';
            });
        }

        if (btnConfirmSubmit) {
            btnConfirmSubmit.addEventListener('click', function() {
                if (!quizForm.checkValidity()) {
                    quizForm.reportValidity();
                    return;
                }

                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Submit Jawaban?',
                        text: 'Apakah Anda yakin ingin mengumpulkan jawaban quiz ini? Pastikan semua soal telah terjawab.',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#7c3aed',
                        cancelButtonColor: '#ef4444',
                        confirmButtonText: 'Ya, Submit',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            quizForm.submit();
                        }
                    });
                } else {
                    if (confirm('Apakah Anda yakin ingin mengumpulkan jawaban quiz ini? Pastikan semua soal telah terjawab.')) {
                        quizForm.submit();
                    }
                }
            });
        }
    });
</script>

<?= $this->endSection() ?>