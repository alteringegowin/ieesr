<div id="login">

    <div class="row">
        <div class="span6 offset3">

            <h3>Login</h3>
            <form action="dash.html">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="user_name">Username</label>
                        <div class="controls">
                            <input type="text" class="input-large" id="user_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="pass_word">Password</label>
                        <div class="controls">
                            <input type="password" class="input-large" id="pass_word">
                        </div>
                    </div>
                </fieldset>
                <a href="<?php echo site_url('auth/forgot_password') ?>">Forgot Password ?</a>
                <div class="pull-right">
                    <button type="submit" class="btn btn-warning">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="span6 offset3">
            <div class="pull-right">
                <a href="<?php echo site_url('auth/register') ?>">Register</a>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo site_url('auth/help') ?>">Need Help</a>
            </div>
        </div>
    </div>
</div>