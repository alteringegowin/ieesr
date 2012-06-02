
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
            <img src="<?php echo $themes?>img/organic.png" height="48" width="48"  />
        </div>
        <h3>Sampah Organik</h3>
        <form class="form-horizontal modalForm trash">
            <fieldset>	   		
                <?php if(element('item-25', $sampah)): ?>
                <div class="control-group">
                    <label class="control-label" for="input01">Sampah Organik dari 250 gram menjadi</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1" id="" size="16" type="text" value="<?php echo element('item-25', $sampah) ?>"><span class="add-on">gram</span>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </fieldset>
            <div style="float: right;">
                <img src="<?php echo $themes?>img/paper-trash.png" height="48" width="48"  />
            </div>
            <h3>Sampah Kertas</h3>
            <fieldset>	   		
                <?php if(element('item-26', $sampah)): ?>
                <div class="control-group">
                    <label class="control-label" for="input01">Dari <?php echo element('item-26', $sampah) ?> Lembar kertas menjadi</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1" id="" size="16" type="text" value="<?php echo element('item-26', $sampah) ?>"><span class="add-on">Lembar</span>
                        </div>
                    </div>
                </div>   		
                <?php endif; ?>

            </fieldset>
            <h3>Sampah Plastik</h3>
            <fieldset>	   		   		

                <?php if(element('item-27', $sampah)): ?>
                <div class="control-group">
                    <label class="control-label" for="input01">Air Minum Dalam Kemasan (AMDK) dari  <?php echo element('item-27', $sampah) ?> botol menjadi</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1" id="" size="16" type="text" value="<?php echo element('item-27', $sampah) ?>"><span class="add-on">Botol</span>
                        </div>
                    </div>
                </div>	   		
                <?php endif; ?>

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
            $('.buttonFinish').attr('href', 'http://google.com');
        }
    });
</script>