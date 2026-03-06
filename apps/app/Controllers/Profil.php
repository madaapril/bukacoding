<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profil'
        ];

        return view('profil/index', $data);
    }
}
