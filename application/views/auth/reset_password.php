<div class="row">
    <div class="span6 offset3">
        <h3>Reset Password</h3>
        <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php echo form_open('auth/reset_password/' . $code); ?>

        <p>New Password (at least <?php echo $min_password_length; ?> characters long):<br />
            <?php echo form_input($new_password); ?>
        </p>

        <p>Confirm New Password:<br />
            <?php echo form_input($new_password_confirm); ?>
        </p>

        <?php echo form_input($user_id); ?>
        <?php echo form_hidden($csrf); ?>
        <p><?php echo form_submit('submit', 'Change'); ?></p>

        <?php echo form_close(); ?>

    </div>
</div>
