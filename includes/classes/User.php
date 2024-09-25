<?php

namespace classes;

use PDO;

class User
{
    // Voegt een nieuwe gebruiker toe aan de database
    public static function createNew($user, $db): bool
    {
        $statement = $db->prepare('INSERT INTO users (name, email, password, profile_image_path) 
        VALUES (:name, :email, :password, :profile_image_path)');

        // Vul placeholders met data uit $user
        $statement->bindValue(':name', $user['name']);
        $statement->bindValue(':email', $user['email']);
        $statement->bindValue(':password', $user['password']);
        $statement->bindValue(':profile_image_path', $user['profile_image_path']);

        // Voer de statement uit en retourneer de boolean waarde
        return $statement->execute();
    }

    // Selecteer een gebruiker op basis van email
    public static function selectByEmail($db, $email): array|bool
    {
        $query = 'SELECT * FROM users WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Selecteer een gebruiker op basis van id
    public static function selectById($db, $id): array|bool
    {
        $query = 'SELECT * FROM users WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Verkrijg alle gebruikers
    public static function getAll($db): array
    {
        $statement = $db->prepare("SELECT * FROM users");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update gebruikersgegevens
    public static function update($db, $id, $updatedUser): bool
    {
        $query = 'UPDATE users SET 
            name = :name, 
            email = :email' .
            (!empty($updatedUser['profile_image_path']) ? ', profile_image_path = :profile_image_path' : '') .
            ' WHERE id = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':name', $updatedUser['name']);
        $statement->bindValue(':email', $updatedUser['email']);
        $statement->bindValue(':id', $id);

        if (!empty($updatedUser['profile_image_path'])) {
            $statement->bindValue(':profile_image_path', $updatedUser['profile_image_path']);
        }

        return $statement->execute();
    }

    public static function updateImage($db, $id)
    {
        $statement = $db->prepare('UPDATE users SET profile_image_path = :profile_image_path WHERE id = :id');

        $statement->bindValue(':id', $id);
        $statement->bindValue(':image', null);

        return $statement->execute();
    }

    // Update het wachtwoord van de gebruiker
    public static function updatePassword($db, $id, $passwordHash): bool
    {
        $statement = $db->prepare('UPDATE users SET password = :password WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->bindValue(':password', $passwordHash);

        return $statement->execute();
    }

    // Verwijder een gebruiker
    public static function delete($db, $id): bool
    {
        self::deleteImage($db, $id);

        $statement = $db->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    // Verwijder de profielfoto
    public static function deleteImage($db, $id): bool
    {
        $statement = $db->prepare('SELECT profile_image_path FROM users WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        $imageData = $statement->fetch(PDO::FETCH_ASSOC);

        if ($imageData['profile_image_path'] && file_exists('includes/images/uploaded/' . $imageData['profile_image_path'])) {
            return unlink('includes/images/uploaded/' . $imageData['profile_image_path']);
        }

        return true;
    }
}
