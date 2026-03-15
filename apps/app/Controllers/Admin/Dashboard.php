<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'kelas' => $this->db->table('kelas')->countAll(),
            'peserta' => $this->db->table('users')->where('role', 'peserta')->countAll(),
        ];

        return view('admin/dashboard/index', $data);
    }
}
