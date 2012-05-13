<div class="nav-collapse">
    <ul class="nav">
        <li class="active"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
        <li><a href="<?php echo site_url('keywords') ?>">Keywords</a></li>
        <li><a href="<?php echo site_url('member') ?>">Members</a></li>
    </ul>
    <ul class="nav pull-right">
        <li><a href="#"><span class="badge badge-warning">23</span></a></li>
        <li class="divider-vertical"></li>
        <li><a><?php echo date('M jS') ?></a></li>
        <li class="divider-vertical"></li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle " href="#">Hello New Member <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('account') ?>"><i class="icon-lock"></i> User Profile</a></li>
                <li><a href="<?php echo site_url('account/change_password') ?>"><i class="icon-lock"></i> Change Password</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('auth/logout') ?>"><i class="icon-off"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</div>