<?php
$rumah_tangga = $this->session->userdata('rumah_tangga');
?>
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
<form id="form-rumah-tangga" class="form-horizontal modalForm">

    <fieldset>
        <?php $no = 1; ?>
        <?php foreach ($fgroup[3] as $r): ?>
            <div class="control-group" id="rt-<?php echo $r->id ?>">
                <label class="control-label" for="input01"><?php echo $no++ ?>. <?php echo $r->item_name ?></label>
                <div class="controls">
                    <div class="input-append">
                        <input id="input-rt-<?php echo $r->id ?>" class="span1 countrt" rel-id="<?php echo $r->id ?>" value="<?php echo element('item-' . $r->id, $rumah_tangga, '') ?>" size="16" type="text" name="item-<?php echo $r->id ?>"><span class="add-on">jam</span>
                        <input type="hidden" name="t-item-<?php echo $r->id ?>" id="t-item-<?php echo $r->id ?>" value="<?php echo element('t-item-' . $r->id, $rumah_tangga, '') ?>"/>
                        <input type="hidden" name="b-item-<?php echo $r->id ?>" id="b-item-<?php echo $r->id ?>" value="<?php echo element('b-item-' . $r->id, $rumah_tangga, '') ?>"/>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </fieldset>
    <input type="hidden" id="total_rumah_tangga" name="total_rumah_tangga" value="<?php echo element('total_rumah_tangga', $rumah_tangga, 0) ?>"/>
    <input type="hidden" id="total_biaya_rumah_tangga" name="total_biaya_rumah_tangga" value="<?php echo element('total_biaya_rumah_tangga', $rumah_tangga, 0) ?>"/>

</form>


<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan Rumah Tangga:</strong> <span class="" id="total_rumah_tangga_text"><?php echo element('total_rumah_tangga', $rumah_tangga) ?></span> gram CO<sub>2</sub>ek
    <br/>
    <strong>Total Biaya Pemakaian Listrik:</strong> Rp. <span id="total_biaya_rumah_tangga_text">0</span>   &nbsp
</div>


<script type="text/javascript">
    $(document).ready(function(){
        
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var crt = <?php echo json_encode($fgroup[3]) ?>;
        $.each(crt, function(i,v){
            var cs = parseFloat($('#input-rt-'+v.id).val());
            if(isNaN(cs)){
                cs = 0;
            }else{
                v.item_hour = cs;
            }
        });
        $('#form-rumah-tangga').delegate('.countrt','change',function(){
            var id = $(this).attr('rel-id');
            $.each(crt, function(i,v){
                if(v.id == id){
                    v.item_hour= parseFloat($('#input-rt-'+id).val());
                }
            });
            recount_rumah_tangga();
        });
        
        
        function recount_rumah_tangga(){
            var total_biaya_rumah_tangga = 0;
            var total_rumah_tangga = 0;
            var total_t = 0;
            var total_b = 0;
            $.each(crt, function(i,v){
                total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                total_b = v.item_daya*v.item_hour*0.65;
                if(isNaN(total_t)){
                    $("#t-item-"+v.id).val(0);
                    $("#b-item-"+v.id).val(0);
                }else{
                    $("#t-item-"+v.id).val(total_t);
                    $("#b-item-"+v.id).val(total_b);
                    total_rumah_tangga += total_t;
                    total_biaya_rumah_tangga += total_b;
                }
                    
            });
            
            var TOTAL_PENGHUNI = '<?php echo $user->total_penghuni ? $user->total_penghuni : 1; ?>';
            total_rumah_tangga = total_rumah_tangga/TOTAL_PENGHUNI;
            
            total_rumah_tangga = number_format(total_rumah_tangga,2,'.','');
            total_biaya_rumah_tangga = number_format(total_biaya_rumah_tangga,2,'.','');
            
            $("#total_rumah_tangga").val(total_rumah_tangga);
            $("#total_rumah_tangga_text").html(total_rumah_tangga);
            
            $("#total_biaya_rumah_tangga").val(total_biaya_rumah_tangga);
            $("#total_biaya_rumah_tangga_text").html(total_biaya_rumah_tangga);
        }
        
        
    });
</script>