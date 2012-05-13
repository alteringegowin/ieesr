<?php
$dapur = $this->session->userdata('dapur');
?>

<div style="float: right;">
    <img src="<?php echo $themes ?>img/oven.png"  />
</div>
<h3>Peralatan Dapur</h3>
<form id="form-dapur" class="form-horizontal modalForm">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="item-2">1. Pemakaian kulkas &gt; 300 lt </label>
            <div class="controls">
                <label class="radio inline">
                    <input type="radio" name="item-2" value="1" <?php echo the_checkbox_dapur('item-2', 1) ?>> ya
                </label>
                <label class="radio inline">
                    <input type="radio" name="item-2" value="0"  <?php echo the_checkbox_dapur('item-2', 0) ?>> Tidak
                </label>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">2. Pemakaian kulkas 300 - 500 lt</label>
            <div class="controls">
                <label class="radio inline">
                    <input type="radio" id="inlineCheckbox1" name="item-3" value="1" <?php echo the_checkbox_dapur('item-3', 1) ?>> ya
                </label>
                <label class="radio inline">
                    <input type="radio" id="inlineCheckbox2" name="item-3"  value="0 <?php echo the_checkbox_dapur('item-3', 0) ?>"> Tidak
                </label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">3. Pemakaian kulkas &lt; 500 lt</label>
            <div class="controls">
                <label class="radio inline">
                    <input type="radio" id="inlineCheckbox1"  name="item-4" value="1" <?php echo the_checkbox_dapur('item-4', 1) ?>> ya
                </label>
                <label class="radio inline">
                    <input type="radio" id="inlineCheckbox2"  name="item-4" value="0" <?php echo the_checkbox_dapur('item-4', 0) ?>> Tidak
                </label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">4. Freezer (Pendingin daging/es krim)</label>
            <div class="controls">
                <label class="radio inline">
                    <input type="radio" id="inlineCheckbox1" value="1"  name="item-5" <?php echo the_checkbox_dapur('item-5', 1) ?>> ya
                </label>
                <label class="radio inline">
                    <input type="radio" id="inlineCheckbox2" value="0"  name="item-5" <?php echo the_checkbox_dapur('item-4', 0) ?>> Tidak
                </label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">5. Rice Cooker</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-6', $dapur, '') ?>" size="16" type="text" name="item-6"><span class="add-on">jam</span>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">6. Microwave Oven</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"  value="<?php echo element('item-7', $dapur, '') ?>"  size="16" type="text" name="item-7"><span class="add-on">jam</span>
                </div>
            </div>
        </div>


    </fieldset>
</form>

