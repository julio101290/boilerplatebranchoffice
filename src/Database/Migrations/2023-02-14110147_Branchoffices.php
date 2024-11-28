<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Branchoffices extends Migration {

    public function up() {
        // Branchoffices
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'key' => ['type' => 'varchar', 'constraint' => 8, 'null' => false],
                'name' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
                'cologne' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
                'city' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
                'postalCode' => ['type' => 'varchar', 'constraint' => 5, 'null' => true],
                'timeDifference' => ['type' => 'varchar', 'constraint' => 4, 'null' => true],
                'tax' => ['type' => 'varchar', 'constraint' => 4, 'null' => true],
                'dateAp' => ['type' => 'date', 'null'  => true],
                'phone'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'fax'  => ['type' => 'varchar', 'constraint'  => 16, 'null'  => true],
                'companie'  => ['type' => 'varchar', 'constraint'  => 8, 'null'  => true],
                'arqueoCaja'  => ['type' => 'varchar', 'constraint'  => 5, 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('branchoffices', true);
    }

    public function down() {
        $this->forge->dropTable('branchoffices', true);
    }

}
