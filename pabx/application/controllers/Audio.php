<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class audio extends CI_Controller {

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

    public function index($indice = null) {
        $this->load->model('Banco');
        $dados['query'] = $this->Banco->listarpg('audio');

        if ($indice == 01):
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('audio/audio_menu');
            $msg['msg'] = "ALTERADO DO COM SUCESSO";
            $this->load->view('msg/msg_audio', $msg);
            $this->load->view('audio/audio_home', $dados);
            $this->load->view('includes/footer');
        elseif ($indice == 02):
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('audio/audio_menu');
            $msg['msg'] = "Audio enviado com sucesso";
            $this->load->view('msg/msg_audio', $msg);
            $this->load->view('audio/audio_home', $dados);
            $this->load->view('includes/footer');
        else:
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('audio/audio_menu');
            $this->load->view('audio/audio_home', $dados);
            $this->load->view('includes/footer');
        endif;
    }

    public function criar() {
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('audio/audio_menu');
        $this->load->view('audio/audio_criar');
        $this->load->view('includes/footer');
    }

    public function insert() {
        $this->load->model('Banco');
        $dados['pasta'] = $this->input->post('pasta');

        $this->Banco->insert('audio', $dados);
        redirect('/audio/01');
    }

    public function deletar($id = NULL, $pasta = Null) {
        $this->load->model('Banco');
        $del = $this->input->post('deletar');
        $this->Banco->deletar('audio', $id);

        shell_exec('sudo rm -rf /var/lib/asterisk/custom/' . $pasta);
        redirect('audio');
    }

    public function upload() {

        $pasta = $this->input->post('pasta');

        $diretorio = "/var/lib/asterisk/custom/$pasta/";
        if (!is_dir($diretorio)) {
            echo "Pasta $diretorio nao existe";
        } else {
            //$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
            $arquivo = $_FILES['arquivo'];
            for ($controle = 0; $controle < count($arquivo['name']); $controle++) {
                $destino = $diretorio . "/" . $arquivo['name'][$controle];
                if (move_uploaded_file($arquivo['tmp_name'][$controle], $destino)) {
                    echo "Upload realizado com sucesso<br>";
                } else {
                    echo "Erro ao realizar upload";
                }
            }
        }
        redirect('/audio/02');
    }

    public function executar() {
        $this->load->model('Banco');

        $dados['pasta'] = $this->Banco->listarpg('audio');

        $dados['musica'] = fopen("/etc/asterisk/musiconhold.conf", "w+");

        $this->load->view('audio/audio_executa', $dados);

        redirect('/audio');
    }

    function listar($indice = null) {
        $table = "audio";
        $this->load->model('Banco');

        $maximo = 1;
        $inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");

        $data['query'] = $this->Banco->retornaLista2($table, 'id', $maximo, $inicio);
        $this->load->library('pagination');

        $config['base_url'] = base_url() . "audio/listar";
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
        $this->load->view('audio/audio_menu');
        if ($indice == 100):
            $msg['msg'] = "ALTERADO DO COM SUCESSO";
            $this->load->view('msg/msg_audio', $msg);
            $this->load->view('audio/audio_listar', $data);
        elseif ($indice == 101):
            $msg['msg'] = "ALTERADO DO COM SUCESSO";
            $this->load->view('msg/msg_audio', $msg);
            $this->load->view('audio/audio_listar', $data);
        elseif ($indice == 102):
            $msg['msg'] = "ALTERADO DO COM SUCESSO";
            $this->load->view('msg/msg_audio', $msg);
        else:
            $this->load->view('audio/audio_listar', $data);
        endif;
        $this->load->view('includes/footer');
    }

}
