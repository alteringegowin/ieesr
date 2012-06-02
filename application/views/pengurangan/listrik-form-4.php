<h2>Peralatan Pribadi</h2>
<hr />
<form id="form-step-4" class="form-horizontal modalForm">
    <fieldset>	   		
        <?php foreach ($fgroup[4] as $r): ?>
            <?php if (element('item-' . $r->id, $pribadi)): ?>
                <div class="control-group">
                    <label class="control-label" for="input01"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1" id="" size="16" type="text" value="<?php echo element('item-' . $r->id, $pribadi) ?>"><span class="add-on">jam</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


    </fieldset>
</form>