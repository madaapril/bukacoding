<?php

namespace App\Controllers;

class Pos extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'POS'
        ];

        return view('pos/index', $data);
    }
}
