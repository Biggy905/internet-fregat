<?php

namespace Applications\Database\Migrations;

use Applications\Entities\ScheduleValidate;
use CodeIgniter\Database\Migration;

class CreateTableScheduleValidate extends Migration
{
    public function up(): void
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'auto_increment' => true,
                ],
                'company_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'company_address' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                ],
                'government_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'government_address' => [
                    'type' => 'VARCHAR',
                    'constraint' => '200',
                ],
                'duration_validate' => [
                    'type' => 'INT',
                    'constraint' => '3',
                ],
                'validated_start_at' => [
                    'type' => 'DATE',
                ],
                'validated_end_at' => [
                    'type' => 'DATE',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'deleted_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]
        );

        $this->forge->addKey('id', true);
        $this->forge->createTable(
            ScheduleValidate::TABLE_NAME
        );
    }

    public function down(): void
    {
        $this->forge->dropDatabase(
            ScheduleValidate::TABLE_NAME
        );
    }
}
