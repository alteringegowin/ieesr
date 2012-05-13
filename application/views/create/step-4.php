<?php
$pribadi = $this->session->userdata('pribadi');
?>
<div style="float: right;">
    <img src="<?php echo $themes ?>img/hairdryer.png"  />
</div>
<h3>Peralatan Pribadi</h3>

<form id="form-pribadi" class="form-horizontal modalForm">
    <fieldset>	   		

        <div class="control-group">
            <label class="control-label" for="input01">1. Hair Dryer</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-14', $pribadi, '') ?>" name="item-14" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">2. Electronic Razer / Pisau Cukur Elektronik</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-15', $pribadi, '') ?>" name="item-15" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>


    </fieldset>
</form>


