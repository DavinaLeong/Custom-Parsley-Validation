<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpv extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cpv_dump_model');
        $this->load->library('Datetime_formatter');
    }

    public function index() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('form_submit', 'form_submit', 'trim|required|in_list[submitted]');

        if($this->form_validation->run()) {
            $this->Cpv_dump_model->insert($this->_prepare_dump());
            redirect('cpv/dump_all');
        }

        $this->load->view('cpv_dump/index_page');
    }

    private function _prepare_dump() {
        $form_dump = '';
        foreach($this->input->post() as $field=>$value) {
            $form_dump .= "$field => $value\n";
        }

        $cpv_dump = [
            'form_name' => 'Test Form',
            'form_dump' => $form_dump
        ];
        return $cpv_dump;
    }

    public function dump() {

    }

    public function dump_all() {
        $data = [
            'cpv_dumps' => $this->Cpv_dump_model->get_all()
        ];
        $this->load->view('cpv_dump/dump_all_page', $data);
    }

} //end Cpv controller class