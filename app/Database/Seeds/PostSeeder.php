<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Introducing WebMik Redesign',
                'slug' => 'introducing-webmik-redesign',
                'excerpt' => 'Say hello to a cleaner, faster WebMik experience.',
                'body' => 'Full article content here...',
                'cover' => base_url('assets/images/placeholder-cover.svg'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'How to Use Midtrans Snap',
                'slug' => 'how-to-use-midtrans-snap',
                'excerpt' => 'Step-by-step guide to integrate payments with Midtrans Snap.',
                'body' => 'Full guide content...',
                'cover' => base_url('assets/images/placeholder-cover.svg'),
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($data as $item) {
            $this->db->table('posts')->insert($item);
        }
    }
}
