<?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;

    class Diskon extends Migration
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
                'tanggal' => [
                    'type' => 'DATE',
                ],
                'nominal' => [
                    'type' => 'DOUBLE',
                ],
                'created_at' => [
                    'type'    => 'DATETIME',
                    'null'    => true,
                ],
                'updated_at' => [
                    'type'    => 'DATETIME',
                    'null'    => true,
                ],
            ]);

            // Menjadikan 'id' sebagai Primary Key
            $this->forge->addKey('id', true);

            // Membuat tabel 'diskon'
            $this->forge->createTable('diskon');
        }

        public function down()
        {
            // Menghapus tabel 'diskon'
            $this->forge->dropTable('diskon');
        }
    }