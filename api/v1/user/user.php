<?php
namespace v1\user;

use baseMethod\BaseMethod;

class User extends BaseMethod{
    public function __construct($params = []){
        parent::__construct($params);
        //echo "we loaded the method 'User'\n";
    }
}
?>