<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Quiz extends BaseController
{
    protected $db;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->db = \Config\Database::connect();
    }
    public function index($kelas_id, $materi_id)
    {
        $kelas = $this->db->table('kelas')->where('id', $kelas_id)->get()->getRow();
        $materi = $this->db->table('materi')->where('id', $materi_id)->get()->getRow();
        $quiz_question = $this->db->table('quiz_question')->where('materi_id', $materi_id)->orderBy('urutan', 'asc')->get()->getResult();

        foreach ($quiz_question as $key => $q) {
            $quiz_question[$key]->options = $this->db->table('quiz_option')->where('quiz_question_id', $q->id)->orderBy('urutan', 'asc')->get()->getResult();
        }

        $data = [
            'title'         => 'Kelola Quiz: ' . ($materi->judul ?? ''),
            'kelas_id'      => $kelas_id,
            'materi_id'     => $materi_id,
            'kelas'         => $kelas,
            'materi'        => $materi,
            'quiz_question' => $quiz_question
        ];

        return view('admin/quiz/index', $data);
    }

    public function simpan($kelas_id, $materi_id)
    {
        $id = $this->request->getPost('id');
        $urutan = $this->request->getPost('urutan');
        $pertanyaan = $this->request->getPost('pertanyaan');
        $options = $this->request->getPost('options');

        $dataPertanyaan = [
            'materi_id'  => $materi_id,
            'urutan'     => $urutan,
            'pertanyaan' => $pertanyaan
        ];

        $this->db->transStart();

        if (empty($id)) {
            // Is New
            $dataPertanyaan['created_at'] = date('Y-m-d H:i:s');
            $dataPertanyaan['updated_at'] = date('Y-m-d H:i:s');

            $this->db->table('quiz_question')->insert($dataPertanyaan);
            $question_id = $this->db->insertID();
        } else {
            // Is Update
            $dataPertanyaan['updated_at'] = date('Y-m-d H:i:s');

            $this->db->table('quiz_question')->where('id', $id)->update($dataPertanyaan);
            $question_id = $id;

            // Delete existing options before inserting new ones
            $this->db->table('quiz_option')->where('quiz_question_id', $question_id)->delete();
        }

        // Insert Options
        if (!empty($options) && is_array($options)) {
            $dataOptions = [];
            foreach ($options as $index => $opt) {
                if (!empty(trim($opt['text']))) {
                    $dataOptions[] = [
                        'quiz_question_id' => $question_id,
                        'text'        => $opt['text'],
                        'is_correct'  => isset($opt['is_correct']) ? $opt['is_correct'] : 0,
                        'urutan'      => $index + 1, // Store natural order based on input array
                        'created_at'  => date('Y-m-d H:i:s'),
                        'updated_at'  => date('Y-m-d H:i:s')
                    ];
                }
            }

            if (!empty($dataOptions)) {
                $this->db->table('quiz_option')->insertBatch($dataOptions);
            }
        }

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            session()->setFlashdata('error', 'Gagal menyimpan pertanyaan quiz.');
        } else {
            session()->setFlashdata('success', 'Pertanyaan quiz berhasil disimpan.');
        }

        return redirect()->to(base_url('admin/kelas/' . $kelas_id . '/materi/' . $materi_id . '/quiz'));
    }

    public function hapus($kelas_id, $materi_id)
    {
        $id = $this->request->getPost('id');

        if (empty($id)) {
            session()->setFlashdata('error', 'ID Soal tidak valid.');
            return redirect()->to(base_url('admin/kelas/' . $kelas_id . '/materi/' . $materi_id . '/quiz'));
        }

        $this->db->transStart();

        // Delete options first (foreign key reference)
        $this->db->table('quiz_option')->where('quiz_question_id', $id)->delete();

        // Delete the question
        $this->db->table('quiz_question')->where('id', $id)->delete();

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            session()->setFlashdata('error', 'Gagal menghapus soal quiz.');
        } else {
            session()->setFlashdata('success', 'Soal quiz berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/kelas/' . $kelas_id . '/materi/' . $materi_id . '/quiz'));
    }
}
