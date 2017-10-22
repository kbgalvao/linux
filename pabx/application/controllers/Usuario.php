<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {

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
        // $dados['ramais'] = $this->Banco->listarpg('ramais');
    }

    public function index($indice = NULL) {
        $dados['query'] = $this->Banco->listarpg('servicos');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('usuario/usuario_menu');
        if ($indice == 01):
            $msg['msg'] = "Alterado com sucesso.";
            $this->load->view('msg/msg_saida', $msg);
        endif;
        $this->load->view('usuario/usuario_home', $dados);
        $this->load->view('includes/footer');
    }

    public function update($id = NULL) {
        // $dados['id'] = $this->input->post('id');
        $dados['ramal'] = $this->input->post('ramal');
        $dados['primeiro'] = $this->input->post('primeiro');
        $dados['segundo'] = $this->input->post('segundo');
        $dados['terceiro'] = $this->input->post('terceiro');
        $dados['tempo1'] = $this->input->post('tempo1');
        $dados['tempo2'] = $this->input->post('tempo2');
        $dados['tempo3'] = $this->input->post('tempo3');

        echo $id;

        echo "<pre>";
        var_dump($dados);
        echo "</pre>";

        $this->Banco->update_usuario('servicos', $dados, $id);
        $this->executar();
        redirect("usuario/index/01");
    }

    public function painel() {
        $dados['query'] = $this->Banco->listarpg('ramais');
        $dados['cdr'] = $this->Banco->listar_cdr_bina('cdr', $this->session);

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('usuario/usuario_menu');
        $this->load->view('usuario/usuario_painel', $dados);
        $this->load->view('includes/footer');
    }

    public function paineldisca($ramal = null) {
        shell_exec('sudo asterisk -rx "originate SIP/' . $ramal . ' extension ' . $this->session . '@interno "');
        redirect('usuario/painel');
    }

    public function executar() {
        $dados['entrada'] = $this->Banco->listarpg('entrada');
        $dados['servicos'] = $this->Banco->listarpg('servicos');
        $dados['interno'] = fopen("/etc/asterisk/extensions_interno.conf", "w+");

        $this->load->view('usuario/executar', $dados);
        shell_exec('sudo asterisk -rx "reload"');
    }

    public function teste() {
        $query = $this->db->query('SELECT * FROM cdr WHERE dst="7425" ORDER BY calldate DESC;');
        $row = $query->row();
        echo $row->src;
        echo $row->dst;
    }

}
