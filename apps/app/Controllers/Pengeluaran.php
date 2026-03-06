<?php

namespace App\Controllers;

class Pengeluaran extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pengeluaran'
        ];

        return view('pengeluaran/index', $data);
    }
}
