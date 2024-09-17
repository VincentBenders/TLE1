<?php
session_start();

////beveilig tegen deeplinken dit is voor later
//if (!isset($_SESSION['user'])) {
//    header('Location: register.php');
//}

require_once 'includes/database.php';
?>

