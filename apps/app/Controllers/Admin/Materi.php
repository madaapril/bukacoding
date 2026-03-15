<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Materi extends BaseController
{
    public function index($kelas_id)
    {
        $materi = $this->db->table('materi')
            ->join('kelas', 'materi.kelas_id = kelas.id')
            ->select('materi.*, kelas.nama as kelas_nama')
            ->where('materi.deleted_at IS NULL')
            ->where('materi.kelas_id', $kelas_id)
            ->orderBy('materi.urutan', 'ASC')
            ->get()->getResult();

        $kelas = $this->db->table('kelas')->where('id', $kelas_id)->get()->getRow();

        $data = [
            'title' => 'Materi Kelas: ' . ($kelas->nama ?? ''),
            'materi' => $materi,
            'kelas_id' => $kelas_id,
            'kelas' => $kelas
        ];

        return view('admin/materi/index', $data);
    }

    public function simpan($kelas_id)
    {
        $id = $this->request->getPost('id');
        $input_kelas_id = $this->request->getPost('kelas_id');
        $judul = $this->request->getPost('judul');
        $video_id = $this->request->getPost('video_id');
        $type = $this->request->getPost('type');
        $min_pass_score = $this->request->getPost('min_pass_score');
        $is_final_quiz = $this->request->getPost('is_final_quiz') ?? 0;
        $urutan = $this->request->getPost('urutan');

        if (empty($judul)) {
            session()->setFlashdata('error', 'Judul materi wajib diisi.');
            return redirect()->back()->withInput();
        }

        $data = [
            'kelas_id'       => !empty($input_kelas_id) ? $input_kelas_id : $kelas_id,
            'judul'          => $judul,
            'video_id'       => empty($video_id) ? null : $video_id,
            'type'           => empty($type) ? null : $type,
            'min_pass_score' => empty($min_pass_score) ? null : $min_pass_score,
            'is_final_quiz'  => !empty($is_final_quiz) ? $is_final_quiz : 0,
            'urutan'         => empty($urutan) ? null : $urutan,
            'updated_at'     => date('Y-m-d H:i:s'),
        ];

        if (empty($id)) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('materi')->insert($data);
            session()->setFlashdata('success', 'Materi berhasil ditambahkan.');
        } else {
            $this->db->table('materi')->where('id', $id)->update($data);
            session()->setFlashdata('success', 'Materi berhasil diperbarui.');
        }

        return redirect()->to(base_url('admin/kelas/' . $kelas_id . '/materi'));
    }

    public function hapus($kelas_id)
    {
        $id = $this->request->getPost('id') ?? $this->request->getVar('id');

        // if (empty($id)) {
        //     $id = $this->request->getUri()->getSegment(4);
        // }

        if ($id) {
            $this->db->table('materi')->where('id', $id)->update([
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('success', 'Kelas berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Kelas gagal dihapus karena ID tidak ditemukan.');
        }

        return redirect()->to(base_url('admin/kelas/' . $kelas_id . '/materi'));
    }
}
