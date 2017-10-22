<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class gravacao extends CI_Controller {

    public $session;

    public function varificar_session() {
        if ($this->session->userdata('colaborador') == FALSE):
            redirect('login');
        endif;
    }

    public function __construct() {
        parent::__construct();
        $this->varificar_session();
        $this->load->Model('Banco');

        $this->session = $this->session->userdata('user');
    }

    public function index() {
        $data['query'] = $this->Banco->listar_cdr_todos('cdr');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('gravacao/gravacao_menu');
        $this->load->view('gravacao/gravacao_home', $data);
        $this->load->view('includes/footer');
    }

    public function teste() {
        $data['query'] = $this->Banco->listar_cdr_todos('cdr');
        $this->load->view('gravacao/gravacao_teste', $data);
        $this->load->view('includes/footer');
    }

    public function listar() {
        $dataini = $this->input->post('date1');
        $datafim = $this->input->post('date2');
 
        $dtini = $dataini." 00:00:00";
        $dtfim = $datafim." 23:59:59";
        
        $data['query'] = $this->Banco->listar_cdr_data($dtini,$dtfim);
       
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('gravacao/gravacao_menu');
        $this->load->view('gravacao/gravacao_home', $data);
        $this->load->view('includes/footer');
    }

}
