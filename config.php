<?php

require "environment.php";

$config = array();

if(ENVIRONMENT == 'dev') {
    define("BASE_URL", "http://localhost:8080/pet-vacina/");
    $config['dbname'] = 'petvacina';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "https://petvacina.000webhostapp.com/pet-vacina/");
    $config['dbname'] = 'petvacina';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'user';
    $config['dbpass'] = 'pass';
}

global $db;
try {

    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'], $config['dbpass']);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}