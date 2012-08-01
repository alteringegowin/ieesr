<?php
$transportasi_darat = $this->session->userdata('darat');
$transportasi_udara = $this->session->userdata('udara');
?>

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
            <h3>Transportasi Jarak Dekat</h3>
            <hr />
            <div class="well formInfo">
                <div style="display:block">
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/car') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/mobil.png" width="40"  />
                            <p>Mobil Pribadi</p>
                        </a>
                    </div>
                    <!--
                        <div class="imgInfo">
                            <img src="<?php echo $themes ?>img/icons/commuter.png" width="30"  />
                            <p>Commuter / KRL</p>
                        </div>
                    -->
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/bajaj') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/bajaj.png" width="40"  />
                            <p>Bajaj</p>
                        </a>
                    </div>
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/transjakarta') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/transjakarta.png" width="25"  />
                            <p>Transjakarta</p>
                        </a>
                    </div>
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/angkot') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/angkot.png" width="50"  />
                            <p>Angkot</p>
                        </a>
                    </div>
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/ojek') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/ojek.png" width="30"  />
                            <p>Ojek / Motor</p>
                        </a>
                    </div>
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/mayasari') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/mayasaribakti.png" width="50"  />
                            <p>Mayasari Bakti</p>
                        </a>
                    </div>
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/bicycle') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/sepeda.png" width="40"  />
                            <p>Sepeda</p>
                        </a>
                    </div>
                    <div class="imgInfo">
                        <a href="<?php echo site_url('popup/metromini') ?>" class="thumbnail pop fancybox.ajax">
                            <img src="<?php echo $themes ?>img/icons/metromini.png" width="40"  />
                            <p>Metromini</p>
                        </a>
                    </div>
                </div>


                <div style="clear:both"></div>
            </div>
            <form id="jarak-dekat" class="form-horizontal modalForm trans">
                <fieldset>	   		
                    <div class="control-group">
                        <label class="control-label">Jenis Kendaraan</label>
                        <div class="controls">
                            <select id="darat-jenis-kendaraan" class="span2" name="jenis_kendaraan">
                                <option value="">--Pilih--</option>
                                <option value="pribadi">Pribadi</option>
                                <option value="umum">Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" id="hide-penumpang-group">
                        <label class="control-label" for="appendedInput">Jumlah Penumpang</label>
                        <div class="controls">
                            <div class="input-append">
                                <input class="span1" id="xpenumpang" size="16" type="text" name="xpenumpang"><span class="add-on">Orang</span>
                            </div>
                        </div>
                    </div>

                    <div class="control-group hide" id="darat-tipe-kendaraan">
                        <label class="control-label">Pilih Tipe Kendaraan</label>
                        <div class="controls">
                            <select id="darat-tipe-pribadi" class="input-xlarge hide" name="darat-tipe-pribadi">
                                <option value="2">Mobil Pribadi - CityCar (Bensin &lt; 1200cc)</option>
                                <option value="3">Mobil Pribadi - Bensin 1500cc</option>
                                <option value="4">Mobil Pribadi - Bensin &gt; 2000cc</option>
                                <option value="5">Mobil Pribadi - CityCar (Diesel &lt; 1200cc)</option>
                                <option value="6">Mobil Pribadi - Diesel 1500cc</option>
                                <option value="7">Mobil Pribadi - Diesel &gt; 2000cc</option>
                                <option value="1">Motor 4 Tax</option>
                                <option value="s">Sepeda</option>
                            </select>

                            <select id="darat-tipe-umum" class="span2 hide" name="darat-tipe-umum">
                                <option value="8">Bus Kota</option>
                                <option value="9">Mikrolet / Angkot</option>
                                <option value="10">Metromini</option>
                                <option value="11">Bus Way</option>
                                <option value="12">Ojek/Motor</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group hide" id="darat-tipe-penghitungan-group">
                        <label class="control-label">Pilih Tipe Penghitungan</label>
                        <div class="controls">
                            <select id="darat-tipe-penghitungan-pribadi" class="input-xlarge hide xtipe" name="darat-tipe-penghitungan-pribadi">
                                <option value="jarak">Jarak</option>
                                <option value="bahan bakar">Biaya Bahan Bakar Mingguan</option>
                            </select>
                            <select id="darat-tipe-penghitungan-umum" class="input-xlarge hide xtipe" name="darat-tipe-penghitungan-umum">
                                <option value="jarak">Jarak</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group hide" id="hide-penumpang-group">
                        <label class="control-label" for="appendedInput">Jumlah Penumpang</label>
                        <div class="controls">
                            <div id="hide-param-penumpang"class="input-append">
                                <input class="span1" id="penumpang" size="16" type="text" name="penumpang"><span class="add-on">Orang</span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group hide" id="hide-param-group">
                        <label class="control-label" for="appendedInput">Jarak</label>
                        <div class="controls">
                            <div id="hide-param-jarak"class="input-append">
                                <input class="span1" id="jarak_tempuh" size="16" type="text" name="jarak_tempuh"><span class="add-on">KM</span>
                            </div>
                            <div id="hide-param-bahan-bakar" class="input-prepend hide">
                                <span class="add-on" style="margin-right:-4px;">Rp</span>
                                <input class="span2" id="konsumsi" size="16" type="text" name="konsumsi">
                            </div>
                        </div>
                    </div>
                    <input id="total_darat" size="16" type="hidden" name="total_darat">
                </fieldset>
            </form>


            <div class="alert alert-info" style="text-align:right">
                <strong>Total Emisi Transportasi Darat:</strong> <span class="" id="total_darat_text"><?php echo element('total_darat', $transportasi_darat) ?></span> gram CO<sub>2</sub>ek
            </div>
        </div>          			
    </div>


    <div id="step-2">	
        <div style="width:720px;" >
            <h3>Transportasi Jarak Jauh</h3>
            <hr />
            <div class="well formInfo">
                <div class="imgInfo">
                    <a href="<?php echo site_url('popup/600') ?>" class="thumbnail pop fancybox.ajax">
                        <img src="<?php echo $themes ?>img/icons/737-600.png" width="70"  />
                        <p>Boeing 737-600</p>
                    </a>
                </div>
                <div class="imgInfo">
                    <a href="<?php echo site_url('popup/700') ?>" class="thumbnail pop fancybox.ajax">
                        <img src="<?php echo $themes ?>img/icons/737-700.png" width="55"  />
                        <p>Boeing 737-700</p>
                    </a>
                </div>
                <div class="imgInfo">
                    <a href="<?php echo site_url('popup/A319') ?>" class="thumbnail pop fancybox.ajax">
                        <img src="<?php echo $themes ?>img/icons/A319.png" width="80"  />
                        <p>Airbus A319</p>
                    </a>
                </div>
                <div class="imgInfo">
                    <a href="<?php echo site_url('popup/A320') ?>" class="thumbnail pop fancybox.ajax">
                        <img src="<?php echo $themes ?>img/icons/A320.png" width="70"  />
                        <p>Airbus A320</p>
                    </a>
                </div>
                <div style="clear:both"></div>
            </div>
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

<script>
    $(document).ready(function(){        
        
        $('#hide-penumpang-group').hide();
                
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
                url: "<?php echo site_url('baseline/finish') ?>/darat",
                data: form1
            }).done(function() { 
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('baseline/finish') ?>/udara",
                    data: form2
                }).done(function() { 
                    window.location.href = SITE_URL+'/baseline/save_to_db';
                });  
            });  
        }
        
        function leaveAStepCallback(obj){
            var step = obj.attr('rel');
            if(step == 1){
                var form1 = $("#jarak-dekat").serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('baseline/finish') ?>/darat",
                    data: form1
                });  
            }else{
                var form2 = $("#non-darat").serialize();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('baseline/finish') ?>/udara",
                    data: form2
                });  
            }
            return true;
        }
        
        $('#darat-jenis-kendaraan').change(function(){
            var darat_jenis = $(this).val();
            switch (darat_jenis) {
                case 'umum':
                    $('#darat-tipe-kendaraan').show();
                    $('#darat-tipe-umum').show();
                    $('#darat-tipe-penghitungan-group').show();
                    $('#darat-tipe-penghitungan-umum').show();
                    $("#hide-param-group").show();
                    
                    $('#hide-penumpang-group').hide();
                    $('#darat-tipe-pribadi').hide();
                    $('#darat-tipe-penghitungan-pribadi').hide();
                    break;
                case 'pribadi':
                    $('#hide-penumpang-group').show();
                    $('#darat-tipe-kendaraan').show();
                    $('#darat-tipe-pribadi').show();
                    $('#darat-tipe-penghitungan-group').show();
                    $('#darat-tipe-penghitungan-pribadi').show();
                    $("#hide-param-group").show();
                    
                    $('#darat-tipe-umum').hide();
                    $('#darat-tipe-penghitungan-umum').hide();
                    
                    break;
                default:
                    
                    break;
            }
        });
        $(".xtipe").change(function(){
            var xtipe = $(this).val();
            switch (xtipe) {
                case 'bahan bakar':
                    $("#hide-param-jarak").hide();
                    $("#hide-param-bahan-bakar").show();
                    break;
                case 'jarak':
                default:
                    $("#hide-param-bahan-bakar").hide();
                    $("#hide-param-jarak").show();
                    break;
            }
        });
        
        
        function hitung(){
            var xtipe = $('.xtipe').val();
            switch (xtipe) {
                case 'bahan bakar':
                    hit_konsumsi();
                    break;
                case 'jarak':
                default:
                    hit_jarak();
                    break;
            }
        }
        
        function hit_konsumsi(){
            var input = $("#jarak-dekat").serialize();
            $.post('<?php echo site_url('baseline/hitung_konsumsi_darat') ?>', input, function(r){
                $("#total_darat").val(r);
                $("#total_darat_text").html(r);
            })
        }
        
        function hit_jarak(){
            var input = $("#jarak-dekat").serialize();
            $.post('<?php echo site_url('baseline/hitung_jarak_darat') ?>', input, function(r){
                $("#total_darat").val(r);
                $("#total_darat_text").html(r);
            })
        }
        $("#jarak-dekat").delegate('#konsumsi','blur',hitung);
        $("#jarak-dekat").delegate('#jarak_tempuh','blur',hitung);
        $("#jarak-dekat").delegate('#darat-jenis-kendaraan','change',hitung);
        $("#jarak-dekat").delegate('#darat-tipe-pribadi','change',hitung);
        $("#jarak-dekat").delegate('#darat-tipe-umum','change',hitung);
        $("#jarak-dekat").delegate('#darat-tipe-penghitungan-pribadi','change',hitung);
        $("#jarak-dekat").delegate('#darat-tipe-penghitungan-umum','change',hitung);
        
        
        
        
        
        $("#step-2").delegate('input[name=jenis_penerbangan]','click',function(){
            var radio_value = $(this).val();
            var domestik = '<option value="1">Boeing 737-600</option><option value="2">Boeing 737-700</option>';
            var internasional = '<option value="3">Boeing 737-800</option><option value="4">Boeing 737-900</option><option value="5">Airbus A319</option><option value="6">Airbus A320</option>    ';
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
            $.post('<?php echo site_url('baseline/hitung_pesawat') ?>', {jenis:jenis,penumpang:input}, function(r){
                $("#total_pesawat").val(r);
                $("#total_pesawat_text").html(r);
                
            })
        }
 
        $("#after-jenis-penerbangan").hide();
     
 
    });
    
    
            
</script>