<?php

/**
 * runs a simple sql query to get a single item based in id
 * @return array
 */
function getItemDetailsById($db, $objectId)
{
    //use the sql query for the info you want to return
    $statement = $db->prepare("SELECT * FROM objects WHERE id = :id");

    $statement->bindValue(':id', $objectId);

    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);


}
/**
 * gets all items that are public(share = 0)
 * @return array
 */
function getAllPublicItems($db)
{
    $statement = $db->prepare("SELECT * FROM objects WHERE share = :share");

    $statement->bindValue(':share', 1);

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
