<?php
namespace baseModel;


use TinyAPI\TinyAPI;

class BaseModel{


    protected $api = null;

    public function __construct(){

        $this->api = TinyAPI::get();

    }
}
?>