<?php

namespace classes;

use PDO;

class ReplicatorObject
{

    public static function createNew($object, $db):bool
    {

        //Prepare the query and place it in a statement
        $statement = $db->prepare('INSERT INTO objects (user_id, name, description, file_path, share) 
                                   VALUES (:user_id, :name, :description, :file_path, :share)');

        //Bind the values from $object to the query's placeholders
        $statement->bindValue(':user_id', $object['user_id']);
        $statement->bindValue(':name', $object['name']);
        $statement->bindValue(':description', $object['description']);
        $statement->bindValue(':file_path', $object['file_path']);
        $statement->bindValue(':share', $object['share']);

        //Perform the query on the database and return it's return value
        return $statement->execute();

    }

    public static function update($object, $db):bool
    {

        //Prepare the query and place it in a statement
        $statement = $db->prepare('UPDATE objects SET name = :name, description = :description, file_path = :file_path, share = :share WHERE id = :id');

        //Bind the values from $object to the query's placeholders
        $statement->bindValue(':name', $object['name']);
        $statement->bindValue(':description', $object['description']);
        $statement->bindValue(':file_path', $object['file_path']);
        $statement->bindValue(':share', $object['share']);

        //Perform the query on the database
        if($statement->execute()) {

            //If the query was successfully executed, delete the object file if it was changed

            //Finally, return true
            return true;
        } else {
            //If not, return false
            return false;
        }

    }

    public static function getById($objectId, $db):bool|array
    {

        //Prepare the sql query
        $statement = $db->prepare('SELECT * FROM objects WHERE id = :id');

        //Bind the placeholder to $objectId
        $statement->bindValue(':id', $objectId);

        //Perform the query in the database
        if ($statement->execute()) {
            //If it was a success, return the associative array with the fetched information
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            //If not, return false
            return false;
        }

    }

    public static function getByUserId($userId, $db):bool|array
    {

        //Prepare the sql query
        $statement = $db->prepare('SELECT * FROM objects WHERE user_id = :user_id');

        //Bind the placeholder to $objectId
        $statement->bindValue(':user_id', $userId);

        //Perform the query in the database
        if ($statement->execute()) {
            //If it was a success, return the associative array with the fetched information
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            //If not, return false
            return false;
        }

    }

    public static function getAllPublic($db):bool|array
    {

        //Prepare the sql query
        $statement = $db->prepare('SELECT objects.*, users.name AS user_name FROM objects LEFT JOIN users ON objects.user_id = users.id WHERE share = 1');

        //Perform the query in the database
        if ($statement->execute()) {
            //If it was a success, return the associative array with the fetched information
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            //If not, return false
            return false;
        }

    }

    public static function deleteById($objectId, $db):bool {

        //Prepare the sql query
        $statement = $db->prepare('DELETE FROM objects WHERE id = :id');

        //Bind the id to $objectId
        $statement->bindValue(':id', $objectId);

        //Perform the query on the database to delete the object
        return $statement->execute();

        //Also delete things from the object_tag table

        //Finally, delete the object file from the uploaded folder and return a bool

    }

    public static function deleteByUserId($userId, $db):bool {

        //Prepare the sql query
        $statement = $db->prepare('DELETE FROM objects WHERE user_id = :user_id');

        //Bind the id to $objectId
        $statement->bindValue(':user_id', $userId);

        //Perform the query on the database to delete all the objects
        return $statement->execute();

        //Also delete things from the object_tag table

        //Finally, delete the object files from the uploaded folder and return a bool

    }


}