<?php
// Database connect
$host = "mysql:host=localhost;dbname=tle_1_experimenteren";


$user = "root";
$password = "";

// Maak een verbinding met de database
$db = new PDO($host, $user,$password);
/**
 * @param $id
 * @return mixed
 */
// Controleer of de verbinding succesvol is
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}