<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class recebe extends CI_Controller {

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

  

    public function cadastro() {

        $dados['ramais'] = $this->Banco->listarpg('ramais');
        $dados['queues'] = $this->Banco->listarpg('queues');
        $dados['ura'] = $this->Banco->listarpg('ura');
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('recebe/menu');
        $this->load->view('recebe/cadastro', $dados);
        $this->load->view('includes/footer');
    }

    public function atualizar($id = NULL) {
        //$data['ramais'] = $this->Banco->listarpg('ramais');
        $data['query'] = $this->Banco->listarid('recebe', $id);


        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('recebe/menu');
        $this->load->view('recebe/recebe_update', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
        $table = "recebe";
        $this->load->model('Banco');

        $dados['id'] = $this->input->post('id');
        $dados['ddr'] = $this->input->post('ddr');
        $dados['ramal'] = $this->input->post('primeiro');
        $dados['tempo'] = $this->input->post('tempoprimeiro');
        $dados['ring'] = $this->input->post('ring');
        $dados['aplicacao'] = $this->input->post('aplicacao');
        $dados['opecoes'] = $this->input->post('opecoes');
        $dados['grava'] = $this->input->post('grava');
        $dados['goto'] = $this->input->post('goto');

        echo '<pre>';
        var_dump($dados);
        echo '</pre>';

        $this->Banco->update($table, $dados);
        $this->executar();
        redirect('recebe/listar/01');
    }

    public function sequencia($indice = NULL) {
        $this->load->model('Banco');
        $data['query'] = $this->Banco->listar('recebe');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('recebe/menu');
        if ($indice == 01):
            $msg['msg'] = "ALTERA DO COM SUCESSO";
            $this->load->view('msg/msg_recebe', $msg);
            $this->load->view('recebe/sequencia', $data);
        elseif ($indice == 02):
            $msg['msg'] = "DELETADO DO COM SUCESSO";
            $this->load->view('msg/msg_recebe', $msg);
            $this->load->view('recebe/sequencia', $data);
        else:
            $this->load->view('recebe/sequencia', $data);
        endif;
        $this->load->view('includes/footer');
    }

    public function deletar($id = NULL) {
        $tabela = "recebe";

        echo $id;
        if ($id == ""):
            redirect('recebe/listar');

        else:
            $this->load->model('Banco');
            $this->Banco->deletar($tabela, $id);
            $this->executar();
            redirect('recebe/listar/02');
        endif;
    }

    public function insert() {
        $dados['ddr'] = $this->input->post('ddr');
        $dados['ramal'] = $this->input->post('primeiro');
        $dados['tempo'] = $this->input->post('tempoprimeiro');
        $dados['ring'] = $this->input->post('ring');
        $dados['aplicacao'] = $this->input->post('aplicacao');
        $dados['opecoes'] = $this->input->post('opecoes');
        $dados['grava'] = $this->input->post('grava');
        $dados['goto'] = $this->input->post('goto');

        // $dados['toque'] = $this->input->post('toque');

        echo '<pre>';
        var_dump($dados);
        echo '</pre>';
        $this->Banco->insert('recebe', $dados);

        $this->executar();
        redirect('recebe/sequencia/01');
    }

    function listar($indice = null) {
        $table = "recebe";
        $this->load->model('Banco');

        $maximo = 50;
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

        $data['query'] = $this->Banco->retornaLista2($table, 'ddr', $maximo, $inicio);
        $this->load->library('pagination');

        $config['base_url'] = base_url() . "recebe/listar";
        $config['total_rows'] = $this->Banco->contaRegistros($table);
        $config['per_page'] = $maximo;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['num_tag_open'] = ' <li class="page-item page-link">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = ' <li class="page-item page-link">';
        $config['cur_tag_close'] = '</li>';

        $config['first_link'] = 'Primerio';
        $config['last_link'] = 'Ultimo';

        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';

        $config['cur_tag_open'] = '<li class="page-item btn btn-primary ">';
        $config['cur_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="page-item page-link">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item page-link">';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item page-link">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item page-link">';
        $config['prev_tag_close'] = '</li>';

        $config['next_tag_open'] = ' <li class="page-item page-link">';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['paginacao'] = $this->pagination->create_links();

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('recebe/menu');
        if ($indice == 01):
            $msg['msg'] = "Alterado com sucesso";
            $this->load->view('msg/msg_recebe', $msg);
            $this->load->view('recebe/recebe', $data);
        elseif ($indice == 02):
            $msg['msg'] = "Deletado com sucesso";
            $this->load->view('msg/msg_recebe', $msg);
            $this->load->view('recebe/recebe', $data);
        else:
            $this->load->view('recebe/recebe', $data);
        endif;
        $this->load->view('includes/footer');
    }

    //##################################################

      public function index($indice = NULL) {
        $dados['entrada'] = $this->Banco->listarpg('entrada');
        $this->load->view('includes/header');
        $this->load->view('includes/nav');

        if ($indice == 01):
            $this->load->view('recebe/menu');
            $msg['msg'] = "DDR deletado com sucesso.";
            $this->load->view('msg/msg_saida', $msg);
            $this->load->view('recebe/recebe_listar', $dados);
        elseif ($indice == 02):
            $this->load->view('recebe/menu');
            $msg['msg'] = "DDR Cadastrado efetuado.";
            $this->load->view('msg/msg_saida', $msg);
            $this->load->view('recebe/recebe_listar', $dados);
        elseif ($indice == 03):
            $this->load->view('recebe/menu');
            $msg['msg'] = "DDR Alterado com sucesso.";
            $this->load->view('msg/msg_saida', $msg);
            $this->load->view('recebe/recebe_listar', $dados);
        else:
            $this->load->view('recebe/menu');
            $this->load->view('recebe/recebe_listar', $dados);
        endif;

        $this->load->view('includes/footer');
    }
    
    
    public function home() {
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('recebe/menu');
        $this->load->view('recebe/recebe_home');
        $this->load->view('includes/footer');
    }

    public function recebe_insert() {
        $dados['primeiro'] = $this->input->post('primeiro');
        $dados['segundo'] = $this->input->post('segundo');
        $dados['toque'] = $this->input->post('toque');
        $dados['gravacao'] = $this->input->post('gravacao');
        $dados['noop'] = $this->input->post('noop');
       // $dados['mixmonitor'] = $this->input->post('mixmonitor');
        $dados['terceiro'] = $this->input->post('terceiro');

        echo '<pre>';
        var_dump($dados);
        echo '</pre>';
        $this->Banco->insert('entrada', $dados);
        $this->exec();
        redirect('recebe/index/02');
    }

    public function recebe_atualizar($id = NULL) {
        $dados['entrada'] = $this->Banco->listarid('entrada', $id);
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('recebe/menu');
        $this->load->view('recebe/recebe_atualizar', $dados);
        $this->load->view('includes/footer');
    }

    public function recebe_update() {
        $dados['id'] = $this->input->post('id');
        $dados['primeiro'] = $this->input->post('primeiro');
        $dados['segundo'] = $this->input->post('segundo');
        $dados['toque'] = $this->input->post('toque');
        $dados['gravacao'] = $this->input->post('gravacao');
        $dados['noop'] = $this->input->post('noop');
        $dados['mixmonitor'] = $this->input->post('mixmonitor');
        $dados['terceiro'] = $this->input->post('terceiro');

        echo '<pre>';
        var_dump($dados);
        echo '</pre>';

        $this->Banco->update('entrada', $dados);
        $this->exec();
        redirect('recebe/index/03');
    }

    public function recebe_deletar($id = NULL) {

        echo $id;
        $this->Banco->deletar('entrada', $id);
        
         $this->exec();
        redirect('recebe/index/01');
    }

    public function executar() {
        $dados['query'] = $this->Banco->listarpg('recebe');
        $dados['exten'] = $this->Banco->listarpg('var');
        $dados['cfbs'] = $this->Banco->listarpg('cfbs');
        $dados['cfim'] = $this->Banco->listarpg('cfim');
        $dados['toque'] = $this->Banco->listarid('variavel_recebe', '1');
        $dados['unique'] = $this->Banco->listarid('variavel_recebe', '1');

        $dados['recebe'] = fopen("/etc/asterisk/recebe.conf", "w+");

        $this->load->view('recebe/executar', $dados);
        shell_exec('sudo asterisk -rx "reload"');
        redirect('recebe/listar/01');
    }

    public function exec() {
        $dados['query'] = $this->Banco->listarpg('entrada');
        $dados['recebe'] = fopen("/etc/asterisk/recebe.conf", "w+");

        $this->load->view('recebe/executar2', $dados);
        shell_exec('sudo asterisk -rx "reload"');
        // redirect('recebe/listar/01');
    }

}
