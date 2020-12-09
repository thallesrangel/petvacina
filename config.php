<?php

require "environment.php";

$config = array();

define("NOME_APP", "Pet Vac");

if(ENVIRONMENT == 'dev') {
    define("BASE_URL", "http://localhost/petgestor/");
    $config['dbname'] = 'dbpetgestor';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "http://191.252.111.150/petgestor/");
    $config['dbname'] = 'dbpetgestor';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'thalles';
    $config['dbpass'] = 'maax0710';
}

global $db;
try {

    $db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8".";host=".$config['host'],$config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}