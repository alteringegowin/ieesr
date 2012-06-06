<h2>Elektronik Lainnya</h2>
<hr />
<form id="form-step-5" class="form-horizontal modalForm">
    <fieldset>	   		

        <?php foreach ($fgroup[5] as $r): ?>
            <?php if ( element('item-' . $r->id, $elektronik) ): ?>
                <div class="control-group">
                    <label class="control-label" for="input-elektronik-<?php echo $r->id; ?>"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 count-elektronik" rel-id="<?php echo $r->id ?>" name="jam-<?php echo $r->id; ?>" id="input-elektronik-<?php echo $r->id; ?>" size="16" type="text" value="<?php echo element('item-' . $r->id, $elektronik) ?>"><span class="add-on">jam</span>
                            <input type="hidden" name="total-item-<?php echo $r->id ?>" id="total-item-<?php echo $r->id ?>"  value="<?php echo element('t-item-' . $r->id, $elektronik) ?>" />
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </fieldset>
    <input type="hidden" id="total_elektronik" name="total_elektronik" value="<?php echo element('total_elektronik', $elektronik, 0) ?>" />
    <input type="hidden" id="total_elektronik_asli" name="total_elektronik_asli" value="<?php echo element('total_elektronik', $elektronik, 0) ?>" />

</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan elektronik:</strong> <span class="" id="total_elektronik_text"><?php echo element('total_elektronik', $elektronik) ?></span> gram CO<sub>2</sub>ek
</div>



<script type="text/javascript">
    $(document).ready(function(){
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var crt = <?php echo json_encode($fgroup[5]) ?>;
        $.each(crt, function(i,v){
            if($('#input-elektronik-'+v.id).length){
                v.item_hour= parseFloat($('#input-elektronik-'+v.id).val());
            }
        });
        $('#form-step-5').delegate('.count-elektronik','change',function(){
            var id = $(this).attr('rel-id');
            $.each(crt, function(i,v){
                if(v.id == id){
                    v.item_hour= parseFloat($('#input-elektronik-'+id).val());
                }
            });
            recount_elektronik();
        });
        
        
        function recount_elektronik(){
            var total_elektronik = 0;
            var total_t = 0;
            $.each(crt, function(i,v){
                if($('#input-elektronik-'+v.id).length){
                    total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                    if(isNaN(total_t)){
                        total_elektronik = 0;
                    }
                    total_elektronik += total_t;
                    $("#total-item-"+v.id).val(total_t);
                    
                }
            });
            
            if(total_elektronik > $("#total_elektronik_asli").val()){
                $('#form-step-5').each (function(){
                    this.reset();
                });
                
                alert(' Nilai Total Emisi elektronik Tidak Berkurang');
            }else{
                $("#total_elektronik").val(total_elektronik);
                $("#total_elektronik_text").html(total_elektronik);
                
            }
        }
        
        
       
        
    });
</script>