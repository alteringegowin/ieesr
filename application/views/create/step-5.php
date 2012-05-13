<?php
$elektronik = $this->session->userdata('elektronik');
?>
<div style="float: right;">
    <img src="<?php echo $themes ?>img/console.png"  />
</div>
<h3>Elektronik Lainnya</h3>
<form id="form-elektronik" class="form-horizontal modalForm">
    <fieldset>	   		

        <div class="control-group">
            <label class="control-label" for="input01">1. DVD Player</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-16', $elektronik, '') ?>" name="item-16" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">2. Playstation PS2</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-17', $elektronik, '') ?>"  name="item-17" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">3. Xbox 360</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"  value="<?php echo element('item-18', $elektronik, '') ?>" name="item-18" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">4. Tape Radio</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"  value="<?php echo element('item-19', $elektronik, '') ?>" name="item-19" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">5. TV (CRT 21")</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-20', $elektronik, '') ?>"  name="item-20" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">6. TV (LCD 32")</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-21', $elektronik, '') ?>"  name="item-21" size="16" type="text"><span class="add-on">jam</span>
                </div>
            </div>
        </div>


    </fieldset>
</form>

