<?php

namespace App\Controllers\app;

use App\Controllers\BaseController;

class Kelas extends BaseController
{
    public function index()
    {
        $kelas = $this->db->table('kelas')
            ->join('kategori', 'kelas.kategori_id = kategori.id', 'left')
            ->select('kelas.*, kategori.nama as kategori_nama')
            ->where('kelas.deleted_at IS NULL')->get()->getResult();

        $data = [
            'title' => 'Kelas',
            'kelas' => $kelas,
        ];

        return view('app/kelas/index', $data);
    }

    public function detail($id)
    {
        $kelas = $this->db->table('kelas')
            ->join('kategori', 'kelas.kategori_id = kategori.id', 'left')
            ->join('kelas_user', 'kelas.id = kelas_user.kelas_id AND kelas_user.user_id = ' . session()->get('user_id'), 'left')
            ->select('kelas.*, kategori.nama as kategori_nama, kelas_user.created_at mulai_kelas, kelas_user.lulus, kelas_user.lulus_at')
            ->where('kelas.id', $id)->get()->getRow();

        $materi = $this->db->table('materi')
            ->join('materi_user', 'materi.id = materi_user.materi_id AND materi_user.user_id = ' . session()->get('user_id'), 'left')
            ->select('materi.*, materi_user.completed_at')
            ->where('materi.deleted_at IS NULL')
            ->where('materi.kelas_id', $id)
            ->orderBy('materi.urutan', 'ASC')->get()->getResult();

        $data = [
            'title' => 'Detail Kelas',
            'kelas' => $kelas,
            'materi' => $materi,
        ];

        return view('app/kelas/detail', $data);
    }

    public function beli($kelas_id)
    {
        $kelas = $this->db->table('kelas')
            ->join('kategori', 'kelas.kategori_id = kategori.id', 'left')
            ->join('kelas_user', 'kelas.id = kelas_user.kelas_id AND kelas_user.user_id = ' . session()->get('user_id'), 'left')
            ->select('kelas.*, kategori.nama as kategori_nama, kelas_user.created_at mulai_kelas, kelas_user.lulus, kelas_user.lulus_at')
            ->where('kelas.id', $kelas_id)->get()->getRow();

        if ($kelas->harga == 0 || $kelas->mulai_kelas) {
            return redirect()->to(base_url('app/kelas/' . $kelas_id . '/detail'));
        }

        $transaksi = $this->db->table('transaksi')
            ->where('kelas_id', $kelas_id)
            ->where('user_id', session()->get('user_id'))
            // ->where('status', 'pending')
            ->get()->getRow();

        if ($transaksi) {
            if ($transaksi->status == 'paid') {
                return redirect()->to(base_url('app/kelas/' . $kelas_id . '/detail'));
            } else {
                return redirect()->to($transaksi->link);
            }
        }

        $data = [
            'title' => 'Beli Kelas',
            'kelas' => $kelas,
        ];

        return view('app/kelas/beli', $data);
    }

    public function mayar($kelas_id)
    {
        // dd(MAYAR_API_KEY);
        $kelas = $this->db->table('kelas')
            ->join('kategori', 'kelas.kategori_id = kategori.id', 'left')
            ->join('kelas_user', 'kelas.id = kelas_user.kelas_id AND kelas_user.user_id = ' . session()->get('user_id'), 'left')
            ->select('kelas.*, kategori.nama as kategori_nama, kelas_user.created_at mulai_kelas, kelas_user.lulus, kelas_user.lulus_at')
            ->where('kelas.id', $kelas_id)->get()->getRow();

        if ($kelas->harga == 0 || $kelas->mulai_kelas) {
            return redirect()->to(base_url('app/kelas/' . $kelas_id . '/detail'));
        }

        // $url = 'https://api.mayar.id/hl/v1/invoice/create';
        // $url = 'https://api.mayar.id/hl/v1/payment/create';
        $url = 'https://api.mayar.club/hl/v1/payment/create';

        $user = $this->db->table('users')->where('id', session()->get('user_id'))->get()->getRow();

        $data = [
            'name' => $user->name ?? session()->get('name') ?? 'User',
            'email' => $user->email ?? session()->get('email'),
            'mobile' => $user->hp ?? '000000000000',
            'description' => 'Pembayaran Kelas ' . ($kelas->nama ?? 'Online'),
            'amount' => (int)$kelas->harga,
            'expiredAt' => date('Y-m-d H:i:s', strtotime('+1 day')), //Invoice expiration time in ISO 8601 format (UTC).
            'redirectUrl' => base_url('app/kelas/' . $kelas_id . '/terbayar'),
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . env('MAYAR_API_KEY'),
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = json_decode($response, true);

        if (isset($res['statusCode']) && ($res['statusCode'] == 200 || $res['statusCode'] == 201) && isset($res['data']['link'])) {
            // INSERT TRANSAKSI
            $this->db->table('transaksi')->insert([
                'user_id' => session()->get('user_id'),
                'kelas_id' => $kelas_id,
                'amount' => $kelas->harga,
                'mayar_id' => $res['data']['id'],
                'transaction_id' => $res['data']['transactionId'],
                'link' => $res['data']['link'],
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to($res['data']['link']);
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan.');
            return redirect()->to(base_url('app/kelas/' . $kelas_id . '/beli'));
        }

        // BUKA LINK PEMBAYARAN KE SINI
        // https://madaapril.myr.id/invoices/iitu6vz7pz

        // $data = [
        //     'title' => 'Beli Kelas',
        //     'kelas' => $kelas,
        // ];

        // return view('app/kelas/mayar', $data);
    }

    public function detail_payment($kelas_id, $id)
    {
        // https://api.mayar.id/hl/v1/payment/{id}
        $url = 'https://api.mayar.id/hl/v1/payment/' . $id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . env('MAYAR_API_KEY'),
            'Content-Type: application/json',
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $res = json_decode($response, true);
        if (isset($res['statusCode']) && ($res['statusCode'] == 200 || $res['statusCode'] == 201) && isset($res['data']['link'])) {
            return redirect()->to($res['data']['link']);
        }

        dd($res);
    }

    public function terbayar($kelas_id)
    {
        $kelas = $this->db->table('kelas')
            ->select('kelas.*')
            ->where('kelas.id', $kelas_id)->get()->getRow();

        $transaksi = $this->db->table('transaksi')
            ->where('kelas_id', $kelas_id)
            ->where('user_id', session()->get('user_id'))
            // ->where('status', 'paid')
            ->get()->getRow();

        if (!$kelas || !$transaksi) {
            return redirect()->to(base_url('app/kelas'));
        }

        $data = [
            'title' => 'Pembayaran Berhasil',
            'kelas' => $kelas,
            'transaksi' => $transaksi,
        ];

        return view('app/kelas/terbayar', $data);
    }

    public function materi($kelas_id, $id)
    {
        $materi_detail = $this->db->table('materi')
            ->select('materi.*')
            ->where('materi.deleted_at IS NULL')
            ->where('materi.id', $id)
            ->get()->getRow();

        $kelas = $this->db->table('kelas')
            ->join('kategori', 'kelas.kategori_id = kategori.id', 'left')
            ->select('kelas.*, kategori.nama as kategori_nama')
            ->where('kelas.id', $kelas_id)->get()->getRow();

        // CEK DULU, JIKA KELAS BERBAYAR, CEK APAKAH SUDAH BAYAR
        if ($kelas->harga > 0) {
            $transaksi = $this->db->table('transaksi')
                ->select('transaksi.*')
                ->where('transaksi.kelas_id', $kelas_id)
                ->where('transaksi.user_id', session()->get('user_id'))
                ->where('transaksi.status', 'paid')
                ->get()->getRow();

            if (!$transaksi) {
                return redirect()->to(base_url('app/kelas/' . $kelas_id . '/beli'));
            }
        }

        $materi = $this->db->table('materi')
            ->select('materi.*, materi_user.completed_at')
            ->join('materi_user', 'materi.id = materi_user.materi_id AND materi_user.user_id = ' . session()->get('user_id'), 'left')
            ->where('materi.deleted_at IS NULL')
            ->where('materi.kelas_id', $kelas_id)
            ->orderBy('materi.urutan', 'ASC')->get()->getResult();

        // Cek apakah user berhak mengakses materi ini (sama dengan logic di view)
        $is_accessible = false;
        foreach ($materi as $index => $m) {
            if ($m->id == $id) {
                if ($index == 0 || !empty($m->completed_at) || !empty($materi[$index - 1]->completed_at)) {
                    $is_accessible = true;
                }
                break;
            }
        }

        if (!$is_accessible) {
            return redirect()->to(base_url('app/kelas/' . $kelas_id . '/detail'))->with('error', 'Anda harus menyelesaikan materi sebelumnya terlebih dahulu.');
        }

        // CEK APAKAH UDAH ADA DI TABEL KELAS_USER, JIKA BELUM, INSERT
        $kelas_user = $this->db->table('kelas_user')
            ->where('kelas_user.kelas_id', $kelas_id)
            ->where('kelas_user.user_id', session()->get('user_id'))->get()->getRow();

        if (!$kelas_user) {
            $this->db->table('kelas_user')->insert([
                'kelas_id' => $kelas_id,
                'user_id' => session()->get('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $materi_user = $this->db->table('materi_user')
            ->where('materi_user.materi_id', $id)
            ->where('materi_user.user_id', session()->get('user_id'))->get()->getRow();

        $data = [
            'title' => 'Detail Materi',
            'materi' => $materi,
            'kelas' => $kelas,
            'materi_detail' => $materi_detail,
            'materi_user' => $materi_user,
        ];

        if ($materi_detail->type === 'quiz') {
            $question = $this->db->table('quiz_question')
                ->where('quiz_question.deleted_at IS NULL')
                ->where('quiz_question.materi_id', $id)
                ->orderBy('quiz_question.urutan', 'ASC')
                ->get()->getResult();

            foreach ($question as $key => $q) {
                $question[$key]->options = $this->db->table('quiz_option')
                    ->where('quiz_option.deleted_at IS NULL')
                    ->where('quiz_option.quiz_question_id', $q->id)
                    ->orderBy('quiz_option.urutan', 'ASC')
                    ->get()->getResult();
            }

            $quiz_result = $this->db->table('quiz_result')
                ->where('quiz_result.materi_id', $id)
                ->where('quiz_result.user_id', session()->get('user_id'))->get()->getRow();

            $data['question'] = $question;
            $data['quiz_result'] = $quiz_result;
            return view('app/kelas/quiz', $data);
        }

        return view('app/kelas/materi', $data);
    }

    public function tandai_menyimak($kelas_id, $materi_id)
    {
        $materi_user = $this->db->table('materi_user')
            ->where('materi_user.materi_id', $materi_id)
            ->where('materi_user.user_id', session()->get('user_id'))->get()->getRow();

        if (!$materi_user) {
            $this->db->table('materi_user')->insert([
                'materi_id' => $materi_id,
                'user_id' => session()->get('user_id'),
                'completed_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->to(base_url('app/kelas/' . $kelas_id . '/materi/' . $materi_id));
    }

    public function submit_quiz($kelas_id, $materi_id)
    {
        $user_id = session()->get('user_id');

        // Ambil info materi utk min_pass_score
        $materi = $this->db->table('materi')
            ->where('id', $materi_id)
            ->where('deleted_at IS NULL')
            ->get()->getRow();

        if (!$materi) {
            return redirect()->back()->with('error', 'Materi tidak ditemukan.');
        }

        // Ambil soal quiz untuk materi ini
        $questions = $this->db->table('quiz_question')
            ->where('materi_id', $materi_id)
            ->where('deleted_at IS NULL')
            ->get()->getResult();

        $total_questions = count($questions);

        if ($total_questions === 0) {
            return redirect()->back()->with('error', 'Quiz belum memiliki pertanyaan.');
        }

        $correct_answers = 0;

        foreach ($questions as $q) {
            $submitted_option_id = $this->request->getPost('question_' . $q->id);

            if ($submitted_option_id) {
                // cek apakah option itu is_correct = 1
                $option = $this->db->table('quiz_option')
                    ->where('id', $submitted_option_id)
                    ->where('quiz_question_id', $q->id)
                    ->where('deleted_at IS NULL')
                    ->get()->getRow();

                if ($option && $option->is_correct) {
                    $correct_answers++;
                }
            }
        }

        // Hitung persentase score
        $score = ($correct_answers / $total_questions) * 100;
        $is_passed = ($score >= $materi->min_pass_score) ? 1 : 0;

        // Cek apakah sudah pernah ngerjain
        $existing_result = $this->db->table('quiz_result')
            ->where('user_id', $user_id)
            ->where('materi_id', $materi_id)
            ->get()->getRow();

        if ($existing_result) {
            // Update
            $this->db->table('quiz_result')
                ->where('id', $existing_result->id)
                ->update([
                    'score' => $score,
                    'is_passed' => $is_passed,
                    'end_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
        } else {
            // Insert
            $this->db->table('quiz_result')->insert([
                'user_id' => $user_id,
                'materi_id' => $materi_id,
                'score' => $score,
                'is_passed' => $is_passed,
                'end_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        // update materi_user
        $materi_user = $this->db->table('materi_user')
            ->where('materi_id', $materi_id)
            ->where('user_id', $user_id)->get()->getRow();

        if (!$materi_user) {
            $this->db->table('materi_user')->insert([
                'materi_id' => $materi_id,
                'user_id' => $user_id,
                'completed_at' => ($is_passed) ? date('Y-m-d H:i:s') : null,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            if ($is_passed && !$materi_user->completed_at) {
                $this->db->table('materi_user')
                    ->where('id', $materi_user->id)
                    ->update([
                        'completed_at' => date('Y-m-d H:i:s')
                    ]);
            }
        }

        // update kelas_user jika ini adalah final quiz dan user lulus
        if ($materi->is_final_quiz == 1 && $is_passed) {
            $this->db->table('kelas_user')
                ->where('kelas_id', $kelas_id)
                ->where('user_id', $user_id)
                ->update([
                    'lulus' => 1,
                    'lulus_at' => date('Y-m-d H:i:s')
                ]);
        }

        return redirect()->to(base_url('app/kelas/' . $kelas_id . '/materi/' . $materi_id));
    }
}
