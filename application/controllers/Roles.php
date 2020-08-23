<?php
header('Access-Control-Allow-Origin: *');

class Roles extends Base_Controller {
  // public function index() {
  //   return true;
  // }

  public function getData() {
      try {
        $callBackData = $this->model('RolesModel')->readRole();
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

  public function getName() {
      try {
        $callBackData = $this->model('RolesModel')->readByName();
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
}
