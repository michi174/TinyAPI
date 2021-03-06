<?php
namespace v1\user;

use baseMethod\BaseMethod;

class User extends BaseMethod{

    protected $modelClass = "v1\user\UserModel";
    protected $model = null;

    public function __construct($params = []){
        $model = new $this->modelClass($params);
        $this->model = $model;
        parent::__construct($params);

    }

    protected function read(){
        return $this->model;
    }
}
?>