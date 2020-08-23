<?php 

class Base_Controller {
    public function model($model) {
      require_once '../application/models/'.$model.'.php';
      return new $model;
    }

    public function render($render , $data = []) {
      require_once '../application/render/' .$render. '.php';
    }
}