<?php
require_once "settings.php";
//Require functions for actions
require_once "actions.php";

//Checks get to determan what function to use
if (!isset($_GET['id'])) {
    /** @var $db */
    $data = getAllPublicItems($db);
} else {
    /** @var $db */
    $data = getItemDetailsById($db ,$_GET['id']);
}

//Set the header & output JSON so the client will know what to expect.
header("Content-Type: application/json");
echo json_encode($data);
exit;