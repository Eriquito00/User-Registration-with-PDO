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
        // Implementation for reading a single user from the database by ID
    }

    public function readAll() {
        $stmt = $this->connection->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(User $user) {
        // Implementation for updating a user in the database
        // if user.email or user.telephone already exists, return an error
    }

    public function delete($id) {
        // use the read function to show all users and then the ID that the user says delete it 
        // Implementation for deleting a user from the database
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