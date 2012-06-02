
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
                            <input name="tipe" type="radio" id="inlineCheckbox1" value="pribadi"  <?php echo element('tipe', $darat) == 'pribadi' ? 'checked="checked"' : ''; ?>> Pribadi
                        </label>
                        <label for="inlineCheckbox2" class="radio inline">
                            <input name="tipe" type="radio" id="inlineCheckbox2" value="umum" <?php echo element('tipe', $darat) == 'umum' ? 'checked="checked"' : ''; ?>> Umum
                        </label>
                    </div>
                </div>

                <div id="jarak_or_konsumsi" class="control-group">
                    <label class="control-label">&nbsp;
                    </label>
                    <div class="controls">
                        <label for="check" class="radio inline">
                            <input name="pribaditipe" type="radio" id="check" value="jarak" <?php echo element('pribaditipe', $darat) == 'jarak' ? 'checked="checked"' : '' ?>>Jarak
                        </label>
                        <label for="check2" class="radio inline">
                            <input name="pribaditipe" type="radio" id="check2" value="mingguan"  <?php echo element('pribaditipe', $darat) == 'mingguan' ? 'checked="checked"' : '' ?>> Biaya Bahan Bakar Mingguan
                        </label>
                    </div>
                </div>
                <div id="jarak">
                    <div class="control-group">
                        <label class="control-label" for="input01"></label>
                        <div class="controls">
                            <select id="select_pribadi" class="span2  <?php echo element('tipe', $darat) == 'pribadi' ? '' : 'hide' ?>" name="tipe_pribadi" >
                                <option value="2" <?php echo element('tipe_pribadi', $darat) == '2' ? 'selected="selected"' : '' ?>>Mobil Pribadi - CityCar (Bensin &lt;1200cc)</option>
                                <option value="3" <?php echo element('tipe_pribadi', $darat) == '3' ? 'selected="selected"' : '' ?>>Mobil Pribadi - Bensin 1500cc</option>
                                <option value="4" <?php echo element('tipe_pribadi', $darat) == '4' ? 'selected="selected"' : '' ?>>Mobil Pribadi - Bensin &gt;2000cc</option>
                                <option value="5" <?php echo element('tipe_pribadi', $darat) == '5' ? 'selected="selected"' : '' ?>>Mobil Pribadi - CityCar (Diesel &lt;1200cc)</option>
                                <option value="6" <?php echo element('tipe_pribadi', $darat) == '6' ? 'selected="selected"' : '' ?>>Mobil Pribadi - Diesel 1500cc</option>
                                <option value="7" <?php echo element('tipe_pribadi', $darat) == '7' ? 'selected="selected"' : '' ?>>Mobil Pribadi - Diesel &gt;2000cc</option>
                                <option value="1" <?php echo element('tipe_pribadi', $darat) == '8' ? 'selected="selected"' : '' ?>>Motor</option>
                            </select>

                            <select id="select_umum" class="span2 <?php echo element('tipe', $darat) == 'umum' ? '' : 'hide' ?>" name="tipe_umum">
                                <option value="8" <?php echo element('tipe_umum', $darat) == '8' ? 'selected="selected"' : '' ?>>Bus Kota</option>
                                <option value="9" <?php echo element('tipe_umum', $darat) == '9' ? 'selected="selected"' : '' ?>>Mikrolet / Angkot</option>
                                <option value="10" <?php echo element('tipe_umum', $darat) == '10' ? 'selected="selected"' : '' ?>>Metromini</option>
                                <option value="11" <?php echo element('tipe_umum', $darat) == '11' ? 'selected="selected"' : '' ?>>Bus Way</option>
                                <option value="12" <?php echo element('tipe_umum', $darat) == '12' ? 'selected="selected"' : '' ?>>Ojek</option>
                            </select>

                            <div id="hidden_jarak"class="input-append <?php echo element('pribaditipe', $darat) == 'jarak' ? '' : 'hide' ?>">
                                <input class="span1" id="jarak_tempuh" size="16" type="text" name="jarak_tempuh" value="<?php echo element('jarak_tempuh', $darat) ?>"><span class="add-on">KM</span>
                            </div>
                            <div id="hidden_konsumsi" class="input-prepend" style="<?php echo element('pribaditipe', $darat) == 'mingguan' ? 'display: inline-block' : 'display: none' ?>">
                                <span class="add-on" style="margin-right:-4px;">Rp</span>
                                <input class="span1" id="konsumsi" size="16" type="text" name="konsumsi" value="<?php echo element('konsumsi', $darat) ?>">
                            </div>
                            <input class="span2" id="total_darat" size="16" type="hidden" name="total_darat" value="<?php echo element('konsumsi', $darat) ?>">
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>


        <div class="alert alert-info" style="text-align:right">
            <strong>Total Emisi Transportasi Darat:</strong> <span class="" id="total_darat_text"><?php echo element('total_darat', $darat) ?></span> gram CO<sub>2</sub>ek
        </div>
    </div>          			
</div>