<?php

/**
 * @return array
 */
function getItemDetailsById($db, $objectId)
{
    $statement = $db->prepare("SELECT * FROM objects WHERE id = :id");

    $statement->bindValue(':id', $objectId);

    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);


}
