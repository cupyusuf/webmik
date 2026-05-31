<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $adminEmail = getenv('ADMIN_EMAIL') ?: 'admin@example.com';
        $adminPassword = getenv('ADMIN_PASSWORD') ?: 'admin';

        $existing = $this->db->table('users')
            ->where('email', $adminEmail)
            ->get()
            ->getRowArray();

        $payload = [
            'name' => 'Administrator',
            'email' => $adminEmail,
            'password' => password_hash($adminPassword, PASSWORD_DEFAULT),
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($existing) {
            $this->db->table('users')->where('email', $adminEmail)->update($payload);
            return;
        }

        $this->db->table('users')->insert($payload);
    }
}
