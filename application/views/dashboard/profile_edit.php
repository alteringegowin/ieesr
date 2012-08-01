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
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="input01">Nama</label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge" id="input01">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="input01">Email</label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge" id="input01">
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info">Save changes</button>
                                        <button class="btn btn-warning">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /dashboard content -->
        </div><!--/row-->
    </div><!--/span-->
</div><!--/row-->