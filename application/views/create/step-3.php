<?php
$rumah_tangga = $this->session->userdata('rumah_tangga');
?>

<div style="float: right;">
    <img src="<?php echo $themes ?>img/washing.png"  />
</div>
<h3>Peralatan Rumah Tangga</h3>
<form id="form-rumah-tangga" class="form-horizontal modalForm">

    <fieldset>

        <div class="control-group">
            <label class="control-label" for="input01">1. Mesin Cuci</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"  value="<?php echo element('item-8', $rumah_tangga, '') ?>" size="16" type="text" name="item-8"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">2. Mesin Pengering</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"  value="<?php echo element('item-9', $rumah_tangga, '') ?>"   size="16" type="text" name="item-9"><span class="add-on">jam</span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">3. Setrika</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"   value="<?php echo element('item-10', $rumah_tangga, '') ?>"  size="16" type="text" name="item-10"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">4. Kipas Angin</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"    value="<?php echo element('item-11', $rumah_tangga, '') ?>" size="16" type="text" name="item-11"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">5. AC (1 PK)</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"   value="<?php echo element('item-12', $rumah_tangga, '') ?>"  size="16" type="text" name="item-12"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">6. Vacuum Cleaner</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"    value="<?php echo element('item-13', $rumah_tangga, '') ?>" size="16" type="text"  name="item-13"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

    </fieldset>
</form>

