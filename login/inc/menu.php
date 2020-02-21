<nav>
    <ul>
        <?php
        foreach ($pages as $p) {
            $class = $p == $page ? "class=\"selected\"" : "";
            echo "<li $class><a  href=\"?p=$p\"\">" . strtoupper($p) . "</a></li>";
            // $link = "http://localhost//php_assignment/login/index.php/?p=$p";
            // echo "<li><a href=\"$link\">".strtoupper($p)."</a></li>";
        } ?>
        <li><a href=""><i class="fab fa-facebook"></i></a></li>
        <li><a href=""><i class="fab fa-linkedin"></i></a></li>
        <li><a href=""><i class="fab fa-instagram"></i></a></li>
    </ul>
</nav>