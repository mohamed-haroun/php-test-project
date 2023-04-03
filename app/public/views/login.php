<?php include __DIR__ . '/../html/header.php' ?>

<section class="login-section">
    <section class="text">
        <section class="main-heading">
            <h2><span>It is free</span> <span>&</span> it always will be...</h2>
        </section>
    </section>

    <section class="login">
        <h3>Login</h3>

        <h4>Login to your account</h4>

        <p>Thank you for get back to Trade, feel free to get your stuff.</p>

        <form action="/user-login" method="post">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <label for="pass">Password: </label>
            <input type="password" name="pass" id="pass" placeholder="Enter Your Password">

            <section>
                <label for="remember"><input type="checkbox" name="remeber" id="remember" checked> Remember me</label>
                <a href="#">Reset Password?</a>
            </section>
            <input type="submit" value="Sign In" name="submit">
        </form>

        <p>Don't have an account yet? <a href="/register">Join Trade</a> </p>
    </section>
</section>





<?php include __DIR__ . '/../html/footer.php' ?>