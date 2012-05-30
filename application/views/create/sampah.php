
<div id="main" class="container">
    <!-- Smart Wizard -->
    <div id="wizard" class="swMain">
        <ul>
            <li><a href="#step-1">
                    <label class="stepNumber">1</label>
                    <span class="stepDesc">
                        Sampah<br />
                    </span>
                </a></li>
        </ul>
        <div id="step-1">	
            <div style="float: right;">
                <img src="<?php echo $themes ?>img/organic.png" height="48" width="48"  />
            </div>
            <h3>Sampah Organik</h3>
            <form class="form-horizontal modalForm trash">
                <fieldset>	   		
                    <div class="control-group">
                        <label class="control-label" for="item-25">Berapa Sampah Organik Yang Dihasilkan?</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1" id="item-25" name="item-25" size="16" type="text"><span class="add-on">gram</span>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div style="float: right;">
                <img src="<?php echo $themes ?>img/paper-trash.png" height="48" width="48"  />
            </div>
            <h3>Sampah Kertas</h3>
            <form class="form-horizontal modalForm trash">
                <fieldset>	   		

                    <div class="control-group">
                        <label class="control-label" for="item-26">Berapa lembar kertas yang digunakan?</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1"  id="item-26"  name="item-26" size="16" type="text"><span class="add-on">gram</span>
                            </div>
                        </div>
                    </div>   		

                </fieldset>
            </form>
            <h3>Sampah Plastik</h3>
            <form class="form-horizontal modalForm trash">
                <fieldset>	   		   		
                    <div class="control-group">
                        <label class="control-label" for="item-27">Berapa botol Air Minum Dalam Kemasan (AMDK) yang dikonsumsi?</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1"  id="item-27" name="item-27"  size="16" type="text"><span class="add-on">gram</span>
                            </div>
                        </div>
                    </div>	   		

                </fieldset>
            </form>


        </div>

    </div>
    <!-- End SmartWizard Content --> 

</div>
<script>
    $(document).ready(function(){
        $('#wizard').smartWizard({
            contentCache:false,
            onFinish:onFinishCallback
        });
        function onFinishCallback(){
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('create/submit') ?>/sampah",
                data: {
                    'item-25':$("#item-25").val(),
                    'item-26':$("#item-26").val(),
                    'item-27':$("#item-27").val()
                }
            });  
            return true;
        }
    });
</script>