
<div class="container dashboard">
    <?php if (isset($msg_danger) && $msg_danger): ?>
        <div class="row">
            <div class="span12">
                <div class="alert alert-danger" style="text-align:center">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <?php echo $msg_danger; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="span3">
            <?php $this->load->view('_include/user_sidebar'); ?>
        </div><!--/span-->
        <div class="span9">
            <!-- dashboard container -->
            <div class="dashboardContainer">
                <!-- /dashboard header -->
                <div class="dashboardHeader">
                    <h3>Selamat Datang, User</h3>
                    <hr />
                </div>
                <!-- /dashboard header -->

                <!-- dashboard Content -->
                <div class="dashboardContent">
                    <div class="row">
                        <div class="span3">
                            <div class="well">
                                Profil Emisi Gas Rumah Kaca Langkah berikut ini dimaksudkan untuk menghitung produksi emisi gas rumah kaca dari aktivitas harian yang dilakukan. Silahkan menghitung emisi harian anda.
                                <p><a href="listrik.php" class="btn btn-primary btn-small disabled">Isi Baseline Emisi &raquo;</a></p>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="alert alert-success">
                                <p>Anda telah menghitung penggunaan emisi anda, silahkan melanjutkan dengan melakukan komitmen pengurangan emisi</p>
                                <p><a class="btn btn-primary btn-small" href="../iesr3s/listrik.php">Pengurangan Emisi</a>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="alert alert-success">
                                <p>Anda telah berkomitmen mengurangi emisi karbon, silakan cetak komitmen Anda di bawah ini</p>
                                <a class="btn btn-primary btn-small" href="#"><i class="icon-download-alt icon-white"></i> Download Komitmen</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /dashboard container -->

        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->