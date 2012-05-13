<div id="login">
    <div class="row">
        <div class="span6 offset3">
            <h3>Registration</h3>    
            <form action="#">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="user_name">Username</label>
                        <div class="controls">
                            <input type="text" name="user_name" value="" id="user_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input type="text" name="email" value="" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" name="password" value="" id="password">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password_confirm">Ketik ulang Password</label>
                        <div class="controls">
                            <input type="password" name="password_confirm" value="" id="password_confirm">
                        </div>
                    </div>				
                </fieldset>
                <div class="alert alert-info">
                    By Pressing the "I Accept" button you agree to the terms and conditions of the "Subscription and Lisence Agreement".
                </div>	
                <hr>
                <div class="pull-right">
                    <a href="./" class="btn">
                        Cancel
                    </a>
                    <button type="submit" name="submit" value="login" class="btn btn-warning">
                        I Accept
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="span6 offset3">
            <div class="pull-right">
                <a href="<?php echo site_url('auth') ?>">Login</a>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo site_url('auth/help') ?>">Need Help</a>
            </div>
        </div>
    </div>
</div>
