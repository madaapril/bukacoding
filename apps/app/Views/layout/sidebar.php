<div id="sidebar-wrapper">
    <div class="sidebar-heading">
        <div class="logo">D</div>
        <span>DIKEDAI POS</span>
    </div>
    <div class="list-group list-group-flush">
        <a href="<?= base_url('dashboard') ?>" class="list-group-item <?= getSegment(1) == 'dashboard' ? 'active' : ''; ?>">
            <i class="ri-dashboard-2-line"></i> Dashboard
        </a>

        <div class="menu-header">Transaksi</div>
        <a href="<?= base_url('pos') ?>" class="list-group-item <?= getSegment(1) == 'pos' ? 'active' : ''; ?>">
            <i class="ri-shopping-cart-2-line"></i> Kasir
        </a>
        <a href="<?= base_url('pengeluaran') ?>" class="list-group-item <?= getSegment(1) == 'pengeluaran' ? 'active' : ''; ?>">
            <i class="ri-hand-coin-line"></i> Pengeluaran
        </a>

        <div class="menu-header">Master Data</div>
        <a href="<?= base_url('menu') ?>" class="list-group-item <?= getSegment(1) == 'menu' ? 'active' : ''; ?>">
            <i class="ri-restaurant-line"></i> Menu
        </a>
        <!-- <a href="<?= base_url('kategori-menu') ?>" class="list-group-item <?= getSegment(1) == 'kategori-menu' ? 'active' : ''; ?>">
            <i class="ri-price-tag-3-line"></i> Kategori Menu
        </a> -->
        <a href="<?= base_url('item-pengeluaran') ?>" class="list-group-item <?= getSegment(1) == 'item-pengeluaran' ? 'active' : ''; ?>">
            <i class="ri-archive-line"></i> Item Pengeluaran
        </a>
        <!-- <a href="<?= base_url('kategori-pengeluaran') ?>" class="list-group-item <?= getSegment(1) == 'kategori-pengeluaran' ? 'active' : ''; ?>">
            <i class="ri-stack-line"></i> Kategori Pengeluaran
        </a> -->

        <div class="menu-header">Pengaturan</div>
        <a href="<?= base_url('kedai') ?>" class="list-group-item <?= getSegment(1) == 'kedai' ? 'active' : ''; ?>">
            <i class="ri-store-2-line"></i> Kedai
        </a>
    </div>
</div>