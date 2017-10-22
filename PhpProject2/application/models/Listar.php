<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listar extends CI_Model {

    public function listar_usuario($table, $login) {
        $this->db->where('login', $login);
        $query = $this->db->get($table, $login);
        return $query->result();
    }

    public function listar_variavel($table, $id) {
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function listar_facilidade($table, $id) {
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->result();
    }

}
