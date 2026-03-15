<?= $this->include('admin/layout/header'); ?>

<div id="wrapper">
    <?= $this->include('admin/layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <div id="sidebar-overlay"></div>
        <?= $this->include('admin/layout/topbar'); ?>

        <main class="container-xxl p-4">
            <?= $this->renderSection('content'); ?>
        </main>

        <?= $this->include('admin/layout/footer'); ?>
    </div>
</div>