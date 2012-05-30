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
            <div id="umum">
                <div class="control-group">
                    <label class="control-label" for="input01">&nbsp;</label>
                    <div class="controls">
                        <select id="select01" class="span2">
                            <option>Bus Kota</option>
                            <option>Mikrolet / Angkot</option>
                            <option>Komuter/KRL</option>
                            <option>Metromini</option>
                            <option>Bus Way</option>
                            <option>Bajaj</option>
                            <option>Ojek</option>

                        </select>
                        <div class="input-append">
                            <input class="span1" id="" size="16" type="text"><span class="add-on">KM</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="pribadi">
                <div class="control-group">
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
                            <select id="select01" class="span2">
                                <option>--Pilih--</option>
                                <option>Mobil Pribadi - CityCar (Bensin &lt; 1200cc)</option>
                                <option>Mobil Pribadi - Bensin 1500cc</option>
                                <option>Mobil Pribadi - Bensin &gt; 2000cc</option>
                                <option>Mobil Pribadi - CityCar (Diesel &lt; 1200cc)</option>
                                <option>Mobil Pribadi - Diesel 1500cc</option>
                                <option>Mobil Pribadi - Diesel &gt; 2000cc</option>
                                <option>Motor</option>
                                <option>Sepeda</option>                
                            </select>
                            <div class="input-append">
                                <input class="span1" id="" size="16" type="text"><span class="add-on">KM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="mingguan">
                    <div class="control-group">
                        <label class="control-label" for="input01"></label>
                        <div class="controls">
                            <select id="select01" class="span2">
                                <option>--Pilih--</option>
                                <option>Mobil Pribadi - CityCar (Bensin &lt; 1200cc)</option>
                                <option>Mobil Pribadi - Bensin 1500cc</option>
                                <option>Mobil Pribadi - Bensin &gt; 2000cc</option>
                                <option>Mobil Pribadi - CityCar (Diesel &lt; 1200cc)</option>
                                <option>Mobil Pribadi - Diesel 1500cc</option>
                                <option>Mobil Pribadi - Diesel &gt; 2000cc</option>
                                <option>Motor</option>
                                <option>Sepeda</option>                
                            </select>
                            &nbsp;&nbsp;
                            <div class="input-prepend">
                                <span class="add-on" style="margin-right:-4px;">Rp</span>
                                <input class="span2" id="" size="16" type="text">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </fieldset>
    </form>
</div>
<script>
    $(document).ready(function(){
 
        $("input[name$='tipe']").click(function(){
 
            var radio_value = $(this).val();
 
            if(radio_value=='umum') {
                $("#umum").show();
                $("#pribadi").hide();
            }
            else if(radio_value=='pribadi') {
                $("#pribadi").show();
                $("#umum").hide();
            }
            else if(radio_value=='jarak') {
                $("#jarak").show();
                $("#mingguan").hide();
            }
            else if(radio_value=='mingguan') {
                $("#mingguan").show();
                $("#jarak").hide();
            }
        });
 
        $("#umum").hide();
        $("#pribadi").hide();
        $("#jarak").hide();
        $("#mingguan").hide();
 
    });

</script>