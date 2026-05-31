<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UpdateCoversSeeder extends Seeder
{
    public function run()
    {
        // Update manga covers by slug
        $this->db->table('manga')->where('slug', 'tales-of-the-blue-sea')->update([
            'cover' => base_url('assets/images/covers/manga1.svg')
        ]);

        $this->db->table('manga')->where('slug', 'stories-of-the-night')->update([
            'cover' => base_url('assets/images/covers/manga2.svg')
        ]);

        // Update posts covers by slug
        $this->db->table('posts')->where('slug', 'introducing-webmik-redesign')->update([
            'cover' => base_url('assets/images/covers/post1.svg')
        ]);

        $this->db->table('posts')->where('slug', 'how-to-use-midtrans-snap')->update([
            'cover' => base_url('assets/images/covers/post2.svg')
        ]);
    }
}
