<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('product_category');
    }

    public function down()
    {
        $this->forge->dropTable('product_category');
    }
}
