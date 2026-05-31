<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'excerpt', 'body', 'cover', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}