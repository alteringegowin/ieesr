<h2>Penerangan</h2>
<hr />
<div style="clear:both"></div>
<div class="well formInfo">
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/pijar') ?>" class="pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/bulb.png" height="50"  />
            <p>Lampu pijar</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/cfl') ?>" class="pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/neon-CFL.png"  />
            <p>Neon - CFL</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="<?php echo site_url('popup/led') ?>" class="pop fancybox.ajax">
            <img src="<?php echo $themes ?>img/icons/led.png" width="35"  />
            <p>LED</p>
        </a>
    </div>
    <div style="clear:both"></div>
</div>
<form id="form-listrik" class="form-horizontal modalForm">
    <fieldset>
        <div class="control-group">	
            <label class="control-label">Jenis dan lampu yang biasa digunakan (10,15,20 Watt atau lebih)?</label>
            <div id="pat" class="controls clonedInput" style="margin-left: 407px">
                <div class="input-append">
                    <select class="span1 recount"  name="tipe[]">
                        <option>LED</option>
                        <option>Neon - CFL</option>
                        <option>Bohlam - Lampu Pijar</option>
                    </select>
                </div>
                <div class="input-append">
                    <input class="span1 recount" size="16" type="text" name="daya[]"><span class="add-on">watt</span>
                </div>
                <div class="input-append">
                    <input class="span1 recount" size="16" type="text"  name="waktu[]"><span class="add-on">Jam</span>
                </div>
            </div>
            <div id="c">
            </div>

            <div style="clear:both"></div>
            <input type="hidden" name="koef_propinsi" value="<?php echo $koef_propinsi ?>" />
            <input type="hidden" name="total_lampu" id="total_lampu" value="" />
            <input type="button" style="float:right" class="btn btn-mini btn-primary" id="btnAddListrik" value="Tambah" />
        </div>
    </fieldset>
</form>
<div class="alert alert-info" style="text-align:right">
    <strong>Total Emisi:</strong> <span id="total_lampu_text">0</span> gram CO<sub>2</sub>ek  &nbsp;<span class="btn btn-success" id="btn-total-lampu"><i class="icon-refresh"></i> </span>
</div>
