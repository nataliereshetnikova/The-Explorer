<?php
    //get continent from previous page
    if(isset($_GET['cont'])){
      $continent = $_GET['cont'];
    }
    //get countries from database
    $countries = ['Uganda', 'Nigeria', 'Chad'];

?>
  <div id="continent">
    <?php echo "<img src=\"./country/img/$continent.png\""?>
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
        echo "<li id=$countries[$i]  class='add' >$countries[$i] +</li>";
    }
    ?>
    </ul>
  </div>
</div>
<div id="chosen">
</div>
  </div>
