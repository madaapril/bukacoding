<?php

namespace App\Controllers;

class Kedai extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kedai'
        ];

        return view('kedai/index', $data);
    }
}
