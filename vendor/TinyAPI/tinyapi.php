<?php

namespace TinyAPI;

include_once(__DIR__."/autoloader.func.php");

use TinyAPI\http\request\Request;


class TinyAPI{

    const API_FOLDER = "api";
    

    public $request = null;
    public $response = null;
    public $hostDir = "";
    private $method = null;

    private static $object = null;
    private static $instance = 0;
    
	private function __clone(){}
    private function __construct(){

        if(self::$instance === 0){
            self::$instance += 1;
            $this->hostDir = $_SERVER['DOCUMENT_ROOT'];
            $this->request = new Request();
        }
    }

    public static function get(){
		if(self::$object === null)
		{
			self::$object	= new TinyAPI();
            return self::$object;
		}
		else
		{
			return self::$object;
		}

    }

    public function isValidEndpoint() : bool{

        $path = $this->hostDir."/".TinyAPI::API_FOLDER.$this->request->endpoint;

        if(file_exists($path)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getApiClassPath(){
        $class = "";

        $class = str_replace("/", "\\", $this->request->endpoint);
        $class = substr($class, 1);
        $class .= $this->request->getFileName(false);


        return $class;
    }

    private function getClass(){
        $class = $this->getApiClassPath();
        return new $class();
    }

    public function run(){
        $this->getClass();
    }
}
?>