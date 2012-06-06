
<div class="row" style="background-color: #fff">
    <div class="span12">

        <div class='mainInfo'>

            <h2>Login</h2>
            <p>Please login with your email/username and password below.</p>
            <hr/>
            <div id="infoMessage"><?php echo $message; ?></div>

            <?php echo form_open("auth/login"); ?>

            <p>
                <label for="identity">Email/Username:</label>
                <?php echo form_input($identity); ?>
            </p>

            <p>
                <label for="password">Password:</label>
                <?php echo form_input($password); ?>
            </p>

            <p>
                <label for="remember">Remember Me:</label>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
            </p>


            <p><?php echo form_submit('submit', 'Login', 'class="btn btn-info"'); ?></p>


            <?php echo form_close(); ?>

            <p><a href="forgot_password">Forgot your password?</a></p>

        </div>
    </div>
</div>
