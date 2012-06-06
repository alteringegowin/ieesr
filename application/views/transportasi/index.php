<?php
$transportasi_darat = $this->session->userdata('darat');
$transportasi_udara = $this->session->userdata('udara');
?>
<div id="main" class="container">
    <!-- Smart Wizard -->
    <div id="wizard" class="swMain">
        <ul>
            <li><a href="#step-1">
                    <label class="stepNumber">1</label>
                    <span class="stepDesc">
                        Transportasi Darat<br />
                    </span>
                </a>
            </li>
            <li><a href="#step-2">
                    <label class="stepNumber">2</label>
                    <span class="stepDesc">
                        Transportasi Non Darat<br />
                    </span>
                </a>
            </li>
        </ul>
        <div id="step-1">	
            <div style="width:720px;">
                <div style="float: right;">
                    <img src="<?php echo $themes ?>img/bus.png" height="48" width="48"  />
                </div>
                <h3>Transportasi Jarak Dekat</h3>
                <p>Lorem Ipsum Dolor sit amet</p>
                <form id="jarak-dekat" class="form-horizontal modalForm trans">
                    <fieldset>	   		
                        <div class="control-group">
                            <label class="control-label" for="input01">Pilih Kendaraan</label>
                            <div class="controls">
                                <label for="inlineCheckbox1" class="radio inline">
                                    <input name="tipe" type="radio" id="inlineCheckbox1" value="pribadi"> Pribadi
                                </label>
                                <label for="inlineCheckbox2" class="radio inline">
                                    <input name="tipe" type="radio" id="inlineCheckbox2" value="umum"> Umum
                                </label>
                            </div>
                        </div>

                        <div id="jarak_or_konsumsi" class="control-group">
                            <label class="control-label">&nbsp;</label>
                            <div class="controls">
                                <label for="check" class="radio inline">
                                    <input name="pribaditipe" type="radio" id="check" value="jarak">Jarak
                                </label>
                                <label for="check2" class="radio inline">
                                    <input name="pribaditipe" type="radio" id="check2" value="mingguan"> Biaya Bahan Bakar Mingguan
                                </label>
                            </div>
                        </div>
                        <div id="jarak">
                            <div class="control-group">
                                <label class="control-label" for="input01"></label>
                                <div class="controls">
                                    <select id="select_pribadi" class="span2" name="tipe_pribadi">
                                        <option value="">--Pilih--</option>
                                        <option value="2">Mobil Pribadi - CityCar (Bensin &lt; 1200cc)</option>
                                        <option value="3">Mobil Pribadi - Bensin 1500cc</option>
                                        <option value="4">Mobil Pribadi - Bensin &gt; 2000cc</option>
                                        <option value="5">Mobil Pribadi - CityCar (Diesel &lt; 1200cc)</option>
                                        <option value="6">Mobil Pribadi - Diesel 1500cc</option>
                                        <option value="7">Mobil Pribadi - Diesel &gt; 2000cc</option>
                                        <option value="1">Motor</option>
                                    </select>

                                    <select id="select_umum" class="span2" name="tipe_umum">
                                        <option value="">--Pilih--</option>
                                        <option value="8">Bus Kota</option>
                                        <option value="9">Mikrolet / Angkot</option>
                                        <option value="10">Metromini</option>
                                        <option value="11">Bus Way</option>
                                        <option value="12">Ojek</option>
                                    </select>

                                    <div id="hidden_jarak"class="input-append">
                                        <input class="span1" id="jarak_tempuh" size="16" type="text" name="jarak_tempuh"><span class="add-on">KM</span>
                                    </div>
                                    <div id="hidden_konsumsi" class="input-prepend">
                                        <span class="add-on" style="margin-right:-4px;">Rp</span>
                                        <input class="span2" id="konsumsi" size="16" type="text" name="konsumsi">
                                    </div>
                                    <input class="span2" id="total_darat" size="16" type="hidden" name="total_darat">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>


                <div class="alert alert-info" style="text-align:right">
                    <strong>Total Emisi Transportasi Darat:</strong> <span class="" id="total_darat_text"><?php echo element('total_darat', $transportasi_darat) ?></span> gram CO<sub>2</sub>ek
                </div>
            </div>          			
        </div>


        <div id="step-2">	
            <div style="width:720px;">
                <div style="float: right;">
                    <img src="<?php echo $themes ?>img/bus.png" height="48" width="48"  />
                </div>
                <h3>Transportasi Non Darat</h3>
                <p>Lorem Ipsum Dolor sit amet</p>
                <form id="non-darat" class="form-horizontal modalForm transjauh">
                    <fieldset>	   		
                        <div class="control-group">
                            <label class="control-label" for="input01">Jenis Penerbangan</label>
                            <div class="controls">
                                <label for="jenis_penerbangan_domestik" class="radio inline">
                                    <input name="jenis_penerbangan" type="radio" id="jenis_penerbangan_domestik" value="domestik"> Domestik
                                </label>
                                <label for="jenis_penerbangan_international" class="radio inline">
                                    <input name="jenis_penerbangan" type="radio" id="jenis_penerbangan_international" value="internasional"> Internasional
                                </label>
                            </div>
                        </div>
                        <div id="after-jenis-penerbangan">
                            <div class="control-group">
                                <label class="control-label" for="tipe_pesawat">Tipe Pesawat</label>
                                <div class="clonedInput">

                                    <select id="tipe_pesawat" class="span2" name="tipe_pesawat">
                                        <option>Boeing 737-600</option><option>Boeing 737-700</option>
                                        <option>Boeing 737-800</option><option>Boeing 737-900</option>                
                                    </select>
                                    &nbsp;Jumlah Transit:
                                    <input class="span1" id="jumlah_penumpang" size="16" type="text" name="jumlah_penumpang" value="" />
                                    <input id="total_pesawat" type="hidden" name="total_pesawat" value="">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

                <div class="alert alert-info" style="text-align:right">
                    <strong>Total Emisi Pesawat:</strong> <span class="" id="total_pesawat_text"><?php echo element('total_pesawat', $transportasi_udara) ?></span> gram CO<sub>2</sub>ek
                </div>
            </div>            
        </div>



    </div>
    <!-- End SmartWizard Content --> 

</div>
<script>
    $(document).ready(function(){                
        $('#wizard').smartWizard({
            contentCache:false,
            onLeaveStep:leaveAStepCallback,
            onFinish:onFinishCallback
        });
        function onFinishCallback(){
            var form1 = $("#jarak-dekat").serialize();
            var form2 = $("#non-darat").serialize();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('create/submit') ?>/darat",
                data: form1
            });  
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('create/submit') ?>/udara",
                data: form2
            });  
            window.location.href = '<?php echo site_url('create/confirm') ?>';
            return true;
        }
        
        function leaveAStepCallback(obj){
            var step = obj.attr('rel');
            if(step == 1){
                var form1 = $("#jarak-dekat").serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('create/submit') ?>/darat",
                    data: form1
                });  
            }else{
                var form2 = $("#non-darat").serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('create/submit') ?>/udara",
                    data: form2
                });  
            }
            return true;
        }
        $("#jarak_or_konsumsi").hide();
        $("#jarak").hide();
        
        $("input[name$='tipe']").click(function(){
            var radio_value = $(this).val();
            if(radio_value == 'pribadi'){
                $("#select_umum").hide();
                $("#select_pribadi").show();
                $("#jarak_or_konsumsi").show();
            }else if(radio_value == 'umum'){
                $("#select_pribadi").hide();
                $("#select_umum").show();
                $("#jarak_or_konsumsi").show();
            }
            if(radio_value=='jarak') {
                $("#jarak").show();
                $("#hidden_jarak").show();
                $("#hidden_konsumsi").hide();
            }
            else if(radio_value=='mingguan') {
                $("#jarak").show();
                $("#hidden_jarak").hide();
                $("#hidden_konsumsi").show();
            }
        });
 
        //$("#konsumsi").blur(function(){
        $("#jarak-dekat").delegate('#konsumsi','blur',function(){
            var input = $(this).val();
            var tipe = $("input[name='tipe']:checked").val();
            if(tipe == 'umum'){
                var vehicle = $('#select_umum').val();
            }else{
                var vehicle = $('#select_pribadi').val();
            }
            $.post('<?php echo site_url('transportasi/hitung_konsumsi_darat') ?>', {id:vehicle,f:input}, function(r){
                $("#total_darat").val(r);
                $("#total_darat_text").html(r);
            })
            
        })
        $("#jarak-dekat").delegate('#jarak_tempuh','blur',function(){
            var input = $(this).val();
            var tipe = $("input[name='tipe']:checked").val();
            if(tipe == 'umum'){
                var vehicle = $('#select_umum').val();
            }else{
                var vehicle = $('#select_pribadi').val();
            }
            $.post('<?php echo site_url('transportasi/hitung_jarak_darat') ?>', {id:vehicle,f:input}, function(r){
                $("#total_darat").val(r);
                $("#total_darat_text").html(r);
            })
        })
        
        
        $("#step-2").delegate('input[name=jenis_penerbangan]','click',function(){
            var radio_value = $(this).val();
            var domestik = '<option value="1">Boeing 737-600</option><option value="2">Boeing 737-700</option>';
            var internasional = '<option value="3">Boeing 737-800</option><option value="4">Boeing 737-900</option>    ';
            $("#after-jenis-penerbangan").show();
            if( radio_value=='domestik') {
                $("#tipe_pesawat").html(domestik);
            }
            else if(radio_value=='internasional') {
                $("#tipe_pesawat").html(internasional);
            }
        });
        
        $("#step-2").delegate('#jumlah_penumpang','blur',hitungUdara);
        $("#step-2").delegate('#tipe_pesawat','change',hitungUdara);
        function hitungUdara(){
            var input = $('#jumlah_penumpang').val();
            var jenis = $("#tipe_pesawat").val();
            $.post('<?php echo site_url('transportasi/hitung_pesawat') ?>', {jenis:jenis,penumpang:input}, function(r){
                $("#total_pesawat").val(r);
                $("#total_pesawat_text").html(r);
                
            })
        }
 
        $("#after-jenis-penerbangan").hide();
 
    });
    
    
            
</script>