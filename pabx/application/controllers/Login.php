<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function varificar_session() {
        if ($this->session->userdata('login') == FALSE):
            redirect('login');
        endif;
    }

    public function __construct() {
        parent::__construct();
        $this->load->Model('Banco');
    }

    public function index($indice = NULL) {
        $this->load->view('includes/header_login');
        if ($indice == 01):
            $msg['msg'] = "Usuário ou senha errados ";
            $this->load->view('msg/msg_login', $msg);
        endif;
        $this->load->view('login/login');
    }

    public function verificar() {
        $formLogin = $this->input->post('login');
        $formSenha = md5(md5(md5($this->input->post('senha'))));

        $loginbanco = $this->Banco->listar_usuario('usuario', $formLogin);
        foreach ($loginbanco as $row):
            $login = $row->login;
            $senha = $row->senha;
            $tipo = $row->tipo;
            $status = $row->status;
        endforeach;

        $data['user'] = $formLogin;

        if ($formLogin === $login && $senha === $formSenha && $tipo === "administrador" && $status === "ativado"):
            $data['administrador'] = TRUE;
            $data['colaborador'] = TRUE;
            $data['usuario'] = TRUE;
            $this->session->set_userdata($data);
            $this->session->userdata('administrador');
            $this->session->set_userdata($data);
            redirect('home');

        elseif ($formLogin === $login && $senha === $formSenha && $tipo === "colaborador" && $status === "ativado"):
            $data['administrador'] = FALSE;
            $data['colaborador'] = TRUE;
            $data['usuario'] = TRUE;
            $this->session->set_userdata($data);
            $this->session->userdata('colaborador');
            $this->session->set_userdata($data);
            redirect('gravacao');

        elseif ($formLogin === $login && $senha === $formSenha && $tipo === "usuario" && $status === "ativado"):
            $data['administrador'] = FALSE;
            $data['colaborador'] = FALSE;
            $data['usuario'] = TRUE;
            $this->session->set_userdata($data);
            $this->session->userdata('usuario');
            $this->session->set_userdata($data);
            redirect('usuario');

        else:
            echo $formLogin . "<br>";
            echo $login . "<br>";
            redirect('login/01');
        endif;
    }

    public function insert() {
        $dados['login'] = $this->input->post('login');
        $dados['senha'] = md5(md5(md5($this->input->post('senha'))));
        $this->Banco->insert('usuario', $dados);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
