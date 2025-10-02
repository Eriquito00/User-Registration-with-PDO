<?php

require_once __DIR__ . "/../interface/MySQLUserDAO.php";

class MySQLUser implements MySQLUserDAO {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function create(User $user) {
        try {
            if ($this->checkEmailExists($user->email)) throw new Exception("Email already exists");
            if ($this->checkTelephoneExists($user->telephone)) throw new Exception("Telephone already exists");

            $stmt = $this->connection->prepare("INSERT INTO users (name, surname, email, telephone) VALUES (:name, :surname, :email, :telephone)");
            $stmt->bindParam(':name', $user->name);
            $stmt->bindParam(':surname', $user->surname);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':telephone', $user->telephone);

            $stmt->execute();
        }
        catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function readOne($id) {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $stmt = $this->connection->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(User $user) {
        try {
            if ($this->checkEmailExists($user->email)) throw new Exception("Email already exists");
            if ($this->checkTelephoneExists($user->telephone)) throw new Exception("Telephone already exists");

            $stmt = $this->connection->prepare("UPDATE users SET name = :name, surname = :surname, email = :email, telephone = :telephone WHERE user_id = :id");
            $stmt->bindParam(':id', $user->id);
            $stmt->bindParam(':name', $user->name);
            $stmt->bindParam(':surname', $user->surname);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':telephone', $user->telephone);

            $stmt->execute();
        }
        catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id) {
        $stmt = $this->connection->prepare("DELETE FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    private function checkEmailExists($email){
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) return true;
        return false;
    }

    private function checkTelephoneExists($telephone){
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE telephone = :telephone");
        $stmt->bindParam(':telephone', $telephone);
        $stmt->execute();
        if ($stmt->rowCount() > 0) return true;
        return false;
    }
}
?>