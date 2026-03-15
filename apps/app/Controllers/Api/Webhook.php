<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class Webhook extends BaseController
{
    protected $db;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->db = \Config\Database::connect();
    }

    public function paid()
    {
        // Ambil raw body — lebih reliable dibanding getJson() untuk webhook
        $payload = $this->request->getBody();

        // log_message('info', 'Webhook Paid RAW: ' . $payload);

        $json = json_decode($payload, true);

        // Mayar wraps the actual transaction info in the "data" attribute
        if ($json && isset($json['data']) && $json['event'] == 'payment.received') {
            $data = $json['data'];
            $status = strtolower($data['status'] ?? 'pending');

            if ($status == 'success') {
                $updateData = [
                    'status'     => 'paid',
                    'payment_method' => $data['paymentMethod'],
                    'payment_link_amount' => $data['paymentLinkAmount'],
                    'updated_at' => date('Y-m-d H:i:s'),
                    'paid_at' => date('Y-m-d H:i:s'),
                ];

                // Ambil data transaksi dari DB sebelum update
                $transaksi = $this->db->table('transaksi')
                    ->where('transaction_id', $data['transactionId'])
                    ->get()->getRow();

                if (!$transaksi) {
                    log_message('error', 'Webhook Paid: transaksi tidak ditemukan | transaction_id: ' . $data['transactionId']);
                    return $this->response->setJSON(['status' => false, 'message' => 'Transaksi tidak ditemukan']);
                }

                // Update status transaksi
                $this->db->table('transaksi')
                    ->where('transaction_id', $data['transactionId'])
                    ->update($updateData);

                log_message('info', 'Webhook transaksi updated: ' . $this->db->affectedRows() . ' row | transaction_id: ' . $data['transactionId']);

                // TAMBAHKAN KELAS KE TABEL kelas_user (pakai user_id & kelas_id dari transaksi)
                $this->db->table('kelas_user')->insert([
                    'user_id'    => $transaksi->user_id,
                    'kelas_id'   => $transaksi->kelas_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                log_message('info', 'Webhook kelas_user inserted | user_id: ' . $transaksi->user_id . ' | kelas_id: ' . $transaksi->kelas_id);

                return $this->response->setJSON([
                    'status'  => true,
                    'message' => 'Transaksi berhasil diperbarui',
                ]);
            }
        }

        log_message('error', 'Webhook Paid: format salah atau data kosong. Payload: ' . $payload);

        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Transaksi tidak ditemukan atau format webhook salah',
        ]);
    }
}
