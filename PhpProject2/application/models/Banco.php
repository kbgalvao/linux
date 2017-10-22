<?php

class Banco extends CI_Model {

    //var $table = "ramais";

    public function __construct($id = null) {
        parent::__construct();
        $this->id = $id;
    }

    public function insert($tabela, $dados) {
        return $this->db->insert($tabela, $dados);
    }

    public function listar($table) {
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function listarpg($table) {
        $this->db->order_by("id", "asc");
        $query = $this->db->get($table);
        return $query->result();
    }

    public function listarid($table, $id) {
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function listar_todos($table) {
        $query = $this->db->get($table);
        return $query->result();
    }

    public function listar_ordem_maior($table, $ramal) {
        $this->db->order_by($ramal, "asc");
        $query = $this->db->get($table);
        return $query->result();
    }

    public function listar_ordem_menor($table, $ramal) {
        $this->db->order_by($ramal, "asc");
        $query = $this->db->get($table);
        return $query->result();
    }

    public function listar_usuario($table, $login) {
        $this->db->where('login', $login);
        $query = $this->db->get($table, $login);
        return $query->result();
    }

    public function update($table, $dados) {
        $this->db->where('id', $dados['id']);
        $this->db->set($dados);
        return $this->db->update($table, $dados);
    }
    
     public function update_usuario($table, $dados, $id) {
        $this->db->where('id', $id);
        $this->db->set($dados);
        return $this->db->update($table, $dados);
    }

    public function deletar($table, $id) {
        //var_dump($id);
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function existe($table, $ramal) {
        $this->db->where('ramal', $ramal);
        $query = $this->db->get_where($table);
        return $query->result_array();
    }

    public function existe_login($table, $login) {
        $this->db->where('login', $login);
        $query = $this->db->get_where($table);
        return $query->result_array();
    }

    function retornaLista2($table, $ramal, $maximo, $inicio) {
        $this->db->order_by($ramal, "asc");
        $query = $this->db->get($table, $maximo, $inicio);
        return $query->result();
    }

    function contaRegistros($table) {
        return $this->db->count_all_results($table);
    }

//######################################### CDR ##################
    public function listar_cdr_todos() {
        $data1 = date("Y/m/d");
        $data2 = date("Y/m/d");
        
        $dataini = $data1." 00:00:00";
        $datafim = $data2." 23.59.59";
        
        
        $this->db->where("calldate between('$dataini')" . 'and' . "('$datafim')");        
        $this->db->order_by('calldate', 'desc');
        $query = $this->db->get('cdr');
        return $query;
    }

    public function listar_cdr_data($dtini, $dtfim) {
        $this->db->where("calldate between('$dtini')" . 'and' . "('$dtfim')");
        $this->db->order_by('calldate', 'desc');
        $query = $this->db->get('cdr');
        return $query;
    }
    
    public function listar_cdr_bina($table,$dst) {
        $this->db->where("dst", $dst );
        $this->db->limit(1);
        $this->db->order_by('calldate', 'desc');
        $query = $this->db->get($table);
        return $query;
    }

}
