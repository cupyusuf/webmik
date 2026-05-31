<?php

namespace App\Controllers;

use Config\Services;
use App\Models\UserModel;

class Auth extends \App\Controllers\BaseController
{
    public function login()
    {
        $request = service('request');
        $session = Services::session();

        // If already logged in, redirect
        if ($session->get('is_login')) {
            return redirect()->to('/admin');
        }

        // Try remember-me cookie first (auto-login)
        $cookie = $request->getCookie('remember_me');
        if (!$session->get('is_login') && $cookie) {
            $parts = explode('|', $cookie);
            if (count($parts) === 2) {
                [$uid, $token] = $parts;
                $userModel = new UserModel();
                $user = $userModel->find((int)$uid);
                if ($user && !empty($user['remember_token']) && !empty($user['remember_expires'])) {
                    if ((int)$user['remember_expires'] >= time() && password_verify($token, $user['remember_token'])) {
                        if (($user['role'] ?? 'member') !== 'admin') {
                            return redirect()->to('/auth/login');
                        }
                        $session->set([
                            'is_login' => true,
                            'is_admin' => true,
                            'email' => $user['email'],
                            'user_id' => $user['id'],
                            'role' => $user['role'] ?? 'admin',
                        ]);
                        return redirect()->to('/admin');
                    }
                }
            }
        }

        if ($request->getMethod() === 'post') {
            $email = $request->getPost('email');
            $password = $request->getPost('password');
            $remember = $request->getPost('remember') ? true : false;

            $userModel = new UserModel();
            $user = $userModel->findByEmail($email);

            // If user exists in DB, verify password
            if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
                if (($user['role'] ?? 'member') !== 'admin') {
                    $session->setFlashdata('error', 'Account is not allowed to access admin');
                    return redirect()->back();
                }
                $session->set([
                    'is_login' => true,
                    'is_admin' => true,
                    'email' => $user['email'],
                    'user_id' => $user['id'],
                    'role' => $user['role'] ?? 'admin',
                ]);

                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    $hashed = password_hash($token, PASSWORD_DEFAULT);
                    $expires = time() + (30 * 24 * 60 * 60); // 30 days
                    $userModel->setRememberToken((int)$user['id'], $hashed, $expires);

                    // set cookie value: id|token
                    $cookieValue = $user['id'] . '|' . $token;
                    setcookie('remember_me', $cookieValue, $expires, '/', '', isset($_SERVER['HTTPS']), true);
                }

                return redirect()->to('/admin');
            }

            // Fallback: check env admin creds
            $adminEmail = getenv('ADMIN_EMAIL') ?: 'admin@example.com';
            $adminPassword = getenv('ADMIN_PASSWORD') ?: 'admin';

            if ($email === $adminEmail && $password === $adminPassword) {
                $session->set([
                    'is_login' => true,
                    'is_admin' => true,
                    'email' => $email,
                ]);
                return redirect()->to('/admin');
            }

            $session->setFlashdata('error', 'Invalid credentials');
            return redirect()->back();
        }

        return view('auth/login');
    }

    public function register()
    {
        $request = service('request');
        $session = Services::session();

        if ($session->get('is_login')) {
            return redirect()->to('/admin');
        }

        if ($request->getMethod() === 'post') {
            $name = trim((string) $request->getPost('name'));
            $email = trim((string) $request->getPost('email'));
            $password = (string) $request->getPost('password');
            $confirmPassword = (string) $request->getPost('password_confirm');

            if ($name === '' || $email === '' || $password === '') {
                $session->setFlashdata('error', 'Semua field wajib diisi.');
                return redirect()->back();
            }

            if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $session->setFlashdata('error', 'Format email tidak valid.');
                return redirect()->back();
            }

            if ($password !== $confirmPassword) {
                $session->setFlashdata('error', 'Password dan konfirmasi tidak sama.');
                return redirect()->back();
            }

            if (strlen($password) < 8) {
                $session->setFlashdata('error', 'Password minimal 8 karakter.');
                return redirect()->back();
            }

            $userModel = new UserModel();
            if ($userModel->findByEmail($email)) {
                $session->setFlashdata('error', 'Email sudah terdaftar.');
                return redirect()->back();
            }

            $userModel->insert([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => 'member',
            ]);

            $session->setFlashdata('success', 'Akun berhasil dibuat. Silakan login untuk masuk ke admin.');
            return redirect()->to('/auth/login');
        }

        return view('auth/register');
    }

    public function logout()
    {
        $session = Services::session();
        // Clear remember token if present
        $userId = $session->get('user_id');
        if ($userId) {
            try {
                $userModel = new UserModel();
                $userModel->clearRememberToken((int)$userId);
            } catch (\Exception $e) {
                // ignore
            }
        }

        // Clear cookie
        setcookie('remember_me', '', time() - 3600, '/', '', isset($_SERVER['HTTPS']), true);

        $session->destroy();
        return redirect()->to('/auth/login');
    }
}
