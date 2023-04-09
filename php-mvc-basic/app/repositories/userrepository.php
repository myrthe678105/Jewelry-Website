<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

class UserRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getByUsername($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT ID, Name, Password, Type, address FROM Users WHERE Name = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = new User();
            while ($row = $stmt->fetch()) {
                $user->setId($row['ID']);
                $user->setRole($row['Type']);
                $user->setUsername($row['Name']);
                $user->setPassword($row['Password']);
                $user->setAddress($row['address']);
            }
            return $user;

        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function getUserById($id)
    {
        try {
            $id = (int)$id; // Convert to integer explicitly
            $stmt = $this->connection->prepare("SELECT ID, Name, Password, Type, address FROM Users WHERE ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $user = new User();
                $user->setId($id);
                $user->setRole($row['Type']);
                $user->setUsername($row['Name']);
                $user->setPassword($row['Password']);
                $user->setAddress($row['address']);
            }

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>