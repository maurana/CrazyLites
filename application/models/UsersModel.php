<?php
class UsersModel {
    public $table = 'user';
    public $db;

    public function __construct() {
      $this->db = new SQL();
    }

    public function readUsers(){
      $this->db->querySQL("SELECT * FROM ".$this->table);
      return $this->db->readCRUD();
    }

    public function createUsers($obj) {
      $data = [];
      foreach($obj as $key => $value) {
        array_push($data, $value);
      }

      $this->db->querySQL("INSERT INTO ".$this->table." VALUES ('','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");
      return $this->db->createCRUD();
    }

    public function readUsersId($id) {
      $this->db->querySQL("SELECT * FROM ".$this->table." WHERE user_id = ".$id);
      return $this->db->readCRUD();
    }

    public function deleteUsersId($id) {
      var_dump($id);
      die;
      $this->db->querySQL("DELETE FROM ".$this->table." WHERE user_id = ".$id);
      return $this->db->deleteCRUD();
    }
}
