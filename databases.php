<?php
/*
 * Database connections
 * server name
 * databases name
 * proxy user name
 * password
 */

function unclejacksdb(){
$server = 'localhost';
$database = 'unclejacks';
$username = 'felipeg';
$password = 'g9j2nl7b';
$dsn = 'mysql:host='.$server.';dbname='.$database;
$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);

try {
  $g1db = new PDO($dsn, $username, $password, $options);
  return $g1db;
} catch (PDOException $ex) {
  echo 'Connection failed';
}
}
