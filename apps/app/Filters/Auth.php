<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek sudah login apa belum, jika belum lempar ke halaman login
        $uri = service('uri');

        if (!session()->get('isLoggedIn'))
            return redirect()->to('/login');

        if (session()->get('role') == 'peserta' && $uri->getSegment(1) == 'admin') {
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
