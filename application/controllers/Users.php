<?php

class Users extends Base_Controller {

  public function index() {
    return true;
  }

  public function getData() {
      try {
        $callBackData = $this->model('UsersModel')->readUsers();
        $msg = new Messages();

        if(is_null($callBackData)) {
          throw new Exception("Data is null");
          return false;
        } else {
          return printf($callBackData);
        }
      
      } catch(Exception $ex) {
        return printf(json_encode([
          $msg->message = $this->getMessage(),
          $msg->code = 0
        ]));
      }
  }


  public function userAdd($obj) {
    $msg = new Messages();
    
    try {
      $callBackData = $this->model('UsersModel')->createUsers(json_decode($obj));
      $msg = new Messages();
    

      if($callBackData == 0) {
        throw new Exception("Data not Added");
        return false;
      }

      if(is_null($callBackData)) {
        throw new Exception("Data is null");
        return false;
      }

      if($callBackData >= 1) {
        $msg->message = "Added user Success";
        $msg->code = 1;
        return printf(json_encode($msg));
      }

    } catch(Exception $ex) {
      $msg->message = $this->getMessage();
      $msg->code = 0;
      return printf(json_encode($msg));
    }
  }

  public function getId($id) {
    try {
      $callBackData = $this->model('UsersModel')->readUsersId($id);
      if(is_null($callBackData)) {
        throw new Exception("Data is null");
        return false;
      } else {
        return printf($callBackData);
      }
    } catch(Exception $ex) {
        return printf($ex);
    }
  }

  public function userEdit() {
    return true;
  }

  public function deleteData($id) {
    $callBackData = $this->model('UsersModel')->deleteUsersId($id);
    return printf($callBackData);
  }
    
}
