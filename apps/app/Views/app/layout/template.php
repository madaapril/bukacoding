<?= $this->include('app/layout/header'); ?>

<div id="wrapper">
    <?= $this->include('app/layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <div id="sidebar-overlay"></div>
        <?= $this->include('app/layout/topbar'); ?>

        <main class="container-xxl p-4">
            <?= $this->renderSection('content'); ?>
        </main>

        <?= $this->include('app/layout/footer'); ?>
    </div>
</div>