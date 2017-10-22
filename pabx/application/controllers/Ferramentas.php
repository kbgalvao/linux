<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ferramentas extends CI_Controller {

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
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('rede/menu');
        $this->load->view('rede/rede');
        $this->load->view('includes/footer');
    }

    public function insert() {
        $table = "rede";
        $this->load->model('Banco');

        $dados['ip'] = $this->input->post('ip');
        $dados['gw'] = $this->input->post('gw');
        $dados['dns'] = $this->input->post('dns');
        $dados['placa'] = $this->input->post('placa');

        //echo "<pre>";
        //var_dump($dados);
        //echo "</pre>";
        $this->Banco->insert($table, $dados);
        redirect('ferramentas/listar/01');
    }

    public function listar($indice = null) {
        $table = "rede";
        $this->load->model('Banco');
        $data['query'] = $this->Banco->listar('rede');
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        if ($indice == 01):
            $this->load->view('rede/menu', $data);
            $msg['msg'] = "Aplicar Alteração!";
            $this->load->view('msg/aplicar', $msg);
            $this->load->view('rede/update', $data);
            $this->load->view('includes/footer');
        elseif ($indice == 02):
            $this->load->view('rede/menu', $data);
            $msg['msg'] = "Deletado com sucesso!";
            $this->load->view('msg/aplicar', $msg);
            $this->load->view('rede/update', $data);
            $this->load->view('includes/footer');
        elseif ($indice == 03):
            $this->load->view('rede/menu', $data);
            $msg['msg'] = "Reboot!";
            $this->load->view('msg/reboot', $msg);
            $this->load->view('rede/update', $data);
            $this->load->view('includes/footer');
        else:
            $this->load->view('rede/menu', $data);
            $this->load->view('rede/update', $data);
            $this->load->view('includes/footer');
        endif;
    }

    public function update() {
        $table = "rede";
        $this->load->model('Banco');

        $dados['id'] = $this->input->post('id');
        $dados['ip'] = $this->input->post('ip');
        $dados['mask'] = $this->input->post('mask');
        $dados['gw'] = $this->input->post('gw');
        $dados['dns'] = $this->input->post('dns');

        $this->Banco->update($table, $dados);

        redirect('ferramentas/listar/01');
    }

    public function deletar($id) {
        $table = "rede";
        $this->load->model('Banco');

        $this->Banco->deletar($table, $id);
        redirect('ferramentas/listar/02');
    }

    public function executar() {
        $table = "rede";
        $this->load->model('Banco');
        $query = $this->Banco->listar($table);

        foreach ($query as $row):
            $rede = fopen("/etc/network/interfaces", "r+");

            fwrite($rede, "# This file describes the network interfaces available on your system\r\n");
            fwrite($rede, "# and how to activate them. For more information, see interfaces(5).\r\n");
            fwrite($rede, "\r\n");
            fwrite($rede, "source /etc/network/interfaces.d/*\r\n");
            fwrite($rede, "\r\n");
            fwrite($rede, "# The loopback network interface\r\n");
            fwrite($rede, "\r\n");
            fwrite($rede, "auto lo\r\n");
            fwrite($rede, "iface lo inet loopback\r\n");
            fwrite($rede, "\r\n");
            fwrite($rede, "# The primary network interface\r\n");
            fwrite($rede, "allow-hotplug" . $row->placa . "\r\n");
            fwrite($rede, "iface " . $row->placa . " inet static\r\n");
            fwrite($rede, "        address " . $row->ip . "\r\n");
            fwrite($rede, "        gateway " . $row->gw . "\r\n");
            fwrite($rede, "        # dns-* options are implemented by the resolvconf package, if installed\r\n");
            fwrite($rede, "        dns-nameservers " . $row->dns);
        endforeach;

        redirect('ferramentas/listar/03');
    }

    public function reboot() {
        shell_exec('sudo reboot');
        redirect('ferramentas/listar/03');
    }

}
