<?php

include_once "vendor/TinyAPI/tinyapi.php";

use TinyAPI\TinyAPI;

$api = TinyAPI::get();
$text = "";


$text .= "\n";
$text .= "URI: ".$api->request->uri;
$text .= "\n";
$text .= "Type: ".$api->request->type;
$text .= "\n";
$text .= "\n";
$text .= "Key: ".$api->request->getApiKey();
$text .= "\n";
$text .= "\n";
$text .= "Endpoint: ".$api->request->endpoint;
$text .= "\n";
$text .= "Param: ".$api->request->param;
$text .= "\n";
$text .= "\n";

$text .= "Query: ";
foreach($api->request->query as $query => $value){
    $text .= "\n";
    $text .= $query.": ".$value;
}
$text .= "\n";
$text .= "\n";

$text .= "Filename: ".$api->request->filename;
$text .= "\n";
$text .= "isValid: ".$api->isValidEndpoint();
$text .= "\n";
$text .= "\n";
$text .= "Class: ".$api->getApiClassPath();

$api->run();

echo json_encode($api->response);

//echo ($text);

?>
