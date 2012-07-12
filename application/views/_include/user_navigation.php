<ul class="nav nav-list">
    <li class="<?php echo check_user_nav_current('index') ?>"><a href="<?php echo site_url('dashboard') ?>"><i class="icon-home"></i> Dashboard</a></li>
    <li class="<?php echo check_user_nav_current('profile') ?>"><a href="<?php echo site_url('dashboard/profile') ?>"><i class="icon-user"></i> Profile</a></li>
    <li class="<?php echo check_user_nav_current('change_password') ?>"><a href="<?php echo site_url('dashboard/change_password') ?>"><i class="icon-lock"></i> Ganti Password</a></li>
    <li><a href="<?php echo site_url('dashboard/komitmen') ?>"><i class="icon-download-alt"></i> Download Komitmen (PDF)</a></li>
    <li><a href="<?php echo site_url('auth/logout') ?>"><i class="icon-off"></i> Logout</a></li>
</ul>