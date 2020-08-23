<?php

class RolesModel {
    private $table = 'roles';
    private $db;

    public function __construct() {
        $this->db = new SQL();
    }

    public function readRole() {
        $this->db->querySQL('SELECT * FROM '. $this->table);
    	  return $this->db->readCRUD();
    }

    public function selectID($id) {
        // $this->db->query('SELECT * FROM ' . $this->table .'WHERE id=:id');
        // $this->db->bind('id' ,$id);
        // return $this->db->single();
    }

    public function readByName(){
       $this->db->querySQL("SELECT role_name FROM ".$this->table);
       return $this->db->byField();
    }
}
