<div class="row-fluid">
    <div class="span12">
        <div class="page-header-top">
            <div class="container">
                <h1>Account <small>for registered user account</small></h1>
            </div>
        </div>
        <div class="page-header subnav">
            <h3>Change Password</h3>
        </div>
        <div class="row-fluid">
            <div class="span3">
                <ul class="nav nav-tabs nav-stacked">
                    <li><a href="<?php echo site_url('account') ?>">User Account</a></li>
                    <li class="active"><a href="<?php echo site_url('account/change_password') ?>">Change Password</a></li>
                </ul>
            </div>
            <div class="span9">


                <?php if (isset($freeze)): ?>
                    <div class="alert alert-success"><?php echo $freeze ?></div>
                <?php endif; ?>


                <?php if (isset($error)): ?>
                    <div class="alert alert-error"><?php echo $error ?></div>
                <?php endif; ?>


                <form action="<?php echo current_url() ?>" method="post" accept-charset="utf-8" class="well form-horizontal">
                    <fieldset>
                        <div class="control-group">
                            <label for="input01" class="control-label">Current Password</label>
                            <div class="controls">
                                <input type="password" name="old" value="" id="old">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="input01" class="control-label">New Password</label>
                            <div class="controls">
                                <input type="password" name="new" value="" id="new" pattern="^.{8}.*$">
                                <span class="help-inline">min. 8 character</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="input01" class="control-label">Retype Password</label>
                            <div class="controls">
                                <input type="password" name="new_confirm" value="" id="new_confirm" pattern="^.{8}.*$">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn">
                                Reset
                            </button>
                            <button class="btn btn-warning" name="submit" type="submit">
                                Submit
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>