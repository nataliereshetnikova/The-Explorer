<?php
include_once ('../inc/dbconn.php');
$email = $_POST['email']; 
$password = $_POST['password']; 

$command = $pdo->prepare("SELECT `ID`, `passHash` FROM user WHERE email=:email");
$command->bindValue(':email', $email);
$command->execute();
if(!empty($command ->rowCount())){
    $row = $command->fetch();
    if(password_verify($password, $row['passHash'])){
            $res[] = $row;
            $curUser=$res[0]['ID'];
            setcookie("curUser", $curUser, time()+3600, '/');
            header("Location: ../index.php?p=world");
    } else{
        $result = "not wow";
        header("Location: ../index.php?p=login&m=pass");
    
    }
} else{
    $result = "1 not wow";
    header("Location: ../index.php?p=login&m=email");
}
?>