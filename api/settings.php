<?php
// Database connect
$host = "localhost";
$database = "tle_1_experimenteren";
$user = "root";
$password = "";

// Maak een verbinding met de database
$db = mysqli_connect($host, $user, $password, $database);
/**
 * @param $id
 * @return mixed
 */
// Controleer of de verbinding succesvol is
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}