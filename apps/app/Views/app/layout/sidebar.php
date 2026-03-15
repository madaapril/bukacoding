<div id="sidebar-wrapper">
    <div class="sidebar-heading">
        <a href="<?= base_url('dashboard') ?>">
            <div class="logo">B</div>
            <span>BukaCoding</span>
        </a>
    </div>
    <div class="list-group list-group-flush">
        <!-- <div class="menu-header">Menu</div> -->
        <a href="<?= base_url('app/dashboard') ?>" class="list-group-item <?= getSegment(2) == 'dashboard' ? 'active' : ''; ?>">
            <i class="ri-dashboard-2-line"></i> Dashboard
        </a>

        <a href="<?= base_url('app/kelas') ?>" class="list-group-item <?= getSegment(2) == 'kelas' ? 'active' : ''; ?>">
            <i class="ri-book-line"></i> Kelas
        </a>

        <a href="<?= base_url('app/transaksi') ?>" class="list-group-item <?= getSegment(2) == 'transaksi' ? 'active' : ''; ?>">
            <i class="ri-shopping-cart-2-line"></i> Transaksi
        </a>

    </div>
</div>