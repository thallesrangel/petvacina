<?php

require "environment.php";

$config = array();

if(ENVIRONMENT == 'dev') {
    define("BASE_URL", "http://localhost:8080/petgestor/");
    $config['dbname'] = 'petvacina';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "http://191.252.111.150/petgestor/");
    $config['dbname'] = 'petvacina';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'thalles';
    $config['dbpass'] = 'maax0710';
}

global $db;
try {

    $db = new PDO("mysql:dbname=".$config['dbname'].";charset=utf8".";host=".$config['host'],$config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}