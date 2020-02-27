<div class="form">
    <?php include ('./inc/menu.php')?>
    <main>
        <form action="./signup/newUser.php" method="post">
            <h2>Sign up</h2>
            <label for="username">User name*<span><i class="fas fa-user"></i></span></label>
            <input type="text" name="username" required>
            <label for="email">Email*<span><i class="far fa-envelope"></i></span></label>
            <input type="text" name="email" required>
            <label for="password">Password*<span><i class="fas fa-key"></i></span></label>
            <input type="password" name="password" id="password" required>
            <label for="passwordre">Password*<span><i class="fas fa-key"></i></span></label>
            <input type="password" name="passwordre" id="confirm_password" required>
            <a href="#">Forgot password?</a>
            <button type="submit" value="Insert">Sign up</button>
        </form>
    </main>
</div>

<!-- Validate password confirmation -->
<script>
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>