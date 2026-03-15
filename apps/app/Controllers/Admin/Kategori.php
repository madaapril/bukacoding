<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    public function index()
    {
        $kategori = $this->db->table('kategori')->where('deleted_at IS NULL')->get()->getResult();

        $data = [
            'title' => 'Kategori',
            'kategori' => $kategori,
        ];

        return view('admin/kategori/index', $data);
    }

    public function simpan()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');

        if (empty($nama)) {
            session()->setFlashdata('error', 'Nama kategori wajib diisi.');
            return redirect()->back();
        }

        $data = [
            'nama' => $nama,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (empty($id)) {
            // Insert baru (tidak ada ID)
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('kategori')->insert($data);
            session()->setFlashdata('success', 'Kategori berhasil ditambahkan.');
        } else {
            // Update data (ada ID)
            $this->db->table('kategori')->where('id', $id)->update($data);
            session()->setFlashdata('success', 'Kategori berhasil diperbarui.');
        }

        return redirect()->to(base_url('admin/kategori'));
    }

    public function hapus()
    {
        $id = $this->request->getPost('id') ?? $this->request->getVar('id');

        if (empty($id)) {
            $id = $this->request->getUri()->getSegment(4);
        }

        if ($id) {
            $this->db->table('kategori')->where('id', $id)->update([
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('success', 'Kategori berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Kategori gagal dihapus karena ID tidak ditemukan.');
        }

        return redirect()->to(base_url('admin/kategori'));
    }
}
