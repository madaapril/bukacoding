<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row g-4">
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-cart-shopping text-primary fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Transaksi Hari Ini</h6>
                    <h4 class="mb-0 fw-bold">124</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-money-bill-trend-up text-success fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Pendapatan</h6>
                    <h4 class="mb-0 fw-bold">Rp 2.450.000</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-danger bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-arrow-right-from-bracket text-danger fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Pengeluaran</h6>
                    <h4 class="mb-0 fw-bold">Rp 850.000</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                    <i class="fa-solid fa-users text-warning fs-4"></i>
                </div>
                <div>
                    <h6 class="text-secondary mb-1">Pelanggan</h6>
                    <h4 class="mb-0 fw-bold">45</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 bg-white">
            <div class="card-header bg-transparent border-0 p-4">
                <h5 class="mb-0 fw-bold">Penjualan Terkini</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">No. Transaksi</th>
                                <th>Waktu</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 fw-medium">TRX-20240306-001</td>
                                <td>08:30</td>
                                <td>Rp 45.000</td>
                                <td><span class="badge bg-success-subtle text-success border border-success-subtle">Selesai</span></td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-light rounded-3"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4 fw-medium">TRX-20240306-002</td>
                                <td>09:15</td>
                                <td>Rp 120.000</td>
                                <td><span class="badge bg-success-subtle text-success border border-success-subtle">Selesai</span></td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-light rounded-3"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>