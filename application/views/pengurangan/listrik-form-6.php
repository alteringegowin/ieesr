<h2>Informasi dan Komunikasi</h2>
<hr/>

<div class="well formInfo">
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/charger') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/phone-charger-hi.png" width="70"  />
            <p>Charger Handphone</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/pc') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/pc-desktop.png" width="70"  />
            <p>PC Desktop</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/laptop') ?>" class="thumbnail pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/laptop.png" width="45"  />
            <p>Laptop</p>
        </a>
    </div>


    <div style="clear:both"></div>
</div>
<form id="form-step-6" class="form-horizontal modalForm">
    <fieldset>	   		

        <?php foreach ($fgroup[6] as $r): ?>
            <?php if (element('item-' . $r->id, $komunikasi)): ?>
                <div class="control-group">
                    <label class="control-label" for="input-komunikasi-<?php echo $r->id; ?>"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 count-komunikasi" rel-id="<?php echo $r->id ?>" name="jam-<?php echo $r->id; ?>" id="input-komunikasi-<?php echo $r->id; ?>" size="16" type="text" value="<?php echo element('item-' . $r->id, $komunikasi) ?>"><span class="add-on">jam</span>
                            <input type="hidden" name="total-item-<?php echo $r->id ?>" id="total-item-<?php echo $r->id ?>"  value="<?php echo element('t-item-' . $r->id, $komunikasi) ?>" />
                            <input type="hidden" name="total-biaya-item-<?php echo $r->id ?>" id="total-item-<?php echo $r->id ?>"  value="<?php echo element('b-item-' . $r->id, $komunikasi) ?>" />
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </fieldset>
    <input type="hidden" id="total_komunikasi" name="total_komunikasi" value="<?php echo element('total_komunikasi', $komunikasi, 0) ?>" />
    <input type="hidden" id="total_komunikasi_asli" name="total_komunikasi_asli" value="<?php echo element('total_komunikasi', $komunikasi, 0) ?>" />

    <input type="hidden" id="total_biaya_komunikasi" name="total_biaya_komunikasi" value="<?php echo element('total_biaya_komunikasi', $komunikasi, 0) ?>" />
    <input type="hidden" id="total_biaya_komunikasi_asli" name="total_biaya_komunikasi_asli" value="<?php echo element('total_biaya_komunikasi', $komunikasi, 0) ?>" />

</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan komunikasi:</strong> <span class="" id="total_komunikasi_text"><?php echo element('total_komunikasi', $komunikasi) ?></span> gram CO<sub>2</sub>ek
    <br/>
    <strong>Total Biaya Pemakaian Listrik:</strong> Rp. <span id="total_biaya_komunikasi_text"><?php echo element('total_biaya_komunikasi', $komunikasi) ?></span>   &nbsp

</div>



<script type="text/javascript">
    $(document).ready(function(){
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var crt = <?php echo json_encode($fgroup[6]) ?>;
        $.each(crt, function(i,v){
            if($('#input-komunikasi-'+v.id).length){
                v.item_hour= parseFloat($('#input-komunikasi-'+v.id).val());
            }
        });
        $('#form-step-6').delegate('.count-komunikasi','change',function(){
            var id = $(this).attr('rel-id');
            $.each(crt, function(i,v){
                if(v.id == id){
                    v.item_hour= parseFloat($('#input-komunikasi-'+id).val());
                }
            });
            recount_komunikasi();
        });
        
        
        function recount_komunikasi(){
            var total_komunikasi = 0;
            var total_t = 0;
            
            var total_biaya_komunikasi = 0;
            var total_b = 0;
            $.each(crt, function(i,v){
                if($('#input-komunikasi-'+v.id).length){
                    total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                    total_b = v.item_daya*v.item_hour*0.65;
                    if(isNaN(total_t)){
                        total_t = 0;
                        total_b = 0;
                    }
                    total_komunikasi += total_t;
                    total_biaya_komunikasi+= total_b;
                    $("#total-item-"+v.id).val(total_t);
                    $("#total-biaya-item-"+v.id).val(total_b);
                }
            });
            
            total_komunikasi= number_format(total_komunikasi,2,'.','');
            total_biaya_komunikasi= number_format(total_biaya_komunikasi,2,'.','');
            
            $("#total_komunikasi").val(total_komunikasi);
            $("#total_komunikasi_text").html(total_komunikasi);
            $("#total_biaya_komunikasi").val(total_biaya_komunikasi);
            $("#total_biaya_komunikasi_text").html(total_biaya_komunikasi);
                
        }
        
        
       
        
    });
</script>