<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

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
        //  $this->session = $this->session->userdata('user');
    }

    public function index($indeice = NULL) {
        $dados['usuarios'] = $this->Banco->listarpg('usuario');

        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        //$this->load->view('admin/admin_menu');
        if ($indeice == 01):
            $msg['msg'] = "Deletado com sucesso.";
            $this->load->view('msg/msg', $msg);
            $this->load->view('admin/admin_home', $dados);
        elseif ($indeice == 02):
            $msg['msg'] = "Cadastrado com sucesso.";
            $this->load->view('msg/msg', $msg);
            $this->load->view('admin/admin_home', $dados);
        elseif ($indeice == 03):
            $msg['msg'] = "Atualizado com sucesso.";
            $this->load->view('msg/msg', $msg);
            $this->load->view('admin/admin_home', $dados);
        elseif ($indeice == 04):
            $msg['msg'] = "Usuário existe.";
            $this->load->view('msg/msg', $msg);
            $this->load->view('admin/admin_home', $dados);
         elseif ($indeice == 05):
            $msg['msg'] = "Usuário não pode ser alterado.";
            $this->load->view('msg/msg', $msg);
            $this->load->view('admin/admin_home', $dados); 
        elseif ($indeice == 06):
            $msg['msg'] = "Usuário não pode ser deletado.";
            $this->load->view('msg/msg', $msg);
            $this->load->view('admin/admin_home', $dados);      

        else:
            $this->load->view('admin/admin_home', $dados);
        endif;
        $this->load->view('includes/footer');


    }

    public function cadastro($indice = null) {
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        //$this->load->view('admin/admin_menu');
        $this->load->view('admin/admin_cadastro');
        $this->load->view('includes/footer');
    }

    public function insert() {

        $dados['login'] = $this->input->post('login');
        $dados['senha'] = md5(md5(md5($this->input->post('senha'))));
        $dados['tipo'] = $this->input->post('tipo');
        $dados['status'] = $this->input->post('status');

        echo"<pre>";
        var_dump($dados);
        echo"</pre>";

        $query = $this->Banco->existe_login('usuario', $dados['login']);

        var_dump($query);

        if (count($query) > 0) {
            redirect('admin/04');
        } else {
            $this->Banco->insert('usuario', $dados);
            redirect('admin/01');
        }
    }

    public function atualizar($id = null) {
        $dados['usuario'] = $this->Banco->listarid('usuario', $id);
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('admin/admin_atualizar', $dados);
        $this->load->view('includes/footer');
    }

    public function deletar($id = NULL) {


        if ($id == "01"):
            redirect('admin/06');
        else:
            $this->Banco->deletar('usuario', $id);
            redirect('admin/01');
        endif;
    }

    public function update($id = NULL) {

        $dados['id'] = $this->input->post('id');
        $dados['login'] = $this->input->post('login');
        $dados['senha'] = md5(md5(md5($this->input->post('senha'))));
        $dados['tipo'] = $this->input->post('tipo');
        $dados['status'] = $this->input->post('status');

        echo"<pre>";
        var_dump($dados);
        echo"</pre>";

        if ($id == "1"):
            echo 'nao deleta';
        else:
            if($dados['senha'] === $dados['senha']):
                echo "aqui";
            else:
                
            endif;
            //$this->Banco->update('usuario', $dados);
            //redirect('admin/03');
        endif;

    }

}
