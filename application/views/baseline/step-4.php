<?php
$pribadi = $this->session->userdata('pribadi');
?>
<h2>Peralatan Pribadi</h2>
<hr />
<div class="well formInfo">
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/hairdryer') ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/hair-dryer.png" width="70"  />
            <p>Hair Dryer</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/razor') ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/electric_razor.png" width="30"  />
            <p>Personal Care</p>
        </a>
    </div>
    <div style="clear:both"></div>
</div>
<form id="form-pribadi" class="form-horizontal modalForm">
    <fieldset>	   		

        <div class="control-group">
            <label class="control-label" for="input01">1. Hair Dryer</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="1000" total-data="t-item-14" biaya-data="b-item-14" rel="counted"  value="<?php echo element('item-14', $pribadi, '') ?>" name="item-14" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-14" id="t-item-14" value="<?php echo element('t-item-14', $pribadi, '') ?>"/>
                    <input type="hidden" name="b-item-14" id="b-item-14" value="<?php echo element('b-item-14', $pribadi, '') ?>"/>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="input01">2. Electronic Razer / Pisau Cukur Elektronik</label>
            <div class="controls">
                <div class="input-append">
                    <input class="span1" constanta-id="50" total-data="t-item-15" biaya-data="b-item-15"  rel="counted"  value="<?php echo element('item-15', $pribadi, '') ?>" name="item-15" size="16" type="text"><span class="add-on">jam</span>
                    <input type="hidden" name="t-item-15" id="t-item-15" value="<?php echo element('t-item-15', $pribadi, '') ?>"/>
                    <input type="hidden" name="b-item-15" id="b-item-15" value="<?php echo element('b-item-15', $pribadi, '') ?>"/>
                </div>
            </div>
        </div>
        <input type="hidden" id="total_pribadi" name="total_pribadi" value="<?php echo element('total_pribadi', $pribadi, 0) ?>"/>
        <input type="hidden" id="total_biaya_pribadi" name="total_biaya_pribadi" value="<?php echo element('total_biaya_pribadi', $pribadi, 0) ?>"/>


    </fieldset>
</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan Pribadi:</strong> <span class="" id="total_pribadi_text"><?php echo element('total_pribadi', $pribadi) ?></span> gram CO<sub>2</sub>ek
    <br/>
    <strong>Total Biaya Pemakaian Listrik:</strong> Rp. <span id="total_biaya_pribadi_text">0</span>   &nbsp

</div>

<script type="text/javascript">
    $(document).ready(function(){
        
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        $("input[type=text]").change(function(){
            var val = parseInt($(this).val());
            var c = $(this).attr('constanta-id')
            var f = $(this).attr('total-data')
            var fb = $(this).attr('biaya-data')
            var t = c*val*PROPINSI_CONS;
            var b = c*val*0.65;
            $("#"+f).val(t);
            $("#"+fb).val(b);
            
            var i=14;
            var total=0;
            var total_b=0;
            for (i=14;i<=15;i++){
                var val = parseFloat($("#t-item-"+i).val()) || 0;
                var valb = parseFloat($("#b-item-"+i).val()) || 0;
                total = total + val;
                total_b = total_b + valb;
            }
            
            total = number_format(total,2,'.','');
            total_b = number_format(total_b,2,'.','');
            
            $("#total_pribadi").val(total);
            $("#total_pribadi_text").html(total);
            
            $("#total_biaya_pribadi").val(total_b);
            $("#total_biaya_pribadi_text").html(total_b);
        })
        
        
    });
</script>


