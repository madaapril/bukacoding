<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/syarat-ketentuan', 'Auth::syarat_ketentuan');
$routes->get('/forgot-password', 'Auth::forgot_password');
$routes->get('/auth/cek_email', 'Auth::cek_email');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('kelas', 'Admin\Kelas::index');
    $routes->post('kelas/simpan', 'Admin\Kelas::simpan');
    $routes->put('kelas/simpan', 'Admin\Kelas::simpan');
    $routes->delete('kelas/hapus', 'Admin\Kelas::hapus');

    $routes->get('kelas/(:num)/materi', 'Admin\Materi::index/$1');
    $routes->post('kelas/(:num)/materi/simpan', 'Admin\Materi::simpan/$1');
    $routes->put('kelas/(:num)/materi/simpan', 'Admin\Materi::simpan/$1');
    $routes->delete('kelas/(:num)/materi/hapus', 'Admin\Materi::hapus/$1');

    $routes->get('kelas/(:num)/materi/(:num)/quiz', 'Admin\Quiz::index/$1/$2');
    $routes->post('kelas/(:num)/materi/(:num)/quiz/simpan', 'Admin\Quiz::simpan/$1/$2');
    $routes->put('kelas/(:num)/materi/(:num)/quiz/simpan', 'Admin\Quiz::simpan/$1/$2');
    $routes->delete('kelas/(:num)/materi/(:num)/quiz/hapus', 'Admin\Quiz::hapus/$1/$2');

    $routes->get('kategori', 'Admin\Kategori::index');
    $routes->post('kategori/simpan', 'Admin\Kategori::simpan');
    $routes->delete('kategori/hapus', 'Admin\Kategori::hapus');

    $routes->get('profil', 'Admin\Profil::index');
    $routes->post('profil/simpan', 'Admin\Profil::simpan');
    $routes->put('profil/simpan', 'Admin\Profil::simpan');
});

$routes->group('app', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'App\Dashboard::index');
    $routes->get('kelas', 'App\Kelas::index');
    $routes->get('kelas/(:num)/beli', 'App\Kelas::beli/$1');
    $routes->get('kelas/(:num)/detail', 'App\Kelas::detail/$1');
    $routes->get('kelas/(:num)/terbayar', 'App\Kelas::terbayar/$1');
    $routes->post('kelas/(:num)/mayar', 'App\Kelas::mayar/$1');
    $routes->get('kelas/(:num)/detail-payment/(:any)', 'App\Kelas::detail_payment/$1/$2');
    $routes->get('kelas/(:num)/materi/(:num)', 'App\Kelas::materi/$1/$2');
    $routes->post('kelas/(:num)/materi/(:num)/submit-quiz', 'App\Kelas::submit_quiz/$1/$2');
    $routes->post('kelas/(:num)/materi/(:num)/tandai-menyimak', 'App\Kelas::tandai_menyimak/$1/$2');

    $routes->get('transaksi', 'App\Transaksi::index');

    $routes->get('profil', 'App\Profil::index');
    $routes->post('profil/simpan', 'App\Profil::simpan');
    $routes->put('profil/simpan', 'App\Profil::simpan');
});

$routes->group('api', function ($routes) {
    $routes->post('webhook/paid', 'Api\Webhook::paid');
});
