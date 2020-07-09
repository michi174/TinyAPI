<?php
namespace baseMethod;

use TinyAPI\TinyAPI;

class BaseMethod{

    public function __construct($params = []){
        //echo "baseMethod loaded\n";

        $api = TinyAPI::get();


        switch($api->request->type){
            case "GET":
                $api->response = $this->read();
        }
    }
    
    protected $result;
    protected $successful = false;

    protected function create(){}

    protected function read(){
        return ["test" => "value"];
    }

    protected function update(){}

    protected function delete(){}
    
    protected function save(){}

    public function getResult(){
        return $this->result;
    }
}
?>