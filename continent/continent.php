<div class="distribution-map">
    <img src="./continent/img/map.png" alt="world map"/>
    <?php 
        $continents = ['Antarctica', 'Europe', 'Oceania','North America','South America', 'Africa', 'Asia'];
        foreach($continents as $c){
            $stripped = strtolower(str_replace(' ', '', $c));
            echo "<a id=\"$stripped-btn\" class=\"map-point\" href=\"?p=country&cont=$stripped\"\">".
                     "<div class=\"content\">".
                    "<div class=\"centered-y\">".
                        "<h2 id=\"$stripped\">$c</h2>".
                    "</div>".
                "</div>".
            "</a>";
       }
    ?>
</div>