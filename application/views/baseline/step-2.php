<?php
$dapur = $this->session->userdata('dapur');
?>
<h2>Peralatan Dapur</h2>
<hr />
<div style="clear:both"></div>
<div class="well formInfo">
    <div class="imgInfo">
        <a href="<?php echo site_url('create/pop/rice-cooker') ?>" class="pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/rice-cooker.png" width="40"  />
            <p>Rice Cooker</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('create/pop/microwave') ?>" class="pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/microwave.png" width="70"  />
            <p>Microwave</p>
        </a>
    </div>

    <div class="imgInfo">
        <img src="<?php echo $themes ?>img/icons/kulkas.png" width="30"  />
        <p>Kulkas</p>
    </div>

    <div class="imgInfo">
        <img src="<?php echo $themes ?>img/icons/freezer.png" width="50"  />
        <p>Freezer</p>
    </div>

    <div style="clear:both"></div>
</div>


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

                <input type="hidden" id="t-item-2" name="t-item-2" value="<?php echo element('t-item-2', $dapur, 0) ?>"/>
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
                <input type="hidden" id="t-item-3" name="t-item-3" value="<?php echo element('t-item-3', $dapur, 0) ?>"/>
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

            <input type="hidden" id="t-item-4" name="t-item-4" value="<?php echo element('t-item-4', $dapur, 0) ?>"/>
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

            <input type="hidden" id="t-item-5" name="t-item-5" value="<?php echo element('t-item-5', $dapur, 0) ?>"/>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">5. Rice Cooker</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" value="<?php echo element('item-6', $dapur, '') ?>" size="16" type="text" name="item-6"><span class="add-on">jam</span>
                </div>
            </div>
            <input type="hidden" id="t-item-6" name="t-item-6" value="<?php echo element('t-item-6', $dapur, 0) ?>"/>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">6. Microwave Oven</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"  value="<?php echo element('item-7', $dapur, '') ?>"  size="16" type="text" name="item-7"><span class="add-on">jam</span>
                </div>
            </div>
            <input type="hidden" id="t-item-7" name="t-item-7" value="<?php echo element('t-item-7', $dapur, 0) ?>"/>
        </div>
    </fieldset>
    <input type="hidden" id="total_dapur" name="total_dapur" value="<?php echo element('total_dapur', $dapur, 0) ?>"/>
</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan Dapur:</strong> <span class="" id="total_dapur_text"><?php echo element('total_dapur', $dapur, 0) ?></span> gram CO<sub>2</sub>ek
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var TOTAL_PENGHUNI = '<?php echo $user->total_penghuni ? $user->total_penghuni : 1; ?>';
        var k_item_2 = 1300;
        var k_item_3 = 150;
        var k_item_4 = 170;
        var k_item_5 = 195;
        var k_item_6 = 500;
        var k_item_7 = 850;
        
        $("input[name=item-2]").change(function(){
            if($(this).val() == 1){
                $("#t-item-2").val(k_item_2*24*PROPINSI_CONS);
            }else{
                $("#t-item-2").val('0');
            }
        });
        
        $("input[name=item-3]").change(function(){
            if($(this).val() == 1){
                $("#t-item-3").val(k_item_3*24*PROPINSI_CONS);
            }else{
                $("#t-item-3").val('0');
            }
        });
        
        $("input[name=item-4]").change(function(){
            if($(this).val() == 1){
                $("#t-item-4").val(k_item_4*24*PROPINSI_CONS);
            }else{
                $("#t-item-4").val('0');
            }
        });
        
        $("input[name=item-5]").change(function(){
            if($(this).val() == 1){
                $("#t-item-5").val(k_item_5*24*PROPINSI_CONS);
            }else{
                $("#t-item-5").val('0');
            }
        });
        
        $("input[name=item-6]").change(function(){
            var v = $(this).val();
            $("#t-item-6").val(k_item_6*v*PROPINSI_CONS);
        });
        $("input[name=item-7]").change(function(){
            var v = $(this).val();
            $("#t-item-7").val(k_item_7*v*PROPINSI_CONS);
        });
        
        $("input").change(function(){
            var total = eval($("#t-item-2").val()+'+'+$("#t-item-3").val()+'+'+$("#t-item-4").val());
            var total = eval(total+'+'+$("#t-item-5").val()+'+'+$("#t-item-6").val()+'+'+$("#t-item-7").val());
            total = total/TOTAL_PENGHUNI;
            $("#total_dapur").val(total);
            $("#total_dapur_text").html(total);
        })
    });
</script>
