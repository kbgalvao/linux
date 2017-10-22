<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Central extends CI_Controller {

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
        $this->load->view('central/menu');
        $this->load->view('central/ramais');
        $this->load->view('includes/footer');
    }

    public function insert() {
        $table = "ramais";
        $this->load->model('Banco');

        $dados['ramal'] = $this->input->post('ramal');
        $dados['secret'] = $this->input->post('secret');
        $dados['context'] = $this->input->post('context');
        $dados['host'] = $this->input->post('host');
        $dados['dtmf'] = $this->input->post('dtmf');
        $dados['type'] = $this->input->post('type');
        $dados['qualify'] = $this->input->post('qualify');
        $dados['direct'] = $this->input->post('direct');
        $dados['disallow'] = $this->input->post('disallow');
        $dados['ulaw'] = $this->input->post('ulaw');
        $dados['alaw'] = $this->input->post('alaw');
        $dados['gsm'] = $this->input->post('gsm');
        $dados['g729'] = $this->input->post('g729');
        $dados['callgroup'] = $this->input->post('callgroup');
        $dados['pickupgroup'] = $this->input->post('pickupgroup');
        $dados['gravacaosaida'] = $this->input->post('gravacaosaida');
        $dados['gravacaoentrada'] = $this->input->post('gravacaoentrada');

        echo"<pre>";
        var_dump($dados);
        echo"</pre>";

        if ($dados['gravacaosaida'] === "nao"):
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database deltree GRAVACAO_SAIDA " . $dados['ramal'] . " ' ";
            echo exec($runcommand);
        elseif($dados['gravacaosaida'] === "sim"):
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database put GRAVACAO_SAIDA " . $dados['ramal'] . " yes'";
            echo exec($runcommand);
        endif;

        if ($dados['gravacaoentrada'] === "nao"):
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database deltree GRAVACAO_ENTRADA " . $dados['ramal'] . " ' ";
            echo exec($runcommand);
        elseif($dados['gravacaoentrada'] === "sim"):
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database put GRAVACAO_ENTRADA " . $dados['ramal'] . " yes'";
            echo exec($runcommand);
        endif;


        $query = $this->Banco->existe('ramais', $dados['ramal']);

        if (count($query) > 0) {
            redirect('central/03');
        } else {
            $this->Banco->insert($table, $dados);
            $this->executar();
            redirect('central/listar/01');
        }
    }

    public function update() {
        $table = "ramais";
        $this->load->model('Banco');

        $dados['id'] = $this->input->post('id');
        $dados['ramal'] = $this->input->post('ramal');
        $dados['secret'] = $this->input->post('secret');
        $dados['context'] = $this->input->post('context');
        $dados['host'] = $this->input->post('host');
        $dados['dtmf'] = $this->input->post('dtmf');
        $dados['type'] = $this->input->post('type');
        $dados['qualify'] = $this->input->post('qualify');
        $dados['direct'] = $this->input->post('direct');
        $dados['disallow'] = $this->input->post('disallow');
        $dados['ulaw'] = $this->input->post('ulaw');
        $dados['alaw'] = $this->input->post('alaw');
        $dados['gsm'] = $this->input->post('gsm');
        $dados['g729'] = $this->input->post('g729');
        $dados['callgroup'] = $this->input->post('callgroup');
        $dados['pickupgroup'] = $this->input->post('pickupgroup');
        $dados['gravacaosaida'] = $this->input->post('gravacaosaida');
        $dados['gravacaoentrada'] = $this->input->post('gravacaoentrada');

        echo"<pre>";
        var_dump($dados);
        echo"</pre>";

        if (empty($dados['gravacaosaida'])):
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database deltree GRAVACAO_SAIDA " . $dados['ramal'] . " ' ";
            echo exec($runcommand);
        else:
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database put GRAVACAO_SAIDA " . $dados['ramal'] . " yes'";
            echo exec($runcommand);
        endif;

        if (empty($dados['gravacaoentrada'])):
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database deltree GRAVACAO_ENTRADA " . $dados['ramal'] . " ' ";
            echo exec($runcommand);
        else:
            $runcommand = "sudo /usr/sbin/asterisk -rx 'database put GRAVACAO_ENTRADA " . $dados['ramal'] . " yes'";
            echo exec($runcommand);
        endif;


        $this->Banco->update($table, $dados);
        $this->executar();
        redirect('central/listar/01');
    }

    public function atualizar($id = null) {
        $table = "ramais";
        $this->load->model('Banco');
        $data['query'] = $this->Banco->listarid($table, $id);

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('central/menu');
        $this->load->view('central/atualizar', $data);
        $this->load->view('includes/footer');
    }

    public function automatico($indice = Null) {
        $table = "ramais";
        $this->load->model('Banco');

        $data['query'] = $this->Banco->listar($table);

        if ($indice == 01):
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('central/menu');
            $msg['msg'] = "Ativar ramais ";
            $this->load->view('msg/msg_ramal', $msg);
            $this->load->view('central/automatico', $data);
            $this->load->view('includes/footer');
        else:
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('central/menu');
            $this->load->view('central/automatico', $data);
            $this->load->view('includes/footer');
        endif;
    }

    public function deletar($id = NULL) {
        $tabela = "ramais";
        if ($id == 1):
            redirect('ramais/index/1');

        else:
            $this->load->model('Banco');
            $this->Banco->deletar($tabela, $id);
            redirect('central/listar/02');
        endif;
    }

    function listar($indice = null) {
        $table = "ramais";
        $this->load->model('Banco');

        $maximo = 50;
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

        $data['query'] = $this->Banco->retornaLista2($table, 'ramal', $maximo, $inicio);
        $this->load->library('pagination');

        $config['base_url'] = base_url() . "central/listar";
        $config['total_rows'] = $this->Banco->contaRegistros($table);
        $config['per_page'] = $maximo;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['num_tag_open'] = ' <li class="page-item page-link">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = ' <li class="page-item page-link">';
        $config['cur_tag_close'] = '</li>';

        $config['first_link'] = 'Primeiro';


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
        $this->load->view('central/menu');
        if ($indice == 01):
            $msg['msg'] = "Ramal criado com sucesso";
            $this->load->view('msg/msg_ramal', $msg);
            $this->load->view('central/listar_ramais', $data);
        elseif ($indice == 02):
            $msg['msg'] = "Ramal deletado com sucesso.";
            $this->load->view('msg/msg_ramal', $msg);
            $this->load->view('central/listar_ramais', $data);
        elseif ($indice == 03):
            $msg['msg'] = "Ramal existe";
            $this->load->view('msg/msg_ramal', $msg);
            $this->load->view('central/listar_ramais', $data);
        else:
            $this->load->view('central/listar_ramais', $data);
        endif;
        $this->load->view('includes/footer');
    }

    public function executar() {
        $table = "ramais";
        $this->load->model('Banco');
        $dados['query'] = $this->Banco->listarpg($table);

        $dados['sip'] = fopen("/etc/asterisk/sip.conf", "r+");
        $this->load->view('central/executar', $dados);

        shell_exec('sudo asterisk -rx "reload"');
        redirect('central/listar/01');
    }

}
