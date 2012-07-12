
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
<form  id="form-listrik" class="form-horizontal">
    <fieldset>
        <div class="control-group">	
            <label class="" for="input01">Anda menggunakan jumlah, jenis dan lama Lampu dikurangi menjadi:</label>
            <div id="c">
                <?php foreach ($lampus['tipe'] as $k => $v): ?>
                    <div class="controls" style="margin-left: 207px">
                        <div class="input-append">
                            <select class="span2 recount"  name="tipe[<?php echo $k ?>]">
                                <option selected="selected"><?php echo $v ?></option>
                                <option value="">=============</option>
                                <option>LED</option>
                                <option>Neon - CFL</option>
                                <option>Bohlam - Lampu Pijar</option>
                            </select>
                        </div>
                        <div class="input-append">
                            <input class="span1 recount" size="16" type="text" name="daya[<?php echo $k ?>]" value="<?php echo element($k, $lampus['daya'], 0) ?>"><span class="add-on">watt</span>
                        </div>
                        <div class="input-append">
                            <input class="span1 recount" size="16" type="text"  name="waktu[<?php echo $k ?>]" value="<?php echo element($k, $lampus['waktu'], 0) ?>"><span class="add-on">Jam</span>
                        </div>
                        <a href="#" class="btnDelListrik"><i class="icon-remove"></i></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="koef_propinsi" value="<?php echo $koef_propinsi ?>" />
    <input type="hidden" id="total_lampu_all" name="total_lampu_all" value="<?php echo isset($lampus['total_lampu']) ? $lampus['total_lampu'] : 0; ?>" />
    <input type="hidden" id="total_lampu_asli" name="total_lampu_asli" value="<?php echo isset($lampus['total_lampu']) ? $lampus['total_lampu'] : 0; ?>" />
</form>


<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi Penerangan:</strong> <span class="" id="total_all_text"><?php echo isset($lampus['total_lampu']) ? number_format($lampus['total_lampu'], 4) : 0; ?></span> gram CO<sub>2</sub>ek
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        $("#form-listrik").unbind('click').delegate('.btnDelListrik','click',function(){
            $(this).parents("div:first").remove();
            total_listrik(); 
           
            return false;
        });
    
        function total_listrik(){
            var s = $("#form-listrik").serialize();
            $.ajax({
                type: 'POST',
                url: SITE_URL+'/pengurangan/total/lampu',
                data: s
            }).done(function(t) { 
                $("#total_all_text").html(t);
                $("#total_lampu_all").val(t);
            });
            return false;
        }
        $("#btn-total-lampu").click(total_listrik);
        $("#form-listrik").delegate('.recount','blur',total_listrik);
        
    })
</script>