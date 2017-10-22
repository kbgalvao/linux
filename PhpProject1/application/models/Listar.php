<?php

class Listar extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }
    
    public function listar_todos($table) {
        $query = $this->db->get($table);
        return $query->result();
    }
    
     public function listar_id($table, $id) {
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query->result();
    }
    
}