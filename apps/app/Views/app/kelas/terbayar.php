<?= $this->extend('app/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .success-card {
        background: var(--surface-card);
        border: 1px solid rgba(16, 185, 129, 0.2);
        border-radius: 20px;
        padding: 3rem 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        text-align: center;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }

    .success-card::before {
        content: "";
        position: absolute;
        top: -50px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.15) 0%, transparent 70%);
        pointer-events: none;
    }

    .success-icon-wrapper {
        width: 100px;
        height: 100px;
        background: rgba(16, 185, 129, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        position: relative;
    }

    .success-icon-wrapper i {
        font-size: 3.5rem;
        color: #10b981;
        animation: scaleIn 0.5s ease-out forwards;
    }

    .success-title {
        font-size: 2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 1rem;
    }

    .success-message {
        color: #94a3b8;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2.5rem;
    }

    .class-info-box {
        background: rgba(124, 58, 237, 0.05);
        border: 1px solid rgba(124, 58, 237, 0.15);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2.5rem;
        text-align: left;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .class-info-img {
        width: 100px;
        height: 70px;
        border-radius: 10px;
        object-fit: cover;
    }

    .class-info-detail h5 {
        margin: 0 0 0.25rem 0;
        color: #e2e8f0;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .class-info-detail p {
        margin: 0;
        color: #94a3b8;
        font-size: 0.9rem;
    }

    .btn-action-primary {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 14px;
        font-size: 1.1rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .btn-action-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(124, 58, 237, 0.4);
        color: white;
    }

    .btn-action-secondary {
        background: rgba(255, 255, 255, 0.05);
        color: #e2e8f0;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1rem 2rem;
        border-radius: 14px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-action-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .pending-card {
        background: var(--surface-card);
        border: 1px solid rgba(234, 179, 8, 0.25);
        border-radius: 20px;
        padding: 3rem 2rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        text-align: center;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }

    .pending-card::before {
        content: "";
        position: absolute;
        top: -50px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(234, 179, 8, 0.12) 0%, transparent 70%);
        pointer-events: none;
    }

    .pending-icon-wrapper {
        width: 100px;
        height: 100px;
        background: rgba(234, 179, 8, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
    }

    .pending-icon-wrapper i {
        font-size: 3.5rem;
        color: #eab308;
        animation: pulse 1.8s ease-in-out infinite;
    }

    .pending-title {
        font-size: 2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 1rem;
    }

    .pending-message {
        color: #94a3b8;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2.5rem;
    }

    .btn-check-status {
        background: linear-gradient(135deg, #eab308, #ca8a04);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 14px;
        font-size: 1.1rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-check-status:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(234, 179, 8, 0.4);
        color: white;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.7;
        }
    }

    @keyframes scaleIn {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        60% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @media (max-width: 576px) {
        .class-info-box {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn-action-primary,
        .btn-action-secondary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="row justify-content-center py-5">
    <div class="col-12">

        <?php if ($transaksi->status === 'paid') : ?>

            <div class="success-card">
                <div class="success-icon-wrapper">
                    <i class="ri-check-double-line"></i>
                </div>

                <h2 class="success-title">Pembayaran Berhasil!</h2>
                <p class="success-message">
                    Terima kasih atas pembelian Anda. Transaksi Anda telah berhasil diproses dan akses ke kelas sudah dibuka. Selamat belajar!
                </p>

                <div class="class-info-box">
                    <?php if (!empty($kelas->gambar)) : ?>
                        <img src="<?= base_url('uploads/kelas/' . $kelas->gambar) ?>" alt="<?= esc($kelas->nama) ?>" class="class-info-img">
                    <?php else : ?>
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($kelas->nama) ?>&background=7c3aed&color=fff&size=800" alt="<?= esc($kelas->nama) ?>" class="class-info-img">
                    <?php endif; ?>
                    <div class="class-info-detail">
                        <h5><?= esc($kelas->nama) ?></h5>
                        <p><i class="ri-shield-check-line text-success me-1"></i>Akses seumur hidup telah aktif</p>
                    </div>
                </div>

                <div class="action-buttons d-flex justify-content-center gap-3">
                    <a href="<?= base_url('app/kelas') ?>" class="btn-action-secondary">
                        Kembali ke Daftar
                    </a>
                    <a href="<?= base_url('app/kelas/' . $kelas->id . '/detail') ?>" class="btn-action-primary">
                        Mulai Belajar Sekarang <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>

        <?php else : ?>

            <div class="pending-card">
                <div class="pending-icon-wrapper">
                    <i class="ri-time-line"></i>
                </div>

                <h2 class="pending-title">Menunggu Pembayaran</h2>
                <p class="pending-message">
                    Pembayaran Anda belum diterima. Silakan selesaikan pembayaran terlebih dahulu, lalu klik tombol di bawah untuk memperbarui status.
                </p>

                <div class="class-info-box">
                    <?php if (!empty($kelas->gambar)) : ?>
                        <img src="<?= base_url('uploads/kelas/' . $kelas->gambar) ?>" alt="<?= esc($kelas->nama) ?>" class="class-info-img">
                    <?php else : ?>
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($kelas->nama) ?>&background=7c3aed&color=fff&size=800" alt="<?= esc($kelas->nama) ?>" class="class-info-img">
                    <?php endif; ?>
                    <div class="class-info-detail">
                        <h5><?= esc($kelas->nama) ?></h5>
                        <p><i class="ri-time-line" style="color:#eab308"></i> Akses belum aktif &mdash; menunggu konfirmasi pembayaran</p>
                    </div>
                </div>

                <div class="action-buttons d-flex justify-content-center gap-3">
                    <a href="<?= base_url('app/kelas') ?>" class="btn-action-secondary">
                        Kembali ke Daftar
                    </a>
                    <button onclick="location.reload()" class="btn-check-status">
                        <i class="ri-refresh-line"></i> Cek Status Pembayaran
                    </button>
                </div>
            </div>

        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>