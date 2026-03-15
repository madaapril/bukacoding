<?= $this->extend('app/layout/template') ?>

<?= $this->section('content') ?>

<style>
    .btn-action {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
        color: var(--color-gray-500, #94a3b8);
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.35;
    }

    .badge-status {
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .badge-pending {
        background-color: #fffbeb;
        color: #d97706;
        border: 1px solid #fde68a;
    }

    .badge-success {
        background-color: #ecfdf5;
        color: #059669;
        border: 1px solid #a7f3d0;
    }

    .badge-failed {
        background-color: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 text-dark fw-bold">Riwayat Transaksi</h4>
        <p class="text-muted mb-0 small">Lihat semua riwayat pembelian kelas Anda di sini.</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-4">
        <?php if (!empty($transaksi)) : ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tableTransaksi">
                    <thead class="">
                        <tr>
                            <th width="5%" class="text-center rounded-start">No</th>
                            <th width="15%">Waktu Order</th>
                            <th>Kelas</th>
                            <th width="15%">Total Tagihan</th>
                            <th width="15%">Status</th>
                            <th width="15%">Waktu Bayar</th>
                            <th width="10%" class="rounded-end text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi as $t) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= date('d M Y, H:i', strtotime($t->created_at)) ?></td>
                                <td class="fw-medium text-dark"><?= esc($t->kelas_nama) ?></td>
                                <td class="fw-bold">Rp <?= number_format($t->amount, 0, ',', '.') ?></td>
                                <td>
                                    <?php
                                    $statusClass = 'badge-pending';
                                    $statusText = 'Pending';
                                    if (in_array(strtolower($t->status), ['settled', 'success', 'paid'])) {
                                        $statusClass = 'badge-success';
                                        $statusText = 'Paid';
                                    } elseif (in_array(strtolower($t->status), ['expired', 'failed', 'canceled', 'batal'])) {
                                        $statusClass = 'badge-failed';
                                        $statusText = 'Gagal/Expired';
                                    }
                                    ?>
                                    <span class="badge-status <?= $statusClass ?>"><?= $statusText ?></span>
                                </td>
                                <td>
                                    <?= (!empty($t->paid_at) && $t->paid_at != '0000-00-00 00:00:00') ? date('d M Y, H:i', strtotime($t->paid_at)) : '-' ?>
                                </td>
                                <td class="text-center">
                                    <?php if (strtolower($t->status) === 'pending' && !empty($t->link)) : ?>
                                        <a href="<?= esc($t->link) ?>" target="_blank" class="btn btn-sm btn-warning rounded-pill px-3 fw-semibold">
                                            <i class="ri-bank-card-line me-1"></i>Bayar
                                        </a>
                                    <?php else : ?>
                                        <span class="text-muted small">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="empty-state">
                <i class="ri-shopping-bag-3-line d-block"></i>
                <h5 class="fw-bold text-dark mb-1 mt-3">Belum ada transaksi</h5>
                <p class="text-muted">Anda belum melakukan pembelian kelas apapun.</p>
                <a href="<?= base_url('app/kelas') ?>" class="btn btn-primary-custom mt-2 rounded-pill px-4">Cari Kelas</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        if ($('#tableTransaksi').length) {
            $('#tableTransaksi').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                ordering: false,
                // "order": [
                //     [1, "desc"]
                // ], // Urutkan berdasarkan created_at (index 1) descending
                "dom": '<"row align-items-center mb-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            });
        }
    });
</script>
<?= $this->endSection() ?>