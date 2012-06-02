
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
                            <input name="jenis_penerbangan" type="radio" id="jenis_penerbangan_domestik" value="domestik"  <?php echo element('jenis_penerbangan', $udara) == 'domestik' ? 'checked="checked"' : ''; ?>> Domestik
                        </label>
                        <label for="jenis_penerbangan_international" class="radio inline">
                            <input name="jenis_penerbangan" type="radio" id="jenis_penerbangan_international" value="internasional" <?php echo element('jenis_penerbangan', $udara) == 'internasional' ? 'checked="checked"' : ''; ?>> Internasional
                        </label>
                    </div>
                </div>
                <div id="after-jenis-penerbangan">
                    <div class="control-group">
                        <label class="control-label" for="tipe_pesawat">Tipe Pesawat</label>
                        <div class="clonedInput">

                            <select id="tipe_pesawat" class="span2" name="tipe_pesawat">
                                <?php if (element('jenis_penerbangan', $udara) == 'domestik'): ?>
                                    <option value="1" <?php echo element('tipe_pesawat', $udara) == '1' ? 'selected="selected"' : '' ?>>Boeing 737-600</option>
                                    <option value="2"<?php echo element('tipe_pesawat', $udara) == '2' ? 'selected="selected"' : '' ?>>Boeing 737-700</option>
                                <?php else: ?>
                                    <option value="3" <?php echo element('tipe_pesawat', $udara) == '3' ? 'selected="selected"' : '' ?>>Boeing 737-800</option>
                                    <option value="4" <?php echo element('tipe_pesawat', $udara) == '4' ? 'selected="selected"' : '' ?>>Boeing 737-900</option>                
                                <?php endif; ?>
                            </select>
                            &nbsp;Jumlah Transit:
                            <input class="span1" id="jumlah_penumpang" size="16" type="text" name="jumlah_penumpang" value="<?php echo element('jumlah_penumpang', $udara) ?>" />
                            <input id="total_pesawat" type="hidden" name="total_pesawat" value="<?php echo element('total_pesawat',$udara)?>">
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

        <div class="alert alert-info" style="text-align:right">
            <strong>Total Emisi Pesawat:</strong> <span class="" id="total_pesawat_text"><?php echo element('total_pesawat', $udara) ?></span> gram CO<sub>2</sub>ek
        </div>
    </div>            
</div>
