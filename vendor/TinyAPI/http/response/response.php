<?php
namespace TinyAPI\http\response;

class Response{
    private $headers, $code, $body;

    public function __construct(){

    }

    public function __get($prop){
        if(property_exists($this, $prop)){
            return $this->$prop;
        }
    }

    public function send(){

    }

    public function get(){
        
    }

    
}
?>