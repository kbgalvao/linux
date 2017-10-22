<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dahdi extends CI_Controller {

    public function varificar_session() {
        if ($this->session->userdata('administrador') == FALSE):
            redirect('login');
        endif;
    }

    public function __construct() {
        parent::__construct();
        $this->varificar_session();
        $this->load->Model('Banco');
        //  $this->session = $this->session->userdata('user');
    }

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('dahdi/home');
        $this->load->view('includes/footer');
    }

}
