<?php
    class User {
        public $id;
        public $name;
        public $surname;
        public $email;
        public $telephone;

        public function __construct($id = "", $name, $surname, $email, $telephone) {
            $this->id = $id;
            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
            $this->telephone = $telephone;
        }

        public function getId() {return $this->id;}

        public function getName() {return $this->name;}

        public function getSurname() {return $this->surname;}

        public function getEmail() {return $this->email;}

        public function getTelephone() {return $this->telephone;}
    }
?>