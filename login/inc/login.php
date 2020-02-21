<div class="form">
    <?php include ('./inc/menu.php')?>
    <main>
        <form action="loging.php" method="post">
            <h2>Login</h2>
            <label for="email">Email*<span><i class="far fa-envelope"></i></span></label>
            <input type="text" name="email" required>
            <label for="password">Password*<span><i class="fas fa-key"></i></span></label>
            <input type="password" name="password" required>
            <a href="#">Forgot password?</a>
            <button type="submit">Login</button>
        </form>
    </main>
</div>