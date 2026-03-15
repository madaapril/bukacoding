<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function index()
    {
        $kelas = $this->db->table('kelas')
            ->join('kategori', 'kelas.kategori_id = kategori.id', 'left')
            ->select('kelas.*, kategori.nama as kategori_nama')
            ->where('kelas.deleted_at IS NULL')->get()->getResult();

        $kategori = $this->db->table('kategori')->where('deleted_at IS NULL')->get()->getResult();

        $data = [
            'title' => 'Kelas',
            'kelas' => $kelas,
            'kategori' => $kategori
        ];

        return view('admin/kelas/index', $data);
    }

    public function simpan()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $deskripsi = $this->request->getPost('deskripsi');
        $harga = $this->request->getPost('harga');
        $kategori_id = $this->request->getPost('kategori_id');
        $aktif = $this->request->getPost('aktif') ?? 0;

        if (empty($nama)) {
            session()->setFlashdata('error', 'Nama kelas wajib diisi.');
            return redirect()->back()->withInput();
        }

        $data = [
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'kategori_id' => empty($kategori_id) ? null : $kategori_id,
            'aktif' => $aktif,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && ! $gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move('uploads/kelas', $newName);

            // Hapus gambar lama jika ini update
            if (!empty($id)) {
                $oldData = $this->db->table('kelas')->where('id', $id)->get()->getRow();
                if ($oldData && !empty($oldData->gambar) && file_exists('uploads/kelas/' . $oldData->gambar)) {
                    unlink('uploads/kelas/' . $oldData->gambar);
                }
            }

            $data['gambar'] = $newName;
        }

        if (empty($id)) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('kelas')->insert($data);
            session()->setFlashdata('success', 'Kelas berhasil ditambahkan.');
        } else {
            $this->db->table('kelas')->where('id', $id)->update($data);
            session()->setFlashdata('success', 'Kelas berhasil diperbarui.');
        }

        return redirect()->to(base_url('admin/kelas'));
    }

    public function hapus()
    {
        $id = $this->request->getPost('id') ?? $this->request->getVar('id');

        if (empty($id)) {
            $id = $this->request->getUri()->getSegment(4);
        }

        if ($id) {
            $this->db->table('kelas')->where('id', $id)->update([
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('success', 'Kelas berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Kelas gagal dihapus karena ID tidak ditemukan.');
        }

        return redirect()->to(base_url('admin/kelas'));
    }
}
