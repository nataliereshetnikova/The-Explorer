<?php
    $host = "127.0.0.1";
    $db = "world";
    $charset = "utf8";
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $user = 'root';
    $pwd = '';

    $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
    $options[PDO::ATTR_EMULATE_PREPARES] = false;

    $pdo;

    try {
        $pdo = new PDO($dsn, $user, $pwd, $options);
    } catch( PDOException $e ) {
        echo $e->getMessage();
    }
?>