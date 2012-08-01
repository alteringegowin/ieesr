<?php
$elektronik = $this->session->userdata('elektronik');
?>
<h2>Elektronik Lainnya</h2>
<hr/>
<div class="well formInfo">
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/radio') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/radio.png" width="45"  />
            <p>Radio</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/lcd') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/lcd.png" width="45"  />
            <p>TV LCD</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/crt') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/crt.png" width="35"  />
            <p>TV CRT(21")</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/dvd') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/dvd.png" width="60"  />
            <p>DVD</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/ps') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/playstation2.png" width="70"  />
            <p>Playstation 2</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/xbox') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/xbox360.png" width="70"  />
            <p>Xbox 360</p>
        </a>
    </div>

    <div style="clear:both"></div>
</div>
<form id="form-elektronik" class="form-horizontal modalForm">
    <fieldset>	   		
        <?php $no = 1; ?>
        <?php foreach ($fgroup[5] as $r): ?>
            <div class="control-group" id="rt-<?php echo $r->id ?>">
                <label class="control-label" for="input01"><?php echo $no++ ?>. <?php echo $r->item_name ?></label>
                <div class="controls">
                    <div class="input-append">
                        <input id="input-cel-<?php echo $r->id ?>" class="span1 countcel" rel-id="<?php echo $r->id ?>" value="<?php echo element('item-' . $r->id, $elektronik, '') ?>" size="16" type="text" name="item-<?php echo $r->id ?>"><span class="add-on">jam</span>
                        <input type="hidden" name="t-item-<?php echo $r->id ?>" id="t-item-<?php echo $r->id ?>" value="<?php echo element('t-item-' . $r->id, $elektronik, '') ?>"/>
                        <input type="hidden" name="b-item-<?php echo $r->id ?>" id="b-item-<?php echo $r->id ?>" value="<?php echo element('b-item-' . $r->id, $elektronik, '') ?>"/>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </fieldset>
    <input type="hidden" id="total_elektronik" name="total_elektronik" value="<?php echo element('total_elektronik', $elektronik, 0) ?>"/>
    <input type="hidden" id="total_biaya_elektronik" name="total_biaya_elektronik" value="<?php echo element('total_biaya_elektronik', $elektronik, 0) ?>"/>

</form>


<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Elektronik Lainnya:</strong> <span class="" id="total_elektronik_text"><?php echo element('total_elektronik', $elektronik) ?></span> gram CO<sub>2</sub>ek
    <br> 
    <strong>Total Biaya Pemakaian Listrik:</strong> Rp. <span id="total_biaya_elektronik_text">0</span>   &nbsp

</div>


<script type="text/javascript">
    $(document).ready(function(){
        
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var cel = <?php echo json_encode($fgroup[5]) ?>;
        $.each(cel, function(i,v){
            var cs = parseFloat($('#input-cel-'+v.id).val());
            if(isNaN(cs)){
                cs = 0;
            }else{
                v.item_hour = cs;
            }
        });
        $('#form-elektronik').delegate('.countcel','change',function(){
            var id = $(this).attr('rel-id');
            $.each(cel, function(i,v){
                if(v.id == id){
                    v.item_hour= parseFloat($('#input-cel-'+id).val());
                }
            });
            recount_elektronik();
        });
        
        
        function recount_elektronik(){
            var total_elektronik = 0;
            var total_biaya_elektronik = 0;
            var total_t = 0;
            $.each(cel, function(i,v){
                total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                total_b = v.item_daya*v.item_hour*0.65;
                if(isNaN(total_t)){
                    $("#t-item-"+v.id).val(0);
                    $("#b-item-"+v.id).val(0);
                }else{
                    $("#t-item-"+v.id).val(total_t);
                    $("#b-item-"+v.id).val(total_b);
                    total_elektronik += total_t;
                    total_biaya_elektronik += total_b;
                }
                    
            });
            
            total_elektronik= number_format(total_elektronik,2,'.','');
            total_biaya_elektronik = number_format(total_biaya_elektronik,2,'.','');
            
            $("#total_elektronik").val(total_elektronik);
            $("#total_elektronik_text").html(total_elektronik);
            
            $("#total_biaya_elektronik").val(total_biaya_elektronik);
            $("#total_biaya_elektronik_text").html(total_biaya_elektronik);
        }
        
    });
</script>