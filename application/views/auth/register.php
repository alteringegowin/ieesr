<div id="login">
    <div class="row">
        <div class="span6 offset3">
            <h3>Registration</h3>    
            <form action="<?php echo current_url() ?>" method="post" >
                <?php if (validation_errors()): ?>
                    <div class="alert alert-error">
                        <?php echo validation_errors(); ?>
                    </div>	
                <?php endif; ?>
                <?php if (isset($error)): ?>
                    <div class="alert alert-error">
                        <?php echo $error; ?>
                    </div>	
                <?php endif; ?>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="user_name">Your Name</label>
                        <div class="controls">
                            <input type="text" name="name" value="" id="user_name">
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
                        <label class="control-label" for="password_confirm">Confirm Password</label>
                        <div class="controls">
                            <input type="password" name="password_confirm" value="" id="password_confirm">
                        </div>
                    </div>				
                    <div class="control-group">
                        <label class="control-label" for="propinsi">Propinsi</label>
                        <div class="controls">
                            <?php echo form_dropdown('propinsi_id', $ddPropinsi) ?>
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
