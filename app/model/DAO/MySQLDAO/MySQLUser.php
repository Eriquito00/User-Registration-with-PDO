<?php

require_once __DIR__ . "/../interface/MySQLUserDAO.php";

class MySQLUser implements MySQLUserDAO {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function create(User $user) {
        // Implementation for creating a user in the database
        // if user.email or user.telephone already exists, return an error
    }

    public function read() {
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

    function checkEmailExists($email){
        // check if the email already exists
        // return true if exists, false if doesn't
    }

    function checkTelephoneExists($telephone){
        // check if the telephone already exists
        // return true if exists, false if doesn't
    }
}
?>