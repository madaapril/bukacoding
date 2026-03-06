<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>


<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1 text-dark fw-bold">Master Menu</h4>
        <p class="text-muted mb-0 small">Kelola data menu dan kategorinya</p>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-2">
    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4 rounded-top-4">
        <ul class="nav nav-underline fs-6 gap-3" id="pengeluaranTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active pb-3 px-2" id="item-tab" data-bs-toggle="tab" data-bs-target="#item-tab-pane" type="button" role="tab" aria-controls="item-tab-pane" aria-selected="true">
                    Daftar Menu
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link pb-3 px-2" id="kategori-tab" data-bs-toggle="tab" data-bs-target="#kategori-tab-pane" type="button" role="tab" aria-controls="kategori-tab-pane" aria-selected="false">
                    Kategori Menu
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
                        <input type="text" id="customSearch" class="form-control bg-light border-0 rounded-pill ps-5 py-2" placeholder="Cari menu..." style="width: 100%; min-width: 280px; font-size: 0.9rem;">
                    </div>
                    <button class="btn btn-primary-custom btn-sm text-white rounded-pill px-3 d-flex align-items-center gap-1 fw-medium shadow-sm" data-bs-toggle="modal" data-bs-target="#itemModal" data-action="add">
                        <i class="ri-add-line"></i> Tambah Menu
                    </button>
                </div>

                <!-- Format Table DataTables menyerupai List -->
                <table id="itemTable" class="table table-borderless table-list-style w-100 mb-0">
                    <thead class="d-none d-md-table-header-group border-bottom">
                        <tr>
                            <th style="width: 50%;">Nama Menu & Kategori</th>
                            <th style="width: 30%;">Harga</th>
                            <th style="width: 20%; text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item Data 1 -->
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle overflow-hidden flex-shrink-0 cursor-pointer thumbnail-preview" style="width: 46px; height: 46px; border: 2px solid #f8f9fa;" data-bs-toggle="tooltip" title="Klik untuk perbesar">
                                        <img src="https://takestwoeggs.com/wp-content/uploads/2025/03/Overhead-plate-Nasi-Goreng-Indonesian-Fried-Rice-500x500.jpg" alt="Nasi Goreng" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Nasi Goreng Spesial</h6>
                                        <div class="d-flex align-items-center gap-2 small">
                                            <span class="badge border text-secondary fw-normal bg-light rounded-pill px-2">Makanan</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <span class="fw-bold text-dark">Rp 25.000</span>
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
                                    <div class="rounded-circle overflow-hidden flex-shrink-0 cursor-pointer thumbnail-preview" style="width: 46px; height: 46px; border: 2px solid #f8f9fa;" data-bs-toggle="tooltip" title="Klik untuk perbesar">
                                        <img src="https://takestwoeggs.com/wp-content/uploads/2025/03/Overhead-plate-Nasi-Goreng-Indonesian-Fried-Rice-500x500.jpg" alt="Es Teh" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Es Teh Manis</h6>
                                        <div class="d-flex align-items-center gap-2 small">
                                            <span class="badge border text-secondary fw-normal bg-light rounded-pill px-2">Minuman</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <span class="fw-bold text-dark">Rp 5.000</span>
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
                                    <div class="rounded-circle overflow-hidden flex-shrink-0 cursor-pointer thumbnail-preview" style="width: 46px; height: 46px; border: 2px solid #f8f9fa;" data-bs-toggle="tooltip" title="Klik untuk perbesar">
                                        <img src="https://takestwoeggs.com/wp-content/uploads/2025/03/Overhead-plate-Nasi-Goreng-Indonesian-Fried-Rice-500x500.jpg" alt="Kentang Goreng" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Kentang Goreng</h6>
                                        <div class="d-flex align-items-center gap-2 small">
                                            <span class="badge border text-secondary fw-normal bg-light rounded-pill px-2">Snack</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <span class="fw-bold text-dark">Rp 15.000</span>
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
                    <div class="col kategori-item">
                        <div class="card border border-light shadow-sm rounded-2 h-100 list-item-hover transition-all">
                            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <i class="ri-price-tag-3-line fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Makanan</h6>
                                        <p class="mb-0 text-muted small">15 Menu</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 32px; height: 32px;">
                                        <i class="ri-more-2-fill text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                        <li><a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-action="edit"><i class="ri-edit-line me-2 text-primary-custom"></i> Edit</a></li>
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
                    <div class="col kategori-item">
                        <div class="card border border-light shadow-sm rounded-2 h-100 list-item-hover transition-all">
                            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <i class="ri-price-tag-3-line fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Minuman</h6>
                                        <p class="mb-0 text-muted small">4 Menu</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 32px; height: 32px;">
                                        <i class="ri-more-2-fill text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                        <li><a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-action="edit"><i class="ri-edit-line me-2 text-primary-custom"></i> Edit</a></li>
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
                    <div class="col kategori-item">
                        <div class="card border border-light shadow-sm rounded-4 h-100 list-item-hover transition-all">
                            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        <i class="ri-price-tag-3-line fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Snack</h6>
                                        <p class="mb-0 text-muted small">5 Menu</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle d-flex align-items-center justify-content-center border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 32px; height: 32px;">
                                        <i class="ri-more-2-fill text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                                        <li><a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-action="edit"><i class="ri-edit-line me-2 text-primary-custom"></i> Edit</a></li>
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
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="itemModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                <form id="formItem">
                    <input type="hidden" id="itemId"> <!-- Input hidden untuk mode Edit -->
                    <div class="mb-3">
                        <label for="namaItem" class="form-label fw-medium text-dark">Nama Menu</label>
                        <input type="text" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="namaItem" placeholder="Contoh: Nasi Goreng Gila" required>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="kategoriItem" class="form-label fw-medium text-dark">Kategori</label>
                            <select class="form-select bg-light border-0 py-2 px-3 rounded-3" id="kategoriItem" required>
                                <option value="" selected disabled>Pilih Kategori...</option>
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                                <option value="3">Snack</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="hargaMenu" class="form-label fw-medium text-dark">Harga Jual</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 px-2 text-muted small">Rp</span>
                                <input type="number" class="form-control bg-light border-0 py-2 px-3 rounded-end-3" id="hargaMenu" placeholder="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gambarMenu" class="form-label fw-medium text-dark">Gambar Menu</label>
                        <div class="d-flex align-items-center gap-3">
                            <div id="previewContainer" class="rounded-3 border overflow-hidden d-flex align-items-center justify-content-center bg-light" style="width: 80px; height: 80px;">
                                <i class="ri-image-add-line fs-2 text-muted"></i>
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="gambarMenu" accept="image/*">
                                <p class="text-muted small mb-0 mt-1">Format: JPG, PNG. Maks: 2MB</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-2">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary-custom text-white rounded-pill px-4" id="btnSaveItem">Simpan Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kategori (Tambah/Edit) -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="kategoriModalLabel">Tambah Kategori Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4 pb-3">
                <form id="formKategori">
                    <input type="hidden" id="kategoriId"> <!-- Input hidden untuk mode Edit -->
                    <div class="mb-4">
                        <label for="namaKategori" class="form-label fw-medium text-dark">Nama Kategori</label>
                        <input type="text" class="form-control bg-light border-0 py-2 px-3 rounded-3" id="namaKategori" placeholder="Contoh: Operasional" required>
                    </div>
                    <div class="d-grid mt-2">
                        <button type="submit" class="btn btn-primary-custom text-white rounded-pill py-2" id="btnSaveKategori">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox Modal -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0 shadow-none">
            <div class="modal-body p-0 text-center position-relative">
                <div class="d-inline-block position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow-none z-3 bg-dark bg-opacity-50 rounded-circle p-2" data-bs-dismiss="modal" aria-label="Close" style="box-sizing: content-box;"></button>
                    <img src="" id="lightboxImage" class="img-fluid rounded-4 shadow-lg border border-light border-opacity-10" alt="Preview" style="max-height: 85vh; width: auto; display: block;">
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-pointer {
        cursor: pointer;
    }

    .thumbnail-preview {
        transition: transform 0.2s;
    }

    .thumbnail-preview:hover {
        transform: scale(1.1);
    }
</style>

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
                searchPlaceholder: "Cari menu...",
                lengthMenu: "Tampilkan _MENU_ menu",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ menu",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 menu",
                infoFiltered: "(disaring dari _MAX_ total menu)",
                zeroRecords: "Tidak ada data menu yang ditemukan",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            dom: '<"table-responsive border rounded-2 mb-3"t><"bottom d-flex align-items-center justify-content-between text-muted small"ip><"clear">',
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
                modal.find('.modal-title').text('Tambah Menu Baru');
                modal.find('#btnSaveItem').text('Simpan Menu');
                modal.find('#formItem')[0].reset();
                modal.find('#itemId').val('');
            } else if (action === 'edit') {
                modal.find('.modal-title').text('Edit Menu');
                modal.find('#btnSaveItem').text('Update Menu');

                // Ambil data nama item dari baris tabel terdekat
                var row = button.closest('tr');
                var namaItem = row.find('h6').text();
                modal.find('#namaItem').val(namaItem);
            }
        });

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
            } else if (action === 'edit') {
                modal.find('.modal-title').text('Edit Kategori');
                modal.find('#btnSaveKategori').text('Update');

                // Ambil data nama kategori dari UI Card
                var card = button.closest('.card-body');
                var namaKategori = card.find('h6').text();
                modal.find('#namaKategori').val(namaKategori);
            }
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

        // Lightbox Trigger
        $(document).on('click', '.thumbnail-preview', function() {
            const imgSrc = $(this).find('img').attr('src');
            $('#lightboxImage').attr('src', imgSrc);
            $('#lightboxModal').modal('show');
        });

        // Preview Gambar Menu
        $('#gambarMenu').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewContainer').html('<img src="' + e.target.result + '" class="w-100 h-100 object-fit-cover">');
                }
                reader.readAsDataURL(file);
            } else {
                var defaultLabel = '<i class="ri-image-add-line fs-2 text-muted"></i>';
                $('#previewContainer').html(defaultLabel);
            }
        });

        // Reset preview saat modal ditutup atau dibuka untuk tambah
        $('#itemModal').on('hidden.bs.modal', function() {
            $('#previewContainer').html('<i class="ri-image-add-line fs-2 text-muted"></i>');
            $('#gambarMenu').val('');
        });

        // Initialize Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
<?= $this->endSection() ?>
```