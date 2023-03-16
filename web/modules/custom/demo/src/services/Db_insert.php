<?php

namespace Drupal\demo\services;

use Drupal\Core\Database\Connection;

class Db_insert {
    protected $database;

    //Make a object of Connection class(drupal predefine class) and assign to protected property
    public function __construct(Connection $database){
        $this->database = $database;
    }

    public function setData($form_state){
        $this->database->insert('Ajax_form')
        -> fields([
            'name'=> $form_state->getValue('name'),
            'message'=> $form_state->getValue('message'),
        ])
        ->execute();
    }

    public function getData(){

    }

}