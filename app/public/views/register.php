<?php include __DIR__ . '/../html/header.php' ?>

<!-- creating the structure of the register page -->
<section class="register">
    <section class="text-section">
        <section class="main-heading">
            <h3>Create an Account now <span>Trade with us...</span></h3>
        </section>
    </section>
    <section class="form-section">
        <?php if(isset($_GET['message']) && $_GET['message'] != '' ):?>
        <p class="message"><?= $_GET['message']?></p>
        <?php endif;?>
        <section class="text">
            <h4>Register</h4>
            <p>Manage all your trades effeciently</p>
        </section>

        <form action="/user-create" method="post">
            <section class="name">
                <section class="first_name">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="John... " required>
                </section>
                <section class="last_name">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Joe..."  required>
                </section>
            </section>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="john_doe@example.com"  required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="*******"  required>

            <label for="passconfirm">Confirm Password</label>
            <input type="password" name="passconfirm" id="passconfirm" placeholder="*******"  required>

            <label for="birthdate">Birth Date</label>
            <input type="date" name="birthdate" id="birthdate" value="2000-01-01">

            <label for="type">User Type</label>
            <select name="type" id="type">
                <option value="normal">Customer</option>
                <option value="vendor">Merchant</option>
            </select>

            <section class="gender">
                <label for="male"><input type="radio" name="gender" id="male" value="Male" checked> Male</label>
                <label for="female"><input type="radio" name="gender" id="female" value="Female"> Female</label>
            </section>

            <label for="confirmpolicy"> <input type="checkbox" name="confirmpolicy" id="confirmpolicy"> I agree to
                all <a href="">Terms</a>, <a href="">Privacy Policies</a>, and <a href="">Fees</a></label>

            <input type="submit" name='signup' value="Create Account">

        </form>

        <p>Already have an account? <a href="/login">Login</a></p>
    </section>
</section>

<?php include __DIR__ . '/../html/footer.php' ?>