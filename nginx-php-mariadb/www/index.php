<?php

header('Content-Type: text/plain;');

$host = getenv('MARIADB_HOST');
$dbname = getenv('MARIADB_DATABASE');
$port = getenv('MARIADB_PORT');
$username = getenv('MARIADB_USER');
$password = getenv('MARIADB_PASSWORD');
$options = [
    \PDO::ATTR_PERSISTENT => false,
    \PDO::ATTR_EMULATE_PREPARES => false,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
];

$connection = new \PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";port=" . $port . ";", $username, $password, $options);

echo 'SHOW TABLES in database: ' . "\n";

$statement = $connection->query('SHOW TABLES;');

foreach ($statement as $result) {
    var_dump($result);
}

$connection = null;
