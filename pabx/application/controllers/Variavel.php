<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class variavel extends CI_Controller {

    public $session;

    public function varificar_session() {
        if ($this->session->userdata('usuario') == FALSE):
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
        $this->load->model('Banco');       
        $dados['query'] = $this->Banco->listarpg('ramais');
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('recebe/menu');
        $this->load->view('variavel/home', $dados);
        $this->load->view('includes/footer');
    }

}
