<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MangaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Tales of the Blue Sea',
                'slug' => 'tales-of-the-blue-sea',
                'synopsis' => 'A thrilling adventure across mysterious islands and ancient ruins.',
                'author' => 'A. Author',
                'cover' => base_url('assets/images/placeholder-cover.svg'),
                'status' => 'ongoing',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Stories of the Night',
                'slug' => 'stories-of-the-night',
                'synopsis' => 'Dark fantasy anthology about heroes and monsters.',
                'author' => 'B. Writer',
                'cover' => base_url('assets/images/placeholder-cover.svg'),
                'status' => 'completed',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($data as $item) {
            $this->db->table('manga')->insert($item);
        }
    }
}
