<?php
namespace v1\user\byid;

use v1\user\User;

class ByID extends User{
    public function __construct($params = []){
        parent::__construct($params);
    }

    protected function read(){
        if(($this->api->request->param)){
            $this->model->id = $this->api->request->param;
        }

        $user = $this->getUser();
        return $user;
    }

    public function getUser(){
        $user = $this->getData();

        if($user){
            return $this->model;
        }
        return null;
    }

    protected function getData(){

        $result = false;

        if($this->model->id !== null){
            $result =  $this->dbConnection->query("SELECT * FROM ".$this->model->modelTable." WHERE id =".$this->model->id)->fetch();
        } 
        else {
            $result =  $this->dbConnection->query("SELECT * FROM ".$this->model->modelTable." LIMIT 1")->fetch();
        }

        if($result){
            foreach($result as $key => $value){
                if(property_exists($this->model, $key)){
                    $this->model->{$key} = $value;
                }
            }
            return $this->model;
        }
        else{
            return false;
        }
    }
}
?>