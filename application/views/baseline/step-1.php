<h2>Penerangan</h2>
<hr />
<div style="clear:both"></div>
<div class="well formInfo">
    <div class="imgInfo">
        <a href="pop/pijar.php" class="pop fancybox.ajax">
            <img src="img/icons/bulb.png" height="50"  />
            <p>Lampu pijar</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="pop/cfl.php" class="pop fancybox.ajax">
            <img src="img/icons/neon-CFL.png"  />
            <p>Neon - CFL</p>
        </a>
    </div>
    <div class="imgInfo">
        <a href="pop/led.php" class="pop fancybox.ajax">
            <img src="img/icons/led.png" width="35"  />
            <p>LED</p>
        </a>
    </div>
    <div style="clear:both"></div>
</div>
<form class="form-horizontal modalForm">
    <fieldset>
        <div id="" class="control-group">	
            <label class="control-label" for="input01">Jenis dan lampu yang biasa digunakan (10,15,20 Watt atau lebih)?</label>
            <div id="input1" class="controls clonedInput">
                <div class="input-append">
                    <select class="span1">
                        <option>LED</option>
                        <option>Neon - CFL</option>
                        <option>Bohlam - Lampu Pijar</option>
                    </select>
                </div>
                <div class="input-append">
                    <input class="span1" id="" size="16" type="text"><span class="add-on">watt</span>
                </div>
                <div class="input-append">
                    <input class="span1" id="" size="16" type="text"><span class="add-on">Jam</span>
                </div>
            </div>
            <div style="clear:both"></div>
            <input type="button" style="float:right" class="btn btn-mini btn-primary" id="btnAddListrik" value="Tambah" />
        </div>
    </fieldset>
</form>
<script type="text/javascript">
        !function ($) {

        $(function(){
            $('#btnAddListrik').unbind("click").click(function() {
                var num		= $('.clonedInput').length;
                var newNum	= new Number(num + 1);
                var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
                newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
                $('#input' + num).after(newElem);
                $('#btnDel').attr('disabled','');
                
                if (newNum == 100)
                    $('#btnAdd').attr('disabled','disabled');
                return false;
            });
        
            $('#btnDelListrik').unbind("click").click(function() {
                console.log('d');
                return false;
            });

        })
        
    }(window.jQuery)



        
    
</script>