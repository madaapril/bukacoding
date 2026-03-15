<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profil',
        ];

        return view('admin/profil/index', $data);
    }

    public function simpan()
    {
        $name = $this->request->getPost('name');
        $hp = $this->request->getPost('hp');
        $password = $this->request->getPost('password');

        $data = [
            'name' => $name,
            'hp' => $hp,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->db->table('users')->where('id', session()->get('user_id'))->update($data);
        session()->setFlashdata('success', 'Profil berhasil diperbarui.');

        session()->set('name', $name);
        session()->set('hp', $hp);

        return redirect()->to(base_url('admin/profil'));
    }
}
