<h2>Peralatan Dapur</h2>
<hr />
<div style="clear:both"></div>
<div class="well formInfo">
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/rice-cooker') ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/rice-cooker.png" width="50"  />
            <p>Rice Cooker</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/microwave') ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/microwave.png" width="70"  />
            <p>Microwave</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/kulkas-1'); ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/kulkas-1.png" width="50"  />
            <p>Kulkas &lt; 300 lt</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/kulkas-2') ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/kulkas-2.png" width="50"  />
            <p>Kulkas 300 - 500 lt</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/kulkas-3') ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/kulkas-3.png" width="20"  />
            <p>Kulkas &gt; 500</p>
        </a>
    </div>

    <div class="imgInfo">
        <a href="<?php echo site_url('popup/freezer') ?>" class="pop thumbnail fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/freezer-2.png" width="60"  />
            <p>Freezer</p>
        </a>
    </div>

    <div style="clear:both"></div>
</div>
<form id="form-step-2" class="form-horizontal modalForm">
    <fieldset>
        <?php for ($i = 2; $i <= 5; $i++): ?>
            <?php if (element('t-item-' . $i, $dapur)): ?>
                <div class="control-group" id="dapur-<?php echo $i ?>">
                    <label class="control-label" for="input01"><?php echo $item[$i]->item_name ?></label>
                    <div class="controls">
                        <input name="jam-<?php echo $i ?>" id="jam-<?php echo $i ?>"  type="hidden" value="<?php echo element('item-' . $i, $dapur) ?>">
                        <input type="hidden" name="total-item-<?php echo $i ?>" id="total-item-<?php echo $i ?>" value="<?php echo element('total-item-' . $i, $dapur) ?>" />
                        <input type="hidden" name="total-biaya-item-<?php echo $i ?>" id="total-biaya-item-<?php echo $i ?>" value="<?php echo element('b-item-' . $i, $dapur) ?>" />
                        <a class="btn btn-danger btn-small delete-dapur" rel-id="<?php echo $i ?>" href="#"><i class="icon-remove icon-white"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endfor; ?>

        <?php for ($i = 6; $i <= 7; $i++): ?>
            <?php if (element('t-item-' . $i, $dapur)): ?>
                <div class="control-group" id="dapur-<?php echo $i ?>">
                    <label class="control-label" for="jam-<?php echo $i ?>"><?php echo $item[$i]->item_name ?> dari <?php echo element('item-' . $i, $dapur) ?> jam menjadi</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 countdapur" name="jam-<?php echo $i ?>" id="jam-<?php echo $i ?>" rel-id="<?php echo $i ?>" size="16" type="text" value="<?php echo element('item-' . $i, $dapur) ?>"><span class="add-on">jam</span>
                            <input type="hidden" name="total-item-<?php echo $i ?>" id="total-item-<?php echo $i ?>" value="<?php echo element('total-item-' . $i, $dapur) ?>" />
                            <input type="hidden" name="total-biaya-item-<?php echo $i ?>" id="total-biaya-item-<?php echo $i ?>" value="<?php echo element('b-item-' . $i, $dapur) ?>" />
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endfor; ?>


    </fieldset>
    <input type="hidden" id="total_dapur" name="total_dapur" value="<?php echo element('total_dapur', $dapur, 0) ?>" />
    <input type="hidden" id="total_biaya_dapur" name="total_biaya_dapur" value="<?php echo element('total_biaya_dapur', $dapur, 0) ?>" />
    <input type="hidden" id="total_dapur_asli" name="total_dapur_asli" value="<?php echo element('total_dapur', $dapur, 0) ?>" />
    <input type="hidden" id="total_biaya_dapur_asli" name="total_biaya_dapur_asli" value="<?php echo element('total_biaya_dapur', $dapur, 0) ?>" />
</form>

<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Peralatan Dapur:</strong> <span class="" id="total_dapur_text"><?php echo isset($dapur['total_dapur']) ? number_format($dapur['total_dapur'], 2) : 0; ?></span> gram CO<sub>2</sub>ek
    <br/>
    <strong>Total Biaya Pemakaian Listrik:</strong> Rp. <span id="total_biaya_dapur_text"><?php echo isset($dapur['total_biaya_dapur']) ? number_format($dapur['total_biaya_dapur'], 2) : 0; ?></span>   &nbsp;

</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        var cdapur = <?php echo json_encode(config_item('app_dapur_constanta', true)) ?>;
        var TOTAL_PENGHUNI = '<?php echo $user->total_penghuni ? $user->total_penghuni : 1; ?>';
        $.each(cdapur, function(i,v){
            if($('#jam-'+i).length){
                cdapur[i].j= parseFloat($('#jam-'+i).val());
            }
        });
        $('#form-step-2').delegate('.countdapur','change',function(){
            var id = $(this).attr('rel-id');
            cdapur[id].j= parseFloat($(this).val());
            recount_dapur();
        });
        $('#form-step-2').delegate('.delete-dapur','click',function(){
            var id = $(this).attr('rel-id');
            $("#dapur-"+id).remove();
            recount_dapur();
            return false;
        });
        
        function recount_dapur(){
            var total_dapur = 0;
            var total_biaya_dapur = 0;
            var total_t = 0;
            var total_b = 0;
            $.each(cdapur, function(i,v){
                if($('#dapur-'+i).length){
                    total_t = cdapur[i].c*cdapur[i].j*PROPINSI_CONS;
                    total_b = cdapur[i].c*cdapur[i].j*0.65;
                    
                    $("#total-item-"+i).val(total_t);
                    if(isNaN(total_dapur)){
                        total_t=0;
                        total_b=0;
                    }
                    total_dapur += total_t;
                    total_biaya_dapur += total_b;
                    
                }
                
                total_dapur = total_dapur/TOTAL_PENGHUNI;
                
                total_dapur = number_format(total_dapur,2,'.','');
                total_biaya_dapur= number_format(total_biaya_dapur,2,'.','');
            });
            if(total_dapur > $("#total_dapur_asli").val()){
                $('#form-step-2').each (function(){
                    this.reset();
                });
                alert('Nilai Total Emisi Dapur Tidak Berkurang');
            }else{
                
                $("#total_biaya_dapur").val(total_biaya_dapur);
                $("#total_biaya_dapur_text").html(total_biaya_dapur);
                
                $("#total_dapur").val(total_dapur);
                $("#total_dapur_text").html(total_dapur);
                
            }
        }
       
        
    });
</script>
