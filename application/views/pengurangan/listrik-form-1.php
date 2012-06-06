
<h2>Penerangan</h2>
<hr />
<div style="clear:both"></div>
<div class="well formInfo">
    <div class="imgInfo">
        <img src="<?php echo $themes ?>img/icons/neon-CFL.png" />
        <p>Lampu pijar</p>
    </div>
    <div class="imgInfo">
        <img src="<?php echo $themes ?>img/icons/neon-CFL.png"  />
        <p>Neon - CFL</p>
    </div>
    <div class="imgInfo">
        <img src="<?php echo $themes ?>img/icons/neon-CFL.png"  />
        <p>LED</p>
    </div>
    <div style="clear:both"></div>
</div>
<form  id="form-step-1" class="form-horizontal">
    <fieldset>
        <div class="control-group">	
            <label class="" for="input01">Anda menggunakan jumlah, jenis dan lama Lampu dikurangi menjadi:</label>

            <?php $i = 1; ?>
            <?php foreach ($lampu['item'] as $k => $r): ?>
                <div id="input-<?php echo $k; ?>" class="sclonedInput" rel="<?php echo $k ?>">
                    <div class="input-append">
                        <?php echo form_dropdown('tipelampu-' . $k, config_item('app_dropdown_lampu'), $r['tipe'], 'class="change-type" rel="' . $k . '" id="select-' . $k . '"') ?>
                    </div>
                    <div class="input-append">
                        <input class="span1 recount" name="daya-<?php echo $k ?>" id="daya-<?php echo $k ?>" size="16" type="text" value="<?php echo $r['daya'] ?>"><span class="add-on">watt</span>
                    </div>
                    <div class="input-append">
                        <input class="span1 recount" name="waktu-<?php echo $k ?>" id="waktu-<?php echo $k ?>" size="16" type="text" value="<?php echo $r['waktu'] ?>"><span class="add-on">Jam</span>
                    </div>
                    <input type="hidden" name="total-lampu-<?php echo $k ?>" id="total-lampu-<?php echo $k ?>" value="" />
                    <a class="btn btn-danger btn-small delete-lampu" rel="input-<?php echo $k; ?>" href="#"><i class="icon-remove icon-white"></i></a>
                </div>
                <?php $i++; ?>
                <br />
            <?php endforeach; ?>
        </div>
    </fieldset>
    <input type="hidden" id="total_lampu_all" name="total_lampu_all" value="<?php echo isset($lampu['total']) ? $lampu['total'] : 0; ?>" />
    <input type="hidden" id="total_lampu_asli" name="total_lampu_asli" value="<?php echo isset($lampu['total']) ? $lampu['total'] : 0; ?>" />
</form>


<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Penerangan:</strong> <span class="" id="total_all_text"><?php echo isset($lampu['total']) ? number_format($lampu['total'], 4) : 0; ?></span> gram CO<sub>2</sub>ek
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        $('#form-step-1').delegate('.change-type','change',recount_lampu);
        $('#form-step-1').delegate('.recount','keyup',recount_lampu);
        $('#form-step-1').delegate('.delete-lampu','click',function(){
            var rel = $(this).attr('rel');
            
            
            $('#'+rel).remove();
            recount_lampu();
            return false;
            
        });
        
        function recount_lampu(){
            
            var total_all = 0;
            $(".sclonedInput").each(function(is,v){
                var daya = $("#daya-"+is).val();
                var waktu = $("#waktu-"+is).val();
                var total_item = waktu*daya*PROPINSI_CONS;
                if(isNaN(total_item)){
                    total_item = 0;
                }
                $("#total-lampu-"+is).val(total_item);
                
            })
            
            
            var lampu_before = $("#total_lampu_asli").val();
            if(total_all > lampu_before){
                $('#form-step-1').each (function(){
                    this.reset();
                });
                alert('Total Emisi Tidak Berkurang');
                
            }else{
                $("#total_lampu_all").val(total_all);
                $("#total_all_text").html(total_all);
            }
            
        }
        
    })
</script>