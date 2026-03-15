<?= $this->extend('app/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .checkout-card {
        background: var(--surface-card);
        border: 1px solid rgba(124, 58, 237, 0.15);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .checkout-header {
        font-size: 1.5rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .order-item {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        padding: 1.5rem;
        background: rgba(124, 58, 237, 0.03);
        border: 1px solid rgba(124, 58, 237, 0.1);
        border-radius: 16px;
        margin-bottom: 2rem;
    }

    .order-item-img {
        width: 140px;
        height: 90px;
        border-radius: 12px;
        object-fit: cover;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .order-item-detail h4 {
        margin: 0 0 0.5rem 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: #e2e8f0;
    }

    .order-item-detail .category {
        font-size: 0.85rem;
        color: var(--primary-light);
        font-weight: 600;
        background: rgba(124, 58, 237, 0.1);
        padding: 4px 10px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .order-item-price {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--accent-light);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        color: #cbd5e1;
        font-size: 1rem;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px dashed rgba(124, 58, 237, 0.3);
        font-size: 1.5rem;
        font-weight: 800;
        color: #fff;
    }

    .btn-pay {
        background: linear-gradient(135deg, #7c3aed, #6d28d9);
        color: white;
        border: none;
        padding: 1.25rem;
        border-radius: 16px;
        font-size: 1.1rem;
        font-weight: 800;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 2rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-pay:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
        color: white;
    }

    .benefits-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-top: 2rem;
    }

    .benefit-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #94a3b8;
        font-size: 0.95rem;
    }

    .benefit-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .order-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .order-item-img {
            width: 100%;
            height: 180px;
        }
    }
</style>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('app/kelas') ?>" class="text-primary-custom text-decoration-none">Daftar Kelas</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('app/kelas/' . $kelas->id . '/detail') ?>" class="text-primary-custom text-decoration-none"><?= esc($kelas->nama) ?></a></li>
        <li class="breadcrumb-item active text-secondary" aria-current="page">Beli Kelas</li>
    </ol>
</nav>

<div class="row g-4 justify-content-center">
    <!-- Rincian Pesanan (Kiri) -->
    <div class="col-xl-7">
        <div class="checkout-card h-100">
            <h3 class="checkout-header">
                <i class="ri-shopping-cart-2-line text-primary-light"></i> Rincian Pesanan
            </h3>

            <div class="order-item">
                <?php if (!empty($kelas->gambar)) : ?>
                    <img src="<?= base_url('uploads/kelas/' . $kelas->gambar) ?>" alt="<?= esc($kelas->nama) ?>" class="order-item-img">
                <?php else : ?>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($kelas->nama) ?>&background=7c3aed&color=fff&size=800" alt="<?= esc($kelas->nama) ?>" class="order-item-img">
                <?php endif; ?>

                <div class="order-item-detail w-100">
                    <span class="category"><?= esc($kelas->kategori_nama ?? 'Umum') ?></span>
                    <h4><?= esc($kelas->nama) ?></h4>
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-end mt-3">
                        <span class="text-secondary small">Akses Selamanya</span>
                        <div class="order-item-price">Rp <?= number_format($kelas->harga, 0, ',', '.') ?></div>
                    </div>
                </div>
            </div>

            <h5 class="fw-bold mt-4 mb-3 text-white">Keuntungan Membeli Kelas Ini:</h5>
            <div class="benefits-list">
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="ri-check-line"></i></div>
                    Akses materi video pembelajaran berkualitas tinggi selamanya.
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="ri-check-line"></i></div>
                    Evaluasi pemahaman dengan kuis dan tugas interaktif.
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="ri-check-line"></i></div>
                    Belajar kapan saja dan di mana saja (Fleksibel).
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon"><i class="ri-check-line"></i></div>
                    Pembaruan materi secara berkala tanpa biaya tambahan.
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan Pembayaran (Kanan) -->
    <div class="col-xl-5">
        <div class="checkout-card position-sticky" style="top: 100px;">
            <h3 class="checkout-header fs-5 mb-4">
                <i class="ri-wallet-3-line text-primary-light"></i> Ringkasan Pembayaran
            </h3>

            <div class="summary-row">
                <span>Harga Kelas</span>
                <span class="fw-bold text-white">Rp <?= number_format($kelas->harga, 0, ',', '.') ?></span>
            </div>
            <div class="summary-row">
                <span>Biaya Layanan</span>
                <span class="text-success fw-bold">Gratis</span>
            </div>

            <div class="summary-total">
                <span>Total Bayar</span>
                <span class="text-accent-light">Rp <?= number_format($kelas->harga, 0, ',', '.') ?></span>
            </div>

            <!-- Tombol untuk integrasi Mayar nantinya -->
            <form action="<?= base_url('app/kelas/' . $kelas->id . '/mayar') ?>" method="post">
                <button type="submit" class="btn-pay">
                    Lanjutkan ke Pembayaran <i class="ri-arrow-right-line"></i>
                </button>
            </form>

            <div class="text-center mt-3 text-secondary" style="font-size: 0.85rem;">
                <i class="ri-shield-check-line text-success"></i> Transaksi Anda aman dan terenkripsi
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>