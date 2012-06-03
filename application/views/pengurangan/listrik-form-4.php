<h2>Peralatan Pribadi</h2>
<hr />
<form id="form-step-4" class="form-horizontal modalForm">
    <fieldset>	   		
        <?php foreach ($fgroup[4] as $r): ?>
            <?php if (element('item-' . $r->id, $pribadi)): ?>
                <div class="control-group">
                    <label class="control-label" for="input01"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 count-pribadi" rel-id="<?php echo $r->id ?>" id="input-pribadi-<?php echo $r->id ?>"  name="jam-<?php echo $r->id ?>" size="16" type="text" value="<?php echo element('item-' . $r->id, $pribadi) ?>"><span class="add-on">jam</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


    </fieldset>
    <input type="text" id="total_pribadi" value="<?php echo element('total_pribadi', $pribadi, 0) ?>" />
    <input type="text" id="total_pribadi_asli" value="<?php echo element('total_pribadi', $pribadi, 0) ?>" />

</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan Pribadi:</strong> <span class="" id="total_pribadi_text"><?php echo element('total_pribadi', $pribadi) ?></span> gram CO<sub>2</sub>ek
</div>


<script type="text/javascript">
    $(document).ready(function(){
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var crt = <?php echo json_encode($fgroup[4]) ?>;
        $.each(crt, function(i,v){
            if($('#input-pribadi-'+v.id).length){
                v.item_hour= parseFloat($('#input-pribadi-'+v.id).val());
            }
        });
        $('#form-step-4').delegate('.count-pribadi','change',function(){
            var id = $(this).attr('rel-id');
            $.each(crt, function(i,v){
                if(v.id == id){
                    v.item_hour= parseFloat($('#input-pribadi-'+id).val());
                }
            });
            recount_pribadi();
        });
        
        
        function recount_pribadi(){
            var total_pribadi = 0;
            var total_t = 0;
            $.each(crt, function(i,v){
                if($('#input-pribadi-'+v.id).length){
                    total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                    if(isNaN(total_t)){
                        
                    }else{
                        total_pribadi += total_t;
                    }
                    
                }
            });
            
            if(total_pribadi > $("#total_pribadi_asli").val()){
                $('#form-step-4').each (function(){
                    this.reset();
                });
                
                alert(total_pribadi +' Nilai Total Emisi Pribadi Tidak Berkurang');
            }else{
                $("#total_pribadi").val(total_pribadi);
                $("#total_pribadi_text").html(total_pribadi);
                
            }
        }
        
        
       
        
    });
</script>