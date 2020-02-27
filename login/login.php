<div class="form">
    <?php include ('./inc/menu.php')?>
    <main>

        <form action="./login/loginUser.php" method="post">
            <h2>Login</h2>
            <label for="email">Email*<span><i class="far fa-envelope"></i></span></label>
            <input type="text" name="email" required>
            <label for="password">Password*<span><i class="fas fa-key"></i></span></label>
            <input type="password" name="password" required>
            <a href="#">Forgot password?</a>
            <button type="submit">Login</button>
            <?php
                if(isset($_GET['m'])){
                    if($_GET['m']==='email'){
                        echo "<h2 class='error'>User does not exist. Please, signup.</h2>";
                    } else if($_GET['m']==='pass'){
                        echo "<h2 class='error'>Password or email is not correct.</h2>";
                }
            }
            ?>
        </form>
    </main>
</div>


