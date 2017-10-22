<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class variaveis extends CI_Controller {

    
    public $var;
    
    public function __construct() {
        parent::__construct();
        $this->load->Model('Listar');
        $this->var = $this->Listar->listar_todos('variavel');
       
    }
    
    public function index() {
       
        $this->load->view('variaveis/variaveis', $this->var);
    }

}
