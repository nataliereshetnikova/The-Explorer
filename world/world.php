<div class="distribution-map">
    <img src="./world/img/map.png" alt="world map"/>
    <?php 
        foreach($continents as $stripped=>$continent){
            echo "<a id=\"$stripped-btn\" class=\"map-point\" href=\"?p=continent&cont=$stripped\"\">".
                     "<div class=\"content\">".
                    "<div class=\"centered-y\">".
                        "<h2 id=\"$stripped\">$continent</h2>".
                    "</div>".
                "</div>".
            "</a>";
        }
    ?>
</div>