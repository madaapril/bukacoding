<?= $this->extend('app/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 Aspect Ratio */
        height: 0;
        overflow: hidden;
        border-radius: 20px;
        background: #000;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(124, 58, 237, 0.2);
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 20px;
    }

    .material-header {
        margin-bottom: 2rem;
    }

    .material-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 0.5rem;
    }

    .material-meta {
        font-size: 0.9rem;
        color: #94a3b8;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .btn-complete {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.2);
        padding: 0.8rem 1.75rem;
        border-radius: 14px;
        font-weight: 700;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-complete:hover {
        background: #10b981;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
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

    /* Custom Scrollbar for Sidebar */
    .curriculum-list::-webkit-scrollbar {
        width: 5px;
    }

    .curriculum-list::-webkit-scrollbar-track {
        background: transparent;
    }

    .curriculum-list::-webkit-scrollbar-thumb {
        background: rgba(124, 58, 237, 0.2);
        border-radius: 10px;
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

    .curriculum-item:last-child {
        border-bottom: none;
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
        border-color: var(--primary);
    }

    .lesson-title {
        font-size: 0.9rem;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .curriculum-item.active .lesson-title {
        font-weight: 700;
    }

    .lesson-type {
        margin-left: auto;
        font-size: 1rem;
        opacity: 0.6;
    }
</style>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('app/kelas') ?>" class="text-primary-custom text-decoration-none">Daftar Kelas</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('app/kelas/' . $kelas->id . '/detail') ?>" class="text-primary-custom text-decoration-none"><?= esc($kelas->nama) ?></a></li>
        <li class="breadcrumb-item active text-secondary" aria-current="page">Materi</li>
    </ol>
</nav>

<div class="row g-4">
    <!-- Main Content -->
    <div class="col-lg-8">
        <div class="material-header">
            <h1 class="material-title"><?= esc($materi_detail->judul) ?></h1>
            <div class="material-meta">
                <span><i class="ri-movie-line me-1"></i> Materi Video</span>
                <!-- <span><i class="ri-folder-open-line me-1"></i> <?= esc($kelas->nama) ?></span> -->
            </div>
        </div>

        <div class="video-container mb-4">
            <?php if (!empty($materi_detail->video_id)) : ?>
                <iframe src="https://www.youtube.com/embed/<?= esc($materi_detail->video_id) ?>?rel=0&modestbranding=1"
                    title="<?= esc($materi_detail->judul) ?>"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            <?php else : ?>
                <div class="d-flex align-items-center justify-content-center h-100 text-secondary">
                    <div class="text-center">
                        <i class="ri-video-off-line ri-3x mb-3"></i>
                        <p>Video tidak tersedia</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-2">
            <?php if ($materi_user): ?>
                <p class="text-success small">
                    <i class="ri-checkbox-circle-line"></i> Sudah Menyimak <?= date('d M Y H:i:s', strtotime($materi_user->completed_at)); ?>
                </p>
            <?php else: ?>
                <form action="<?= base_url('app/kelas/' . $kelas->id . '/materi/' . $materi_detail->id . '/tandai-menyimak') ?>" method="post">
                    <button class="btn-complete">
                        <i class="ri-checkbox-circle-line"></i> Tandai Sudah Menyimak
                    </button>
                </form>
            <?php endif; ?>

            <div class="d-flex gap-2">
                <!-- Navigation can be added here if needed -->
            </div>
        </div>

        <!-- Material Notes/Description can be added here if needed -->
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
                    <?php
                    $is_clickable = true;
                    if ($index > 0 && empty($materi[$index - 1]->completed_at) && empty($m->completed_at)) {
                        $is_clickable = false;
                    }
                    ?>
                    <a href="<?= $is_clickable ? base_url('app/kelas/' . $kelas->id . '/materi/' . $m->id) : 'javascript:void(0)' ?>"
                        class="curriculum-item <?= $m->id == $materi_detail->id ? 'active' : '' ?>"
                        <?= !$is_clickable ? 'style="opacity: 0.5; cursor: not-allowed;" onclick="return false;"' : '' ?>>
                        <div class="lesson-number"><?= $index + 1 ?></div>
                        <div class="lesson-title"><?= esc($m->judul) ?></div>
                        <div class="lesson-type">
                            <?php if (!$is_clickable): ?>
                                <i class="ri-lock-line"></i>
                            <?php else: ?>
                                <i class="ri-<?= $m->type === 'quiz' ? 'questionnaire-line' : 'play-circle-line' ?>"></i>
                            <?php endif; ?>
                        </div>
                        <?php if ($m->completed_at): ?>
                            <i class="ri-checkbox-circle-line text-success"></i>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>