<?php
  class Encrypted {
      public function hashPassword($password) {
        $data = sha1(rand());
        $data = substr($data, 0, 10);
        $encrypt = base64_encode(sha1($password . $data, true) . $data);
        $hash = array("data" => $data, "encrypt" => $encrypt);
        return $hash;
      }
  }
?>
