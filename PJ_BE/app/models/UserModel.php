<?php
include 'User.php';
class UserModel extends Db
{
    public function createtUser(User $user)
    {
        
        $sql =parent::$connection->prepare("INSERT INTO `users`(`user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_telephone`) VALUES (?,?,?,?,?)");
        $sql->bind_param('sssss',$user->firstName,$user->lastName,$user->email,$user->password,$user->telephone);
        return $sql->execute();
    }

    public function getEmail($email)
    {
        $sql =parent::$connection->prepare("SELECT user_email FROM `users` WHERE user_email = ?;");
        $sql->bind_param('s',$email);
        return parent::select($sql);
    }

    public function getPassword($email)
    {
        $sql =parent::$connection->prepare("SELECT user_password FROM `users` WHERE user_email = ?;");
        $sql->bind_param('s',$email);
        return parent::select($sql);
    }
    
}
