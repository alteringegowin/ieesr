<h2>Peralatan Rumah Tangga</h2>
<hr />


<form id="form-step-3" class="form-horizontal modalForm">
    <fieldset>
        <?php foreach ($fgroup[3] as $r): ?>
            <?php if (element('item-' . $r->id, $rumah_tangga)): ?>
                <div class="control-group">
                    <label class="control-label" for="rt-<?php echo $r->id ?>"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 countrt" rel-id="<?php echo $r->id ?>" name="jam-<?php echo $r->id ?>"  id="jam-<?php echo $r->id ?>" size="16" type="text" value="<?php echo element('item-' . $r->id, $rumah_tangga) ?>"><span class="add-on">jam</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


    </fieldset>
    <input type="hidden" id="total_rumah_tangga" name="total_rumah_tangga" value="<?php echo element('total_rumah_tangga', $rumah_tangga, 0) ?>" />
    <input type="hidden" id="total_rumah_tangga_asli" name="total_rumah_tangga_asli" value="<?php echo element('total_rumah_tangga', $rumah_tangga, 0) ?>" />

</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Rumah Tangga:</strong> <span class="" id="total_rumah_tangga_text"><?php echo element('total_rumah_tangga', $rumah_tangga) ?></span> gram CO<sub>2</sub>ek
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var crt = <?php echo json_encode($fgroup[3]) ?>;
        $.each(crt, function(i,v){
            if($('#rt-'+v.id).length){
                v.item_hour= parseFloat($('#rt-'+v.id).val());
            }
        });
        $('#form-step-3').delegate('.countrt','change',function(){
            var id = $(this).attr('rel-id');
            $.each(crt, function(i,v){
                if(v.id == id){
                    v.item_hour= parseFloat($('#rt-'+id).val());
                }
            });
            recount_rumah_tangga();
        });
        
        
        function recount_rumah_tangga(){
            var total_rumah_tangga = 0;
            var total_t = 0;
            $.each(crt, function(i,v){
                if($('#rt-'+v.id).length){
                    total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                    if(isNaN(total_t)){
                        
                    }else{
                        total_rumah_tangga += total_t;
                    }
                    
                }
            });
            
            if(total_rumah_tangga > $("#total_rumah_tangga_asli").val()){
                $('#form-step-3').each (function(){
                    this.reset();
                });
                alert('Nilai Total Emisi Rumah Tangga Tidak Berkurang');
            }else{
                $("#total_rumah_tangga").val(total_rumah_tangga);
                $("#total_rumah_tangga_text").html(total_rumah_tangga);
                
            }
        }
        
       
        
    });
</script>