<?php
$elektronik = $this->session->userdata('elektronik');
?>
<h2>Elektronik Lainnya</h2>
<hr/>
<form id="form-elektronik" class="form-horizontal modalForm">
    <fieldset>	   		

        <div class="control-group">
            <label class="control-label" for="input01">1. DVD Player</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="25" total-data="t-item-16" value="<?php echo element('item-16', $elektronik, '') ?>" name="item-16" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-16" id="t-item-16" value="<?php echo element('t-item-16', $elektronik, '') ?>"/>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">2. Playstation PS2</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="1000" total-data="t-item-17" value="<?php echo element('item-17', $elektronik, '') ?>"  name="item-17" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-17" id="t-item-17" value="<?php echo element('t-item-17', $elektronik, '') ?>"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">3. Xbox 360</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="185" total-data="t-item-18"  value="<?php echo element('item-18', $elektronik, '') ?>" name="item-18" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-18" id="t-item-18" value="<?php echo element('t-item-18', $elektronik, '') ?>"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">4. Tape Radio</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="60" total-data="t-item-19"  value="<?php echo element('item-19', $elektronik, '') ?>" name="item-19" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-19" id="t-item-19" value="<?php echo element('t-item-19', $elektronik, '') ?>"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">5. TV (CRT 21")</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="100" total-data="t-item-20"  value="<?php echo element('item-20', $elektronik, '') ?>"  name="item-20" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-20" id="t-item-20" value="<?php echo element('t-item-20', $elektronik, '') ?>"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input01">6. TV (LCD 32")</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="125" total-data="t-item-21" value="<?php echo element('item-21', $elektronik, '') ?>"  name="item-21" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-21" id="t-item-21" value="<?php echo element('t-item-21', $elektronik, '') ?>"/>
                </div>
            </div>
        </div>

        <input type="hidden" id="total_elektronik" name="total_elektronik" value="<?php echo element('total_elektronik', $elektronik, 0) ?>"/>


    </fieldset>
</form>


<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Elektronik Lainnya:</strong> <span class="" id="total_elektronik_text"><?php echo element('total_elektronik', $elektronik) ?></span> gram CO<sub>2</sub>ek
</div>


<script type="text/javascript">
    $(document).ready(function(){
        
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        $("input[type=text]").change(function(){
            var val = parseInt($(this).val());
            var c = $(this).attr('constanta-id')
            var f = $(this).attr('total-data')
            var t = c*val*PROPINSI_CONS;
            $("#"+f).val(t)
            
            var i=16;
            var total=0;
            for (i=16;i<=21;i++){
                var val = parseInt($("#t-item-"+i).val()) || 0;
                total = total + val;
            }
            $("#total_elektronik").val(total);
            $("#total_elektronik_text").html(total);
        })
        
        
    });
</script>