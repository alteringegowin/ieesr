<?php
$pribadi = $this->session->userdata('pribadi');
?>
<h2>Peralatan Pribadi</h2>
<hr />

<form id="form-pribadi" class="form-horizontal modalForm">
    <fieldset>	   		

        <div class="control-group">
            <label class="control-label" for="input01">1. Hair Dryer</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="1000" total-data="t-item-14" rel="counted"  value="<?php echo element('item-14', $pribadi, '') ?>" name="item-14" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-14" id="t-item-14" value="<?php echo element('t-item-14', $pribadi, '') ?>"/>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">2. Electronic Razer / Pisau Cukur Elektronik</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="50" total-data="t-item-15" rel="counted"  value="<?php echo element('item-15', $pribadi, '') ?>" name="item-15" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-15" id="t-item-15" value="<?php echo element('t-item-15', $pribadi, '') ?>"/>
                </div>
            </div>
        </div>
        <input type="hidden" id="total_pribadi" name="total_pribadi" value="<?php echo element('total_pribadi', $pribadi, 0) ?>"/>


    </fieldset>
</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan Pribadi:</strong> <span class="" id="total_pribadi_text"><?php echo element('total_pribadi', $pribadi) ?></span> gram CO<sub>2</sub>ek
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
            
            var i=14;
            var total=0;
            for (i=14;i<=15;i++){
                var val = parseInt($("#t-item-"+i).val()) || 0;
                total = total + val;
            }
            $("#total_pribadi").val(total);
            $("#total_pribadi_text").html(total);
        })
        
        
    });
</script>

