<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class saida extends CI_Controller {

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

    public function index($indice = NULL) {

        $data['ramais'] = $this->Banco->listar_ordem_maior('saida', 'ramal');
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        if ($indice == 01):
            $msg['msg'] = "Deletado com sucesso.";
            $this->load->view('msg/msg_saida', $msg);
            $this->load->view('saida/saida_home', $data);
            $this->load->view('includes/footer');
        elseif ($indice == 02):
            $msg['msg'] = "Cadastrado efetuado.";
            $this->load->view('msg/msg_saida', $msg);
            $this->load->view('saida/saida_home', $data);
            $this->load->view('includes/footer');
        elseif ($indice == 03):
            $msg['msg'] = "Cadastrado alterado.";
            $this->load->view('msg/msg_saida', $msg);
            $this->load->view('saida/saida_home', $data);
            $this->load->view('includes/footer');
        else:
            $this->load->view('saida/saida_home', $data);
            $this->load->view('includes/footer');
        endif;
        // $this->load->view('saida/saida_home', $data);
        // $this->load->view('includes/footer');
    }

    public function cadastro() {
        $data['ramais'] = $this->Banco->listar_ordem_menor('ramais', 'ramal');
        $data['plano_discagem'] = $this->Banco->listarpg('plano_discagem');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        $this->load->view('saida/saida_cadastro', $data);
        $this->load->view('includes/footer');
    }

    public function insert() {
        $dados['ramal'] = $this->input->post('ramal');
        $dados['categoria'] = $this->input->post('categoria');

        $query = $this->Banco->existe('saida', $dados['ramal']);

        if (count($query) > 0) {
            redirect('saida/01');
        } else {
            $this->Banco->insert('saida', $dados);
            $this->executar();
            redirect('saida/02');
        }
    }

    public function atualizar($id = null) {
        $data['plano_discagem'] = $this->Banco->listarpg('plano_discagem');
        $data['query'] = $this->Banco->listarid('saida', $id);

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        $this->load->view('saida/saida_atualizar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
        $dados['id'] = $this->input->post('id');
        $dados['ramal'] = $this->input->post('ramal');
        $dados['categoria'] = $this->input->post('categoria');
        $dados['grava'] = $this->input->post('grava');

        $this->Banco->update('saida', $dados);
        $this->executar();
        redirect('saida/03');
    }

    public function deletar($id = NULL) {
        echo $id;

        $this->Banco->deletar('saida', $id);
        redirect('saida/01');
        $this->executar();
    }

    public function planodiscagem() {
        $data['plano'] = $this->Banco->listarpg('plano_discagem');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        $this->load->view('saida/saida_planodiscagem', $data);
        $this->load->view('includes/footer');
    }

    public function cadastroplanodiscagen() {
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        $this->load->view('saida/saida_cadastroplanodiscagen');
        $this->load->view('includes/footer');
    }

    public function insertplanodiscagem() {
        $dados['nome'] = $this->input->post('nome');
        $dados['include'] = $this->input->post('include');
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";

        $this->Banco->insert('plano_discagem', $dados);
        $this->executar();
        redirect('saida/02');
    }

    public function planodiscagem_atualizar($id = NULL) {
        $data['plano'] = $this->Banco->listarid('plano_discagem', $id);

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('saida/saida_menu');
        $this->load->view('saida/saida_atualizarplanodiscagen', $data);
        $this->load->view('includes/footer');
        //   redirect('saida/01');
        $this->executar();
    }

    public function updateplanodiscagen() {
        $dados['id'] = $this->input->post('id');
        $dados['nome'] = $this->input->post('nome');
        $dados['include'] = $this->input->post('include');


        echo '<pre>';
        var_dump($dados);
        echo '</pre>';
        $this->Banco->update('plano_discagem', $dados);
        redirect('saida/03');
        $this->executar();
    }

    public function deletarplanodiscagem($id = NULL) {
        echo $id;
        $this->Banco->deletar('plano_discagem', $id);
        $this->executar();
        redirect('saida/01');
    }

    public function executar() {
        $dados['query'] = $this->Banco->listarpg('saida');
        $dados['var_id1'] = $this->Banco->listarid('variavel_saida', '1');
        $dados['var_id2'] = $this->Banco->listarid('variavel_saida', '2');
        $dados['var_id3'] = $this->Banco->listarid('variavel_saida', '3');
        $dados['var_id5'] = $this->Banco->listarid('variavel_saida', '5');
        $dados['var_id6'] = $this->Banco->listarid('variavel_saida', '6');

        $dados['teste'] = $this->Banco->listarpg('plano_discagem');

        $dados['saida'] = fopen("/etc/asterisk/saida.conf", "w+");
        $this->load->view('saida/executar', $dados);
        shell_exec('sudo asterisk -rx "reload "');
    }

}
