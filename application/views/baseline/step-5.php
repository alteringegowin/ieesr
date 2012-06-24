<?php
$elektronik = $this->session->userdata('elektronik');
?>
<h2>Elektronik Lainnya</h2>
<hr/>
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
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </fieldset>
    <input type="hidden" id="total_elektronik" name="total_elektronik" value="<?php echo element('total_elektronik', $elektronik, 0) ?>"/>

</form>


<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Elektronik Lainnya:</strong> <span class="" id="total_elektronik_text"><?php echo element('total_elektronik', $elektronik) ?></span> gram CO<sub>2</sub>ek
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
            var total_t = 0;
            $.each(cel, function(i,v){
                total_t = v.item_daya*v.item_hour*PROPINSI_CONS;
                if(isNaN(total_t)){
                    $("#t-item-"+v.id).val(0);
                }else{
                    $("#t-item-"+v.id).val(total_t);
                    total_elektronik += total_t;
                }
                    
            });
            
            $("#total_elektronik").val(total_elektronik);
            $("#total_elektronik_text").html(total_elektronik);
        }
        
    });
</script>