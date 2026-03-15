<nav class="topbar">
    <div class="d-flex align-items-center">
        <button class="btn p-0 me-3" id="menu-toggle">
            <i class="ri-menu-2-line fs-5"></i>
        </button>
        <h5 class="m-0 fw-bold d-none d-sm-block"><?= $title ?? '' ?></h5>
    </div>

    <div class="dropdown">
        <div class="user-info dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="user-email d-none d-md-inline"><?= session()->get('email') ?? 'admin@bukacoding.id' ?></span>
            <img src="https://ui-avatars.com/api/?name=<?= urlencode(session()->get('name') ?? 'Admin') ?>&background=7C3AED&color=fff&bold=true&size=80" alt="Profile" class="profile-img">
        </div>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="<?= base_url('admin/profil') ?>"><i class="ri-account-circle-line"></i> Profil</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="ri-logout-box-r-line"></i> Logout</a></li>
        </ul>
    </div>
</nav>