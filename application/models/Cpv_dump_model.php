<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpv_dump_model extends CI_Model {
    const TABLE_NAME = 'cpv_dump';

    public function get_all($order_by_col='dump_no', $direction='DESC') {
        $this->db->order_by($order_by_col, $direction);
        $query = $this->db->get($this::TABLE_NAME);
        return $query->result_array();
    }

    public function get_by_dump_timestamp($dump_timestamp=FALSE, $order_by_col='form_field', $direction='DESC') {
        if($dump_timestamp && is_string($dump_timestamp)) {
            $this->db->order_by($order_by_col, $direction);
            $query = $this->db->get_where($this::TABLE_NAME, array('dump_no' => $dump_timestamp));
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function insert($cpv_dump=FALSE) {
        if($cpv_dump && is_array($cpv_dump)) {

            $temp = [
                'form_field' => $cpv_dump['form_field'],
                'field_value' => $cpv_dump['field_value'],
                'dump_no' => $cpv_dump['dump_no']
            ];

            $this->load->library('Datetime_formatter');
            $this->db->set('timestamp', $this->datetime_formatter->now(MYSQL_DATETIME_FORMAT));
            $this->db->insert($this::TABLE_NAME, $temp);
            return $this->db->insert_id();

        } else {
            return FALSE;
        }
    }

} //end Cpv_dump_model class