<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Discagem extends CI_Controller {

    public function index() {
        $this->load->view('welcome_message');
    }

    public function cadastro() {
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        $this->load->view('saida/discagem_cadastro');
        $this->load->view('includes/footer');
    }

    public function insert() {
        $dados['nome'] = $this->input->post('nome');
        $dados['numero'] = $this->input->post('numero');
        $dados['tecnologia'] = $this->input->post('tecnologia');
        $dados['tipo'] = $this->input->post('tipo');
        $dados['exten'] = $this->input->post('exten');
        $dados['operadora'] = $this->input->post('operadora');

        var_dump($dados);
    }

    public function atualizar($id = NULL) {
        $data['plano'] = $this->Banco->listarid('plano_discagem', $id);

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        $this->load->view('saida/discagem_atualizar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
        $dados['id'] = $this->input->post('id');
        $dados['nome'] = $this->input->post('nome');
        $dados['numero'] = $this->input->post('numero');
        $dados['tecnologia'] = $this->input->post('tecnologia');
        $dados['tipo'] = $this->input->post('tipo');
        $dados['exten'] = $this->input->post('exten');
        $dados['operadora'] = $this->input->post('operadora');

        echo '<pre>';
        var_dump($dados);
        echo '</pre>';
        $this->Banco->update('plano_discagem', $dados);
        //$this->executar();
        //redirect('saida/03');
    }

}
