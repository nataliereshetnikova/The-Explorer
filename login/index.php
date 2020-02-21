<?php 
    $page = 'login';
    $pages = ['login', 'signup'];
    if(isset($_GET['p'])&&in_array($_GET['p'], $pages)){
        $temp_page = strtolower($_GET['p']);
        $page = $temp_page;
    }
    include ('./inc/header.php');
    include ("./inc/$page.php");
    include ('./inc/footer.php');
?>

