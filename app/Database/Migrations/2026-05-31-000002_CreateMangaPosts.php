<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMangaPosts extends Migration
{
    public function up()
    {
        // Create manga table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'synopsis' => ['type' => 'TEXT', 'null' => true],
            'author' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'cover' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'ongoing'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('slug');
        $this->forge->createTable('manga', true);

        // Create posts table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'excerpt' => ['type' => 'TEXT', 'null' => true],
            'body' => ['type' => 'TEXT', 'null' => true],
            'cover' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('slug');
        $this->forge->createTable('posts', true);
    }

    public function down()
    {
        $this->forge->dropTable('manga', true);
        $this->forge->dropTable('posts', true);
    }
}
