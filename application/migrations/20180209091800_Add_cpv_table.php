<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 20180209091800
class Migration_Add_cpv_table extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'cpv_dump_id' => [
                'type' => 'INT',
                'constaint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'form_field' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => TRUE
            ],
            'field_value' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'dump_timestamp' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ],
            'timestamp' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ]
        ]);

        $this->dbforge->add_key('cpv_dump_id', TRUE);
        $this->dbforge->create_table('cpv_dump');
    }

    public function down() {
        $this->dbforge->drop_table('cpv_dump');
    }

} //end Migration_Add_blog class