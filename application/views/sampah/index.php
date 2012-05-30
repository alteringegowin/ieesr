<?php
$session_sampah = $this->session->userdata('sampah');
?>
<div id="main" class="container">
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

            <div style="float: right;">
                <img src="<?php echo $themes ?>img/organic.png" height="48" width="48"  />
            </div>
            <h3>Sampah Organik</h3>

            <form id="sampah" class="form-horizontal modalForm trash">
                <fieldset>	   		
                    <div class="control-group">
                        <label class="control-label" for="item-25">Berapa Sampah Organik Yang Dihasilkan?</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1 recount" id="item-25" name="item-25" size="16" type="text" value="<?php echo element('item-25', $session_sampah) ?>">
                                <span class="add-on">gram</span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div style="float: right;">
                    <img src="<?php echo $themes ?>img/paper-trash.png" height="48" width="48"  />
                </div>
                <h3>Sampah Kertas</h3>
                <fieldset>	   		

                    <div class="control-group">
                        <label class="control-label" for="item-26">Berapa lembar kertas yang digunakan?</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1 recount"  id="item-26"  name="item-26" size="16" type="text" value="<?php echo element('item-26', $session_sampah) ?>"><span class="add-on">gram</span>
                            </div>
                        </div>
                    </div>   		

                </fieldset>
                <h3>Sampah Plastik</h3>
                <fieldset>	   		   		
                    <div class="control-group">
                        <label class="control-label" for="item-27">Berapa botol Air Minum Dalam Kemasan (AMDK) yang dikonsumsi?</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1 recount"  id="item-27" name="item-27"  size="16" type="text" value="<?php echo element('item-27', $session_sampah) ?>"><span class="add-on">gram</span>
                            </div>
                        </div>
                    </div>	   		
                </fieldset>

                <input type="hidden" name="total_organik"  value="<?php echo element('total_organik', $session_sampah) ?>" id="total_organik" />
                <input type="hidden" name="total_kertas" value="<?php echo element('total_kertas', $session_sampah) ?>" id="total_kertas" />
                <input type="hidden" name="total_plastik" value="<?php echo element('total_plastik', $session_sampah) ?>" id="total_plastik" />
                <input type="hidden" name="total_sampah" value="<?php echo element('total_sampah', $session_sampah) ?>" id="total_sampah" />
            </form>

            <div class="alert alert-info" style="text-align:right">
                <strong>Total Emisi Sampah:</strong> <span class="" id="total_sampah_text"><?php echo isset($session_sampah) ? number_format($session_sampah['total_sampah'],4) : 0; ?></span> gram CO<sub>2</sub>ek
            </div>


        </div>

    </div>
    <!-- End SmartWizard Content --> 

</div>
<script>
    $(document).ready(function(){
        
        var PROPINSI_CONS = '<?php echo get_koef_propinsi($user->propinsi_id) ?>';
        $('#wizard').smartWizard({
            contentCache:false,
            onFinish:onFinishCallback
        });
        function onFinishCallback(){
            
            var f = $('#sampah').serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('create/submit') ?>/sampah",
                data: f
            });  
            window.location.href = '<?php echo site_url('transportasi') ?>';
            return false;
        }
        
         
        $(".recount").change(function(){
            
            PROPINSI_CONS = 0.08;
            
            var total = 0;
            var organik = $("#item-25").val();
            var kertas = $("#item-26").val();
            var plastik = $("#item-27").val();
            
            organik = isNaN(organik) ? 0 : organik;
            kertas = isNaN(kertas) ? 0 : kertas;
            plastik = isNaN(plastik) ? 0 : plastik;
            total = isNaN(total) ? 0 : total;
            
            var total_organik = ((organik/1000)*0.3*289) + ((organik/1000)*4*72);
            var total_kertas = kertas*70*3.24;
            var total_plastik = plastik*0.9444*PROPINSI_CONS*1000;
            
            var total_sampah = total_kertas+total_organik+total_plastik;
            
            $("#total_organik").val(total_organik);
            $("#total_kertas").val(total_kertas);
            $("#total_plastik").val(total_plastik);
            $("#total_sampah_text").html(total_sampah);
            $("#total_sampah").val(total_sampah);
        });
        
    });
</script>