<?php

namespace TinyAPI\http\request;

class Request{

    private $uri, $header, $body, $type, $endpoint, $param, $query, $filename;

    public function __construct($request = ""){
        if($request === "" || !is_string($request)){
            $this->uri = $_SERVER['REQUEST_URI'];
        }else{
            $request;
        }

        $this->type = $_SERVER['REQUEST_METHOD'];
        $this->buildRequest();
    }

    public function __get($val){
        if(property_exists($this, $val)){
            return $this->$val;
        }
    }

    private function setQuery(){
        parse_str($_SERVER["QUERY_STRING"], $this->query);
    }

    private function setEndpoint(){
        $ep_strpos = strrpos($this->uri, "/");
        $endpoint = substr($this->uri, 0, $ep_strpos+1);
        $this->endpoint = $endpoint;
    }

    private function setParam(){
        //remove query string
        $requestMainParam = str_replace("?".$_SERVER["QUERY_STRING"], "", $this->uri);
        //remove endpoint
        $requestMainParam = str_replace($this->endpoint, "", $requestMainParam);

        $this->param = $requestMainParam;
    }

    public function getFileName($extension = true) : string{
        $fn_searchStr = substr($this->endpoint, 0, -1);
        $fn_startPos = strrpos($fn_searchStr, "/");
        $fn = substr($fn_searchStr, $fn_startPos+1);
        if($extension){
            $filename = $fn.".php";
        }
        else{
            $filename = $fn;
        }

        return $filename;

    }

    private function setFileName($extension = true){

        
        $this->filename = $this->getFileName(true);
    }

    public function getApiKey(){
        if(isset($_SERVER["HTTP_APIKEY"])){
            return $_SERVER["HTTP_APIKEY"];
        }
        else{
            return false;
        }
    }

    private function buildRequest(){
        $this->setQuery();
        $this->setEndpoint();
        $this->setParam();
        $this->setFileName();
    }
}
?>