<?php
interface MySQLUserDAO {
    public function create(User $user);
    public function read();
    public function update(User $user);
    public function delete($id);
}
?>