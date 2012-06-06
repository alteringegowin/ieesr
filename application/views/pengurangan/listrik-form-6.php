
<h2>Informasi dan Komunikasi</h2>
<hr />
<form id="form-step-6" class="form-horizontal modalForm">
    <fieldset>	   		

        <?php foreach ($fgroup[6] as $r): ?>
            <?php if ( element('item-' . $r->id, $komunikasi) ): ?>
                <div class="control-group">
                    <label class="control-label" for="input-komunikasi-<?php echo $r->id; ?>"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 count-komunikasi" rel-id="<?php echo $r->id ?>" name="jam-<?php echo $r->id; ?>" id="input-komunikasi-<?php echo $r->id; ?>" size="16" type="text" value="<?php echo element('item-' . $r->id, $komunikasi) ?>"><span class="add-on">jam</span>
                            <input type="hidden" name="total-item-<?php echo $r->id ?>" id="total-item-<?php echo $r->id ?>"  value="<?php echo element('t-item-' . $r->id, $komunikasi) ?>" />
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </fieldset>
    <input type="hidden" id="total_komunikasi" name="total_komunikasi" value="<?php echo element('total_komunikasi', $komunikasi, 0) ?>" />
    <input type="hidden" id="total_komunikasi_asli" name="total_komunikasi_asli" value="<?php echo element('total_komunikasi', $komunikasi, 0) ?>" />

</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan komunikasi:</strong> <span class="" id="total_komunikasi_text"><?php echo element('total_komunikasi', $komunikasi) ?></span> gram CO<sub>2</sub>ek
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
            $.each(crt, function(i,v){
                if($('#input-komunikasi-'+v.id).length){
                    total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                    if(isNaN(total_t)){
                        total_t = 0;
                    }
                    total_komunikasi += total_t;
                    $("#total-item-"+v.id).val(total_t);
                }
            });
            
            if(total_komunikasi > $("#total_komunikasi_asli").val()){
                $('#form-step-6').each (function(){
                    this.reset();
                });
                
                alert(' Nilai Total Emisi komunikasi Tidak Berkurang');
            }else{
                $("#total_komunikasi").val(total_komunikasi);
                $("#total_komunikasi_text").html(total_komunikasi);
                
            }
        }
        
        
       
        
    });
</script>