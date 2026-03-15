<?= $this->extend('app/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .kelas-card {
        background: var(--surface-card);
        border: 1px solid rgba(124, 58, 237, 0.15);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .kelas-card:hover {
        transform: translateY(-8px);
        border-color: var(--primary);
        box-shadow: 0 12px 30px rgba(124, 58, 237, 0.2);
    }

    .card-img-wrapper {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .card-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .kelas-card:hover .card-img-wrapper img {
        transform: scale(1.1);
    }

    .card-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        padding: 5px 12px;
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 600;
        backdrop-filter: blur(8px);
        background: rgba(15, 10, 30, 0.6);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .card-body {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .class-category {
        font-size: 0.75rem;
        color: var(--primary-light);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .class-title {
        font-size: 1.1rem;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 1rem;
        color: #e2e8f0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 3.1rem;
    }

    .class-info-footer {
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid rgba(124, 58, 237, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .class-price {
        font-weight: 700;
        color: var(--accent-light);
        font-size: 1rem;
    }

    .btn-detail {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        padding: 0.6rem 1.25rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-detail:hover {
        background: linear-gradient(135deg, var(--primary-light), var(--primary));
        transform: scale(1.05);
        color: white;
        box-shadow: 0 5px 15px rgba(124, 58, 237, 0.4);
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--surface-card);
        border-radius: 20px;
        border: 1px dashed rgba(124, 58, 237, 0.3);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--primary-light);
        opacity: 0.5;
        margin-bottom: 1.5rem;
    }
</style>

<h6 class="mb-3 fw-light text-secondary">Selamat Datang,</h6>
<h2><?= session()->get('name') ?></h2>

<hr>

<h2 class="text-center mb-4">Kelas Saya</h2>

<div>
    <?php if ($kelas): ?>
        <div class="row g-4">
            <?php foreach ($kelas as $k) : ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="kelas-card">
                        <div class="card-img-wrapper">
                            <?php if (!empty($k->gambar)) : ?>
                                <img src="<?= base_url('uploads/kelas/' . $k->gambar) ?>" alt="<?= esc($k->nama) ?>">
                            <?php else : ?>
                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($k->nama) ?>&background=7c3aed&color=fff&size=500" alt="<?= esc($k->nama) ?>">
                            <?php endif; ?>
                            <div class="card-badge">
                                <i class="ri-book-open-line me-1"></i> <?= esc($k->kategori_nama ?? 'Umum') ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="class-category"><?= esc($k->kategori_nama ?? 'Kategori') ?></span>
                            <h5 class="class-title" title="<?= esc($k->nama) ?>"><?= esc($k->nama) ?></h5>
                            <?php
                            $persen = 0;
                            if ($k->total_materi > 0) {
                                $persen = round(($k->total_selesai / $k->total_materi) * 100);
                            }
                            ?>
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="small text-secondary"><?= $k->total_selesai ?> dari <?= $k->total_materi ?> Materi</span>
                                    <span class="small fw-bold" style="color: var(--primary-light);"><?= $persen ?>%</span>
                                </div>
                                <div class="progress" style="height: 8px; background-color: rgba(255,255,255,0.06); border-radius: 4px; overflow: hidden;">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%; background: linear-gradient(135deg, var(--primary), var(--primary-dark));" aria-valuenow="<?= $persen ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="class-info-footer">
                                <a href="<?= base_url('app/kelas/' . $k->id . '/detail') ?>" class="btn-detail ms-auto">
                                    Lanjut Belajar <i class="ri-arrow-right-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Anda belum terdaftar di kelas manapun</p>
    <?php endif; ?>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>