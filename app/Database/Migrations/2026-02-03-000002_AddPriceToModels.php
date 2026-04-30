<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPriceToModels extends Migration
{
    public function up()
    {
        $this->forge->addColumn('models', [
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
                'default'    => 0.00,
                'after'      => 'brand_id'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('models', 'price');
    }
}
