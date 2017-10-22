<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class servicos extends CI_Controller {

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
        // $dados['ramais'] = $this->Banco->listarpg('ramais');
    }

    public function index($indice = NULL) {
        $dados['servicos'] = $this->Banco->listarpg('servicos');
        
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        if ($indice == "01"):
            $this->load->view('servicos/servicos_menu');
            $msg['msg'] = "Cadastrado com sucesso.";
            $this->load->view('msg/msg_saida', $msg);
        elseif($indice == "02"):
            $this->load->view('servicos/servicos_menu');
            $msg['msg'] = "Alterado com sucesso.";
            $this->load->view('msg/msg_saida', $msg);
        elseif($indice == "03"):
            $this->load->view('servicos/servicos_menu');
            $msg['msg'] = "Deletado com sucesso.";
            $this->load->view('msg/msg_saida', $msg);    
        else:
            $this->load->view('servicos/servicos_menu');
        endif;
        $this->load->view('servicos/servicos_home',$dados);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('servicos/servicos_menu');
        $this->load->view('servicos/servicos_cadastro');
        $this->load->view('includes/footer');
    }

    public function insert() {
        $dados['ramal'] = $this->input->post('ramal');
        $dados['primeiro'] = $this->input->post('primeiro');
        $dados['segundo'] = $this->input->post('segundo');
        $dados['terceiro'] = $this->input->post('terceiro');
        $dados['tempo1'] = $this->input->post('tempo1');
        $dados['tempo2'] = $this->input->post('tempo2');
        $dados['tempo3'] = $this->input->post('tempo3');

        echo "<pre>";
        var_dump($dados);
        echo "</pre>";

        $this->Banco->insert('servicos', $dados);
        $this->executar();
        redirect("servicos/index/01");
    }

    public function atualisar($id=NULL) {
        $dados['query'] = $this->Banco->listarid('servicos',$id);
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('servicos/servicos_menu');
        $this->load->view('servicos/servicos_atualisar', $dados);
        $this->load->view('includes/footer');
    }

    public function update() {
        $dados['id'] = $this->input->post('id');
        $dados['ramal'] = $this->input->post('ramal');
        $dados['primeiro'] = $this->input->post('primeiro');
        $dados['segundo'] = $this->input->post('segundo');
        $dados['terceiro'] = $this->input->post('terceiro');
        $dados['tempo1'] = $this->input->post('tempo1');
        $dados['tempo2'] = $this->input->post('tempo2');
        $dados['tempo3'] = $this->input->post('tempo3');

        echo "<pre>";
        var_dump($dados);
        echo "</pre>";

        $this->Banco->update('servicos', $dados,$id);
         $this->executar();
        redirect("servicos/index/02");
    }

    public function deletar($id = NULL) {
        echo $id;
        $this->Banco->deletar('servicos', $id);
        $this->executar();
        redirect("servicos/index/03");
    }

    public function executar() {
        $dados['entrada'] = $this->Banco->listarpg('entrada');
        $dados['servicos'] = $this->Banco->listarpg('servicos');
        $dados['interno'] = fopen("/etc/asterisk/extensions_interno.conf", "w+");
       
        $this->load->view('servicos/executar', $dados);
        shell_exec('sudo asterisk -rx "reload"');
    }

}
