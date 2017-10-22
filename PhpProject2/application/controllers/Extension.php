<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class extension extends CI_Controller {

    public function varificar_session() {
        if ($this->session->userdata('login') == FALSE):
            redirect('login');
        endif;
    }

    public function __construct() {
        parent::__construct();
        $this->load->Model('Listar');
    }

    public function index() {
        $dados['op_fixo'] = $this->Listar->listar_facilidade('extension', '1');
        $dados['op_cel'] = $this->Listar->listar_facilidade('extension', '2');
        $dados['desvio_imediato'] = $this->Listar->listar_facilidade('extension', '3');
        $dados['desvio_nao_atende_ativa'] = $this->Listar->listar_facilidade('extension', '4');

        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('extension/index', $dados);
        $this->load->view('includes/footer');
    }

    public function exec() {
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('extension/home');
        $this->load->view('includes/footer');
    }

}
