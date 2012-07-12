
<div class="container dashboard">
    <div class="row">
        <div class="span3">
            <?php $this->load->view('_include/user_sidebar'); ?>
        </div><!--/span-->
        <div class="span9">
            <!-- dashboard container -->
            <div class="profileContainer">
                <!-- /dashboard header -->
                <div class="profileHeader">
                    <h3>Change Password</h3>
                    <hr />
                </div>
                <!-- /dashboard header -->

                <!-- dashboard Content -->
                <div class="profileContent">
                    <div class="row">
                        <div class="span9">

                            <div id="infoMessage"><?php echo $message; ?></div>

                            <?php echo form_open("dashboard/change_password"); ?>

                            <p>Old Password:<br />
                                <?php echo form_input($old_password); ?>
                            </p>

                            <p>New Password (at least <?php echo $min_password_length; ?> characters long):<br />
                                <?php echo form_input($new_password); ?>
                            </p>

                            <p>Confirm New Password:<br />
                                <?php echo form_input($new_password_confirm); ?>
                            </p>

                            <?php echo form_input($user_id); ?>
                            <p><?php echo form_submit('submit', 'Change'); ?></p>

                            <?php echo form_close(); ?>


                        </div>


                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /dashboard container -->

        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->