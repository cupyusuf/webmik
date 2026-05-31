<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'name', 'role', 'remember_token', 'remember_expires'];
    protected $useTimestamps = true;

    public function findByEmail(string $email)
    {
        return $this->asArray()->where('email', $email)->first();
    }

    public function setRememberToken(int $userId, string $hashedToken, int $expiresAt)
    {
        return $this->update($userId, [
            'remember_token' => $hashedToken,
            'remember_expires' => $expiresAt,
        ]);
    }

    public function clearRememberToken(int $userId)
    {
        return $this->update($userId, [
            'remember_token' => null,
            'remember_expires' => null,
        ]);
    }

    public function isAdmin(array $user): bool
    {
        return isset($user['role']) && $user['role'] === 'admin';
    }
}
