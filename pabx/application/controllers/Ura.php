<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ura extends CI_Controller {

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
        $this->load->model('Banco');
        $data['ura'] = $this->Banco->listar_todos('ura');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('ura/ura_menu');
        $this->load->view('ura/ura_home', $data);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
        $this->load->model('Banco');
        $data['ramais'] = $this->Banco->listar_todos('ramais');
        $data['queues'] = $this->Banco->listar_todos('queues');
        $data['audio'] = $this->Banco->listar_todos('audio');
        $data['ura'] = $this->Banco->listarpg('ura');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('ura/ura_menu');
        $this->load->view('ura/ura_cadastro', $data);
        $this->load->view('includes/footer');
    }

    public function atualizar($id = NULL) {
        $this->load->model('Banco');
        $data['ura'] = $this->Banco->listarid('ura', $id);
        $data['ramais'] = $this->Banco->listar_todos('ramais');
        $data['queues'] = $this->Banco->listar_todos('queues');
        $data['audio'] = $this->Banco->listar_todos('audio');


        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('ura/ura_menu');
        $this->load->view('ura/ura_update', $data);
        $this->load->view('includes/footer');
    }

    public function insert() {
        $this->load->model('Banco');
        $dados['dg1'] = $this->input->post('dg1');
        $dados['dg2'] = $this->input->post('dg2');
        $dados['dg3'] = $this->input->post('dg3');
        $dados['dg4'] = $this->input->post('dg4');
        $dados['dg5'] = $this->input->post('dg5');
        $dados['dg6'] = $this->input->post('dg6');
        $dados['dg7'] = $this->input->post('dg7');
        $dados['dg8'] = $this->input->post('dg8');
        $dados['dg9'] = $this->input->post('dg9');
        $dados['dg0'] = $this->input->post('dg0');
        $dados['operadora'] = $this->input->post('operadora');
        $dados['audio'] = $this->input->post('audio');
        $dados['nome'] = $this->input->post('nome');

        $this->Banco->insert('ura', $dados);
        $this->executar();
    }

    public function update() {
        $this->load->model('Banco');
        $dados['id'] = $this->input->post('id');
        $dados['dg1'] = $this->input->post('dg1');
        $dados['dg2'] = $this->input->post('dg2');
        $dados['dg3'] = $this->input->post('dg3');
        $dados['dg4'] = $this->input->post('dg4');
        $dados['dg5'] = $this->input->post('dg5');
        $dados['dg6'] = $this->input->post('dg6');
        $dados['dg7'] = $this->input->post('dg7');
        $dados['dg8'] = $this->input->post('dg8');
        $dados['dg9'] = $this->input->post('dg9');
        $dados['dg0'] = $this->input->post('dg0');
        $dados['operadora'] = $this->input->post('operadora');
        $dados['audio'] = $this->input->post('audio');
        $dados['nome'] = $this->input->post('nome');

        $this->Banco->update('ura', $dados);
        $this->executar();
    }

    public function deletar($id = NULL) {
        $this->load->model('Banco');
        $this->Banco->deletar('ura', $id);
        $this->executar();
    }

    public function executar() {
        $this->load->model('Banco');
        $dados['query'] = $this->Banco->listarpg('ura');

        $dados['repet'] = $this->Banco->listarid('variavel_ura', '1');
        $dados['count'] = $this->Banco->listarid('variavel_ura', '2');
        $dados['count_id5'] = $this->Banco->listarid('variavel_ura', '5');

        $dados['ura'] = fopen("/etc/asterisk/ura.conf", "w+");
        $this->load->view('ura/executar', $dados);
        shell_exec('sudo asterisk -rx "reload "');
        redirect('ura');
    }

}
