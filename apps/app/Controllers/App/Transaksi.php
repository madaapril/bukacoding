<?php

namespace App\Controllers\app;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'transaksi' => $this->db->table('transaksi')
                ->join('kelas', 'kelas.id = transaksi.kelas_id')
                ->where('transaksi.user_id', session()->get('user_id'))
                ->orderBy('transaksi.created_at', 'desc')
                ->select('transaksi.*, kelas.nama as kelas_nama')
                ->get()->getResult(),
        ];

        return view('app/transaksi/index', $data);
    }
}
