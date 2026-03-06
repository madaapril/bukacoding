<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 text-dark fw-bold">Pengeluaran</h4>
        <p class="text-muted mb-0 small">Catat dan pantau pengeluaran belanja harian kedai</p>
    </div>
    <button class="btn btn-primary-custom btn-sm text-white rounded-pill px-3 d-flex align-items-center gap-1 fw-medium shadow-sm" data-bs-toggle="modal" data-bs-target="#pengeluaranModal" data-action="add">
        <i class="ri-add-line"></i> Tambah Pengeluaran
    </button>
</div>

<!-- Statistik Ringkas -->
<div class="row g-3 mb-4">
    <div class="col-12 col-md-8 col-lg-6 col-xl-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: rgba(86, 167, 254, 0.1); color: #56a7fe;">
                        <i class="ri-hand-coin-line fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-0 small">Total Pengeluaran (Bulan Ini)</p>
                        <h5 class="mb-0 fw-bold">Rp 1.250.000</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header rounded-4 bg-white border-bottom-0 pt-4 pb-2 px-4">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-4">
                <div class="position-relative">
                    <i class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" id="dateFilter" class="form-control bg-light border-0 rounded-pill ps-5 py-2" placeholder="Filter Tanggal..." style="font-size: 0.9rem;">
                </div>
            </div>
            <div class="col-12 col-md-4 ms-auto">
                <div class="search-box position-relative">
                    <i class="ri-search-line position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" id="customSearch" class="form-control bg-light border-0 rounded-pill ps-5 py-2" placeholder="Cari data..." style="font-size: 0.9rem;">
                </div>
            </div>
        </div>
    </div>

    <div class="card-body p-4 pt-2">
        <table id="pengeluaranTable" class="table table-borderless table-list-style w-100 mb-0">
            <thead class="border-bottom">
                <tr class="text-muted small">
                    <th style="width: 25%;">TANGGAL BELANJA</th>
                    <th style="width: 30%;">CATATAN</th>
                    <th style="width: 15%; text-align: center;">ITEM</th>
                    <th style="width: 15%; text-align: right;">TOTAL HARGA</th>
                    <th style="width: 15%; text-align: right;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data 1 -->
                <tr>
                    <td>
                        <div class="fw-bold text-dark">06 Mar 2026</div>
                        <div class="small text-muted">Jumat, 10:30</div>
                    </td>
                    <td>
                        <span class="text-secondary small">Belanja mingguan bahan baku kedai</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-light text-dark border fw-normal rounded-pill">3 Jenis</span>
                    </td>
                    <td class="text-end fw-bold text-primary">
                        Rp 350.000
                    </td>
                    <td>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <button class="btn btn-light text-muted btn-action view-btn" title="Detail" data-bs-toggle="modal" data-bs-target="#pengeluaranModal" data-action="view">
                                <i class="ri-eye-line fs-5"></i>
                            </button>
                            <button class="btn btn-light text-muted btn-action delete-btn" title="Hapus">
                                <i class="ri-delete-bin-line fs-5"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Data 2 -->
                <tr>
                    <td>
                        <div class="fw-bold text-dark">05 Mar 2026</div>
                        <div class="small text-muted">Kamis, 15:45</div>
                    </td>
                    <td>
                        <span class="text-secondary small">Pembelian alat kebersihan</span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-light text-dark border fw-normal rounded-pill">2 Jenis</span>
                    </td>
                    <td class="text-end fw-bold text-primary">
                        Rp 45.500
                    </td>
                    <td>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <button class="btn btn-light text-muted btn-action view-btn" title="Detail" data-bs-toggle="modal" data-bs-target="#pengeluaranModal" data-action="view">
                                <i class="ri-eye-line fs-5"></i>
                            </button>
                            <button class="btn btn-light text-muted btn-action delete-btn" title="Hapus">
                                <i class="ri-delete-bin-line fs-5"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Pengeluaran (Tambah/Edit/Detail) -->
<div class="modal fade" id="pengeluaranModal" tabindex="-1" aria-labelledby="pengeluaranModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="pengeluaranModalLabel">Tambah Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                <form id="formPengeluaran">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="tanggal_belanja" class="form-label fw-medium text-dark small">Tanggal Belanja</label>
                            <div class="position-relative">
                                <i class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                <input type="text" class="form-control bg-light border-0 py-2 ps-5 rounded-3" id="tanggal_belanja" placeholder="Pilih Tanggal" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="catatan" class="form-label fw-medium text-dark small">Catatan</label>
                            <textarea class="form-control bg-light border-0 py-2 px-3 rounded-3" id="catatan" rows="2" placeholder="Contoh: Belanja bahan baku di pasar"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold text-dark mb-0">Item Pengeluaran</h6>
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill btn-add-row px-3" id="addRow">
                            <i class="ri-add-line"></i> Tambah Item
                        </button>
                    </div>

                    <div class="table-responsive rounded-3 border-0 bg-light p-2 mb-4">
                        <table class="table table-borderless align-middle mb-0" id="tableItems">
                            <thead>
                                <tr class="small text-muted">
                                    <th style="width: 40%;">Item</th>
                                    <th style="width: 15%;">Jumlah</th>
                                    <th style="width: 20%;">Harga Satuan</th>
                                    <th style="width: 20%;">Subtotal</th>
                                    <th style="width: 5%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="item-row">
                                    <td>
                                        <select class="form-select bg-white border-0 py-2 rounded-2 item-select" required>
                                            <option value="" selected disabled>Pilih Item...</option>
                                            <option value="1">Beras Premium 5Kg</option>
                                            <option value="2">Minyak Goreng 2L</option>
                                            <option value="3">Gula Pasir 1Kg</option>
                                            <option value="4">Kopi Bubuk</option>
                                            <option value="5">Sabun Cuci Piring</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control bg-white border-0 py-2 rounded-2 item-qty" value="1" min="1" required>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-0 pe-0 small">Rp</span>
                                            <input type="number" class="form-control bg-white border-0 py-2 ps-1 rounded-2 item-price" placeholder="0" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent border-0 pe-0 small">Rp</span>
                                            <input type="text" class="form-control bg-transparent border-0 py-2 ps-1 rounded-2 item-subtotal fw-bold" value="0" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link text-danger p-0 border-0 btn-remove-row">
                                            <i class="ri-delete-bin-line fs-5"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex flex-column align-items-end mb-4">
                        <div class="text-muted small mb-1">Total Keseluruhan</div>
                        <h4 class="fw-bold text-primary mb-0" id="totalHarga">Rp 0</h4>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary-custom text-white rounded-pill px-4" id="btnSavePengeluaran">Simpan Pengeluaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<!-- Flatpickr CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function() {
        // Initialize Date Range Filter
        flatpickr("#dateFilter", {
            mode: "range",
            dateFormat: "d M Y",
            maxDate: "today",
            defaultDate: [
                new Date(new Date().setDate(new Date().getDate() - 30)),
                new Date()
            ],
            onChange: function(selectedDates, dateStr, instance) {
                console.log("Range selected: ", dateStr);
            }
        });

        // Initialize Modal Datepicker
        const modalDatepicker = flatpickr("#tanggal_belanja", {
            dateFormat: "d M Y",
            maxDate: "today",
            defaultDate: "today"
        });

        // Initialize DataTables
        var table = $('#pengeluaranTable').DataTable({
            responsive: true,
            language: {
                search: "",
                searchPlaceholder: "Cari data...",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                zeroRecords: "Tidak ada data yang ditemukan",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            dom: '<"table-responsive mb-3"t><"bottom d-flex align-items-center justify-content-between text-muted small"ip><"clear">',
            columnDefs: [{
                orderable: false,
                targets: -1
            }]
        });

        // Custom Search
        $('#customSearch').on('keyup', function() {
            table.search(this.value).draw();
        });

        // --- Logic Dynamic Row ---

        function calculateTotal() {
            let total = 0;
            $('.item-row').each(function() {
                const qty = parseFloat($(this).find('.item-qty').val()) || 0;
                const price = parseFloat($(this).find('.item-price').val()) || 0;
                const subtotal = qty * price;
                $(this).find('.item-subtotal').val(subtotal.toLocaleString('id-ID'));
                total += subtotal;
            });
            $('#totalHarga').text('Rp ' + total.toLocaleString('id-ID'));
        }

        // Add Row
        $('#addRow').click(function() {
            const newRow = `
                <tr class="item-row">
                    <td>
                        <select class="form-select bg-white border-0 py-2 rounded-2 item-select" required>
                            <option value="" selected disabled>Pilih Item...</option>
                            <option value="1">Beras Premium 5Kg</option>
                            <option value="2">Minyak Goreng 2L</option>
                            <option value="3">Gula Pasir 1Kg</option>
                            <option value="4">Kopi Bubuk</option>
                            <option value="5">Sabun Cuci Piring</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control bg-white border-0 py-2 rounded-2 item-qty" value="1" min="1" required>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-0 pe-0 small">Rp</span>
                            <input type="number" class="form-control bg-white border-0 py-2 ps-1 rounded-2 item-price" placeholder="0" required>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0 pe-0 small">Rp</span>
                            <input type="text" class="form-control bg-transparent border-0 py-2 ps-1 rounded-2 item-subtotal fw-bold" value="0" readonly>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-link text-danger p-0 border-0 btn-remove-row">
                            <i class="ri-delete-bin-line fs-5"></i>
                        </button>
                    </td>
                </tr>
            `;
            $('#tableItems tbody').append(newRow);
        });

        // Remove Row
        $(document).on('click', '.btn-remove-row', function() {
            if ($('.item-row').length > 1) {
                $(this).closest('tr').remove();
                calculateTotal();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ops!',
                    text: 'Minimal harus ada 1 item pengeluaran.',
                    confirmButtonColor: '#56a7fe',
                    customClass: {
                        confirmButton: 'rounded-pill px-4'
                    }
                });
            }
        });

        // Calculate on change
        $(document).on('input', '.item-qty, .item-price', function() {
            calculateTotal();
        });

        // Modal Action Handler
        $('#pengeluaranModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const action = button.data('action');
            const modal = $(this);
            const form = $('#formPengeluaran')[0];

            if (action === 'add') {
                modal.find('.modal-title').text('Tambah Pengeluaran');
                modal.find('#btnSavePengeluaran').show();
                form.reset();
                modalDatepicker.setDate(new Date());

                // Reset dynamic rows to only one
                $('#tableItems tbody').html(`
                    <tr class="item-row">
                        <td>
                            <select class="form-select bg-white border-0 py-2 rounded-2 item-select" required>
                                <option value="" selected disabled>Pilih Item...</option>
                                <option value="1">Beras Premium 5Kg</option>
                                <option value="2">Minyak Goreng 2L</option>
                                <option value="3">Gula Pasir 1Kg</option>
                                <option value="4">Kopi Bubuk</option>
                                <option value="5">Sabun Cuci Piring</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" class="form-control bg-white border-0 py-2 rounded-2 item-qty" value="1" min="1" required>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-0 pe-0 small">Rp</span>
                                <input type="number" class="form-control bg-white border-0 py-2 ps-1 rounded-2 item-price" placeholder="0" required>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-0 pe-0 small">Rp</span>
                                <input type="text" class="form-control bg-transparent border-0 py-2 ps-1 rounded-2 item-subtotal fw-bold" value="0" readonly>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-link text-danger p-0 border-0 btn-remove-row">
                                <i class="ri-delete-bin-line fs-5"></i>
                            </button>
                        </td>
                    </tr>
                `);
                calculateTotal();
            } else if (action === 'view') {
                modal.find('.modal-title').text('Detail Pengeluaran');
                modal.find('#btnSavePengeluaran').hide();

                // Simulation: Fill with dummy data
                $('#tanggal_belanja').val('06 Mar 2026');
                $('#catatan').val('Belanja mingguan bahan baku kedai');

                // Disable inputs
                modal.find('input, select, textarea').prop('disabled', true);
                modal.find('.btn-remove-row, #addRow').hide();
            }
        });

        // Reset disabled on hide
        $('#pengeluaranModal').on('hidden.bs.modal', function() {
            $(this).find('input, select, textarea').prop('disabled', false);
            $(this).find('.btn-remove-row, #addRow').show();
        });

        // Form Submit
        $('#formPengeluaran').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data pengeluaran berhasil disimpan.',
                icon: 'success',
                confirmButtonColor: '#56a7fe',
                customClass: {
                    confirmButton: 'rounded-pill px-4'
                }
            }).then(() => {
                $('#pengeluaranModal').modal('hide');
            });
        });

        // Delete Handler
        $(document).on('click', '.delete-btn', function() {
            Swal.fire({
                title: 'Hapus Data?',
                text: "Data pengeluaran ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'rounded-pill px-4',
                    cancelButton: 'rounded-pill px-4'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data berhasil dihapus.',
                        icon: 'success',
                        confirmButtonColor: '#56a7fe',
                        customClass: {
                            confirmButton: 'rounded-pill px-4'
                        }
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>