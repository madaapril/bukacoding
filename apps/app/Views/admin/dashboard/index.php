<?= $this->extend('admin/layout/template') ?>

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

<h6 class="mb-3 fw-light text-secondary">Hari Ini</h6>
<div class="row g-3 card-statistik">
    <!-- <div class="col-12 col-lg-6 col-xl-3">
        <div class="card shadow-soft rounded-3 p-3 bg-white border-0">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-primary bg-opacity-10 me-3">
                    <i class="fa-solid fa-cart-shopping text-primary fs-6"></i>
                </div>
                <div>
                    <h6 class="mb-1 fw-light">Transaksi</h6>
                    <h5 class="mb-0 fw-bold text-dark">4</h5>
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
                    <h6 class="mb-1 fw-light">Omset</h6>
                    <h5 class="mb-0 fw-bold text-dark">Rp 2.450.000</h5>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card shadow-soft rounded-3 p-3 bg-white border-0">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-danger bg-opacity-10 me-3">
                    <i class="fa-solid fa-chalkboard-user text-danger fs-6"></i>
                </div>
                <div>
                    <h6 class="mb-1 fw-light">Kelas</h6>
                    <h5 class="mb-0 fw-bold text-dark"><?= $kelas; ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card shadow-soft rounded-3 p-3 bg-white border-0">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-info bg-opacity-10 me-3">
                    <i class="fa-solid fa-user-group text-info fs-6"></i>
                </div>
                <div>
                    <h6 class="mb-1 fw-light">Peserta</h6>
                    <h5 class="mb-0 fw-bold text-dark"><?= $peserta; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <hr class="" style="margin-top: 40px; margin-bottom: 40px;opacity: 0.05;"> -->

<!-- <h6 class="mb-3 fw-light text-secondary">Penjualan Bulan Ini</h6>
<div class="row gy-4">
    <div class="col-12">
        <div class="card shadow-soft rounded-3 bg-white border-0">
            <div class="card-header bg-transparent border-0 p-4 pb-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-2 fw-bold text-dark" style="font-size: 1.1rem;">Omset Penjualan</h5>
            </div>
            <div class="card-body p-4">
                <div style="height: 300px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div> -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        // const ctx = $('#salesChart')[0].getContext('2d');

        // Dummy JSON data mapping date to total revenue
        // const dummyData = {
        //     "2026-03": {
        //         "01": 1500000,
        //         "02": 1800000,
        //         "03": 1200000,
        //         "04": 2100000,
        //         "05": 2500000,
        //         "06": 2450000,
        //         "07": 1900000,
        //         "08": 2200000,
        //         "09": 2800000,
        //         "10": 3000000,
        //         "11": 2700000,
        //         "12": 2400000,
        //         "13": 2100000,
        //         "14": 2300000,
        //         "15": 2600000,
        //         "16": 2900000,
        //         "17": 3100000,
        //         "18": 2800000,
        //         "19": 2500000,
        //         "20": 2200000,
        //         "21": 2400000,
        //         "22": 2700000,
        //         "23": 3000000,
        //         "24": 3200000,
        //         "25": 2900000,
        //         "26": 2600000,
        //         "27": 2800000,
        //         "28": 3100000,
        //         "29": 3300000,
        //         "30": 3500000,
        //         "31": 3400000
        //     }
        // };

        // const currentMonthData = dummyData["2026-03"];
        // const labels = Object.keys(currentMonthData).sort();
        // const values = labels.map(label => currentMonthData[label]);

        // new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: labels,
        //         datasets: [{
        //             label: 'Total Omset (Rp)',
        //             data: values,
        //             borderColor: '#56a7fe',
        //             backgroundColor: 'rgba(86, 167, 254, 0.1)',
        //             borderWidth: 3,
        //             fill: true,
        //             tension: 0.4,
        //             pointRadius: 4,
        //             pointHoverRadius: 6,
        //             pointBackgroundColor: '#56a7fe',
        //             pointBorderColor: '#fff',
        //             pointBorderWidth: 2
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         plugins: {
        //             legend: {
        //                 display: false
        //             },
        //             tooltip: {
        //                 callbacks: {
        //                     label: function(context) {
        //                         let label = context.dataset.label || '';
        //                         if (label) label += ': ';
        //                         if (context.parsed.y !== null) {
        //                             label += new Intl.NumberFormat('id-ID', {
        //                                 style: 'currency',
        //                                 currency: 'IDR',
        //                                 maximumSignificantDigits: 3
        //                             }).format(context.parsed.y);
        //                         }
        //                         return label;
        //                     }
        //                 }
        //             }
        //         },
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //                 grid: {
        //                     display: true,
        //                     color: 'rgba(0, 0, 0, 0.05)',
        //                     drawBorder: false
        //                 },
        //                 ticks: {
        //                     callback: function(value) {
        //                         if (value >= 1000000) return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
        //                         return 'Rp ' + value.toLocaleString('id-ID');
        //                     }
        //                 }
        //             },
        //             x: {
        //                 grid: {
        //                     display: false
        //                 }
        //             }
        //         }
        //     }
        // });

        // // Mocking filter change behavior - Using jQuery (won't error if elements are missing)
        // $('#filterBulan').on('change', function() {
        //     console.log('Filter bulan changed: ' + $(this).val());
        // });

        // $('#filterTahun').on('change', function() {
        //     console.log('Filter tahun changed: ' + $(this).val());
        // });

        // // Logic Modal Detail
        // const mockDetails = {
        //     'TRX-20240306-001': {
        //         no: 'TRX-20240306-001',
        //         waktu: '08:30',
        //         items: [{
        //                 name: 'Kopi Susu Gula Aren',
        //                 qty: 2,
        //                 price: 15000,
        //                 total: 30000
        //             },
        //             {
        //                 name: 'Tempe Mendoan',
        //                 qty: 1,
        //                 price: 15000,
        //                 total: 15000
        //             }
        //         ],
        //         subtotal: 45000,
        //         total: 45000
        //     },
        //     'TRX-20240306-002': {
        //         no: 'TRX-20240306-002',
        //         waktu: '09:15',
        //         items: [{
        //                 name: 'Indomie Goreng Jumbo',
        //                 qty: 3,
        //                 price: 20000,
        //                 total: 60000
        //             },
        //             {
        //                 name: 'Es Teh Manis',
        //                 qty: 4,
        //                 price: 15000,
        //                 total: 60000
        //             }
        //         ],
        //         subtotal: 120000,
        //         total: 120000
        //     }
        // };

        // $('.btn-detail').on('click', function() {
        //     const id = $(this).data('id');
        //     const data = mockDetails[id];

        //     if (data) {
        //         $('#detailNoTrx').text(data.no);
        //         $('#detailWaktu').text(data.waktu);
        //         $('#detailSubtotal').text('Rp ' + data.subtotal.toLocaleString('id-ID'));
        //         $('#detailTotal').text('Rp ' + data.total.toLocaleString('id-ID'));

        //         let itemsHtml = '';
        //         $.each(data.items, function(i, item) {
        //             itemsHtml += `
        //                 <div class="d-flex justify-content-between align-items-center mb-2">
        //                     <div>
        //                         <span class="text-dark fw-medium d-block">${item.name}</span>
        //                         <small class="text-muted">${item.qty}x Rp ${item.price.toLocaleString('id-ID')}</small>
        //                     </div>
        //                     <span class="text-dark fw-medium">Rp ${item.total.toLocaleString('id-ID')}</span>
        //                 </div>
        //             `;
        //         });
        //         $('#detailItems').html(itemsHtml);
        //         $('#modalDetail').modal('show');
        //     }
        // });
    });
</script>
<?= $this->endSection() ?>