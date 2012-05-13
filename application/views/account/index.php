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
                <form action="auth" method="post" accept-charset="utf-8" class="well form-horizontal">
                    <input type="hidden" name="id" value="1">
                    <fieldset>

                        <div class="control-group error">
                            <label class="control-label">Username</label>
                            <div class="controls">
                                <span class="input-large uneditable-input">user_name</span>
                                <span class="help-inline"><em>cannot change</em></span>
                            </div>
                        </div>
                        <hr>
                        <div class="control-group">
                            <label for="first_name" class="control-label">Name</label>
                            <div class="controls form-inline">
                                <input type="text" name="first_name" value="" id="first_name" placeholder="First Name">
                                <input type="text" name="last_name" value="" id="last_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="email" class="control-label">Email</label>
                            <div class="controls">
                                <input type="text" name="email" value="" id="email" placeholder="your@mail.com">
                                <span class="help-inline"><em>required</em></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="phone" class="control-label">Phone</label>
                            <div class="controls">
                                <input type="text" name="phone" value="" id="phone" placeholder="000-000-0000">
                                <span class="help-inline"><em>required</em></span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="company" class="control-label">Company Name</label>
                            <div class="controls">
                                <input type="text" name="company" value="" id="company" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="address" class="control-label">Address</label>
                            <div class="controls">
                                <textarea name="address" cols="40" rows="3" id="address"></textarea>
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