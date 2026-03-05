<nav class="topbar">
    <div class="d-flex align-items-center">
        <button class="btn btn-link text-dark p-0 me-3" id="menu-toggle">
            <i class="fa-solid fa-bars fs-4"></i>
        </button>
        <h5 class="m-0 fw-bold text-dark d-none d-sm-block">Dashboard</h5>
    </div>

    <div class="dropdown">
        <div class="user-info dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="user-email"><?= session()->get('email') ?? 'user@dikedai.com' ?></span>
            <img src="https://ui-avatars.com/api/?name=User&background=56a7fe&color=fff" alt="Profile" class="profile-img">
        </div>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="fa-solid fa-user"></i> Profil</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
    </div>
</nav>