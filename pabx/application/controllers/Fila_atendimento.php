<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class fila_atendimento extends CI_Controller {

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
        $this->load->model('Banco');

        $data['queues'] = $this->Banco->listarpg('queues');
        $data['membros'] = $this->Banco->listarpg('membros_queues');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('queue/menu_queues');
        if ($indice == 01):
            $msg['msg'] = "Criado com sucesso";
            $this->load->view('msg/msg_recebe', $msg);
        elseif ($indice == 02):
            $msg['msg'] = "Alterado com sucesso";
            $this->load->view('msg/msg_recebe', $msg); 
        elseif ($indice == 03):
            $msg['msg'] = "Deletado com sucesso";
            $this->load->view('msg/msg_recebe', $msg);      
        endif;    
        $this->load->view('queue/listar_queues', $data);
        $this->load->view('includes/footer');
    }

    public function cadastro_queues() {
        $this->load->model('Banco');
        $data['query'] = $this->Banco->listar_todos('audio');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('queue/menu_queues');
        $this->load->view('queue/cadastro_queues', $data);
        $this->load->view('includes/footer');
    }

    public function update_queues($id = NULL) {
        $this->load->model('Banco');

        $data['queues'] = $this->Banco->listarid('queues', $id);
        $data['musica'] = $this->Banco->listar_todos('audio');

        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('queue/menu_queues');
        $this->load->view('queue/update_queues', $data);
        $this->load->view('includes/footer');
    }

    public function insert() {
        $this->load->model('Banco');

        $dados['nome'] = $this->input->post('nome');
        $dados['musicclass'] = $this->input->post('musicclass');
        $dados['strategy'] = $this->input->post('strategy');
        $dados['servicelevel'] = $this->input->post('servicelevel');
        $dados['context'] = $this->input->post('context');
        $dados['timeout'] = $this->input->post('timeout');
        $dados['wrapuptime'] = $this->input->post('wrapuptime');
        $dados['maxlen'] = $this->input->post('maxlen');
        $dados['membros'] = $this->input->post('membros');

        $this->Banco->insert('queues', $dados);

        shell_exec('sudo asterisk -rx "reload"');
        $this->executar();
        redirect('fila_atendimento/index/01');
    }

    public function deletar($id = NULL) {
        $this->load->model('Banco');
        

        echo $id;
        
        $this->Banco->deletar('queues', $id);
        redirect('fila_atendimento/03');
    }

    public function atualisar_queues() {
        $this->load->model('Banco');

        $dados['id'] = $this->input->post('id');
        $dados['nome'] = $this->input->post('nome');
        $dados['musicclass'] = $this->input->post('musicclass');
        $dados['strategy'] = $this->input->post('strategy');
        $dados['servicelevel'] = $this->input->post('servicelevel');
        $dados['context'] = $this->input->post('context');
        $dados['timeout'] = $this->input->post('timeout');
        $dados['wrapuptime'] = $this->input->post('wrapuptime');
        $dados['maxlen'] = $this->input->post('maxlen');
        $dados['membros'] = $this->input->post('membros');

        echo"<pre>";
        var_dump($dados);
        echo"</pre>";
        $this->Banco->update('queues', $dados);

        $this->executar();
        redirect('fila_atendimento/index/02');
    }

    public function executar() {
        $this->load->model('Banco');
        $dados['query'] = $this->Banco->listarpg('queues');
        $dados['queue'] = fopen("/etc/asterisk/queues.conf", "w+");
        $dados['fila'] = fopen("/etc/asterisk/fila.conf", "w+");

        $this->load->view('queue/executar', $dados);
        $this->load->view('queue/fila', $dados);
        shell_exec('sudo asterisk -rx "reload"');
    }

    public function up() {
        $this->load->dbforge();
        $this->load->model('Banco');
        $table = $this->input->post('table');

        $this->dbforge->add_field(
                array(
                    'id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => true,
                        'auto_increment' => true
                    ),
                    'table' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ),
                    'nome' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ),
                    'musicclass' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ),
                    'strategy' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                    ),
                    'servicelevel' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                    ),
                    'context' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                    ),
                    'timeout' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20'
                    ),
                    'wrapuptime' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20'
                    ),
                    'maxlen' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '20'
                    ),
                )
        );
        $this->dbforge->add_key('id', TRUE);

        if (file_exists($table)):
            echo 'existe';
        else:
            $this->dbforge->create_table($table);
            echo 'nao existe';
        endif;

        $dados['table'] = $this->input->post('table');
        $dados['musicclass'] = $this->input->post('musicclass');
        $dados['strategy'] = $this->input->post('strategy');
        $dados['servicelevel'] = $this->input->post('servicelevel');
        $dados['context'] = $this->input->post('context');
        $dados['timeout'] = $this->input->post('timeout');
        $dados['wrapuptime'] = $this->input->post('wrapuptime');
        $dados['maxlen'] = $this->input->post('maxlen');

        $this->Banco->insert($table, $dados);
        redirect('fila_atendimento');
    }

}
