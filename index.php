<?php 
    include_once('./inc/dbconn.php');
    $page = 'login';
    $key=0;
    $qPages = $pdo -> query("SELECT `title`,`content` FROM `world`.`pages`;");
    $pages = [];
    $content = [];
    while($pRow = $qPages->fetch()){
        $pages[]=$pRow['title'];
        $content[]=$pRow['content'];
    }
    if(isset($_GET['p'])&&in_array($_GET['p'], $pages)){
        $temp_page = strtolower($_GET['p']);
        $page = $temp_page;
        $key = array_search($page, $pages);
    }
    $result=null;
    $currContinent = ' ';
    $continents = ['antarctica'=>'Antarctica', 'europe'=>'Europe', 'oceania'=>'Oceania',
    'northamerica'=>'North America','southamerica'=>'South America', 'africa'=>'Africa', 'asia'=>'Asia'];
    $chosenCountries = [];
    include ('./inc/header.php');
    include ("./$page/$page.php");
    include ('./inc/footer.php');
?>

