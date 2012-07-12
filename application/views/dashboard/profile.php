
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
                    <h3>Data Profile</h3>
                    <hr />
                </div>
                <!-- /dashboard header -->

                <!-- dashboard Content -->
                <div class="profileContent">
                    <div class="row">
                        <div class="span9">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="span3">Email</td>
                                        <td><?php echo $user->email ?></td>
                                    </tr>

                                    <tr>
                                        <td>Nama</td>
                                        <td><?php echo $user->fullname ?></td>
                                    </tr>
                                    <tr><td>Propinsi</td>
                                        <td><?php echo get_propinsi($user->propinsi_id) ?></td>
                                    </tr>

                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>Deni</td>
                                    </tr>

                                    <tr>
                                        <td>Tipe Rumah / Total Penghuni</td>
                                        <td><?php echo $user->tipe_rumah ?></td>
                                    </tr>

                                    <tr>
                                        <td>Total Penghuni</td>
                                        <td><?php echo $user->total_penghuni ?> Orang</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /dashboard container -->

        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->