<?php
$komunikasi = $this->session->userdata('komunikasi');
?>
<h2>Informasi dan Komunikasi</h2>
<hr/>
<form id="form-komunikasi" class="form-horizontal modalForm">
    <fieldset>	   		


        <div class="control-group">
            <label class="control-label" for="input01">1. Charger Handphone</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="30" total-data="t-item-22" value="<?php echo element('item-22', $komunikasi, '') ?>" name="item-22" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-22" id="t-item-22" value="<?php echo element('t-item-22', $komunikasi, '') ?>"/>
                </div>
            </div>
        </div>   	

        <div class="control-group">
            <label class="control-label" for="input01">2. PC Desktop+Monitor</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="250" total-data="t-item-23" name="item-23"   value="<?php echo element('item-23', $komunikasi, '') ?>"size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-23" id="t-item-23" value="<?php echo element('t-item-23', $komunikasi, '') ?>"/>
                </div>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="input01">3. Laptop</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1"  constanta-id="45" total-data="t-item-24"  name="item-24" size="16" type="text" value="<?php echo element('item-24', $komunikasi, '') ?>"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-24" id="t-item-24" value="<?php echo element('t-item-24', $komunikasi, '') ?>"/>
                </div>
            </div>
        </div>

        <input type="hidden" id="total_komunikasi" name="total_komunikasi" value="<?php echo element('total_komunikasi', $komunikasi, 0) ?>"/>



    </fieldset>
</form>


<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Informasi dan Komunikasi:</strong> <span class="" id="total_komunikasi_text"><?php echo element('total_komunikasi', $komunikasi) ?></span> gram CO<sub>2</sub>ek
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
            
            var i=22;
            var total=0;
            for (i=22;i<=24;i++){
                var val = parseInt($("#t-item-"+i).val()) || 0;
                total = total + val;
            }
            $("#total_komunikasi").val(total);
            $("#total_komunikasi_text").html(total);
        })
        
        
    });
</script>