<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $kelas = $this->db->query("SELECT kelas.*, kategori.nama nama_kategori, SUM(CASE WHEN materi.type = 'materi' THEN 1 ELSE 0 END) as jumlah_materi 
        FROM kelas
        JOIN materi ON materi.kelas_id = kelas.id
        LEFT JOIN kategori ON kategori.id = kelas.kategori_id
        GROUP BY kelas.id")->getResult();

        return view('home/index', [
            'kelas' => $kelas
        ]);
    }
}
