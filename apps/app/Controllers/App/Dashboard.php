<?php

namespace App\Controllers\app;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $kelas = $this->db->query("SELECT kelas.*, kategori.nama as kategori_nama, COUNT(materi.id) as total_materi, COUNT(materi_user.id) as total_selesai
        FROM kelas_user 
        JOIN kelas ON kelas.id = kelas_user.kelas_id
        LEFT JOIN materi ON materi.kelas_id = kelas.id
        LEFT JOIN materi_user ON materi_user.materi_id = materi.id AND materi_user.user_id = " . session()->get('user_id') . "
        LEFT JOIN kategori ON kategori.id = kelas.kategori_id
        WHERE kelas_user.user_id = " . session()->get('user_id') . "
        AND materi.deleted_at IS NULL
        GROUP BY kelas.id")->getResult();

        $data = [
            'title' => 'Dashboard',
            'kelas' => $kelas
        ];

        return view('app/dashboard/index', $data);
    }
}
