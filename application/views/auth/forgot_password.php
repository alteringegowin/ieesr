<div id="login">
    <?php if (isset($success)): ?>

        <div class="row">
            <div class="span6 offset3">
                <div class="alert alert-success">
                    <?php echo $success; ?>
                </div>
            </div>
        </div>
    <?php else: ?>


        <div class="row">
            <div class="span6 offset3">
                <h3>Forgot Password</h3>    
                <?php echo form_open("auth/forgot_password"); ?>
                <p>Please enter your email address so we can send you an email to reset your password.</p>
                <hr>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="identity">Email</label>
                        <div class="controls">
                            <input type="text" name="email" value="" id="email">
                        </div>
                    </div>
                </fieldset>
                <div class="pull-right">
                    <button type="submit" name="submit" value="login" class="btn btn-warning">
                        Reset Password
                    </button>
                </div>
                <br>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="row">
            <div class="span6 offset3">
                <div class="pull-right">
                    <a href="<?php echo site_url('auth/register') ?>">Register</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo site_url('auth') ?>">Login</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo site_url('auth/help') ?>">Need Help</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>