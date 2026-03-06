<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row g-4 h-100">
    <!-- Left Column: Menu Selection -->
    <div class="col-lg-8">
        <div class="d-flex flex-column h-100">
            <!-- Header & Search -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h4 class="mb-1 text-dark fw-bold">Kasir</h4>
                    <p class="text-muted mb-0 small">Pilih menu untuk ditambahkan ke pesanan</p>
                </div>
                <div class="search-box position-relative">
                    <i class="ri-search-line position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" id="menuSearch" class="form-control bg-white border-0 shadow-sm rounded-pill ps-5 py-2" placeholder="Cari menu..." style="width: 100%; min-width: 250px;">
                </div>
            </div>

            <!-- Categories -->
            <div class="d-flex gap-2 mb-4 overflow-x-auto pb-2 scrollbar-hidden" id="categoryFilters">
                <button class="btn btn-primary-custom text-white rounded-pill px-4 filter-btn active" data-category="all">Semua</button>
                <button class="btn btn-white border-0 shadow-sm rounded-pill px-4 filter-btn" data-category="Makanan">Makanan</button>
                <button class="btn btn-white border-0 shadow-sm rounded-pill px-4 filter-btn" data-category="Minuman">Minuman</button>
                <button class="btn btn-white border-0 shadow-sm rounded-pill px-4 filter-btn" data-category="Snack">Snack</button>
            </div>

            <!-- Menu Grid -->
            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-3 overflow-y-auto pe-1" id="menuGrid" style="max-height: calc(100vh - 250px);">
                <!-- Menu Item 1 -->
                <div class="col menu-card-item" data-category="Makanan" data-name="Nasi Goreng Spesial" data-price="25000">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 cursor-pointer menu-item-action">
                        <div class="position-relative">
                            <img src="https://takestwoeggs.com/wp-content/uploads/2025/03/Overhead-plate-Nasi-Goreng-Indonesian-Fried-Rice-500x500.jpg" class="card-img-top object-fit-cover" alt="Nasi Goreng" style="height: 140px;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-2 rounded-pill shadow-sm small fw-bold">Rp 25.000</span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="card-title mb-1 fw-bold text-dark text-truncate">Nasi Goreng Spesial</h6>
                            <p class="card-text text-muted small mb-0">Makanan</p>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 2 -->
                <div class="col menu-card-item" data-category="Minuman" data-name="Es Teh Manis" data-price="5000">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 cursor-pointer menu-item-action">
                        <div class="position-relative">
                            <img src="https://takestwoeggs.com/wp-content/uploads/2025/03/Overhead-plate-Nasi-Goreng-Indonesian-Fried-Rice-500x500.jpg" class="card-img-top object-fit-cover" alt="Es Teh" style="height: 140px;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-2 rounded-pill shadow-sm small fw-bold">Rp 5.000</span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="card-title mb-1 fw-bold text-dark text-truncate">Es Teh Manis</h6>
                            <p class="card-text text-muted small mb-0">Minuman</p>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 3 -->
                <div class="col menu-card-item" data-category="Snack" data-name="Kentang Goreng" data-price="15000">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 cursor-pointer menu-item-action">
                        <div class="position-relative">
                            <img src="https://takestwoeggs.com/wp-content/uploads/2025/03/Overhead-plate-Nasi-Goreng-Indonesian-Fried-Rice-500x500.jpg" class="card-img-top object-fit-cover" alt="Kentang Goreng" style="height: 140px;">
                            <span class="badge bg-white text-dark position-absolute top-0 end-0 m-2 rounded-pill shadow-sm small fw-bold">Rp 15.000</span>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="card-title mb-1 fw-bold text-dark text-truncate">Kentang Goreng</h6>
                            <p class="card-text text-muted small mb-0">Snack</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Cart -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 h-100 d-flex flex-column">
            <div class="card-header rounded-4 bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0">Pesanan Baru</h5>
                <button class="btn btn-light btn-sm rounded-circle text-danger" id="clearCart" title="Clear Cart">
                    <i class="ri-delete-bin-line"></i>
                </button>
            </div>

            <div class="card-body px-4 py-3 flex-grow-1 overflow-y-auto" id="cartContainer" style="max-height: calc(100vh - 450px);">
                <!-- Empty Cart State -->
                <div id="emptyCart" class="text-center py-5">
                    <div class="icon-box-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px;">
                        <i class="ri-shopping-cart-2-line fs-2 text-muted"></i>
                    </div>
                    <p class="text-muted small mb-0">Keranjang masih kosong</p>
                </div>

                <!-- Cart List -->
                <div id="cartList" class="d-flex flex-column gap-3 d-none">
                    <!-- Items will be injected here -->
                </div>
            </div>

            <div class="card-footer rounded-4 bg-white border-0 p-4 pt-0 mt-auto">
                <div class="border-top pt-3 mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-bold text-dark" id="subtotal">Rp 0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-dark fw-bold fs-5">Total</span>
                        <span class="text-primary-custom fw-bold fs-5" id="total">Rp 0</span>
                    </div>
                </div>
                <button class="btn btn-primary-custom text-white w-100 py-3 rounded-pill fw-bold shadow-sm" id="btnCheckout">
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-pointer {
        cursor: pointer;
    }

    .scrollbar-hidden::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hidden {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .menu-item-action {
        transition: all 0.2s ease-in-out;
    }

    .menu-item-action:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1) !important;
    }

    .menu-item-action:active {
        transform: scale(0.95);
    }

    .filter-btn {
        transition: all 0.2s;
        white-space: nowrap;
    }

    .filter-btn:not(.active):hover {
        background-color: #f8f9fa;
    }

    .btn-white {
        background-color: #fff;
        color: #6c757d;
    }

    .cart-item {
        transition: all 0.2s;
    }

    .qty-btn {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 50% !important;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        let cart = [];

        // Formatting Currency
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        // Update Cart UI
        function updateCartUI() {
            if (cart.length === 0) {
                $('#emptyCart').removeClass('d-none');
                $('#cartList').addClass('d-none');
                $('#subtotal, #total').text('Rp 0');
                return;
            }

            $('#emptyCart').addClass('d-none');
            $('#cartList').removeClass('d-none');

            let cartHtml = '';
            let total = 0;

            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                cartHtml += `
                    <div class="cart-item d-flex align-items-center justify-content-between animate__animated animate__fadeIn">
                        <div class="d-flex align-items-center gap-3 overflow-hidden" style="width: 55%;">
                            <div class="rounded-3 overflow-hidden flex-shrink-0" style="width: 48px; height: 48px;">
                                <img src="${item.image}" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="text-truncate">
                                <h6 class="mb-0 fw-bold text-dark text-truncate small">${item.name}</h6>
                                <span class="text-muted small">${formatRupiah(item.price)}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-light qty-btn decrease-qty" data-index="${index}">
                                <i class="ri-subtract-line"></i>
                            </button>
                            <span class="fw-bold mx-1 small" style="min-width: 20px; text-align: center;">${item.quantity}</span>
                            <button class="btn btn-light qty-btn increase-qty" data-index="${index}">
                                <i class="ri-add-line"></i>
                            </button>
                            <button class="btn btn-link text-danger p-0 ms-2 remove-item" data-index="${index}">
                                <i class="ri-delete-bin-line fs-5"></i>
                            </button>
                        </div>
                    </div>
                `;
            });

            $('#cartList').html(cartHtml);
            $('#subtotal, #total').text(formatRupiah(total));
        }

        // Add to Cart
        $(document).on('click', '.menu-item-action', function() {
            const card = $(this).closest('.menu-card-item');
            const data = {
                id: card.data('name'), // simple ID for now
                name: card.data('name'),
                price: parseInt(card.data('price')),
                category: card.data('category'),
                image: $(this).find('img').attr('src')
            };

            const existingItem = cart.find(item => item.id === data.id);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    ...data,
                    quantity: 1
                });
            }

            updateCartUI();

            // Subtle animation feedback
            $(this).addClass('bg-light');
            setTimeout(() => $(this).removeClass('bg-light'), 200);
        });

        // Increase Qty
        $(document).on('click', '.increase-qty', function() {
            const index = $(this).data('index');
            cart[index].quantity += 1;
            updateCartUI();
        });

        // Decrease Qty
        $(document).on('click', '.decrease-qty', function() {
            const index = $(this).data('index');
            if (cart[index].quantity > 1) {
                cart[index].quantity -= 1;
            } else {
                cart.splice(index, 1);
            }
            updateCartUI();
        });

        // Remove Item
        $(document).on('click', '.remove-item', function() {
            const index = $(this).data('index');
            cart.splice(index, 1);
            updateCartUI();
        });

        // Clear Cart
        $('#clearCart').on('click', function() {
            if (cart.length === 0) return;

            Swal.fire({
                title: 'Reset Pesanan?',
                text: "Semua item di keranjang akan dihapus.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Reset',
                cancelButtonText: 'Batal',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    cart = [];
                    updateCartUI();
                }
            });
        });

        // Checkout Placeholder
        $('#btnCheckout').on('click', function() {
            if (cart.length === 0) {
                Swal.fire('Oops!', 'Pilih menu terlebih dahulu.', 'warning');
                return;
            }

            Swal.fire({
                title: 'Konfirmasi Pembayaran',
                text: "Lanjutkan ke proses pembayaran?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Ya, Bayar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Berhasil!', 'Pesanan telah diproses.', 'success');
                    cart = [];
                    updateCartUI();
                }
            });
        });

        // Search Filter
        $('#menuSearch').on('keyup', function() {
            const value = $(this).val().toLowerCase();
            $('.menu-card-item').each(function() {
                const name = $(this).data('name').toLowerCase();
                const isMatch = name.includes(value);
                $(this).toggle(isMatch);
            });
        });

        // Category Filter
        $('.filter-btn').on('click', function() {
            const category = $(this).data('category');

            $('.filter-btn').removeClass('btn-primary-custom text-white active').addClass('btn-white');
            $(this).addClass('btn-primary-custom text-white active').removeClass('btn-white');

            if (category === 'all') {
                $('.menu-card-item').fadeIn(200);
            } else {
                $('.menu-card-item').hide();
                $(`.menu-card-item[data-category="${category}"]`).fadeIn(200);
            }
        });
    });
</script>
<?= $this->endSection() ?>