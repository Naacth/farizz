<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
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
            'key' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true,
            ],
            'value' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->createTable('settings');

        // Insert default settings
        $db = \Config\Database::connect();
        $settings = [
            ['key' => 'site_name', 'value' => 'My Portfolio'],
            ['key' => 'site_description', 'value' => 'Showcasing my professional journey, daily activities, career profile, and educational achievements.'],
            ['key' => 'github_url', 'value' => ''],
            ['key' => 'linkedin_url', 'value' => ''],
            ['key' => 'instagram_url', 'value' => ''],
            ['key' => 'twitter_url', 'value' => ''],
            ['key' => 'contact_email', 'value' => 'contact@example.com'],
            ['key' => 'contact_phone', 'value' => '+62 xxx xxx xxx'],
            ['key' => 'contact_location', 'value' => 'Indonesia'],
        ];

        foreach ($settings as $setting) {
            $db->table('settings')->insert($setting);
        }
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
