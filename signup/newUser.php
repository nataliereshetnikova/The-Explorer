<?php

include_once('../inc/dbconn.php');

$username = $_POST['username']; 
$email = $_POST['email']; 
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$command = $pdo->prepare("INSERT INTO `user` (`username`, `email`, `passHash`) VALUES(:user, :email, :password)");
$command->bindValue(':user', $username);
$command->bindValue(':email', $email);
$command->bindValue(':password', $password);
$command->execute();

if(!empty($command->rowCount())){
   header("Location: ../index.php?p=login");
}else{
    header("Location: ../index.php?p=signup");
}
?>