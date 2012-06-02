
<h2>Informasi dan Komunikasi</h2>
<hr />
<form class="form-horizontal modalForm">
    <fieldset>	   		

        <?php foreach ($fgroup[6] as $r): ?>
            <?php if (element('item-' . $r->id, $komunikasi)): ?>
                <div class="control-group">
                    <label class="control-label" for="input01"><?php echo $r->item_name ?></label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="span1" id="" size="16" type="text" value="<?php echo element('item-' . $r->id, $komunikasi) ?>"><span class="add-on">jam</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </fieldset>
</form>