<?= $this->extend('app/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .detail-hero {
        background: var(--surface-card);
        border: 1px solid rgba(124, 58, 237, 0.15);
        border-radius: 24px;
        padding: 2.5rem;
        margin-bottom: 2.5rem;
        display: flex;
        gap: 2.5rem;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .detail-hero::before {
        content: "";
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(124, 58, 237, 0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    .detail-img-wrapper {
        width: 380px;
        height: 240px;
        border-radius: 18px;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .detail-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .detail-info {
        flex-grow: 1;
    }

    .badge-category {
        display: inline-block;
        padding: 6px 14px;
        background: rgba(124, 58, 237, 0.15);
        color: var(--primary-light);
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 1rem;
        border: 1px solid rgba(124, 58, 237, 0.2);
    }

    .detail-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 1.25rem;
        line-height: 1.2;
    }

    .detail-price {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--accent-light);
        margin-bottom: 1.5rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #e2e8f0;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-title::after {
        content: "";
        flex-grow: 1;
        height: 1px;
        background: rgba(124, 58, 237, 0.15);
    }

    .description-text {
        color: #94a3b8;
        line-height: 1.8;
        font-size: 1rem;
    }

    .materi-list {
        background: var(--surface-card);
        border-radius: 20px;
        border: 1px solid rgba(124, 58, 237, 0.15);
        overflow: hidden;
    }

    .materi-item {
        display: flex;
        align-items: center;
        padding: 1.25rem 1.75rem;
        border-bottom: 1px solid rgba(124, 58, 237, 0.08);
        transition: all 0.2s ease;
        text-decoration: none;
        color: inherit;
    }

    .materi-item:last-child {
        border-bottom: none;
    }

    .materi-item:hover {
        background: rgba(124, 58, 237, 0.05);
        color: inherit;
    }

    .materi-number {
        width: 36px;
        height: 36px;
        background: rgba(124, 58, 237, 0.1);
        color: var(--primary-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        margin-right: 1.25rem;
        flex-shrink: 0;
        border: 1px solid rgba(124, 58, 237, 0.15);
    }

    .materi-info {
        flex-grow: 1;
    }

    .materi-title {
        font-weight: 600;
        color: #e2e8f0;
        font-size: 1rem;
        margin-bottom: 2px;
    }

    .materi-meta {
        font-size: 0.8rem;
        color: #64748b;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .btn-play {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(124, 58, 237, 0.15);
        color: var(--primary-light);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .materi-item:hover .btn-play {
        background: var(--primary);
        color: white;
        transform: scale(1.1);
    }

    @media (max-width: 992px) {
        .detail-hero {
            flex-direction: column;
            padding: 1.75rem;
            align-items: flex-start;
        }

        .detail-img-wrapper {
            width: 100%;
            height: 220px;
        }

        .detail-title {
            font-size: 1.75rem;
        }
    }
</style>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('app/kelas') ?>" class="text-primary-custom text-decoration-none">Daftar Kelas</a></li>
        <li class="breadcrumb-item active text-secondary" aria-current="page">Detail Kelas</li>
    </ol>
</nav>

<div class="detail-hero">
    <div class="detail-img-wrapper">
        <?php if (!empty($kelas->gambar)) : ?>
            <img src="<?= base_url('uploads/kelas/' . $kelas->gambar) ?>" alt="<?= esc($kelas->nama) ?>">
        <?php else : ?>
            <img src="https://ui-avatars.com/api/?name=<?= urlencode($kelas->nama) ?>&background=7c3aed&color=fff&size=800" alt="<?= esc($kelas->nama) ?>">
        <?php endif; ?>
    </div>
    <div class="detail-info">
        <span class="badge-category"><?= esc($kelas->kategori_nama ?? 'Umum') ?></span>
        <h1 class="detail-title"><?= esc($kelas->nama) ?></h1>
        <div class="detail-price">
            <?= isset($kelas->harga) && $kelas->harga > 0 ? 'Rp ' . number_format($kelas->harga, 0, ',', '.') : 'Gratis' ?>
        </div>
        <?php if ($materi || ($kelas->harga > 0 && empty($kelas->mulai_kelas))): ?>
            <div class="d-flex flex-column flex-sm-row flex-lg-column flex-xl-row align-items-start align-items-sm-center gap-3 mt-4">
                <?php if ($kelas->harga > 0 && empty($kelas->mulai_kelas)): ?>
                    <a href="<?= base_url('app/kelas/' . $kelas->id . '/beli') ?>" class="btn btn-primary rounded-3 px-4 py-2 fw-bold d-inline-flex align-items-center justify-content-center w-100 w-sm-auto">
                        <i class="ri-shopping-cart-2-line me-2 fs-5"></i> Beli Kelas
                    </a>
                <?php elseif ($materi): ?>
                    <a href="<?= base_url('app/kelas/' . $kelas->id . '/materi/' . $materi[0]->id) ?>" class="btn btn-primary rounded-3 px-4 py-2 fw-bold d-inline-flex align-items-center justify-content-center w-100 w-sm-auto">
                        <i class="ri-play-circle-line me-2 fs-5"></i> <?= isset($kelas->lulus) && $kelas->lulus == 1 ? 'Belajar Lagi' : 'Mulai Belajar' ?>
                    </a>
                <?php endif; ?>

                <?php if (isset($kelas->lulus) && $kelas->lulus == 1): ?>
                    <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-3 w-100 w-sm-auto" style="font-size: 0.95rem; font-weight: 600;">
                        <i class="ri-medal-fill me-2 fs-5"></i> Lulus Kelas pada <?= date('d M Y', strtotime($kelas->lulus_at)) ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <?php if ($kelas->deskripsi): ?>
            <div class="mb-5">
                <h4 class="section-title"><i class="ri-information-line"></i> Tentang Kelas</h4>
                <div class="description-text">
                    <?= !empty($kelas->deskripsi) ? nl2br(esc($kelas->deskripsi)) : '<p class="fst-italic">Belum ada deskripsi untuk kelas ini.</p>' ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="mb-5">
            <h4 class="section-title"><i class="ri-list-check"></i> Kurikulum Kelas</h4>
            <?php if (!empty($materi)) : ?>
                <div class="materi-list">
                    <?php foreach ($materi as $index => $m) : ?>
                        <?php
                        $is_clickable = true;
                        if (($index > 0 && empty($materi[$index - 1]->completed_at) && empty($m->completed_at)) || ($kelas->harga > 0 && empty($kelas->mulai_kelas))) {
                            $is_clickable = false;
                        }
                        ?>
                        <div class="materi-item" <?= !$is_clickable ? 'style="opacity: 0.5;"' : '' ?>>
                            <div class="materi-number"><?= $index + 1 ?></div>
                            <div class="materi-info">
                                <div class="materi-title"><?= esc($m->judul) ?></div>
                                <div class="materi-meta">
                                    <span>
                                        <?php if (!$is_clickable): ?>
                                            <i class="ri-lock-line me-1"></i> Terkunci
                                        <?php else: ?>
                                            <i class="ri-<?= $m->type === 'quiz' ? 'question-line' : 'video-line' ?> me-1"></i> <?= ucfirst($m->type) ?>
                                        <?php endif; ?>
                                    </span>
                                    <?php if ($m->type === 'quiz') : ?>
                                        <span><i class="ri-medal-line me-1"></i> Min. <?= $m->min_pass_score ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($is_clickable): ?>
                                <a href="<?= base_url('app/kelas/' . $kelas->id . '/materi/' . $m->id) ?>" class="btn-play">
                                    <i class="ri-<?= $m->type === 'quiz' ? 'arrow-right-line' : 'play-fill' ?>"></i>
                                </a>
                            <?php else: ?>
                                <div class="btn-play" style="cursor: not-allowed; background: rgba(124, 58, 237, 0.05); color: #64748b;">
                                    <i class="ri-lock-fill"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="alert alert-info">
                    <i class="ri-error-warning-line me-2"></i> Belum ada materi yang ditambahkan untuk kelas ini.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Sidebar info bisa ditambahkan di sini jika perlu (mentor, durasi, dll) -->
        <div class="card p-4 shadow-soft">
            <h5 class="fw-bold mb-3">Apa yang Anda dapatkan?</h5>
            <div class="d-flex flex-column gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box-primary rounded-circle p-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-video-line"></i>
                    </div>
                    <span class="text-secondary small"><?= count(array_filter($materi, fn($m) => $m->type === 'materi')) ?> Video Pembelajaran</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box-primary rounded-circle p-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-questionnaire-line"></i>
                    </div>
                    <span class="text-secondary small"><?= count(array_filter($materi, fn($m) => $m->type === 'quiz')) ?> Quiz Interaktif</span>
                </div>
                <!-- <div class="d-flex align-items-center gap-3">
                    <div class="icon-box-primary rounded-circle p-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-award-line"></i>
                    </div>
                    <span class="text-secondary small">Sertifikat Kelulusan</span>
                </div> -->
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box-primary rounded-circle p-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                        <i class="ri-infinity-line"></i>
                    </div>
                    <span class="text-secondary small">Akses Selamanya</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>