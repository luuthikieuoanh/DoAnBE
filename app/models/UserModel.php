<?php
include 'User.php';
class UserModel extends Db
{
    public function createtUser(User $user)
    {
        $sql = parent::$connection->prepare("INSERT INTO `users`(`user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_telephone`) VALUES (?,?,?,?,?)");
        $sql->bind_param('sssss', $user->firstName, $user->lastName, $user->email, $user->password, $user->telephone);
        return $sql->execute();
    }

    public function getEmail($email)
    {
        $sql = parent::$connection->prepare("SELECT user_email FROM `users` WHERE user_email = ?;");
        $sql->bind_param('s', $email);
        return parent::select($sql);
    }

    public function getPassword($email)
    {
        $sql = parent::$connection->prepare("SELECT user_password FROM `users` WHERE user_email = ?;");
        $sql->bind_param('s', $email);
        return parent::select($sql);
    }

    public function getUserByEmail($user_email)
    {
        $sql = parent::$connection->prepare("SELECT user_id,user_email,user_password FROM `users` WHERE user_email = ?;");
        $sql->bind_param('s', $user_email);
        return parent::select($sql);
    }

    public function getUserByID($user_id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `users` WHERE user_id = ?;");
        $sql->bind_param('i', $user_id);
        return parent::select($sql);
    }

    public function editUser($user_id, $user_firstname, $user_lastname, $user_telephone)
    {
        $sql = parent::$connection->prepare("UPDATE `users` SET `user_firstname`=?,`user_lastname`=?,`user_telephone`=? WHERE `user_id`=?");
        $sql->bind_param('sssi', $user_firstname, $user_lastname, $user_telephone, $user_id);
        return $sql->execute();
    }

    public function editPass($user_id, $user_password)
    {
        $sql = parent::$connection->prepare("UPDATE `users` SET `user_password`=? WHERE `user_id`=?");
        $sql->bind_param('si', $user_password, $user_id);
        return $sql->execute();
    }

}
