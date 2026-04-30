<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCheckoutTable extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'service_address' => [
                'type' => 'TEXT',
            ],
            'additional_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'car_brand' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'car_model' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'car_price' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'confirmed', 'completed', 'cancelled'],
                'default'    => 'pending',
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
        $this->forge->createTable('checkout');
    }

    public function down()
    {
        $this->forge->dropTable('checkout');
    }
}
