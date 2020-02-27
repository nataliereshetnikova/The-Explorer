<?php
    include_once ('./inc/dbconn.php');
    //get continent from previous page
    if(isset($_GET['cont'])){
      $currContinent = $continents[$_GET['cont']];
    }
    $stripped = $_GET['cont'];
    //get countries from database
    $qPages = $pdo -> query("SELECT `Code`,`Name` FROM `country` WHERE `continent`='$currContinent'");
    $countries = [];
    while($pRow = $qPages->fetch()){
      array_push($countries, [$pRow['Code']=>$pRow['Name']]);
    }
?>
  <div id="continent">

    <h1> <?php echo $currContinent ?></h1>
    <?php echo "<img src=\"./continent/img/$stripped.png\""?>
    <div>
    <div class="country">
    <?php include_once('./inc/menu.php'); ?>
      <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">
          <?php
          if(isset($_GET['cont'])){
            echo " Choose up to 3 countries";
          } else{
            echo " Choose continent first";
          }
          ?>
        </button>
        <div id="myDropdown" class="dropdown-content">
          <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
          <ul>
              <?php
              for($i = 0; $i<sizeof($countries); $i++){
                foreach($countries[$i] as $code => $c){
                  echo "<li id=$code class='add'>$c +</li>";
                }
              }
              ?>
          </ul>
        </div><!-- end of dropdown-content -->
        </div><!-- end of dropdown -->
      <div id="chosen">
      </div>
      </div><!-- end of country -->
