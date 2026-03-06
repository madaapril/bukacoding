<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 text-dark fw-bold">Item Pengeluaran</h4>
        <p class="text-muted mb-0 small">Kelola data item pengeluaran dan kategorinya</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4 rounded-top-4">
        <ul class="nav nav-underline fs-6 gap-3" id="pengeluaranTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active pb-3 px-2" id="item-tab" data-bs-toggle="tab" data-bs-target="#item-tab-pane" type="button" role="tab" aria-controls="item-tab-pane" aria-selected="true">
                    Daftar Item
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link pb-3 px-2" id="kategori-tab" data-bs-toggle="tab" data-bs-target="#kategori-tab-pane" type="button" role="tab" aria-controls="kategori-tab-pane" aria-selected="false">
                    Kategori Item
                </button>
            </li>
        </ul>
    </div>

    <div class="card-body p-4 pt-3">
        <div class="tab-content" id="pengeluaranTabContent">

            <!-- Tab Daftar Item -->
            <div class="tab-pane fade show active" id="item-tab-pane" role="tabpanel" aria-labelledby="item-tab" tabindex="0">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 mt-2">
                    <div class="search-box position-relative">
                        <i class="ri-search-line position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" id="customSearch" class="form-control bg-light border-0 rounded-pill ps-5 py-2" placeholder="Cari item pengeluaran..." style="width: 100%; min-width: 280px; font-size: 0.9rem;">
                    </div>
                    <button class="btn btn-primary-custom btn-sm text-white rounded-pill px-3 d-flex align-items-center gap-1 fw-medium shadow-sm" data-bs-toggle="modal" data-bs-target="#itemModal" data-action="add">
                        <i class="ri-add-line"></i> Tambah Item
                    </button>
                </div>

                <!-- Format Table DataTables menyerupai List -->
                <table id="itemTable" class="table table-borderless table-list-style w-100 mb-0">
                    <thead class="d-none d-md-table-header-group border-bottom">
                        <tr>
                            <th style="width: 80%;">Nama Item & Kategori</th>
                            <th style="width: 20%; text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item Data 1 -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 46px; height: 46px;">
                                        <i class="ri-box-3-line fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Beras Premium 5Kg</h6>
                                        <div class="d-flex align-items-center gap-2 small">
                                            <span class="badge border text-secondary fw-normal bg-light rounded-pill px-2">Bahan Baku</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <button class="btn btn-light text-muted btn-action edit-btn" title="Edit" data-bs-toggle="modal" data-bs-target="#itemModal" data-action="edit">
                                        <i class="ri-edit-line fs-5"></i>
                                    </button>
                                    <button class="btn btn-light text-muted btn-action delete-btn" title="Hapus">
                                        <i class="ri-delete-bin-line fs-5"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Item Data 2 -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 46px; height: 46px;">
                                        <i class="ri-box-3-line fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Minyak Goreng Kemasan 2L</h6>
                                        <div class="d-flex align-items-center gap-2 small">
                                            <span class="badge border text-secondary fw-normal bg-light rounded-pill px-2">Bahan Baku</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <button class="btn btn-light text-muted btn-action edit-btn" title="Edit" data-bs-toggle="modal" data-bs-target="#itemModal" data-action="edit">
                                        <i class="ri-edit-line fs-5"></i>
                                    </button>
                                    <button class="btn btn-light text-muted btn-action delete-btn" title="Hapus">
                                        <i class="ri-delete-bin-line fs-5"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Item Data 3 -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 46px; height: 46px;">
                                        <i class="ri-box-3-line fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Servis Mesin Kopi</h6>
                                        <div class="d-flex align-items-center gap-2 small">
                                            <span class="badge border text-secondary fw-normal bg-light rounded-pill px-2">Maintenance</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <button class="btn btn-light text-muted btn-action edit-btn" title="Edit" data-bs-toggle="modal" data-bs-target="#itemModal" data-action="edit">
                                        <i class="ri-edit-line fs-5"></i>
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

            <!-- Tab Kategori Item -->
            <div class="tab-pane fade" id="kategori-tab-pane" role="tabpanel" aria-labelledby="kategori-tab" tabindex="0">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 mt-2">
                    <div class="search-box position-relative">
                        <i class="ri-search-line position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" id="searchKategori" class="form-control bg-light border-0 rounded-pill ps-5 py-2" placeholder="Cari kategori..." style="width: 100%; min-width: 280px; font-size: 0.9rem;">
                    </div>
                    <button class="btn btn-primary-custom btn-sm text-white rounded-pill px-3 d-flex align-items-center gap-1 fw-medium shadow-sm" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-action="add">
                        <i class="ri-add-line"></i> Tambah Kategori
                    </button>
                </div>

                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-3" id="kategoriContainer">
                    <!-- Kategori 1 -->
                    <div class="col category-card kategori-item" data-category-id="1" data-icon="ri-price-tag-3-line">
                        <div class="card border border-light shadow-sm rounded-4 h-100 list-item-hover transition-all">
                            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <i class="ri-price-tag-3-line fs-4 category-card-icon"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Bahan Baku</h6>
                                        <p class="mb-0 text-muted small">15 Item</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 32px; height: 32px;">
                                        <i class="ri-more-2-fill text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                        <li><a class="dropdown-item py-2 edit-kategori-btn" href="#" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-action="edit"><i class="ri-edit-line me-2 text-primary-custom"></i> Edit</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item py-2 text-danger" href="#"><i class="ri-delete-bin-line me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kategori 2 -->
                    <div class="col category-card kategori-item" data-category-id="2" data-icon="ri-price-tag-3-line">
                        <div class="card border border-light shadow-sm rounded-4 h-100 list-item-hover transition-all">
                            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <i class="ri-price-tag-3-line fs-4 category-card-icon"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Maintenance</h6>
                                        <p class="mb-0 text-muted small">4 Item</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 32px; height: 32px;">
                                        <i class="ri-more-2-fill text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                        <li><a class="dropdown-item py-2 edit-kategori-btn" href="#" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-action="edit"><i class="ri-edit-line me-2 text-primary-custom"></i> Edit</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item py-2 text-danger" href="#"><i class="ri-delete-bin-line me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kategori 3 -->
                    <div class="col category-card kategori-item" data-category-id="3" data-icon="ri-price-tag-3-line">
                        <div class="card border border-light shadow-sm rounded-4 h-100 list-item-hover transition-all">
                            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <i class="ri-price-tag-3-line fs-4 category-card-icon"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Operasional</h6>
                                        <p class="mb-0 text-muted small">5 Item</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 32px; height: 32px;">
                                        <i class="ri-more-2-fill text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                        <li><a class="dropdown-item py-2 edit-kategori-btn" href="#" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-action="edit"><i class="ri-edit-line me-2 text-primary-custom"></i> Edit</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item py-2 text-danger" href="#"><i class="ri-delete-bin-line me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="noKategoriFound" class="text-center py-5 d-none">
                <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; background-color: #f8f9fa;">
                    <i class="ri-price-tag-3-line fs-2 text-muted"></i>
                </div>
                <h6 class="fw-bold text-dark">Kategori tidak ditemukan</h6>
                <p class="text-muted small">Coba kata kunci lain</p>
            </div>

        </div>

    </div>
</div>

<!-- Modal Item Pengeluaran (Tambah/Edit) -->
<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4 p-2">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="itemModalLabel">Tambah Item Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                <form id="formItem">
                    <input type="hidden" id="itemId"> <!-- Input hidden untuk mode Edit -->
                    <div class="mb-3">
                        <label for="namaItem" class="form-label fw-medium text-dark">Nama Item</label>
                        <input type="text" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="namaItem" placeholder="Contoh: Gula Pasir Kiloan" required>
                    </div>
                    <div class="mb-4">
                        <label for="kategoriItem" class="form-label fw-medium text-dark">Kategori</label>
                        <select class="form-select bg-light border-0 py-2 px-3 rounded-3" id="kategoriItem" required>
                            <option value="" selected disabled>Pilih Kategori...</option>
                            <option value="1">Bahan Baku</option>
                            <option value="2">Operasional Harian</option>
                            <option value="3">Gaji Karyawan</option>
                            <option value="4">Pajak / Retribusi</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-2">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary-custom text-white rounded-pill px-4" id="btnSaveItem">Simpan Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kategori (Tambah/Edit) -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4 p-2">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="kategoriModalLabel">Tambah Kategori Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                <form id="formKategori">
                    <input type="hidden" id="kategoriId"> <!-- Input hidden untuk mode Edit -->
                    <div class="mb-3">
                        <label for="namaKategori" class="form-label fw-medium text-dark">Nama Kategori</label>
                        <input type="text" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="namaKategori" placeholder="Contoh: Operasional" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium text-dark d-block">Pilih Icon</label>
                        <div class="d-flex flex-wrap gap-2 p-3 bg-light rounded-3">
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon1" value="ri-price-tag-3-line" class="btn-check" checked>
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon1" style="width: 40px; height: 40px;">
                                    <i class="ri-price-tag-3-line fs-5"></i>
                                </label>
                            </div>
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon2" value="ri-shopping-basket-2-line" class="btn-check">
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon2" style="width: 40px; height: 40px;">
                                    <i class="ri-shopping-basket-2-line fs-5"></i>
                                </label>
                            </div>
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon3" value="ri-gas-station-line" class="btn-check">
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon3" style="width: 40px; height: 40px;">
                                    <i class="ri-gas-station-line fs-5"></i>
                                </label>
                            </div>
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon4" value="ri-truck-line" class="btn-check">
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon4" style="width: 40px; height: 40px;">
                                    <i class="ri-truck-line fs-5"></i>
                                </label>
                            </div>
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon5" value="ri-hammer-line" class="btn-check">
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon5" style="width: 40px; height: 40px;">
                                    <i class="ri-hammer-line fs-5"></i>
                                </label>
                            </div>
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon6" value="ri-lightbulb-line" class="btn-check">
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon6" style="width: 40px; height: 40px;">
                                    <i class="ri-lightbulb-line fs-5"></i>
                                </label>
                            </div>
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon7" value="ri-user-settings-line" class="btn-check">
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon7" style="width: 40px; height: 40px;">
                                    <i class="ri-user-settings-line fs-5"></i>
                                </label>
                            </div>
                            <div class="icon-option">
                                <input type="radio" name="iconKategori" id="icon8" value="ri-bank-card-line" class="btn-check">
                                <label class="btn btn-outline-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center" for="icon8" style="width: 40px; height: 40px;">
                                    <i class="ri-bank-card-line fs-5"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-2">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary-custom text-white rounded-pill px-4" id="btnSaveKategori">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        // Initialize DataTables
        var tableItem = $('#itemTable').DataTable({
            responsive: true,
            pageLength: 10,
            language: {
                search: "",
                searchPlaceholder: "Cari item pengeluaran...",
                lengthMenu: "Tampilkan _MENU_ item",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ item",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 item",
                infoFiltered: "(disaring dari _MAX_ total item)",
                zeroRecords: "Tidak ada data item yang ditemukan",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            dom: '<"table-responsive border rounded-4 mb-3"t><"bottom d-flex align-items-center justify-content-between text-muted small"ip><"clear">',
            columnDefs: [{
                    orderable: false,
                    targets: 1
                } // Nonaktifkan sorting untuk kolom aksi
            ]
        });

        // Hubungkan custom search box ke DataTables
        $('#customSearch').on('keyup', function() {
            tableItem.search(this.value).draw();
        });

        // Manual search untuk Kategori (Card-based)
        $('#searchKategori').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            var visibleCount = 0;

            $('.kategori-item').filter(function() {
                var isMatch = $(this).find('h6').text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(isMatch);
                if (isMatch) visibleCount++;
            });

            // Tampilkan pesan "tidak ditemukan" jika tidak ada yang cocok
            if (visibleCount === 0) {
                $('#noKategoriFound').removeClass('d-none');
            } else {
                $('#noKategoriFound').addClass('d-none');
            }
        });

        // Dynamic Modal Item (Tambah/Edit)
        $('#itemModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);

            if (action === 'add') {
                modal.find('.modal-title').text('Tambah Item Pengeluaran');
                modal.find('#btnSaveItem').text('Simpan Item');
                modal.find('#formItem')[0].reset();
                modal.find('#itemId').val('');
            } else if (action === 'edit') {
                modal.find('.modal-title').text('Edit Item Pengeluaran');
                modal.find('#btnSaveItem').text('Update Item');

                // Ambil data nama item dari baris tabel terdekat
                var row = button.closest('tr');
                var namaItem = row.find('h6').text();
                modal.find('#namaItem').val(namaItem);
            }
        });

        // Ambil pemetaan icon dari UI (simulasi data)
        function getCategoryIcons() {
            let icons = {};
            $('.category-card').each(function() {
                let id = $(this).data('category-id');
                let icon = $(this).data('icon');
                icons[id] = icon;
            });
            return icons;
        }

        // Update icon di tabel item berdasarkan kategori
        function refreshItemIcons() {
            let icons = getCategoryIcons();
            $('#itemTable tbody tr').each(function() {
                let catId = $(this).data('category-id');
                if (icons[catId]) {
                    $(this).find('.item-icon').attr('class', icons[catId] + ' fs-4 item-icon');
                }
            });
        }

        // Jalankan saat awal
        refreshItemIcons();

        // Dynamic Modal Kategori (Tambah/Edit)
        $('#kategoriModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var modal = $(this);

            if (action === 'add') {
                modal.find('.modal-title').text('Tambah Kategori Baru');
                modal.find('#btnSaveKategori').text('Simpan');
                modal.find('#formKategori')[0].reset();
                modal.find('#kategoriId').val('');
                modal.find('input[name="iconKategori"][value="ri-price-tag-3-line"]').prop('checked', true);
            } else if (action === 'edit') {
                modal.find('.modal-title').text('Edit Kategori');
                modal.find('#btnSaveKategori').text('Update');

                // Ambil data dari UI Card
                var card = button.closest('.category-card');
                var namaKategori = card.find('h6').text();
                var iconClass = card.data('icon');
                var catId = card.data('category-id');

                modal.find('#namaKategori').val(namaKategori);
                modal.find('#kategoriId').val(catId);
                modal.find('input[name="iconKategori"][value="' + iconClass + '"]').prop('checked', true);
            }
        });

        // Simulasi simpan kategori (karena belum ada backend)
        $('#formKategori').on('submit', function(e) {
            e.preventDefault();
            let catId = $('#kategoriId').val();
            let name = $('#namaKategori').val();
            let icon = $('input[name="iconKategori"]:checked').val();

            if (catId) {
                // Mode Edit
                let card = $('.category-card[data-category-id="' + catId + '"]');
                card.find('h6').text(name);
                card.data('icon', icon);
                card.find('.category-card-icon').attr('class', icon + ' fs-4 category-card-icon');

                // Update item icons
                refreshItemIcons();
            }

            $('#kategoriModal').modal('hide');
            Swal.fire({
                title: 'Berhasil!',
                text: 'Kategori berhasil disimpan.',
                icon: 'success',
                confirmButtonColor: '#56a7fe',
                customClass: {
                    confirmButton: 'rounded-pill px-4'
                }
            });
        });

        // Trigger SweetAlert2 untuk tombol hapus (Delegation untuk DataTables & List biasa)
        $(document).on('click', '.delete-btn, .dropdown-item.text-danger', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
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
                    // Logika ajax penghapusan letakkan disini...
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
```