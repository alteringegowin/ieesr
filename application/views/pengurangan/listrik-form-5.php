<h2>Elektronik Lainnya</h2>
<hr />
<form id="form-step-5" class="form-horizontal modalForm">
    <fieldset>	   		

        <?php foreach ($fgroup[5] as $r): ?>
            <?php if (element('item-' . $r->id, $elektronik)): ?>
                <div class="control-group">
                    <label class="control-label" for="input01"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1" id="" size="16" type="text" value="<?php echo element('item-' . $r->id, $elektronik) ?>"><span class="add-on">jam</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </fieldset>
</form>