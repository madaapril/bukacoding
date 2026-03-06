<?php

namespace App\Controllers;

class ItemPengeluaran extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Item Pengeluaran'
        ];

        return view('item_pengeluaran/index', $data);
    }
}
