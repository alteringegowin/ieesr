
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
                        <table class="table table-striped table-bordered table-condensed">
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
                                    <td><?php echo $user->pekerjaan ?></td>
                                </tr>

                                <tr>
                                    <td>Tipe Rumah / Total Penghuni</td>
                                    <td><?php echo $user->tipe_rumah . '/' . $user->total_penghuni ?> Orang</td>
                                </tr>

                                <tr>
                                    <td>Kota</td>
                                    <td><?php echo $user->kota ?></td>
                                </tr>

                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?php echo $user->jenis_kelamin ?></td>
                                </tr>
                                <tr>
                                    <td>Usia</td>
                                    <td><?php echo $user->usia ?></td>
                                </tr>
                                <tr>
                                    <td>Pengeluaran</td>
                                    <td><?php echo $user->pengeluaran ?></td>
                                </tr>

                                <tr>
                                    <td>Total Mobil</td>
                                    <td><?php echo $user->total_mobil ?></td>
                                </tr>
                                <tr>
                                    <td>Total Motor</td>
                                    <td><?php echo $user->total_motor ?></td>
                                </tr>
                                <?php if ($user->jenis_lainnya): ?>
                                    <tr>
                                        <td>Total <?php echo $user->jenis_lainnya ?></td>
                                        <td><?php echo $user->total_lainnya ?></td>
                                    </tr>
                                <?php endif; ?>


                                <tr>
                                    <td>Jarak Tempuh</td>
                                    <td><?php echo $user->jarak_tempuh ?></td>
                                </tr>


                                <tr>
                                    <td>AMDK</td>
                                    <td><?php echo $user->amdk ?></td>
                                </tr>

                                <tr>
                                    <td>Total Transit</td>
                                    <td><?php echo $user->total_transit?></td>
                                </tr>
                                

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <!-- /dashboard content -->

        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->