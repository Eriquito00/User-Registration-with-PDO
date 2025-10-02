<?php
interface MySQLUserDAO {
    public function create(User $user);
    public function readOne($id);
    public function readAll();
    public function update(User $user);
    public function delete($id);
}
?>