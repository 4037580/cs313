<?php
/*
 * Database connections
 * server name
 * databases name
 * proxy user name
 * password
 */

function unclejacksdb(){
$server = '127.2.200.130:3306';
$database = 'unclejacks';
$username = 'adminen1InPN';
$password = 'P5X_uMZPdwSl';
$dsn = 'mysql:host='.$server.';dbname='.$database;
$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);

try {
  $g1db = new PDO($dsn, $username, $password, $options);
  return $g1db;
} catch (PDOException $ex) {
  echo 'Connection failed';
}
}
