<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrations_model extends CI_Model {

    const TABLE_NAME = 'migrations';

    public function get_version() {
        $query = $this->db->get($this::TABLE_NAME);
        return $query->row_array['version'];
    }

} //end Migrations_model clas