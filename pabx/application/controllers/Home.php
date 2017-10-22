<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $session;

    public function varificar_session() {
        if ($this->session->userdata('administrador') == FALSE):
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
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('home/home');
        $this->load->view('includes/footer');
    }

    public function ferramentas() {
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('home/ferramentas');
        $this->load->view('includes/footer');
    }

    public function rede() {
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('home/rede');
        $this->load->view('includes/footer');
    }

}
