<div class="row-fluid">
    <div class="span12">
        <div class="page-header-top">
            <div class="container">
                <h1>Account <small>for registered user account</small></h1>
            </div>
        </div>
        <div class="page-header subnav">
            <h3>User Profile</h3>
        </div>
        <div class="row-fluid">
            <div class="span3">
                <ul class="nav nav-tabs nav-stacked">
                    <li class="active"><a href="<?php echo site_url('account') ?>">User Account</a></li>
                    <li><a href="<?php echo site_url('account/change_password') ?>">Change Password</a></li>
                </ul>
            </div>
            <div class="span9">


                <?php if (isset($freeze)): ?>
                    <div class="alert alert-success"><?php echo $freeze ?></div>
                <?php endif; ?>



                <form action="<?php echo current_url() ?>" method="post" accept-charset="utf-8" class="well form-horizontal">
                    <fieldset>

                        <div class="control-group error">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <span class="input-large uneditable-input"><?php echo $user->email ?></span>
                                <span class="help-inline"><em>cannot change</em></span>
                            </div>
                        </div>
                        <hr>
                        <div class="control-group">
                            <label for="first_name" class="control-label">Name</label>
                            <div class="controls form-inline">
                                <input type="text" name="name" value="<?php echo $user->username ?>" id="first_name" placeholder="First Name">
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="propinsi_id" class="control-label">Address</label>
                            <div class="controls">
                                <?php echo form_dropdown('propinsi_id', $ddPropinsi, $user->propinsi_id) ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn">
                                Reset
                            </button>
                            <button class="btn btn-warning" type="submit">
                                Submit	
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>