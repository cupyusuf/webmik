<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;
use App\Models\UserModel;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        $isLogin = $session->get('is_login');
        $role = $session->get('role');
        $isAdmin = $session->get('is_admin');

        if (!$isLogin || !($isAdmin === true || $role === 'admin')) {
            // try remember-me cookie
            $cookie = $_COOKIE['remember_me'] ?? null;
            if ($cookie) {
                $parts = explode('|', $cookie);
                if (count($parts) === 2) {
                    [$uid, $token] = $parts;
                    $userModel = new UserModel();
                    $user = $userModel->find((int)$uid);
                    if ($user && !empty($user['remember_token']) && !empty($user['remember_expires'])) {
                        if ((int)$user['remember_expires'] >= time() && password_verify($token, $user['remember_token'])) {
                            $session->set([
                                'is_login' => true,
                                'is_admin' => true,
                                'email' => $user['email'],
                                'user_id' => $user['id'],
                                'role' => $user['role'] ?? 'admin',
                            ]);
                            return; // allow request
                        }
                    }
                }
            }

            return redirect()->to('/auth/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nothing
    }
}
