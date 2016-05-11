<?php
session_start();
$major = $_POST["major"];
$continent = $_POST["continent"];
$wMajor = $_POST["wMajor"];
$wContinent = $_POST["wContinent"];
$_SESSION['hasVoted'] = True;
$_SESSION['votes'] = 1;
$message = $major . ". " . $continent . ". " . $wMajor . ". " . $wContinent . ". " . "\n";
file_put_contents("results.txt", $message, FILE_APPEND);
header( 'Location: results.php' ) ;
?>
