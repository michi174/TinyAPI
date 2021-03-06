<?php
namespace baseMethod;

use TinyAPI\TinyAPI;
use \PDO;

class BaseMethod{

    protected $model;
    protected $api;
    
    protected $dbConnection = null;

    public function __construct($params = []){

        $this->dbConnect();
        //echo "baseMethod loaded\n";

        $api = TinyAPI::get();
        $this->api = $api;


        switch($api->request->type){
            case "GET":
                $api->response = $this->read();
            break;
            case "PUT":
                $api->response = $this->update();
            break;
            case "DELETE":
                $api->response = $this->delete();
            break;
            case "POST":
                $api->response = $this->create();
            break;
        }
    }

    protected function dbConnect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "blog";

        try {
            
            $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "connection successful";
            $this->dbConnection = $conn;

            //die(var_dump($this->dbConnection));
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }   
    }

    protected function dBCloseConnection(){
        $this->dbConnection = null;
    }
    
    protected $result;
    protected $successful = false;

    protected function create(){
        return ["test" => "create"];
    }

    protected function read(){
        return ["test" => "read"];
    }

    protected function update(){
        return ["test" => "update"];
    }

    protected function delete(){
        return ["test" => "delete"];
    }
    
    protected function save(){
        return ["test" => "save"];
    }

    public function getResult(){
        return $this->result;
    }
}
?>