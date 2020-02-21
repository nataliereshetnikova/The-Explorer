<div class="form">
    <?php include ('./inc/menu.php')?>
    <main>
        <form action="newUser.php" method="post">
            <h2>Sign up</h2>
            <label for="user">User name*<span><i class="fas fa-user"></i></span></label>
            <input type="text" name="user" required>
            <label for="email">Email*<span><i class="far fa-envelope"></i></span></label>
            <input type="text" name="email" required>
            <label for="password">Password*<span><i class="fas fa-key"></i></span></label>
            <input type="password" name="password" required>
            <label for="password">Password*<span><i class="fas fa-key"></i></span></label>
            <input type="password" name="password" required>
            <a href="#">Forgot password?</a>
            <button type="submit">Sign up</button>
        </form>
    </main>
</div>