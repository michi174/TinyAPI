<?php

namespace v1\user;

use baseModel\BaseModel;

class UserModel extends BaseModel{

    public $modelTable = "users";

    public $id;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $createDateTime;
    public $createUserId;
    public $editDateTime;
    public $editUserId;
    public $password;

    public function __construct($params = []){
        parent::__construct();
    }
}
?>