<h2>Peralatan Rumah Tangga</h2>
<hr />
<div class="well formInfo">
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/setrika') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/ironing.png" width="40"  />
            <p>Setrika</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/ac') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/ac.png" width="75"  />
            <p>AC (1 PK)</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/wash') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/washing-machine-icon.png" alt="washing-machine-icon" width="30" />
            <p>Mesin Cuci</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/dry') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/drying-machine-icon.png" width="30"  />
            <p>Mesin Pengering</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/fan') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/fan.png" width="30"  />
            <p>Kipas Angin</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/vacuum') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/vacuum.png" width="25"  />
            <p>Vacuum Cleaner</p>
        </a>
    </div>

    <div style="clear:both"></div>
</div>

<form id="form-step-3" class="form-horizontal modalForm">
    <fieldset>
        <?php foreach ($fgroup[3] as $r): ?>
            <?php if (element('item-' . $r->id, $rumah_tangga)): ?>
                <div class="control-group">
                    <label class="control-label" for="rt-<?php echo $r->id ?>"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 countrt" rel-id="<?php echo $r->id ?>" name="jam-<?php echo $r->id ?>"  id="jam-<?php echo $r->id ?>" size="16" type="text" value="<?php echo element('item-' . $r->id, $rumah_tangga) ?>"><span class="add-on">jam</span>
                            <input type="hidden" name="total-item-<?php echo $r->id ?>" id="total-item-<?php echo $r->id ?>" value="<?php echo element('t-item-' . $r->id, $rumah_tangga) ?> " />
                            <input type="hidden" name="total-biaya-item-<?php echo $r->id ?>" id="total-biaya-item-<?php echo $r->id ?>" value="<?php echo element('b-item-' . $r->id, $rumah_tangga) ?> " />
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


    </fieldset>
    <input type="hidden" id="total_rumah_tangga" name="total_rumah_tangga" value="<?php echo element('total_rumah_tangga', $rumah_tangga, 0) ?>" />
    <input type="hidden" id="total_rumah_tangga_asli" name="total_rumah_tangga_asli" value="<?php echo element('total_rumah_tangga', $rumah_tangga, 0) ?>" />

    <input type="hidden" id="total_biaya_rumah_tangga" name="total_biaya_rumah_tangga" value="<?php echo element('total_biaya_rumah_tangga', $rumah_tangga, 0) ?>" />
    <input type="hidden" id="total_biaya_rumah_tangga_asli" name="total_biaya_rumah_tangga_asli" value="<?php echo element('total_biaya_rumah_tangga', $rumah_tangga, 0) ?>" />

</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Rumah Tangga:</strong> <span class="" id="total_rumah_tangga_text"><?php echo element('total_rumah_tangga', $rumah_tangga) ?></span> gram CO<sub>2</sub>ek
    <br/>
    <strong>Total Biaya Pemakaian Listrik:</strong> Rp. <span id="total_biaya_rumah_tangga_text"><?php echo element('total_biaya_rumah_tangga', $rumah_tangga) ?></span>   &nbsp
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var crt = <?php echo json_encode($fgroup[3]) ?>;
        $.each(crt, function(i,v){
            if($('#jam-'+v.id).length){
                v.item_hour= parseFloat($('#jam-'+v.id).val());
                //$("#total-item-"+i).val(total_t);
            }
        });
        $('#form-step-3').delegate('.countrt','change',function(){
            var id = $(this).attr('rel-id');
            $.each(crt, function(i,v){
                if(v.id == id){
                    v.item_hour= parseFloat($('#jam-'+id).val());
                }
            });
            recount_rumah_tangga();
        });
        
        
        function recount_rumah_tangga(){
            var total_rumah_tangga = 0;
            var total_t = 0;
            var total_biaya_rumah_tangga = 0;
            var total_b = 0;
            
            $.each(crt, function(i,v){
                if($('#jam-'+v.id).length){
                    total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                    total_b = v.item_daya*v.item_hour*0.65;
                    if(isNaN(total_t)){
                        total_t = 0;
                        total_b = 0;
                    }
                    total_rumah_tangga += total_t;
                    total_biaya_rumah_tangga += total_b;
                    $("#total-item-"+v.id).val(total_t);
                    $("#total-biaya-item-"+v.id).val(total_b);
                    
                }
            });
            
            
            total_rumah_tangga = number_format(total_rumah_tangga,2,'.','');
            total_biaya_rumah_tangga= number_format(total_biaya_rumah_tangga,2,'.','');
            
            $("#total_rumah_tangga").val(total_rumah_tangga);
            $("#total_rumah_tangga_text").html(total_rumah_tangga);
                
            $("#total_biaya_rumah_tangga").val(total_biaya_rumah_tangga);
            $("#total_biaya_rumah_tangga_text").html(total_biaya_rumah_tangga);
                
        }
        
       
        
    });
</script>