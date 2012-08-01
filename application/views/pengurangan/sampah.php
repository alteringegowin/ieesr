
<!-- Smart Wizard -->
<div id="wizard" class="swMain">

    <ul>
        <li><a href="#step-1">
                <label class="stepNumber">1</label>
                <span class="stepDesc">
                    Sampah<br />
                </span>
            </a></li>
    </ul>
    <div id="step-1">	
    <div class="well formInfo">
			<div class="imgInfo">
				<a href="<?php echo site_url('popup/organic') ?>" class="thumbnail pop fancybox.ajax">
				<img src="<?php echo $themes ?>img/icons/sampah-organik.png" width="60"  />
				<p>Sampah Organik</p>
				</a>
			</div>
			<div class="imgInfo">
				<a href="<?php echo site_url('popup/paper') ?>" class="thumbnail pop fancybox.ajax">
				<img src="<?php echo $themes ?>img/icons/kertas.png" width="38"  />
				<p>Sampah Kertas</p>
				</a>
			</div>
			<div class="imgInfo">
				<a href="<?php echo site_url('popup/plastic') ?>" class="thumbnail pop fancybox.ajax">
				<img src="<?php echo $themes ?>img/icons/botol.png" width="17"  />
				<p>Sampah Plastik</p>
				</a>
			</div>
			<div style="clear:both"></div>
			</div>
        <h3>Sampah Organik</h3>
        <form id="form-sampah" class="form-horizontal modalForm trash">
            <fieldset>	   		
                <?php if ( element('item-25', $sampah) ): ?>
                    <div class="control-group">
                        <label class="control-label" for="input01">Sampah Organik dari <?php echo element('item-25', $sampah) ?> gram menjadi</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1 recount" name="item-25" id="item-25" size="16" type="text" value="<?php echo element('item-25', $sampah) ?>"><span class="add-on">gram</span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </fieldset>
            <h3>Sampah Kertas</h3>
            <fieldset>	   		
                <?php if ( element('item-26', $sampah) ): ?>
                    <div class="control-group">
                        <label class="control-label" for="input01">Dari <?php echo element('item-26', $sampah) ?> Lembar kertas menjadi</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1 recount" name="item-26" id="item-26" size="16" type="text" value="<?php echo element('item-26', $sampah) ?>"><span class="add-on">Lembar</span>
                            </div>
                        </div>
                    </div>   		
                <?php endif; ?>

            </fieldset>
            <h3>Sampah Plastik</h3>
            <fieldset>	   		   		

                <?php if ( element('item-27', $sampah) ): ?>
                    <div class="control-group">
                        <label class="control-label" for="input01">Air Minum Dalam Kemasan (AMDK) dari  <?php echo element('item-27', $sampah) ?> botol menjadi</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1 recount" name="item-27" id="item-27" size="16" type="text" value="<?php echo element('item-27', $sampah) ?>"><span class="add-on">Botol</span>
                            </div>
                        </div>
                    </div>	   		
                <?php endif; ?>

            </fieldset>
            <input type="hidden" name="total_organik"  value="<?php echo element('total_organik', $sampah) ?>" id="total_organik" />
            <input type="hidden" name="total_kertas" value="<?php echo element('total_kertas', $sampah) ?>" id="total_kertas" />
            <input type="hidden" name="total_plastik" value="<?php echo element('total_plastik', $sampah) ?>" id="total_plastik" />
            <input type="hidden" name="total_sampah" value="<?php echo element('total_sampah', $sampah) ?>" id="total_sampah" />

            <input type="hidden" name="total_organik_asli"  value="<?php echo element('total_organik', $sampah) ?>" id="total_organik_asli" />
            <input type="hidden" name="total_kertas_asli" value="<?php echo element('total_kertas', $sampah) ?>" id="total_kertas_asli" />
            <input type="hidden" name="total_plastik_asli" value="<?php echo element('total_plastik', $sampah) ?>" id="total_plastik_asli" />
            <input type="hidden" name="total_sampah_asli" value="<?php echo element('total_sampah', $sampah) ?>" id="total_sampah_asli" />
        </form>

        <div class="alert alert-info" style="text-align:right">
            <strong>Total Emisi Sampah:</strong> <span class="" id="total_sampah_text"><?php echo element('total_sampah', $sampah) ?></span> gram CO<sub>2</sub>ek
        </div>

    </div>

</div>
<!-- End SmartWizard Content --> 

</div>
<script>
    $(document).ready(function(){
        $('#wizard').smartWizard({
            contentCache:false,
            onFinish:onFinishCallback
        });
        function onFinishCallback(){
            var c = $('#form-sampah').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('pengurangan/submit') ?>/sampah",
                data: {sampah:c}
            }).done(function() { 
                window.location.href = '<?php echo site_url('pengurangan/transportasi') ?>';
            });  
            return false;
        }
        
        
        $(".recount").change(function(){
            
            var PROPINSI_CONS = <?php echo get_koef_propinsi($user->propinsi_id) ?>;
            var total = 0;
            var organik = $("#item-25").val();
            var kertas = $("#item-26").val();
            var plastik = $("#item-27").val();
            
            organik = isNaN(organik) ? 0 : organik;
            kertas = isNaN(kertas) ? 0 : kertas;
            plastik = isNaN(plastik) ? 0 : plastik;
            total = isNaN(total) ? 0 : total;
            
            var total_organik = organik*0.3747;
            var total_kertas = kertas*70*3.24;
            var total_plastik = plastik*841.5;
            var total_sampah = total_kertas+total_organik+total_plastik;
            
            $("#total_organik").val(number_format(total_organik,2,'.',''));
            $("#total_kertas").val(number_format(total_kertas,2,'.',''));
            $("#total_plastik").val(number_format(total_plastik,2,'.',''));
            $("#total_sampah_text").html(number_format(total_sampah,2,'.',''));
            $("#total_sampah").val(number_format(total_sampah,2,'.',''));
        });
    });
</script>