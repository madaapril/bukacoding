    <footer>
        <div class="container-fluid">
            <p class="mb-0">&copy; <?= date('Y') ?> BukaCoding. All rights reserved.</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button type="button" class="btn btn-brand" id="btn-back-to-top" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?= $this->renderSection('script'); ?>

    <script>
        $(document).ready(function() {
            // Restore sidebar state dari localStorage
            if (localStorage.getItem('sidebarToggled') === 'true') {
                $("#wrapper").addClass("toggled");
            }

            $("#menu-toggle, #sidebar-overlay").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                // Simpan state ke localStorage
                localStorage.setItem('sidebarToggled', $("#wrapper").hasClass("toggled"));
            });

            // Set active menu based on current URL
            const currentUrl = window.location.href;
            $('.list-group-item').each(function() {
                if (currentUrl.includes($(this).attr('href'))) {
                    $('.list-group-item').removeClass('active');
                    $(this).addClass('active');
                }
            });

            // Back to top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $('#btn-back-to-top').fadeIn();
                } else {
                    $('#btn-back-to-top').fadeOut();
                }
            });

            $('#btn-back-to-top').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 'fast');
                return false;
            });
        });

        <?php if (session()->getFlashdata('success')) : ?>
            Swal.fire({
                icon: 'success',
                // title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success') ?>',
                timer: 2500,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
            });
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            Swal.fire({
                icon: 'error',
                // title: 'Gagal!',
                text: '<?= session()->getFlashdata('error') ?>',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
            });
        <?php endif; ?>
    </script>
    </body>

    </html>