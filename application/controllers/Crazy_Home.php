<?php

class Crazy_Home extends Base_Controller {
    public function index() {
        $data['title'] = "Crazy Lites";
        $this->render("index",$data);
    }
}