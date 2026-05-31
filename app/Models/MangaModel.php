<?php

namespace App\Models;

use CodeIgniter\Model;

class MangaModel extends Model
{
    protected $table = 'manga';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'synopsis', 'author', 'cover', 'status', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
