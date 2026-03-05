    <footer>
        <div class="container-fluid">
            <p class="mb-0">&copy; <?= date('Y') ?> DIKEDAI POS. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#menu-toggle, #sidebar-overlay").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            // Set active menu based on current URL
            const currentUrl = window.location.href;
            $('.list-group-item').each(function() {
                if (currentUrl.includes($(this).attr('href'))) {
                    $('.list-group-item').removeClass('active');
                    $(this).addClass('active');
                }
            });
        });
    </script>
    </body>

    </html>