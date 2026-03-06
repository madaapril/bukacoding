<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<style>
    .card-statistik h6 {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--color-gray-500);
    }

    .card-statistik h5 {
        font-size: 1.15rem;
        color: var(--color-gray-800);
    }

    .icon-box {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
    }
</style>

<div class="row g-3 card-statistik">
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card shadow-soft rounded-3 p-3 bg-white border-0">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-primary bg-opacity-10 me-3">
                    <i class="fa-solid fa-cart-shopping text-primary fs-6"></i>
                </div>
                <div>
                    <h6 class="mb-1">Transaksi Hari Ini</h6>
                    <h5 class="mb-0 fw-bold text-dark">124</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card shadow-soft rounded-3 p-3 bg-white border-0">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-success bg-opacity-10 me-3">
                    <i class="fa-solid fa-money-bill-trend-up text-success fs-6"></i>
                </div>
                <div>
                    <h6 class="mb-1">Pendapatan</h6>
                    <h5 class="mb-0 fw-bold text-dark">Rp 2.450.000</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card shadow-soft rounded-3 p-3 bg-white border-0">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-danger bg-opacity-10 me-3">
                    <i class="fa-solid fa-arrow-right-from-bracket text-danger fs-6"></i>
                </div>
                <div>
                    <h6 class="mb-1">Pengeluaran</h6>
                    <h5 class="mb-0 fw-bold text-dark">Rp 850.000</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card shadow-soft rounded-3 p-3 bg-white border-0">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-warning bg-opacity-10 me-3">
                    <i class="fa-solid fa-users text-warning fs-6"></i>
                </div>
                <div>
                    <h6 class="mb-1">Pelanggan</h6>
                    <h5 class="mb-0 fw-bold text-dark">45</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-soft rounded-3 bg-white border-0">
            <div class="card-header bg-transparent border-0 p-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-dark" style="font-size: 1.1rem;">Omset Penjualan</h5>
                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm border-0 bg-light rounded-3" id="filterBulan" style="width: auto;">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3" selected>Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select class="form-select form-select-sm border-0 bg-light rounded-3" id="filterTahun" style="width: auto;">
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026" selected>2026</option>
                    </select>
                </div>
            </div>
            <div class="card-body p-4">
                <div style="height: 300px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4 gy-4">
    <div class="col-12 col-xl-8">
        <div class="card shadow-soft rounded-3 bg-white border-0 h-100">
            <div class="card-header bg-transparent border-0 p-4 pb-3">
                <h5 class="mb-0 fw-bold text-dark" style="font-size: 1.1rem;">Penjualan Terkini</h5>
            </div>
            <div class="card-body p-0 pb-2">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
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
    <div class="col-12 col-xl-4">
        <div class="card shadow-soft rounded-3 bg-white border-0 h-100">
            <div class="card-header bg-transparent border-0 p-4 pb-1">
                <h5 class="mb-0 fw-bold text-dark" style="font-size: 1.1rem;">5 Menu Terlaris</h5>
            </div>
            <div class="card-body p-4">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-primary me-3" style="width: 20px;">1</span>
                            <img src="https://ui-avatars.com/api/?name=Kopi+Susu&background=56a7fe&color=fff" class="rounded-3 me-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Kopi Susu">
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Kopi Susu Gula Aren</h6>
                                <small class="text-muted">Minuman</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold">142 terjual</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-secondary me-3" style="width: 20px;">2</span>
                            <img src="https://ui-avatars.com/api/?name=Indomie+Goreng&background=56a7fe&color=fff" class="rounded-3 me-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Indomie Goreng">
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Indomie Goreng Jumbo</h6>
                                <small class="text-muted">Makanan</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold">98 terjual</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-secondary me-3" style="width: 20px;">3</span>
                            <img src="https://ui-avatars.com/api/?name=Roti+Bakar&background=56a7fe&color=fff" class="rounded-3 me-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Roti Bakar">
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Roti Bakar Coklat</h6>
                                <small class="text-muted">Camilan</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold">75 terjual</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-secondary me-3" style="width: 20px;">4</span>
                            <img src="https://ui-avatars.com/api/?name=Es+Teh&background=56a7fe&color=fff" class="rounded-3 me-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Es Teh">
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Es Teh Manis</h6>
                                <small class="text-muted">Minuman</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold">64 terjual</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between p-2 rounded-3 hover-bg-light">
                        <div class="d-flex align-items-center">
                            <span class="fw-bold text-secondary me-3" style="width: 20px;">5</span>
                            <img src="https://ui-avatars.com/api/?name=Mendoan&background=56a7fe&color=fff" class="rounded-3 me-3" style="width: 45px; height: 45px; object-fit: cover;" alt="Mendoan">
                            <div>
                                <h6 class="mb-0 fw-bold text-dark" style="font-size: 0.9rem;">Tempe Mendoan</h6>
                                <small class="text-muted">Camilan</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold">52 terjual</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('salesChart').getContext('2d');

        // Dummy JSON data mapping date to total revenue
        const dummyData = {
            "2026-03": {
                "01": 1500000,
                "02": 1800000,
                "03": 1200000,
                "04": 2100000,
                "05": 2500000,
                "06": 2450000,
                "07": 1900000,
                "08": 2200000,
                "09": 2800000,
                "10": 3000000,
                "11": 2700000,
                "12": 2400000,
                "13": 2100000,
                "14": 2300000,
                "15": 2600000,
                "16": 2900000,
                "17": 3100000,
                "18": 2800000,
                "19": 2500000,
                "20": 2200000,
                "21": 2400000,
                "22": 2700000,
                "23": 3000000,
                "24": 3200000,
                "25": 2900000,
                "26": 2600000,
                "27": 2800000,
                "28": 3100000,
                "29": 3300000,
                "30": 3500000,
                "31": 3400000
            }
        };

        const currentMonthData = dummyData["2026-03"];
        const labels = Object.keys(currentMonthData).sort();
        const values = labels.map(label => currentMonthData[label]);

        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Omset (Rp)',
                    data: values,
                    borderColor: '#56a7fe',
                    backgroundColor: 'rgba(86, 167, 254, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    pointBackgroundColor: '#56a7fe',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR',
                                        maximumSignificantDigits: 3
                                    }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                if (value >= 1000000) {
                                    return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                                }
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Mocking filter change behavior
        document.getElementById('filterBulan').addEventListener('change', function() {
            // In a real implementation, you would fetch new data here
            console.log('Filter bulan changed: ' + this.value);
        });

        document.getElementById('filterTahun').addEventListener('change', function() {
            console.log('Filter tahun changed: ' + this.value);
        });
    });
</script>
<?= $this->endSection() ?>