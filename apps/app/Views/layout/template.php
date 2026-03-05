<?= $this->include('layout/header'); ?>

<div id="wrapper">
    <?= $this->include('layout/sidebar'); ?>

    <div id="page-content-wrapper">
        <div id="sidebar-overlay"></div>
        <?= $this->include('layout/topbar'); ?>

        <main class="container-fluid p-4">
            <?= $this->renderSection('content'); ?>
        </main>

        <?= $this->include('layout/footer'); ?>
    </div>
</div>