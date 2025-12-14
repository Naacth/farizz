<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEducation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'level' => [
                'type'       => 'VARCHAR', // e.g., SD, SMP, SMA, Kuliah
                'constraint' => '50',
            ],
            'institution_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'start_year' => [
                'type'       => 'YEAR',
            ],
            'end_year' => [
                'type'       => 'YEAR',
                'null'       => true, // Null if currently studying
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('education');
    }

    public function down()
    {
        $this->forge->dropTable('education');
    }
}
