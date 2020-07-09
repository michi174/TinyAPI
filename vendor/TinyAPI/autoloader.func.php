<?php

function autoloader($klasse)
{

    $include	= $_SERVER["DOCUMENT_ROOT"]."/vendor/".str_replace("\\", "/", $klasse).".php";
	
	if(file_exists($include))
	{
		include_once $include;
	}
	else 
	{
		//echo("Fehler: Die Datei " . $include . " konnte nicht eingebunden werden, da die Datei nicht gefunden wurde.");
	}
}

function autoloader_api($klasse)
{

    $include	= $_SERVER["DOCUMENT_ROOT"]."/api/".str_replace("\\", "/", $klasse).".php";
	
	if(file_exists($include))
	{
		include_once $include;
	}
	else 
	{
		echo("Fehler: Die Datei " . $include . " konnte nicht eingebunden werden, da die Datei nicht gefunden wurde.");
	}
}

spl_autoload_register("autoloader");
spl_autoload_register("autoloader_api");

?>