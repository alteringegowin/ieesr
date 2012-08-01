<?php
$session_sampah = $this->session->userdata('sampah');
?>
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
            <h3>Sampah Kertas</h3>
            <fieldset>	   		

                <div class="control-group">
                    <label class="control-label" for="item-26">Berapa lembar kertas yang digunakan?</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1 recount"  id="item-26"  name="item-26" size="16" type="text" value="<?php echo element('item-26', $session_sampah) ?>"><span class="add-on">Lembar</span>
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
                            <input class="span1 recount"  id="item-27" name="item-27"  size="16" type="text" value="<?php echo element('item-27', $session_sampah) ?>"><span class="add-on">Botol</span>
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
            <strong>Total Emisi Sampah:</strong> <span class="" id="total_sampah_text"><?php echo isset($session_sampah) ? $session_sampah['total_sampah'] : 0; ?></span> gram CO<sub>2</sub>ek
        </div>


    </div>

</div>
<!-- End SmartWizard Content --> 

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
                url: "<?php echo site_url('baseline/finish') ?>/sampah",
                data: f
            }).done(function() { 
                window.location.href = '<?php echo site_url('baseline/transportasi') ?>';
            });  
            return false;
        }
        
        function number_format( number, decimals, dec_point, thousands_sep ) {
            // http://kevin.vanzonneveld.net
            // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
            // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
            // +     bugfix by: Michael White (http://crestidg.com)
            // +     bugfix by: Benjamin Lupton
            // +     bugfix by: Allan Jensen (http://www.winternet.no)
            // +    revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)    
            // *     example 1: number_format(1234.5678, 2, '.', '');
            // *     returns 1: 1234.57     
 
            var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
            var d = dec_point == undefined ? "," : dec_point;
            var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
            var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        }
        $(".recount").change(function(){
            
            
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