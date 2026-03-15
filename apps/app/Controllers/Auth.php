<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/app/dashboard');
            }
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($email) {
            $user = $this->db->table('users')->where('email', $email)->get()->getRowArray();

            if ($user && password_verify($password, $user['password'])) {
                session()->set('isLoggedIn', true);
                session()->set('user_id', $user['id']);
                session()->set('email', $user['email']);
                session()->set('hp', $user['hp']);
                session()->set('role', $user['role']);
                session()->set('name', $user['name']);

                // Set Cookie Remember Me
                $rememberme = $this->request->getPost('rememberme');
                $this->set_cookie($user['email'], $password, $rememberme);

                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/app/dashboard');
                }
            } else {
                session()->setFlashdata('error', 'Email atau password salah');
                return redirect()->to('/login');
            }
        }

        return view('auth/login');
    }

    public function cek_email()
    {
        $email = $this->request->getGet('email');
        $count = $this->db->table('users')->where('email', $email)->get()->getNumRows();

        return $this->response->setJSON([
            'taken' => $count > 0,
        ]);
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/app/dashboard');
            }
        }

        $email = $this->request->getPost('email');
        $name = $this->request->getPost('name');
        $password = $this->request->getPost('password');

        if ($email && $name && $password) {
            $count = $this->db->table('users')->where('email', $email)->get()->getNumRows();
            if ($count > 0) {
                session()->setFlashdata('error', 'Email sudah terdaftar');
                return redirect()->to('/register');
            }

            $data = [
                'email' => $email,
                'name' => $name,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $this->db->table('users')->insert($data);
            session()->setFlashdata('success', 'Akun berhasil dibuat, silahkan login');
            return redirect()->to('/login');
        }

        return view('auth/register');
    }

    public function syarat_ketentuan()
    {
        return view('syarat_ketentuan');
    }

    public function forgot_password()
    {
        return view('auth/forgot_password');
    }

    private function set_cookie($username, $password, $rememberme = null)
    {
        // Set Cookie Remember Me
        if ($rememberme) {
            setcookie("eid", base64_encode(serialize($username)), time() + (30 * 24 * 60 * 60));
            setcookie("pid", base64_encode(serialize($password)), time() + (30 * 24 * 60 * 60));
        } else {
            setcookie("eid", "");
            setcookie("pid", "");
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
